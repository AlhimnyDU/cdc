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
		$this->load->library('pagination');
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
		//konfigurasi pagination
        $config['base_url'] = site_url('halaman/loker'); //site url
        $config['total_rows'] = $this->db->where('status','Disetujui')->from('tbl_loker')->count_all_results(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="paging"><div><ul>';
        $config['full_tag_close']   = '</ul></div></div>';
        $config['num_tag_open']     = '<li><a>';
        $config['num_tag_close']    = '</a></li>';
        $config['cur_tag_open']     = '<li class="selected"><a>';
        $config['cur_tag_close']    = '</a></li>';
		
		$this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['data'] = $this->db->where('status','Disetujui')->order_by('updated','DESC')->get('tbl_loker', $config["per_page"], $data['page'])->result();           
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/loker',$data);
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}

	public function artikel($id){
		$data['artikel'] =  $this->db->where('id_loker',$id)->get('tbl_loker')->row();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/artikel',$data);
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
