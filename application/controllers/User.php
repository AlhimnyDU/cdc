<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->database();
    }
    
	public function index(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('user')){
                $this->load->view('user/templates/header');
                $this->load->view('user/home');
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('login');
        } 
    }

    public function loker(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('user')){
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.*')->from('tbl_loker')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','left')->get()->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/loker',$data);
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('login');
        } 
    }

    public function jobfair(){
        if($this->session->userdata('nama')){
			if($this->session->userdata('user')){
                // $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_perusahaan'))->get('loker')->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/jobfair');
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer');
            }else{
                redirect('welcome');
            }
        }else{
            redirect('login');
        }          
    }

    private function upload_cv(){
        $config['upload_path'] = './assets/upload/lamaran/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('cv');
        return $this->upload->data('file_name');
    }

    private function upload_lamaran(){
        $config['upload_path'] = './assets/upload/lamaran/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('lamaran');
        return $this->upload->data('file_name');
    }

    private function upload_keahlian(){
        $config['upload_path'] = './assets/upload/lamaran/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('keahlian');
        return $this->upload->data('file_name');
    }

    private function upload_pengalaman(){
        $config['upload_path'] = './assets/upload/lamaran/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('pengalaman');
        return $this->upload->data('file_name');
    }

    private function upload_toefl(){
        $config['upload_path'] = './assets/upload/lamaran/';
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $this->upload->do_upload('pengalaman');
        return $this->upload->data('file_name');
    }

    public function addLamaran(){
        $data = array(
            'posisi' => $this->input->post('posisi'),
            'id_loker' => $this->input->post('id_loker'),
            'id_akun' => $this->session->userdata('id_akun'),
            'cv' => $this->upload_cv(),
            'lamaran' => $this->upload_lamaran(),
            'pengalaman' => $this->upload_pengalaman(),
            'keahlian' => $this->upload_keahlian(),
            'toefl' => $this->upload_toefl(),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $query = $this->db->insert('tbl_lamaran',$data);
		if($query){
        	$this->session->set_flashdata('insert_lamaran',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('user/loker');
    }
}