<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('upload');
        $this->load->library('email');
    }

	public function index(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $this->load->view('admin/templates/header',$this->session->userdata('nama'));
                $this->load->view('admin/dashboard');
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }
    
    public function akunAdmin(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
            $data['admin'] = $this->db->get('tbl_admin')->result();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/admin',$data);
            $this->load->view('admin/templates/js');
            $this->load->view('admin/templates/footer');
        }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }
    
    public function mahasiswa(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['mahasiswa'] = $this->db->where('role','mahasiswa')->get('tbl_akun')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/mahasiswa',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }

    public function umum(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['umum'] = $this->db->where('role','umum')->get('tbl_akun')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/umum',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }

    public function event(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['event'] = $this->db->get('tbl_event')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/event',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }

    public function peserta($id){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['perusahaan'] = $this->db->select('tbl_perusahaan.*, event_perusahaan.id, event_perusahaan.id_event, tbl_event.nama_event')->join('tbl_event','tbl_event.id_event=event_perusahaan.id_event','LEFT')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=event_perusahaan.id_peserta','LEFT')->where('event_perusahaan.id_event',$id)->where('event_perusahaan.role','perusahaan')->get('event_perusahaan')->result();
                $data['peserta'] = $this->db->select('tbl_akun.*, event_perusahaan.id, event_perusahaan.id_event, tbl_event.nama_event')->join('tbl_event','tbl_event.id_event=event_perusahaan.id_event','LEFT')->join('tbl_akun','tbl_akun.id_akun=event_perusahaan.id_peserta','LEFT')->where('event_perusahaan.id_event',$id)->where('event_perusahaan.role','peserta')->get('event_perusahaan')->result();
                $data['nama'] = $this->db->select('nama_event')->where('id_event',$id)->get('tbl_event')->row();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/peserta',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }

    public function addEvent(){
        $data = array(
            'nama_event'	=> $this->input->post('nama_event'),
            'tanggal_awal'	=> $this->input->post('tanggal_awal'),
            'tanggal_akhir'	=> $this->input->post('tanggal_akhir'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
		$query = $this->db->insert('tbl_event',$data);
		if($query){
        	$this->session->set_flashdata('insert_event',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/event');
    }

    public function updateEvent($id){
        $data = array(
            'nama_event'	=> $this->input->post('nama_event'),
            'tanggal_awal'	=> $this->input->post('tanggal_awal'),
            'tanggal_akhir'	=> $this->input->post('tanggal_akhir'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
        $query = $this->db->where('id_event', $id)->update('tbl_event',$data);
		if($query){
        	$this->session->set_flashdata('insert_event',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/event');
    }

    public function addMahasiswa(){
        $data = array(
			'nama'	=> $this->input->post('nama'),
			'email' 			=> $this->input->post('email'),
			'password' 				=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'telp' 			=> $this->input->post('telp'),
			'role'				=> "mahasiswa",
			'status'			=> "Aktif",
            'nomor_induk'		=> $this->input->post('nrp'),
            'alamat'		=> $this->input->post('alamat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
		$query = $this->db->insert('tbl_akun',$data);
		if($query){
        	$this->session->set_flashdata('insert_mahasiswa',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/mahasiswa');
    }

    public function editMahasiswa($id){
        if(($this->input->post('passwordnew'))==""){
            $data = array(
                'nama'	    => $this->input->post('nama'),
                'email' 	=> $this->input->post('email'),
                'password' 	=> $this->input->post('password'),
                'telp' 		=> $this->input->post('telp'),
                'role'		=> "mahasiswa",
                'status'	=> "Aktif",
                'nomor_induk'=> $this->input->post('nrp'),
                'alamat'	=> $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            ); }
        else{
            $data = array(
                'nama'	    => $this->input->post('nama'),
                'email' 	=> $this->input->post('email'),
                'password' 	=> password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
                'telp' 		=> $this->input->post('telp'),
                'role'		=> "mahasiswa",
                'status'	=> "Aktif",
                'nomor_induk'=> $this->input->post('nrp'),
                'alamat'	=> $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        }
		$query = $this->db->where('id_akun', $id)->update('tbl_akun',$data);
		if($query){
            $this->session->set_flashdata('insert_alumni',"Tambah Berhasil");
            redirect('admin/mahasiswa');
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/mahasiswa');
    }

    public function addAdmin(){
        $data = array(
			'nama_admin'	=> $this->input->post('nama_admin'),
			'email' => $this->input->post('email'),
			'password'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		 );
		$query = $this->db->insert('tbl_admin',$data);
		if($query){
        	$this->session->set_flashdata('insert_admin',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/akunAdmin');
    }
    
    public function editAdmin($id){
        if(($this->input->post('passwordnew'))==""){
            $data = array(
                'nama_admin'	=> $this->input->post('nama_admin'),
                'email' => $this->input->post('email'),
                'password'	=> $this->input->post('password')
             );
        }
        else{
            $data = array(
                'nama_admin'	=> $this->input->post('nama_admin'),
                'email' => $this->input->post('email'),
                'password'	=> password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT)
             );
        }
		$query = $this->db->where('id_admin', $id)->update('tbl_admin',$data);
		if($query){
            $this->session->set_flashdata('edit_admin',"Tambah Berhasil");
            redirect('admin/akunAdmin');
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/akunAdmin');
    }

    public function hapusEvent($id){
        $this->db->where('id_event', $id)->delete('tbl_event');
        redirect('admin/event');
    }

    public function hapusAdmin($id){
        $this->db->where('id_admin', $id)->delete('tbl_admin');
        redirect('admin/akunAdmin');
    }
    public function hapusAlumni($id){
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/alumni');
    }
    public function hapusUmum($id){
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/umum');
    }

    public function hapusArtikel($id){
        $this->db->where('id_artikel', $id)->delete('tbl_artikel');
        redirect('admin/post');
    }

    public function hapusPerusahaan($id){
        $this->db->where('id_admin', $id)->delete('tbl_admin');
        redirect('admin/perusahaan');
    }
    public function hapusMahasiswa($id){
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/mahasiswa');
    }

    public function alumni(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['alumni'] = $this->db->where('role','alumni')->get('tbl_akun')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/alumni',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }
    
    public function addAlumni(){
        $data = array(
			'nama'	    => $this->input->post('nama'),
			'email' 	=> $this->input->post('email'),
			'password' 	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'telp' 		=> $this->input->post('telp'),
			'role'		=> "alumni",
			'status'	=> "Aktif",
            'nomor_induk'=> $this->input->post('nrp'),
            'alamat'	=> $this->input->post('alamat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
		$query = $this->db->insert('tbl_akun',$data);
		if($query){
        	$this->session->set_flashdata('insert_alumni',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/alumni');
    }

    public function addUmum(){
        $data = array(
			'nama'	    => $this->input->post('nama'),
			'email' 	=> $this->input->post('email'),
			'password' 	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'telp' 		=> $this->input->post('telp'),
			'role'		=> "umum",
			'status'	=> "Aktif",
            'nomor_induk'=> $this->input->post('nrp'),
            'alamat'	=> $this->input->post('alamat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
		$query = $this->db->insert('tbl_akun',$data);
		if($query){
        	$this->session->set_flashdata('insert_alumni',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/umum');
    }

    public function editAlumni($id){
        if(($this->input->post('passwordnew'))==""){
            $data = array(
                'nama'	    => $this->input->post('nama'),
                'email' 	=> $this->input->post('email'),
                'password' 	=> $this->input->post('password'),
                'telp' 		=> $this->input->post('telp'),
                'role'		=> "alumni",
                'status'	=> "Aktif",
                'nomor_induk'=> $this->input->post('nrp'),
                'alamat'	=> $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            ); }
        else{
            $data = array(
                'nama'	    => $this->input->post('nama'),
                'email' 	=> $this->input->post('email'),
                'password' 	=> password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
                'telp' 		=> $this->input->post('telp'),
                'role'		=> "alumni",
                'status'	=> "Aktif",
                'nomor_induk'=> $this->input->post('nrp'),
                'alamat'	=> $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        }
		$query = $this->db->where('id_akun', $id)->update('tbl_akun',$data);
		if($query){
            $this->session->set_flashdata('insert_alumni',"Tambah Berhasil");
            redirect('admin/alumni');
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/alumni');
    }

    public function editUmum($id){
        if(($this->input->post('passwordnew'))==""){
            $data = array(
                'nama'	    => $this->input->post('nama'),
                'email' 	=> $this->input->post('email'),
                'password' 	=> $this->input->post('password'),
                'telp' 		=> $this->input->post('telp'),
                'role'		=> "umum",
                'status'	=> "Aktif",
                'nomor_induk'=> $this->input->post('nrp'),
                'alamat'	=> $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            ); }
        else{
            $data = array(
                'nama'	    => $this->input->post('nama'),
                'email' 	=> $this->input->post('email'),
                'password' 	=> password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
                'telp' 		=> $this->input->post('telp'),
                'role'		=> "umum",
                'status'	=> "Aktif",
                'nomor_induk'=> $this->input->post('nrp'),
                'alamat'	=> $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        }
		$query = $this->db->where('id_akun', $id)->update('tbl_akun',$data);
		if($query){
            $this->session->set_flashdata('insert_alumni',"Tambah Berhasil");
            redirect('admin/umum');
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/umum');
    }

    public function perusahaan(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['perusahaan'] = $this->db->get('tbl_perusahaan')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/perusahaan',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }
    
    public function addPerusahaan(){
        $config['upload_path'] = './assets/upload/file_cv/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('file_cv');        
        $data = array(
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'email' 	=> $this->input->post('email'),
			'password' 	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'telp_pj' 		=> $this->input->post('telp_pj'),
			'jabatan'		=> "-",
            'pj'=> $this->input->post('pj'),
            'alamat'	=> $this->input->post('alamat'),
            'telp_perusahaan' => $this->input->post('telp'),
            'file_cv'   => $this->upload->data('file_name'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
		$query = $this->db->insert('tbl_perusahaan',$data);
		if($query){
        	$this->session->set_flashdata('insert_persh',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/perusahaan');
    }

    public function editPerusahaan($id){
        $config['upload_path'] = './assets/upload/file_cv/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('file_cv');

        $data = array(
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'email' 	=> $this->input->post('email'),
			'password' 	=> $this->input->post('password'),
			'telp_pj' 		=> $this->input->post('telp_pj'),
			'jabatan'		=> "-",
            'pj'=> $this->input->post('pj'),
            'alamat'	=> $this->input->post('alamat'),
            'telp_perusahaan' => $this->input->post('telp'),
            'file_cv'   => $this->upload->data('file_name'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
		 );
		$query = $this->db->where('id_perusahaan',$id)->update('tbl_perusahaan',$data);
		if($query){
        	$this->session->set_flashdata('update_persh',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/perusahaan');
    }


    public function loker(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.*')->from('tbl_loker')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','left')->order_by('tbl_loker.created','DESC')->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/loker',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('login');
            }
        }else{
            redirect('login');
        } 
    }
    
    public function accLoker($id){
        $data = array(
            'status' => "Disetujui",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker',$id)->update('tbl_loker',$data);
        redirect('admin/loker');
    }

    // public function verifikasi($id){
    //     $data = array(
    //         'status' => "y",
    //         'updated' => date('Y-m-d H:i:s')
    //     );
    //     $this->db->where('id_perusahaan',$id)->update('tbl_perusahaan',$data);
    //     redirect('admin/loker');
    // }

    public function unpublishLoker($id){
        $data = array(
            'status' => "Menunggu Konfirmasi",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker',$id)->update('tbl_loker',$data);
        redirect('admin/loker');
    }

    public function editLoker($id){
        if($this->input->post('poster')!=NULL){
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $this->upload->do_upload('poster');
            $data = array(
                'judul' => $this->input->post('judul'),
                'posisi' 	=> $this->input->post('posisi'),
                'syarat' 	=> $this->input->post('syarat'),
                'deskripsi' 	=> $this->input->post('deskripsi'),
                'poster'   => $this->upload->data('file_name'),
                'prodi'   => $this->input->post('prodi'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'updated' => date('Y-m-d H:i:s')
             );   
        }else{
            $data = array(
                'judul' => $this->input->post('judul'),
                'posisi' 	=> $this->input->post('posisi'),
                'syarat' 	=> $this->input->post('syarat'),
                'deskripsi' 	=> $this->input->post('deskripsi'),
                'prodi'   => $this->input->post('prodi'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'updated' => date('Y-m-d H:i:s')
             );   
        }   
        
		$query = $this->db->where('id_loker', $id)->update('tbl_loker',$data);
		if($query){
        	$this->session->set_flashdata('update_loker',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/loker');
    }

    public function tidakMengikuti($id,$id_perusahaan){       
		$query = $this->db->where('id_event',$id)->where('id_perusahaan',$id_perusahaan)->delete('event_perusahaan');
		if($query){
        	$this->session->set_flashdata('delete_peserta',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/peserta/'.$id);
    }

    public function addVacancy(){
        $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        if($ada_perusahaan){
            $id_perusahaan= $ada_perusahaan['id_perusahaan'];
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $insert_logo = $this->upload->do_upload('poster');        
            $poster = $this->upload->data('file_name');
            $data = array(
                    'posisi' 	=> $this->input->post('posisi'),
                    'deadline' => $this->input->post('deadline'),
                    'lokasi' 	=> $this->input->post('lokasi'),
                    'syarat' 	=> $this->input->post('syarat'),
                    'deskripsi' 	=> $this->input->post('deskripsi'),
                    'informasi' 	=> $this->input->post('informasi'),
                    'status' 	=> 'Menunggu Konfirmasi',
                    'prodi' 	=> $this->input->post('prodi'),
                    'poster'   => $poster,
                    'jenis'   => "vacancy",
                    'id_perusahaan' => $id_perusahaan,
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
            );
            $query = $this->db->insert('tbl_loker',$data);
            if($query){
                $this->session->set_flashdata('insert_loker',"Tambah Berhasil");
            }else{
                $this->session->set_flashdata('failed',"Tambah Gagal");
            }
        }else{
            $config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $upload_logo = $this->upload->do_upload('logo');
            $logo = $this->upload->data('file_name');
            if($upload_logo){
                $perusahaan = array(
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'email' => $this->input->post('email'),
                    'logo_perusahaan' => $logo,
                    'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                );
                $insert_perusahaan = $this->db->insert('tbl_perusahaan',$perusahaan);
                if($insert_perusahaan){
                    $config['upload_path'] = './assets/upload/poster/';
                    $config['allowed_types'] = 'jpg|png';
                    $this->upload->initialize($config);
                    $insert_logo = $this->upload->do_upload('poster');        
                    $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
                    $poster = $this->upload->data('file_name');
                    $data = array(
                            'posisi' 	=> $this->input->post('posisi'),
                            'deadline' => $this->input->post('deadline'),
                            'lokasi' 	=> $this->input->post('lokasi'),
                            'syarat' 	=> $this->input->post('syarat'),
                            'deskripsi' 	=> $this->input->post('deskripsi'),
                            'informasi' 	=> $this->input->post('informasi'),
                            'status' 	=> 'Menunggu Konfirmasi',
                            'prodi' 	=> $this->input->post('prodi'),
                            'poster'   => $poster,
                            'jenis'   => "vacancy",
                            'id_perusahaan' => $id['id_perusahaan'],
                            'created' => date('Y-m-d H:i:s'),
                            'updated' => date('Y-m-d H:i:s')
                    );
                    $query = $this->db->insert('tbl_loker',$data);
                    if($query){
                        $this->session->set_flashdata('insert_loker',"Tambah Berhasil");
                    }else{
                        $this->session->set_flashdata('failed',"Tambah Gagal");
                    }
                }else{
                    $this->session->set_flashdata('failed',"Tambah Gagal");
                }
            }else{
                $this->session->set_flashdata('failed',"Tambah Gagal");
            }   
        }     
        redirect('admin/loker');
    }

    public function editVacancy($id){
        // $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        // if($ada_perusahaan){
            if($this->input->post('logo_poster')){
                // $id_perusahaan= $ada_perusahaan['id_perusahaan'];
                $config['upload_path'] = './assets/upload/poster/';
                $config['allowed_types'] = 'jpg';
                $this->upload->initialize($config);
                $insert_logo = $this->upload->do_upload('poster');        
                $poster = $this->upload->data('file_name');
                $data = array(
                        'posisi' 	=> $this->input->post('posisi'),
                        'deadline' => $this->input->post('deadline'),
                        'lokasi' 	=> $this->input->post('lokasi'),
                        'syarat' 	=> $this->input->post('syarat'),
                        'deskripsi' 	=> $this->input->post('deskripsi'),
                        'informasi' 	=> $this->input->post('informasi'),
                        'status' 	=> 'Menunggu Konfirmasi',
                        'prodi' 	=> $this->input->post('prodi'),
                        'poster'   => $poster,
                        'jenis'   => "vacancy",
                        'id_perusahaan' => $id_perusahaan,
                        'created' => date('Y-m-d H:i:s'),
                        'updated' => date('Y-m-d H:i:s')
                );
            }else{
                // $id_perusahaan= $ada_perusahaan['id_perusahaan'];
                $data = array(
                        'posisi' 	=> $this->input->post('posisi'),
                        'deadline' => $this->input->post('deadline'),
                        'lokasi' 	=> $this->input->post('lokasi'),
                        'syarat' 	=> $this->input->post('syarat'),
                        'deskripsi' 	=> $this->input->post('deskripsi'),
                        'informasi' 	=> $this->input->post('informasi'),
                        'status' 	=> 'Menunggu Konfirmasi',
                        'prodi' 	=> $this->input->post('prodi'),
                        'jenis'   => "vacancy",
                        // 'id_perusahaan' => $id_perusahaan,
                        'created' => date('Y-m-d H:i:s'),
                        'updated' => date('Y-m-d H:i:s')
                );
            }
            $query = $this->db->where('id_loker', $id)->update('tbl_loker',$data);
            if($query){
                $this->session->set_flashdata('insert_loker',"Tambah Berhasil");
            }else{
                $this->session->set_flashdata('failed',"Tambah Gagal");
            }
        // }else{
        //     // $config['upload_path'] = './assets/upload/logo/';
        //     // $config['allowed_types'] = 'jpg|png|jpeg';
        //     // $this->upload->initialize($config);
        //     // $upload_logo = $this->upload->do_upload('logo');
        //     // $logo = $this->upload->data('file_name');
        //     // if($upload_logo){
        //     //     $perusahaan = array(
        //     //         'nama_perusahaan' => $this->input->post('nama_perusahaan'),
        //     //         'email' => $this->input->post('email'),
        //     //         'logo_perusahaan' => $logo,
        //     //         'telp_perusahaan' => $this->input->post('telp_perusahaan'),
        //     //         'created' => date('Y-m-d H:i:s'),
        //     //         'updated' => date('Y-m-d H:i:s')
        //     //     );
        //     //     $insert_perusahaan = $this->db->insert('tbl_perusahaan',$perusahaan);
        //         // if($insert_perusahaan){
        //             if($this->input->post('logo_poster')){
        //                 $config['upload_path'] = './assets/upload/poster/';
        //                 $config['allowed_types'] = 'jpg';
        //                 $this->upload->initialize($config);
        //                 $insert_logo = $this->upload->do_upload('poster');        
        //                 $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
        //                 $poster = $this->upload->data('file_name');
        //                 $data = array(
        //                         'posisi' 	=> $this->input->post('posisi'),
        //                         'deadline' => $this->input->post('deadline'),
        //                         'lokasi' 	=> $this->input->post('lokasi'),
        //                         'syarat' 	=> $this->input->post('syarat'),
        //                         'deskripsi' 	=> $this->input->post('deskripsi'),
        //                         'informasi' 	=> $this->input->post('informasi'),
        //                         'status' 	=> 'Menunggu Konfirmasi',
        //                         'prodi' 	=> $this->input->post('prodi'),
        //                         'poster'   => $poster,
        //                         'jenis'   => "vacancy",
        //                         // 'id_perusahaan' => $id['id_perusahaan'],
        //                         'created' => date('Y-m-d H:i:s'),
        //                         'updated' => date('Y-m-d H:i:s')
        //                 );
                    // }else{
                    //     $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
                    //     $data = array(
                    //             'posisi' 	=> $this->input->post('posisi'),
                    //             'deadline' => $this->input->post('deadline'),
                    //             'lokasi' 	=> $this->input->post('lokasi'),
                    //             'syarat' 	=> $this->input->post('syarat'),
                    //             'deskripsi' 	=> $this->input->post('deskripsi'),
                    //             'informasi' 	=> $this->input->post('informasi'),
                    //             'status' 	=> 'Menunggu Konfirmasi',
                    //             'prodi' 	=> $this->input->post('prodi'),
                    //             'jenis'   => "vacancy",
                    //             'id_perusahaan' => $id['id_perusahaan'],
                    //             'created' => date('Y-m-d H:i:s'),
                    //             'updated' => date('Y-m-d H:i:s')
                    //     );
                    // }
                    $query = $this->db->where('id_loker', $id)->update('tbl_loker',$data);
                    if($query){
                        $this->session->set_flashdata('insert_loker',"Tambah Berhasil");
                    }else{
                        $this->session->set_flashdata('failed',"Tambah Gagal");
                    }
                // }else{
                //     $this->session->set_flashdata('failed',"Tambah Gagal");
                // }
            // }else{
            //     $this->session->set_flashdata('failed',"Tambah Gagal");
            // }   
           
        redirect('admin/loker');
    }

    public function deleteVacancy($id){       
		$query = $this->db->where('id_loker',$id)->delete('tbl_loker');
		if($query){
        	$this->session->set_flashdata('delete_peserta',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/loker');
    }

    public function jobfair(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.*')->where('jenis','jobfair')->from('tbl_loker')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','left')->order_by('tbl_loker.created','DESC')->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/jobfair',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('login');
        } 
    }

    public function addJobfair(){
        $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        if($ada_perusahaan){
            $id_perusahaan= $ada_perusahaan['id_perusahaan'];
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $insert_logo = $this->upload->do_upload('poster');        
            $poster = $this->upload->data('file_name');
            $data = array(
                    'posisi' 	=> $this->input->post('posisi'),
                    'deadline' => $this->input->post('deadline'),
                    'lokasi' 	=> $this->input->post('lokasi'),
                    'syarat' 	=> $this->input->post('syarat'),
                    'deskripsi' 	=> $this->input->post('deskripsi'),
                    'informasi' 	=> $this->input->post('informasi'),
                    'status' 	=> 'Menunggu Konfirmasi',
                    'prodi' 	=> $this->input->post('prodi'),
                    'poster'   => $poster,
                    'jenis'   => "jobfair",
                    'id_perusahaan' => $id_perusahaan,
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
            );
            $query = $this->db->insert('tbl_loker',$data);
            if($query){
                $this->session->set_flashdata('insert_loker',"Tambah Berhasil");
            }else{
                $this->session->set_flashdata('failed',"Tambah Gagal");
            }
        }else{
            $config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $upload_logo = $this->upload->do_upload('logo');
            $logo = $this->upload->data('file_name');
            if($upload_logo){
                $perusahaan = array(
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'email' => $this->input->post('email'),
                    'logo_perusahaan' => $logo,
                    'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                );
                $insert_perusahaan = $this->db->insert('tbl_perusahaan',$perusahaan);
                if($insert_perusahaan){
                    $config['upload_path'] = './assets/upload/poster/';
                    $config['allowed_types'] = 'jpg';
                    $this->upload->initialize($config);
                    $insert_logo = $this->upload->do_upload('poster');        
                    $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
                    $poster = $this->upload->data('file_name');
                    $data = array(
                            'posisi' 	=> $this->input->post('posisi'),
                            'deadline' => $this->input->post('deadline'),
                            'lokasi' 	=> $this->input->post('lokasi'),
                            'syarat' 	=> $this->input->post('syarat'),
                            'deskripsi' 	=> $this->input->post('deskripsi'),
                            'informasi' 	=> $this->input->post('informasi'),
                            'status' 	=> 'Menunggu Konfirmasi',
                            'prodi' 	=> $this->input->post('prodi'),
                            'poster'   => $poster,
                            'jenis'   => "jobfair",
                            'id_perusahaan' => $id['id_perusahaan'],
                            'created' => date('Y-m-d H:i:s'),
                            'updated' => date('Y-m-d H:i:s')
                    );
                    $query = $this->db->insert('tbl_loker',$data);
                    if($query){
                        $this->session->set_flashdata('insert_loker',"Tambah Berhasil");
                    }else{
                        $this->session->set_flashdata('failed',"Tambah Gagal");
                    }
                }else{
                    $this->session->set_flashdata('failed',"Tambah Gagal");
                }
            }else{
                $this->session->set_flashdata('failed',"Tambah Gagal");
            }   
        }     
        redirect('admin/jobfair');
    }

    public function verifikasi($id){
        $this->db->set('status','y');
        $this->db->where('id_perusahaan', $id);
        $this->db->update('tbl_perusahaan');
        $toemail = $this->db->select('*')->from('tbl_perusahaan')->get()->row_array();
        $message = "<div style='margin:0;padding:0' bgcolor='#FFFFFF'><table width='100%' height='100%' style='min-width:348px' border='0' cellspacing='0' cellpadding='0' lang='en'><tbody><tr height='32' style='height:32px'><td></td></tr><tr align='center'><td><div><div></div></div><table border='0' cellspacing='0' cellpadding='0' style='padding-bottom:20px;max-width:516px;min-width:220px'><tbody><tr><td width='8' style='width:8px'></td><td><div style='background-color:#ffffff;direction:ltr;padding:16px;margin-bottom:8px'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tbody><tr><td style='vertical-align:top'></td><td width='13' style='width:13px'></td><td style='direction:ltr'><span></span> <span></span></span></td></tr></tbody></table></div><div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px' align='center' class='m_663491267144960093mdv2rw'><div style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'><div style='text-align:center;padding-bottom:16px;line-height:0'></div><div style='font-size:24px'>Yth. ".$toemail['nama_perusahaan']."</div><table align='center' style='margin-top:8px'><tbody><tr style='line-height:normal'><td align='right' style='padding-right:8px'></td><td><a style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px'>".$toemail['nama_perusahaan']."</a></td></tr></tbody></table></div><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left'>Akun anda sudah diverifikasi oleh Admin, silahkan untuk login ke website kami. Terima Kasih<div style='padding-top:32px;text-align:center'><a href='https://cdc.itenas.ac.id'style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#d94235;border-radius:5px;min-width:90px' target='_blank' data-saferedirecturl='https://cdc.itenas.ac.id'>cdc.itenas.ac.id</a></div></div></div><div style='text-align:left'><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center'><div></div><div style='direction:ltr'><a class='m_663491267144960093afal' style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center'></a></div></div></div></td><td width='8' style='width:8px'></td></tr></tbody></table></td></tr><tr height='32' style='height:32px'><td></td></tr></tbody></table></div>";
        $config['smtp_host'] = 'cdc.itenas.ac.id';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'cdc@cdc.itenas.ac.id';
        $config['smtp_pass'] = 'JsS5v+EvZ)b5';
        $this->email->initialize($config);  
        $this->email->from('cdc@cdc.itenas.ac.id', 'CDC Itenas'); 
        $this->email->to($toemail['email']);
        $this->email->subject('CDC Itenas Verifikasi Akun '.$toemail['nama_perusahaan'].''); 
        $this->email->set_mailtype("html");
        $this->email->message($message); 

        //Send mail 
        if($this->email->send()){
                // $this->session->set_flashdata("draft","Email berhasil terkirim.");
                //return true;
                redirect('admin/perusahaan'); 
        }else {
            echo $this->email->print_debugger();
            die;
            // $this->session->set_flashdata("notifGagal","Email gagal dikirim."); 
        }
    }

    public function post(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('admin')){
                $data['artikel'] = $this->db->get('tbl_artikel')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/post',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('login');
        } 
    }

    public function editPost(){
        if($this->input->post('gambar')){
            $config['upload_path'] = './assets/upload/post/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');        
            $data = array(
                'judul' => $this->input->post('judul'),
                'headline' 	=> $this->input->post('headline'),
                'konten' 	=> $this->input->post('konten'),
                'user_post' => $this->session->userdata('nama'),
                'gambar' => $this->upload->data('file_name'),
                'updated'   => date('Y-m-d H:i:s')
            );
        }else{
            $data = array(
                'judul' => $this->input->post('judul'),
                'headline' 	=> $this->input->post('headline'),
                'konten' 	=> $this->input->post('konten'),
                'user_post' => $this->session->userdata('nama'),
                'updated'   => date('Y-m-d H:i:s')
            );
        }
		$query = $this->db->where('id_artikel',$id)->delete('tbl_artikel');
		if($query){
        	$this->session->set_flashdata('insert_artikel',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/post');
    }    
        $data = array(
			'judul' => $this->input->post('judul'),
			'headline' 	=> $this->input->post('headline'),
			'konten' 	=> $this->input->post('konten'),
            'user_post' => $this->session->userdata('nama'),
            'gambar' => $this->upload->data('file_name'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
		 );
		$query = $this->db->insert('tbl_artikel',$data);
		if($query){
        	$this->session->set_flashdata('insert_artikel',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('admin/post');
    }

    
    $config['upload_path'] = './assets/upload/post/';
    $config['allowed_types'] = 'png|jpg|jpeg';
    $this->upload->initialize($config);
    $this->upload->do_upload('gambar');        
    $data = array(
        'judul' => $this->input->post('judul'),
        'headline' 	=> $this->input->post('headline'),
        'konten' 	=> $this->input->post('konten'),
        'user_post' => $this->session->userdata('nama'),
        'gambar' => $this->upload->data('file_name'),
        'created'   => date('Y-m-d H:i:s'),
        'updated'   => date('Y-m-d H:i:s')
     );
    $query = $this->db->insert('tbl_artikel',$data);
    if($query){
        $this->session->set_flashdata('insert_artikel',"Tambah Berhasil");
    }else{
        $this->session->set_flashdata('failed',"Tambah Gagal");
    }
    redirect('admin/post');
}

}
