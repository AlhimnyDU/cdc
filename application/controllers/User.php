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
}