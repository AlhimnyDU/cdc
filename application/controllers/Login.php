<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

    public function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->helper(array('form','url'));
		$this->load->library('session');
    }
    
	public function index(){
        $this->load->view('login/templates/header');
        $this->load->view('login/login');
        $this->load->view('login/templates/footer');
    }
    
    public function login(){
        $email =  $this->input->post('username');
        $password = $this->input->post('password');
		$select = $this->Login_model->validasi_akun('tbl_akun','email',$email,$password);
		$selectPerusahaan = $this->Login_model->validasi_akun('tbl_perusahaan','email',$username,$password);
        if($select){
			if($select->status == "admin"){
				$this->session->set_userdata('nama',$select->nama);
				$this->session->set_userdata('admin',"admin");
				$this->session->set_userdata('id_akun',$select->id_akun);
        		redirect('admin');
			}else if($select->status == "mahasiswa"){
				$this->session->set_userdata('nama',$select->nama);
				$this->session->set_userdata('mahasiswa',"mahasiswa");
				$this->session->set_userdata('id_akun',$select->id_akun);
        		redirect('halaman');
			}else if($select->status == "alumni"){
				$this->session->set_userdata('nama',$select->nama);
				$this->session->set_userdata('alumni',"alumni");
				$this->session->set_userdata('id_akun',$select->id_akun);
        		redirect('halaman');
			}else{
				$this->session->set_flashdata('login',"Akun tidak ditemukan");
        		redirect('auth');
			}
			
		}else if($selectPerusahaan) {
			$this->session->set_userdata('username',$selectUser->akun_nama);
			$this->session->set_userdata('user',"user");
			$this->session->set_userdata('akun_id',$selectUser->akun_id);
        	redirect('perusahaan');
		}else{
        	$this->session->set_flashdata('gagalLogin',"Username atau password salah");
        	redirect('login');
		}
		
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
        redirect('login');
    }

	public function logout(){
        $this->session->sess_destroy();
        redirect('login');
	}
}
