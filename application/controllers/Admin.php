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
		$this->load->view('admin/templates/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
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
			'username' => $this->input->post('username'),
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
                'username' => $this->input->post('username'),
                'password'	=> $this->input->post('password')
             );
        }
        else{
            $data = array(
                'nama_admin'	=> $this->input->post('nama_admin'),
                'username' => $this->input->post('username'),
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
}
