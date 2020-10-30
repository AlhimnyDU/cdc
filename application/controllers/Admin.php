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
    }

	public function index(){
		$this->load->view('admin/templates/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }
    
    public function akunAdmin(){
		$this->load->view('admin/templates/header');
        $this->load->view('admin/admin');
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }
    
    public function mahasiswa(){
        $data['mahasiswa'] = $this->db->get('tbl_akun')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/mahasiswa',$data);
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
            'alamat'		=> $this->input->post('alamat')
		 );
		$query = $this->db->insert('tbl_akun',$data);
		if($query){
        	$this->session->set_flashdata('insert_akun',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('insert_akun',"Tambah Gagal");
        }
        redirect('admin/mahasiswa');
    }
    
    public function alumni(){
		$this->load->view('admin/templates/header');
        $this->load->view('admin/mahasiswa');
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
    }

    public function perusahaan(){
		$this->load->view('admin/templates/header');
        $this->load->view('admin/perusahaan');
        $this->load->view('admin/templates/js');
        $this->load->view('admin/templates/footer');
	}
}
