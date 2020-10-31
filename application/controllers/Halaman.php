<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

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
		$this->load->library('session');
	}
	
	public function index(){
		$this->session->set_userdata('navbar','beranda');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/home');
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}

	public function loker(){
		$this->session->set_userdata('navbar','loker');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/loker');
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}

	public function info(){
		$this->session->set_userdata('navbar','info');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/info');
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}

	public function about(){
		$this->session->set_userdata('navbar','about');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/about');
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}
}
