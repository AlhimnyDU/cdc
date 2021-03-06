<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends CI_Controller
{

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

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['company'] = $this->db->get('tbl_perusahaan', 6)->result();
		$data['artikel'] = $this->db->order_by('created', 'DESC')->get('tbl_artikel', 3)->result();
		$data['iklan'] = $this->db->select('tbl_iklan.*,tbl_poster.file')->join('tbl_poster', 'tbl_poster.created=tbl_iklan.created')->order_by('created', 'DESC')->group_by('id_iklan')->get('tbl_iklan', 3)->result();
		$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.id_perusahaan, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.status', 'Disetujui')->order_by('updated', 'DESC')->get('tbl_loker', 3)->result();
		$data['client'] = $this->db->where('status_daftar', 'pendaftar')->get('tbl_perusahaan')->result();
		$data['slideshow'] = $this->db->where('publish', "y")->get('tbl_slideshow')->result();
		$this->session->set_userdata('navbar', 'beranda');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/home', $data);
		$this->load->view('halaman/templates/footer');
	}

	public function list_company()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('halaman/list_company'); //site url
		$config['total_rows'] = $this->db->where('status_daftar', 'pendaftar')->from('tbl_perusahaan')->count_all_results(); //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		$config['full_tag_open']    = '<div class="blog-pagination" data-aos="fade-up"><ul class="justify-content-center">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['company'] = $this->db->where('status_daftar', 'pendaftar')->get('tbl_perusahaan', $config["per_page"], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/list_company', $data);
		$this->load->view('halaman/templates/footer');
	}

	public function adv_company($id)
	{
		$data['id_perusahaan'] = $id;
		$data['video'] = $this->db->where('id_peserta', $id)->where('id_event', 1)->where('role', 'perusahaan')->get('event_perusahaan')->row();
		if (empty($data['video']->link)) {
			$data['company'] = $this->db->select('tbl_perusahaan.*')->where('id_perusahaan', $id)->get('tbl_perusahaan')->row();
			$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.id_perusahaan', $id)->where('tbl_loker.status', 'Pendaftar')->order_by('updated', 'DESC')->get('tbl_loker')->result();
			$this->load->view('halaman/templates/header');
			$this->load->view('halaman/company', $data);
			$this->load->view('halaman/templates/js');
			$this->load->view('halaman/templates/footer');
		} else {
			$this->load->view('halaman/adv_company', $data);
		}
	}

	public function sertifikat()
	{
		$data['acara'] = $this->db->where('publish', 'y')->get('tbl_acara')->result();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/sertifikat', $data);
		$this->load->view('halaman/templates/footer');
	}

	public function formulirRegistrasi()
	{
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/daftar_jobfair');
		$this->load->view('halaman/templates/footer');
	}

	public function daftarJobfair()
	{
		$this->upload_logo();
		$select = $this->db->where('email', $this->input->post('email'))->get('tbl_jobfair')->result();
		if ($select == NULL) {
			$data = array(
				'status'    		=> $this->input->post('status'),
				'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
				'bidang'   => $this->input->post('bidang'),
				'email'    => $this->input->post('email'),
				'telp_perusahaan'    => str_replace("_", "", $this->input->post('telp_perusahaan')),
				'link_website'    => $this->input->post('link_website'),
				'fax'    => str_replace("_", "", $this->input->post('fax')),
				'alamat'    => $this->input->post('alamat'),
				'nama_pic'    => $this->input->post('nama_pic'),
				'jabatan'    => $this->input->post('jabatan'),
				'logo'	=> $this->upload->data('file_name'),
				'cp'    => str_replace("_", "", $this->input->post('cp')),
				'paket'    => $this->input->post('paket'),
				'created'   => date('Y-m-d H:i:s'),
				'updated'   => date('Y-m-d H:i:s')
			);
			$query = $this->db->insert('tbl_jobfair', $data);
			if ($query) {
				$this->session->set_flashdata('daftar_berhasil', TRUE);
			} else {
				$this->session->set_flashdata('failed', "Tambah Gagal");
			}
			redirect('halaman/formulirRegistrasi');
		} else {
			$this->session->set_flashdata('telah_daftar', TRUE);
			redirect('halaman/formulirRegistrasi');
		}
		redirect('halaman/formulirRegistrasi');
	}

	public function upload_logo()
	{
		$config['upload_path'] = './assets/upload/pernyataan/';
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$this->upload->initialize($config);
		$upload = $this->upload->do_upload('logo');
		if (empty($upload)) {
			$this->session->set_flashdata('failed', "Tambah Gagal");
			redirect('halaman/formulirRegistrasi');
		}
	}


	public function esertifikat($id, $acara)
	{
		$data['acara'] = $this->db->where('publish', 'y')->get('tbl_acara')->result();
		$data['sertifikat'] = $this->db->select('e_sertifikat.*,tbl_acara.nama_acara')->join('tbl_acara', 'tbl_acara.id_acara=e_sertifikat.acara')->where('nim', $id)->where('acara', $acara)->get('e_sertifikat')->result();
		if ($data['sertifikat'] == NULL) {
			$this->session->set_flashdata('nothing', TRUE);
		}
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/esertifikat', $data);
		$this->load->view('halaman/templates/footer');
	}

	public function cariEsertifikat()
	{
		redirect('halaman/esertifikat/' . $this->input->post('nim') . '/' . $this->input->post('acara'));
	}


	public function loker()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('halaman/loker'); //site url
		$config['total_rows'] = $this->db->where('status', 'Disetujui')->where('jenis', 'vacancy')->or_where('jenis', 'Job Fair 2021')->or_where('jenis', 'jobfair')->from('tbl_loker')->count_all_results(); //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['full_tag_open']    = '<div class="blog-pagination" data-aos="fade-up"><ul class="justify-content-center">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.status', 'Disetujui')->where('jenis', 'vacancy')->or_where('jenis', 'Job Fair 2021')->order_by('updated', 'DESC')->get('tbl_loker', $config["per_page"], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/vacancy', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function jobfair()
	{
		$this->load->view('halaman/templates/jobfair_home');
		$this->load->view('halaman/jobfair');
		// $this->load->view('halaman/templates/jobfair_f');
		// $this->load->view('halaman/templates/jobfair_end');
	}

	public function jobfair_home()
	{
		$data['mengikuti'] = $this->db->select('tbl_perusahaan.*')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=event_perusahaan.id_peserta')->where('id_event', 2)->where('role', 'perusahaan')->get('event_perusahaan')->result();
		$data['artikel'] = $this->db->order_by('created', 'DESC')->get('tbl_artikel', 6)->result();
		$this->load->view('halaman/templates/jobfair_h');
		$this->load->view('halaman/jobfair_home', $data);
		$this->load->view('halaman/templates/jobfair_f');
		$this->load->view('halaman/templates/jobfair_end');
	}

	public function stand()
	{
		$data['perusahaan'] = $this->db->select('tbl_perusahaan.*, event_perusahaan.id, event_perusahaan.link, event_perusahaan.id_event, tbl_event.nama_event')->join('tbl_event', 'tbl_event.id_event=event_perusahaan.id_event', 'LEFT')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=event_perusahaan.id_peserta', 'LEFT')->where('event_perusahaan.id_event', 2)->where('event_perusahaan.role', 'perusahaan')->get('event_perusahaan')->result();
		$this->load->view('halaman/templates/jobfair_hstand');
		$this->load->view('halaman/jobfair_stand', $data);
		$this->load->view('halaman/templates/jobfair_f');
		$this->load->view('halaman/templates/jobfair_end');
	}

	public function estand($id)
	{
		$data['company'] = $this->db->select('tbl_perusahaan.*, event_perusahaan.link')->join('event_perusahaan', 'event_perusahaan.id_peserta=tbl_perusahaan.id_perusahaan', 'LEFT')->where('id_event', 2)->where('id_perusahaan', $id)->get('tbl_perusahaan')->row();
		$data['jobfair'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.id_perusahaan', $id)->where('tbl_loker.status', 'Disetujui')->where('tbl_loker.jenis', 'Job Fair 2021')->order_by('updated', 'DESC')->get('tbl_loker')->result();
		$this->load->view('halaman/templates/jobfair_hstand');
		$this->load->view('halaman/estand', $data);
		$this->load->view('halaman/templates/jobfair_f');
		$this->load->view('halaman/templates/jobfair_estand');
		$this->load->view('halaman/templates/jobfair_end');
	}

	public function daftar_peserta()
	{
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/daftar_peserta');
		$this->load->view('halaman/templates/footer');
	}

	public function daftar_perusahaan()
	{
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/daftar_perusahaan');
		$this->load->view('halaman/templates/footer');
	}

	public function artikel($id)
	{
		$data['artikel'] = $this->db->where('id_artikel', $id)->get('tbl_artikel')->row();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/artikel', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function iklan($id)
	{
		$data['iklan'] = $this->db->where('id_iklan', $id)->get('tbl_iklan')->row();
		$data['poster'] = $this->db->where('created', $data['iklan']->created)->get('tbl_poster')->result();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/iklan', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function info()
	{
		//konfigurasi pagination
		$config['base_url'] = site_url('halaman/info'); //site url
		$config['total_rows'] = $this->db->from('tbl_artikel')->count_all_results(); //total row
		$config['per_page'] = 12;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['full_tag_open']    = '<div class="blog-pagination" data-aos="fade-up"><ul class="justify-content-center">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['artikel'] = $this->db->order_by('created', 'DESC')->get('tbl_artikel', $config["per_page"], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/list_artikel', $data);
		$this->load->view('halaman/templates/footer');
	}

	public function about()
	{
		$this->session->set_userdata('navbar', 'about');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/about');
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function daftar($id)
	{
		$data['acara'] = $this->db->where('id_acara', $id)->get('tbl_acara')->row();
		$data['form'] = $this->db->select('tbl_soal.*,form_soal.id_form')->from('form_soal')->join('tbl_soal', 'tbl_soal.id_soal=form_soal.id_soal', 'left')->where('form_soal.id_acara', $id)->get()->result();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/form', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function daftarAcara($id)
	{
		$jenis = $this->db->select('tbl_soal.*,form_soal.id_form, tbl_acara.jenis_respon')->from('form_soal')->join('tbl_soal', 'tbl_soal.id_soal=form_soal.id_soal', 'left')->join('tbl_acara', 'tbl_acara.id_acara=form_soal.id_acara', 'left')->where('form_soal.id_acara', $id)->where('tbl_acara.jenis_respon', '1_respond')->get()->row();
		if ($jenis) {
			$validasi = $this->db->where('id_acara', $id)->where('jawaban', $this->input->post(7))->get('tbl_jawaban')->row();
			if (!$validasi) {
				$form = $this->db->select('tbl_soal.*,form_soal.id_form')->from('form_soal')->join('tbl_soal', 'tbl_soal.id_soal=form_soal.id_soal', 'left')->where('form_soal.id_acara', $id)->get()->result();
				$max = $this->db->select_max("responden")->where('id_acara', $id)->get('tbl_jawaban')->row();
				if ($max->responden == NULL) {
					$max->responden = 1;
				} else {
					$max->responden = $max->responden + 1;
				}
				foreach ($form as $row) {
					if (($row->jenis_jawaban == "pdf") || ($row->jenis_jawaban == "gambar") || ($row->jenis_jawaban == "pdfnon") || ($row->jenis_jawaban == "gambarnon")) {
						$config['upload_path'] = './assets/upload/form/';
						$config['encrypt_name'] = TRUE;
						$config['allowed_types'] = 'jpeg|jpg|png|pdf';
						$this->upload->initialize($config);
						$upload = $this->upload->do_upload($row->id_soal);
						if (empty($upload)) {
							echo "error";
						}
						$data_upload = $this->upload->data();
						$data = array(
							'jawaban' => $data_upload['file_name'],
							'responden' => $max->responden,
							'id_soal' => $row->id_soal,
							'id_acara'   => $id,
							'created'   => date('Y-m-d H:i:s'),
							'updated'   => date('Y-m-d H:i:s'),
						);
					} else {
						$data = array(
							'jawaban' => $this->input->post($row->id_soal),
							'responden' => $max->responden,
							'id_soal' => $row->id_soal,
							'id_acara'   => $id,
							'created'   => date('Y-m-d H:i:s'),
							'updated'   => date('Y-m-d H:i:s'),
						);
					}

					$query = $this->db->insert('tbl_jawaban', $data);
				}
				if ($query) {
					$this->session->set_flashdata('insert_data', TRUE);
				} else {
					$this->session->set_flashdata('failed', "Tambah Gagal");
				}
			} else {
				$this->session->set_flashdata('telah_mengisi', TRUE);
			}
		} else {
			$form = $this->db->select('tbl_soal.*,form_soal.id_form')->from('form_soal')->join('tbl_soal', 'tbl_soal.id_soal=form_soal.id_soal', 'left')->where('form_soal.id_acara', $id)->get()->result();
			$max = $this->db->select_max("responden")->where('id_acara', $id)->get('tbl_jawaban')->row();
			if ($max->responden == NULL) {
				$max->responden = 1;
			} else {
				$max->responden = $max->responden + 1;
			}
			foreach ($form as $row) {
				if (($row->jenis_jawaban == "pdf") || ($row->jenis_jawaban == "gambar") || ($row->jenis_jawaban == "pdfnon") || ($row->jenis_jawaban == "gambarnon")) {
					$config['upload_path'] = './assets/upload/form/';
					$config['encrypt_name'] = TRUE;
					$config['allowed_types'] = 'jpg|png|pdf';
					$this->upload->initialize($config);
					$upload = $this->upload->do_upload($row->id_soal);
					if (empty($upload)) {
						echo "error";
					}
					$data_upload = $this->upload->data();
					$data = array(
						'jawaban' => $data_upload['file_name'],
						'responden' => $max->responden,
						'id_soal' => $row->id_soal,
						'id_acara'   => $id,
						'created'   => date('Y-m-d H:i:s'),
						'updated'   => date('Y-m-d H:i:s'),
					);
				} else {
					$data = array(
						'jawaban' => $this->input->post($row->id_soal),
						'responden' => $max->responden,
						'id_soal' => $row->id_soal,
						'id_acara'   => $id,
						'created'   => date('Y-m-d H:i:s'),
						'updated'   => date('Y-m-d H:i:s'),
					);
				}

				$query = $this->db->insert('tbl_jawaban', $data);
			}
			if ($query) {
				$this->session->set_flashdata('insert_data', TRUE);
			} else {
				$this->session->set_flashdata('failed', "Tambah Gagal");
			}
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function magang()
	{
		$config['base_url'] = site_url('halaman/magang'); //site url
		$config['total_rows'] = $this->db->where('status', 'Disetujui')->where('jenis', 'magang')->from('tbl_loker')->count_all_results(); //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['full_tag_open']    = '<div class="blog-pagination" data-aos="fade-up"><ul class="justify-content-center">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.status', 'Disetujui')->where('jenis', 'magang')->order_by('updated', 'DESC')->get('tbl_loker', $config["per_page"], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/magang', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function list_iklan()
	{
		$config['base_url'] = site_url('halaman/list_iklan'); //site url
		$config['total_rows'] = $this->db->where('status', 'Disetujui')->where('jenis', 'magang')->from('tbl_loker')->count_all_results(); //total row
		$config['per_page'] = 10;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['full_tag_open']    = '<div class="blog-pagination" data-aos="fade-up"><ul class="justify-content-center">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['iklan'] = $this->db->select('tbl_iklan.*,tbl_poster.file')->join('tbl_poster', 'tbl_poster.created=tbl_iklan.created')->order_by('created', 'DESC')->group_by('id_iklan')->get('tbl_iklan')->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/list_iklan', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function beasiswa()
	{
		$this->session->set_userdata('navbar', 'about');
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/beasiswa');
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function download($nama_file)
	{
		force_download('./assets/upload/berkas/' . $nama_file, NULL);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function job($id)
	{
		$data['akun'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_akun')->row();
		$data['job'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('id_loker', $id)->get('tbl_loker')->row();
		$data['persyaratan'] = $this->db->select('tbl_persyaratan.*,syarat_lowongan.id_syarat')->from('syarat_lowongan')->join('tbl_persyaratan', 'tbl_persyaratan.id_persyaratan=syarat_lowongan.id_persyaratan', 'left')->where('syarat_lowongan.id_loker', $id)->get()->result();
		$data['lamaran'] = $this->db->where('id_loker', $id)->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_lamaran')->row();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/job', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}


	public function company($id)
	{
		$data['company'] = $this->db->select('tbl_perusahaan.*')->where('id_perusahaan', $id)->get('tbl_perusahaan')->row();
		$data['vacancy'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan, tbl_perusahaan.logo_perusahaan')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.id_perusahaan', $id)->where('tbl_loker.status', 'Disetujui')->order_by('updated', 'DESC')->get('tbl_loker')->result();
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/company', $data);
		$this->load->view('halaman/templates/js');
		$this->load->view('halaman/templates/footer');
	}

	public function carrer()
	{
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/carrer');
		$this->load->view('halaman/templates/footer');
	}
}
