<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		$this->load->model('Login_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->load->view('login/templates/header');
		$this->load->view('login/login');
		$this->load->view('login/templates/js');
		$this->load->view('login/templates/footer');
	}

	public function verifikasi($id)
	{
		$data['verifikasi'] = $id;
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/verifikasi', $data);
	}

	public function gantiPass($id)
	{
		$date = date('Y-m-d H:i:s');
		$akun = $this->db->where('md5(id_akun)', $id)->get('tbl_akun')->row();
		if (!$akun) {
			$akun = $this->db->where('md5(id_perusahaan)', $id)->get('tbl_perusahaan')->row();
			if (!$akun) {
				$this->session->set_flashdata('lupas_gagal', TRUE);
			} else {
				$data = array(
					'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'updated' 		=> $date
				);
				$query = $this->db->where('md5(id_perusahaan)', $id)->update('tbl_perusahaan', $data);
				if ($query) {
					$this->session->set_flashdata('lupas_berhasil', TRUE);
				} else {
					$this->session->set_flashdata('lupas_gagal', TRUE);
				}
			}
		} else {
			$data = array(
				'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'updated' 		=> $date
			);
			$query = $this->db->where('md5(id_akun)', $id)->update('tbl_akun', $data);
			if ($query) {
				$this->session->set_flashdata('lupas_berhasil', TRUE);
			} else {
				$this->session->set_flashdata('lupas_gagal', TRUE);
			}
		}
		redirect('halaman');
	}

	public function lupas()
	{
		$this->load->view('halaman/templates/header');
		$this->load->view('halaman/lupa_password');
	}

	public function searchEmail()
	{
		$data = $this->db->where('email', $this->input->post('email'))->get('tbl_akun')->row();
		if (!$data) {
			$data = $this->db->where('email', $this->input->post('email'))->get('tbl_perusahaan')->row();
			if (!$data) {
				$this->session->set_flashdata('lupas_gagal', TRUE);
			} else {
				$id = md5($data->id_perusahaan);
				$from_email = "cdc@itenas.ac.id";
				$message = "<b><h3>Kepada. " . $data->nama_perusahaan . "</h3></b> <br> Pemberitahuan akun anda mencoba untuk membuat password baru, silahkan buka link dibawah ini untuk mengganti password: <br> <a href='" . base_url('login/verifikasi/' . $id) . "'>" . base_url('login/verifikasi/' . $id) . "</a>  <br> Jika ini bukan anda silahkan abaikan email ini, Terima Kasih<br><br> Hormat kami, <br><br> <b>CDC Itenas</b> ";
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_user' => 'cdc@itenas.ac.id',
					'smtp_pass' => 'itenas271',
					'smtp_port' => 465,
					'mailtype'  => 'html',
					'charset'   => 'utf-8',
					'newline'   => "\r\n"
				);
				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->from('cdc@itenas.ac.id', 'CDC Itenas');
				$this->email->to($this->input->post('email'));
				$this->email->reply_to($from_email);
				$this->email->subject('[No-Reply] Lupa Password Akun CDC Itenas');
				$this->email->set_header('Itenas', 'CDC');
				$this->email->set_mailtype("html");
				$this->email->message($message);
				if ($this->email->send()) {
					echo "Email Terkirim";
					$this->session->set_flashdata('lupas', TRUE);
				} else {
					echo $this->email->print_debugger();
					die;
					$this->session->set_flashdata("notifGagal", "Email gagal dikirim.");
				}
			}
		} else {
			$id = md5($data->id_akun);
			$from_email = "cdc@itenas.ac.id";
			$message = "<b><h3>Kepada. " . $data->nama . "</h3></b> <br> Pemberitahuan akun anda mencoba untuk membuat password baru, silahkan buka link dibawah ini untuk mengganti password: <br> <a href='" . base_url('login/verifikasi/' . $id) . "'>" . base_url('login/verifikasi/' . $id) . "</a>  <br> Jika ini bukan anda silahkan abaikan email ini, Terima Kasih<br><br> Hormat kami, <br><br> <b>CDC Itenas</b> ";
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_user' => 'cdc@itenas.ac.id',
				'smtp_pass' => 'itenas271',
				'smtp_port' => 465,
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'newline'   => "\r\n"
			);
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->from('cdc@itenas.ac.id', 'CDC Itenas');
			$this->email->to($this->input->post('email'));
			$this->email->reply_to($from_email);
			$this->email->subject('[No-Reply] Lupa Password Akun CDC Itenas');
			$this->email->set_header('Itenas', 'CDC');
			$this->email->set_mailtype("html");
			$this->email->message($message);
			if ($this->email->send()) {
				echo "Email Terkirim";
				$this->session->set_flashdata('lupas', TRUE);
			} else {
				echo $this->email->print_debugger();
				die;
				$this->session->set_flashdata("notifGagal", "Email gagal dikirim.");
			}
		}
		redirect('halaman');
	}

	public function register()
	{
		redirect('halaman/daftar_perusahaan');
	}

	public function auth()
	{
		$email =  $this->input->post('email');
		$password = $this->input->post('password');
		$select = $this->Login_model->validasi_akun('tbl_akun', 'email', $email, $password);
		$selectPerusahaan = $this->Login_model->validasi_akun('tbl_perusahaan', 'email', $email, $password);
		$selectadmin = $this->Login_model->validasi_akun('tbl_admin', 'email', $email, $password);
		if ($select) {
			if ($select->status = "Aktif") {
				$mengikuti = $this->db->where('role', 'peserta')->where('id_event', 2)->where('id_peserta', $select->id_akun)->get('event_perusahaan')->row();
				if ($mengikuti) {
					$this->session->set_userdata('mengikuti', TRUE);
				}
				if ($select->role == "mahasiswa") {
					$this->session->set_userdata('nama', $select->nama);
					$this->session->set_userdata('user', "mahasiswa");
					$this->session->set_userdata('id_akun', $select->id_akun);
					$this->session->set_flashdata('suksesLogin', TRUE);
					redirect('user');
				} else if ($select->role == "alumni") {
					$this->session->set_userdata('nama', $select->nama);
					$this->session->set_userdata('user', "alumni");
					$this->session->set_userdata('id_akun', $select->id_akun);
					$this->session->set_flashdata('suksesLogin', TRUE);
					redirect('user');
				} else if ($select->role == "umum") {
					$this->session->set_userdata('nama', $select->nama);
					$this->session->set_userdata('user', "umum");
					$this->session->set_userdata('id_akun', $select->id_akun);
					$this->session->set_flashdata('suksesLogin', TRUE);
					redirect('user');
				} else {
					$this->session->set_flashdata('login', "Akun tidak ditemukan");
					redirect('login');
				}
			}
		} else if ($selectPerusahaan) {
			if ($selectPerusahaan->status == "y") {
				$this->session->set_userdata('mengikuti', TRUE);
				$this->session->set_userdata('nama', $selectPerusahaan->nama_perusahaan);
				$this->session->set_userdata('perusahaan', "perusahaan");
				$this->session->set_userdata('id_akun', $selectPerusahaan->id_perusahaan);
				$this->session->set_flashdata('suksesLogin', TRUE);
				redirect('perusahaan');
			} else {
				$this->session->set_flashdata('nonaktif', "Akun belum aktif");
				redirect('login');
			}
		} else if ($selectadmin) {
			$this->session->set_userdata('mengikuti', TRUE);
			$this->session->set_userdata('nama', $selectadmin->nama_admin);
			$this->session->set_userdata('admin', "admin");
			$this->session->set_userdata('id_admin', $selectadmin->id_admin);
			$this->session->set_flashdata('suksesLogin', TRUE);
			redirect('admin');
		} else {
			$this->session->set_flashdata('gagalLogin', TRUE);
			redirect('login');
		}
	}

	public function addMahasiswa()
	{
		$ada_akun = $this->db->where('email', $this->input->post('email'))->get('tbl_akun')->row_array();
		$date = date('Y-m-d H:i:s');
		if ($ada_akun['email'] == $this->input->post('email')) {
			$this->session->set_flashdata('akun_ada', TRUE);
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$data = array(
				'nama'			=> $this->input->post('nama'),
				'email' 		=> $this->input->post('email'),
				'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'telp' 			=> str_replace("_", "", $this->input->post('telp')),
				'role'			=> $this->input->post('role'),
				'nomor_induk'	=> $this->input->post('nrp'),
				'alamat'		=> $this->input->post('alamat'),
				'agama' => $this->input->post('agama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'telp' => $this->input->post('telp'),
				'alamat' => $this->input->post('alamat'),
				'desa_kelurahan' => $this->input->post('desa_kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kota_kabupaten' => $this->input->post('kota_kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'kode_pos' => $this->input->post('kode_pos'),
				'created' 		=> $date,
				'updated' 		=> $date
			);
		}
		$query = $this->db->insert('tbl_akun', $data);
		if ($query) {
			$akun = $this->db->where('created', $date)->get('tbl_akun')->row();
			$data = array(
				'id_event' => 2,
				'id_peserta'     => $akun->id_akun,
				'role'     => "peserta",
				'created' => date('Y-m-d H:i:s'),
				'updated' => date('Y-m-d H:i:s')
			);
			$jobfair = $this->db->insert('event_perusahaan', $data);
			$this->session->set_flashdata('insert_akun', "Tambah Berhasil");
		} else {
			$this->session->set_flashdata('insert_akun', "Tambah Gagal");
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function addPerusahaan()
	{
		$ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
		if (($ada_perusahaan['nama_perusahaan'] == $this->input->post('nama_perusahaan')) && ($ada_perusahaan->status_daftar == 'pendaftar')) {
			$this->session->set_flashdata('perusahaan_ada', TRUE);
		} else if (($ada_perusahaan['nama_perusahaan'] == $this->input->post('nama_perusahaan')) && ($ada_perusahaan->status_daftar == 'loker')) {
			$config['upload_path'] = './assets/upload/logo/';
			$config['allowed_types'] = 'jpg|png|jpeg|webp';
			$this->upload->initialize($config);
			$upload_logo = $this->upload->do_upload('logo');
			$logo = $this->upload->data('file_name');
			if ($upload_logo) {
				$data = array(
					'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
					'email' 			=> $this->input->post('email'),
					'password' 				=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'telp_perusahaan' 			=> $this->input->post('telp'),
					'logo_perusahaan' 			=> $this->upload->data('file_name'),
					'alamat'		=> $this->input->post('alamat'),
					'pj'		=> $this->input->post('nama_pj'),
					'telp_pj' 			=> $this->input->post('telp_pj'),
					'status_daftar' 			=> 'pendaftar',
					'created' 		=> date('Y-m-d H:i:s'),
					'updated' 		=> date('Y-m-d H:i:s')

				);
				$query = $this->db->where("nama_perusahaan", $this->input->post('nama_perusahaan'))->update('tbl_perusahaan', $data);
				if ($query) {
					$this->session->set_flashdata('insert_akunP', TRUE);
				} else {
					$this->session->set_flashdata('insert_akunP', FALSE);
				}
			} else {
				$this->session->set_flashdata('insert_akunP', FALSE);
			}
		} else {
			$config['upload_path'] = './assets/upload/logo/';
			$config['allowed_types'] = 'jpg|png|jpeg|webp';
			$this->upload->initialize($config);
			$upload_logo = $this->upload->do_upload('logo');
			$logo = $this->upload->data('file_name');
			if ($upload_logo) {
				$data = array(
					'nama_perusahaan'	=> $this->input->post('nama_perusahaan'),
					'email' 			=> $this->input->post('email'),
					'password' 				=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'telp_perusahaan' 			=> $this->input->post('telp'),
					'logo_perusahaan' 			=> $this->upload->data('file_name'),
					'alamat'		=> $this->input->post('alamat'),
					'pj'		=> $this->input->post('nama_pj'),
					'telp_pj' 			=> $this->input->post('telp_pj'),
					'status_daftar' 			=> 'pendaftar',
					'created' 		=> date('Y-m-d H:i:s'),
					'updated' 		=> date('Y-m-d H:i:s')

				);
				$query = $this->db->insert('tbl_perusahaan', $data);
				if ($query) {
					$this->session->set_flashdata('insert_akunP', TRUE);
				} else {
					$this->session->set_flashdata('insert_akunP', FALSE);
				}
			} else {
				$this->session->set_flashdata('insert_akunP', FALSE);
			}
		}
		redirect('halaman/daftar_perusahaan');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}
}
