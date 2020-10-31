<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

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
        $this->load->database();
    }
    
	public function index(){
        $this->load->view('perusahaan/templates/header');
		$this->load->view('perusahaan/home');
		$this->load->view('perusahaan/templates/js');
        $this->load->view('perusahaan/templates/footer');
    }
    
    public function loker(){
        // $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_perusahaan'))->get('loker')->result();
        $data['loker'] = $this->db->where('id_perusahaan', 1)->get('tbl_loker')->result();
        $this->load->view('perusahaan/templates/header');
		$this->load->view('perusahaan/loker',$data);
		$this->load->view('perusahaan/templates/js');
        $this->load->view('perusahaan/templates/footer');
    }
    
    public function addLoker(){
        $config['upload_path'] = './assets/upload/poster/';
        $config['allowed_types'] = 'jpg';
        $this->upload->initialize($config);
        $this->upload->do_upload('poster');        
        $data = array(
			'judul' => $this->input->post('judul'),
            'posisi' 	=> $this->input->post('posisi'),
            'syarat' 	=> $this->input->post('syarat'),
            'deskripsi' 	=> $this->input->post('deskripsi'),
            'status' 	=> 'Menunggu Konfirmasi',
            'poster'   => $this->upload->data('file_name'),
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
		 );
		$query = $this->db->insert('tbl_loker',$data);
		if($query){
        	$this->session->set_flashdata('insert_loker',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('perusahaan/loker');
    }

    public function editLoker($id){
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
            'id_perusahaan' => $this->session->userdata('id_perusahaan')
		 );
		$query = $this->db->where('id_loker', $id)->update('tbl_loker',$data);
		if($query){
        	$this->session->set_flashdata('update_loker',"Tambah Berhasil");
        }else{
        	$this->session->set_flashdata('failed',"Tambah Gagal");
        }
        redirect('perusahaan/loker');
    }

    public function jobfair(){
        $this->load->view('perusahaan/templates/header');
		$this->load->view('perusahaan/jobfair');
		$this->load->view('perusahaan/templates/js');
        $this->load->view('perusahaan/templates/footer');
    }
}