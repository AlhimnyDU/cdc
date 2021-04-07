<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
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
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->database();
    }

    public function index()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('perusahaan')) {
                $head['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $data['mengikuti'] = $this->db->where('role', 'perusahaan')->where('id_event', 2)->where('id_peserta', $this->session->userdata('id_akun'))->get('event_perusahaan')->row();
                $this->load->view('perusahaan/templates/header', $head);
                $this->load->view('perusahaan/home', $data);
                $this->load->view('perusahaan/templates/js');
                $this->load->view('perusahaan/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            $data['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
            redirect('login');
        }
    }

    public function loker()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('perusahaan')) {
                $head['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->where('jenis', 'vacancy')->get('tbl_loker')->result();
                $this->load->view('perusahaan/templates/header', $head);
                $this->load->view('perusahaan/loker', $data);
                $this->load->view('perusahaan/templates/js');
                $this->load->view('perusahaan/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function addLoker()
    {
        $config['upload_path'] = './assets/upload/poster/';
        $config['allowed_types'] = 'jpg';
        $this->upload->initialize($config);
        $this->upload->do_upload('poster');
        $data = array(
            'posisi'     => $this->input->post('posisi'),
            'deadline' => $this->input->post('deadline') . " 23:59:59",
            'lokasi'     => $this->input->post('lokasi'),
            'syarat'     => $this->input->post('syarat'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'informasi'     => $this->input->post('informasi'),
            'status'     => 'Menunggu Konfirmasi',
            'prodi'     => $this->input->post('prodi'),
            'poster'   => $this->upload->data('file_name'),
            'jenis'   => "vacancy",
            'id_perusahaan' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_loker', $data);
        if ($query) {
            $this->session->set_flashdata('insert_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/loker');
    }

    public function addJobfair()
    {
        if ($_FILES["poster"]["name"]) {
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $this->upload->do_upload('poster');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline') . " 23:59:59",
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $this->upload->data('file_name'),
                'jenis'   => "Job Fair 2021",
                'id_perusahaan' => $this->session->userdata('id_akun'),
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s')
            );
            $query = $this->db->insert('tbl_loker', $data);
            if ($query) {
                $this->session->set_flashdata('insert_loker', "Tambah Berhasil");
            } else {
                $this->session->set_flashdata('failed', "Tambah Gagal");
            }
        } else {
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline') . " 23:59:59",
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'jenis'   => "Job Fair 2021",
                'id_perusahaan' => $this->session->userdata('id_akun'),
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s')
            );
            $query = $this->db->insert('tbl_loker', $data);
            if ($query) {
                $this->session->set_flashdata('insert_loker', "Tambah Berhasil");
            } else {
                $this->session->set_flashdata('failed', "Tambah Gagal");
            }
        }
        redirect('perusahaan/jobfair');
    }

    public function editLoker($id)
    {
        if ($_FILES["poster"]["name"]) {
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $this->upload->do_upload('poster');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $this->upload->data('file_name'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'prodi'     => $this->input->post('prodi'),
                'updated' => date('Y-m-d H:i:s')
            );
        }
        $query = $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        if ($query) {
            $this->session->set_flashdata('update_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/loker');
    }

    public function editJobfair($id)
    {
        if ($_FILES["poster"]["name"]) {
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $this->upload->do_upload('poster');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $this->upload->data('file_name'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'prodi'     => $this->input->post('prodi'),
                'updated' => date('Y-m-d H:i:s')
            );
        }
        $query = $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        if ($query) {
            $this->session->set_flashdata('update_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/jobfair');
    }


    public function jobfair()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('perusahaan')) {
                $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->where('jenis', 'Job Fair 2021')->get('tbl_loker')->result();
                $head['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $data['event'] = $this->db->get('tbl_event')->result();
                $data['mengikuti'] = $this->db->where('id_peserta', $this->session->userdata('id_akun'))->where('role', 'perusahaan')->where('id_event', 2)->get('event_perusahaan')->result();
                $data['jobfair'] = $this->db->where('role', 'perusahaan')->where('id_event', 2)->where('id_peserta', $this->session->userdata('id_akun'))->get('event_perusahaan')->row();
                $this->load->view('perusahaan/templates/header', $head);
                $this->load->view('perusahaan/jobfair', $data);
                $this->load->view('perusahaan/templates/js');
                $this->load->view('perusahaan/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function pelamar($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('perusahaan')) {
                $head['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $data['pelamar'] = $this->db->select('tbl_lamaran.*,tbl_loker.posisi,tbl_akun.nama')->join('tbl_loker', 'tbl_loker.id_loker=tbl_lamaran.id_loker', 'left')->join('tbl_akun', 'tbl_akun.id_akun=tbl_lamaran.id_akun', 'left')->where('tbl_lamaran.id_loker', $id)->get('tbl_lamaran')->result();
                $this->load->view('perusahaan/templates/header', $head);
                $this->load->view('perusahaan/pelamar', $data);
                $this->load->view('perusahaan/templates/js');
                $this->load->view('perusahaan/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function deleteJob($id)
    {
        $query = $this->db->where('id_loker', $id)->delete('tbl_loker');
        if ($query) {
            $this->session->set_flashdata('delete_data', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function data_pelamar($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('perusahaan')) {
                $head['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $data['akun'] = $this->db->where('id_akun', $id)->get('tbl_akun')->row();
                $data['berkas'] = $this->db->where('id_akun', $id)->get('tbl_berkas')->result();
                $data['pendidikan'] = $this->db->where('id_akun', $id)->get('tbl_pendidikan')->result();
                $data['organisasi'] = $this->db->where('id_akun', $id)->get('tbl_organisasi')->result();
                $data['prestasi'] = $this->db->where('id_akun', $id)->get('tbl_prestasi')->result();
                $data['sertifikat'] = $this->db->where('id_akun', $id)->get('tbl_sertifikat')->result();
                $data['kerja'] = $this->db->where('id_akun', $id)->get('tbl_kerja')->result();
                $this->load->view('perusahaan/templates/header', $head);
                $this->load->view('perusahaan/data_pelamar', $data);
                $this->load->view('perusahaan/templates/js');
                $this->load->view('perusahaan/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function mengikuti($id)
    {
        $data = array(
            'id_event' => $id,
            'id_peserta'     => $this->session->userdata('id_akun'),
            'role'     => "perusahaan",
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('event_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/jobfair');
    }

    public function tidakMengikuti($id)
    {
        $query = $this->db->where('id', $id)->delete('event_perusahaan');
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/jobfair');
    }

    public function setting()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('perusahaan')) {
                $head['user'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $data['perusahaan'] = $this->db->where('id_perusahaan', $this->session->userdata('id_akun'))->get('tbl_perusahaan')->row();
                $this->load->view('perusahaan/templates/header', $head);
                $this->load->view('perusahaan/setting', $data);
                $this->load->view('perusahaan/templates/js');
                $this->load->view('perusahaan/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function editProfile($id)
    {
        if ($this->input->post('logo_perusahaan') != NULL) {
            $config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $this->upload->do_upload('logo_perusahaan');
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'alamat' => $this->input->post('alamat'),
                'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                'pj' => $this->input->post('pj'),
                'telp_pj' => $this->input->post('telp_pj'),
                'deskripsi' => $this->input->post('deskripsi'),
                'logo_perusahaan' => $this->upload->data('file_name'),
                'bidang' => $this->input->post('bidang'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'alamat' => $this->input->post('alamat'),
                'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                'pj' => $this->input->post('pj'),
                'telp_pj' => $this->input->post('telp_pj'),
                'bidang' => $this->input->post('bidang'),
                'deskripsi' => $this->input->post('deskripsi'),
                'updated' => date('Y-m-d H:i:s')
            );
        }

        $query = $this->db->where('id_perusahaan', $id)->update('tbl_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('update_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/setting');
    }

    public function linkVideo($id)
    {
        $data = array(
            'link' => $this->input->post('link'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id', $id)->update('event_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/jobfair');
    }

    public function verifikasi($id_loker, $id_lamaran)
    {
        $data = array(
            'status' => "Telah Diverifikasi",
            'updated' => date('Y-m-d H:i:s')
        );

        $query = $this->db->where('id_lamaran', $id_lamaran)->update('tbl_lamaran', $data);
        if ($query) {
            $data = $this->db->select('tbl_akun.email, tbl_akun.nama')->join('tbl_akun', 'tbl_akun.id_akun=tbl_lamaran.id_akun', 'LEFT')->where('tbl_lamaran.id_lamaran', $id_lamaran)->get('tbl_lamaran')->row_array();
            $perusahaan = $this->db->select('tbl_perusahaan.*, tbl_loker.posisi')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'LEFT')->where('tbl_loker.id_loker', $id_loker)->get('tbl_loker')->row_array();
            $from_email = "cdc@itenas.ac.id";
            $message = "<b><h3>Yth. " . $data['nama'] . "</h3></b> <br> Akun anda telah diverifikasi data lamaran oleh perusahaan " . $this->session->userdata('nama') . ". <br> Lowongan kerja yang anda lamar yaitu " . $perusahaan['posisi'] . ". Silahkan anda hubungi perusahaan untuk melanjutkan tahap selanjutnya.<br> Email Perusahaan :" . $perusahaan['email'] . "<br> CP perusahaan : " . $perusahaan['telp_pj'] . "(" . $perusahaan['pj'] . ") <br> Untuk melihat pemberitahuannya, silahkan login ke https://cdc.itenas.ac.id <br><br> Hormat kami, <br><br> <b>CDC Itenas</b> ";
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
            $this->email->to($data['email']);
            $this->email->reply_to($from_email);
            $this->email->subject('[No-Reply] Lamaran - Telah Terverifikasi');
            $this->email->set_header('Itenas', 'CDC');
            $this->email->set_mailtype("html");
            $this->email->message($message);
            if ($this->email->send()) {
                echo "Email Terkirim";
            } else {
                echo $this->email->print_debugger();
                die;
                $this->session->set_flashdata("notifGagal", "Email gagal dikirim.");
            }
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/pelamar/' . $id_loker);
    }

    public function terima_lamaran($id_loker, $id_lamaran)
    {
        $data = array(
            'status' => "Diterima",
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_lamaran', $id_lamaran)->update('tbl_lamaran', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/pelamar/' . $id_loker);
    }

    public function tolak_lamaran($id_loker, $id_lamaran)
    {
        $data = array(
            'status' => "Ditolak",
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_lamaran', $id_lamaran)->update('tbl_lamaran', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/pelamar/' . $id_loker);
    }

    public function upload_foto()
    {
        $config['upload_path'] = './assets/upload/foto_perusahaan/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('foto');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            // redirect('admin/cv');
        } else {
            return $this->upload->data('file_name');
        }
    }
    public function upload_foto2()
    {
        $config['upload_path'] = './assets/upload/foto_perusahaan/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('foto2');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            // redirect('admin/cv');
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function update_foto($id)
    {
        $data = array(
            'foto_perusahaan' => $this->upload_foto(),
            'foto_perusahaan2' =>  $this->upload_foto2(),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_perusahaan', $id)->update('tbl_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('update_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('perusahaan/setting');
    }
}
