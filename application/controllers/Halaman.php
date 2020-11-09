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
		$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.id_perusahaan, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','LEFT')->where('status','Disetujui')->order_by('updated','DESC')->get('tbl_loker', 3)->result();
		$this->session->set_userdata('navbar','beranda');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/home',$data);
        $this->load->view('halaman/templates/footer');
	}

	public function adv_company(){
		$this->load->view('halaman/adv_company');
	}

	public function loker(){
		//konfigurasi pagination
        $config['base_url'] = site_url('halaman/loker'); //site url
        $config['total_rows'] = $this->db->where('status','Disetujui')->where('jenis','vacancy')->from('tbl_loker')->count_all_results(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','LEFT')->where('status','Disetujui')->where('jenis','vacancy')->order_by('updated','DESC')->get('tbl_loker', $config["per_page"], $data['page'])->result();           
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/vacancy',$data);
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}

	public function jobfair(){
		//konfigurasi pagination
        $config['base_url'] = site_url('halaman/loker'); //site url
        $config['total_rows'] = $this->db->where('status','Disetujui')->where('jenis','jobfair')->from('tbl_loker')->count_all_results(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','LEFT')->where('status','Disetujui')->where('jenis','jobfair')->order_by('updated','DESC')->get('tbl_loker', $config["per_page"], $data['page'])->result();           
		$data['pagination'] = $this->pagination->create_links();
		$data['participate'] = $this->db->select('tbl_perusahaan.*')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=event_perusahaan.id_peserta','LEFT')->where('role','perusahaan')->order_by('updated','DESC')->get('event_perusahaan')->result();   
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/jobfair',$data);	
	}	

	public function artikel($id){
		$data['artikel'] =  $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','LEFT')->where('id_loker',$id)->get('tbl_loker')->row();
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

	public function job($id){
		$data['job'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','LEFT')->where('id_loker',$id)->get('tbl_loker')->row(); 
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/job',$data);
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}

	public function company($id){
		$data['company'] = $this->db->select('tbl_perusahaan.*')->where('id_perusahaan',$id)->get('tbl_perusahaan')->row();
		$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan','tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan','LEFT')->where('tbl_loker.id_perusahaan',$id)->where('status','Disetujui')->order_by('updated','DESC')->get('tbl_loker')->result();   
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/company',$data);
		$this->load->view('halaman/templates/js');
        $this->load->view('halaman/templates/footer');
	}
}
