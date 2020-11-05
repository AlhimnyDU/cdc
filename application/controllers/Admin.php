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
                redirect('welcome');
            }
        }else{
            redirect('login');
        } 

		
    }
    
    public function akunAdmin(){
        $data['admin'] = $this->db->get('tbl_admin')->result();
		$this->load->view('admin/templates/header');
        $this->load->view('admin/admin',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }
    
    public function mahasiswa(){
        $data['mahasiswa'] = $this->db->where('role','mahasiswa')->get('tbl_akun')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/mahasiswa',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }

    public function umum(){
        $data['umum'] = $this->db->where('role','umum')->get('tbl_akun')->result();
		$this->load->view('admin/templates/header');
        $this->load->view('admin/umum',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }

    public function event(){
        $data['event'] = $this->db->get('tbl_event')->result();
		$this->load->view('admin/templates/header');
        $this->load->view('admin/event',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }

    public function peserta($id){
        $data['peserta'] = $this->db->select('tbl_perusahaan.*, event_perusahaan.id_event, tbl_event.nama_event')->join('tbl_event','tbl_event.id_event=event_perusahaan.id_event','LEFT')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=event_perusahaan.id_perusahaan','LEFT')->where('event_perusahaan.id_event',$id)->get('event_perusahaan')->result();
        $data['nama'] = $this->db->select('nama_event')->where('id_event',$id)->get('tbl_event')->row();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/peserta',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
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
    public function hapusPerusahaan($id){
        $this->db->where('id_admin', $id)->delete('tbl_admin');
        redirect('admin/perusahaan');
    }
    public function hapusMahasiswa($id){
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/mahasiswa');
    }

    public function alumni(){
        $data['alumni'] = $this->db->where('role','alumni')->get('tbl_akun')->result();
		$this->load->view('admin/templates/header');
        $this->load->view('admin/alumni',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
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
        $data['perusahaan'] = $this->db->get('tbl_perusahaan')->result();
		$this->load->view('admin/templates/header');
        $this->load->view('admin/perusahaan',$data);
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
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
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.*')->from('tbl_loker')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','left')->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/loker',$data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            }else{
                redirect('welcome');
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

    public function unpublishLoker($id){
        $data = array(
            'status' => "Menunggu Konfirmasi",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker',$id)->update('tbl_loker',$data);
        redirect('admin/loker');
    }

    public function editLoker($id){
        if($this->input->post('prodi')!=NULL){
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

}
