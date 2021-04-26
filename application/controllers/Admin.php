<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
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
        $this->load->library('upload');
        $this->load->library('email');
    }

    public function index()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $this->load->view('admin/templates/header', $this->session->userdata('nama'));
                $this->load->view('admin/dashboard');
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function akunAdmin()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['admin'] = $this->db->get('tbl_admin')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/admin', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function mahasiswa()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['mahasiswa'] = $this->db->where('role', 'mahasiswa')->get('tbl_akun')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/mahasiswa', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function umum()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['umum'] = $this->db->where('role', 'umum')->get('tbl_akun')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/umum', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function event()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['event'] = $this->db->get('tbl_event')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/event', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function peserta_jobfair()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['peserta'] = $this->db->get('tbl_jobfair')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/peserta_jobfair', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function peserta($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['perusahaan'] = $this->db->select('tbl_perusahaan.*, event_perusahaan.id, event_perusahaan.link, event_perusahaan.id_event, tbl_event.nama_event')->join('tbl_event', 'tbl_event.id_event=event_perusahaan.id_event', 'LEFT')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=event_perusahaan.id_peserta', 'LEFT')->where('event_perusahaan.id_event', $id)->where('event_perusahaan.role', 'perusahaan')->get('event_perusahaan')->result();
                $data['peserta'] = $this->db->select('tbl_akun.*, event_perusahaan.id, event_perusahaan.id_event, tbl_event.nama_event')->join('tbl_event', 'tbl_event.id_event=event_perusahaan.id_event', 'LEFT')->join('tbl_akun', 'tbl_akun.id_akun=event_perusahaan.id_peserta', 'LEFT')->where('event_perusahaan.id_event', $id)->where('event_perusahaan.role', 'peserta')->get('event_perusahaan')->result();
                $data['nama'] = $this->db->select('nama_event')->where('id_event', $id)->get('tbl_event')->row();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/peserta', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function sertifikat()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['acara'] = $this->db->get('tbl_acara')->result();
                $data['sertifikat'] = $this->db->get('e_sertifikat')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/sertifikat', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function slideshow()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['slideshow'] = $this->db->get('tbl_slideshow')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/slideshow', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function add_slideshow()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $this->load->view('admin/templates/header');
                $this->load->view('admin/add_slideshow');
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function upd_slideshow($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['slideshow'] = $this->db->where('id_slideshow', $id)->get('tbl_slideshow')->row();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/upd_slideshow', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function addSlideshow()
    {
        $this->upload_slideshow();
        $data = array(
            'judul'    => $this->input->post('judul'),
            'link'    => $this->input->post('link'),
            'file'    => $this->upload->data('file_name'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_slideshow', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateSlideshow($id)
    {
        if ($_FILES["slideshow"]["name"]) {
            $this->upload_slideshow();
            $data = array(
                'judul'    => $this->input->post('judul'),
                'link'    => $this->input->post('link'),
                'file'    => $this->upload->data('file_name'),
                'updated'   => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'judul'    => $this->input->post('judul'),
                'link'    => $this->input->post('link'),
                'updated'   => date('Y-m-d H:i:s')
            );
        }
        $query = $this->db->where('id_slideshow', $id)->update('slideshow', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteSlideshow($id, $nama_file)
    {
        $query = $this->db->where('id_slideshow', $id)->delete('tbl_slideshow');
        if ($query) {
            unlink('./assets/upload/slideshow/' . $nama_file);
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function accSlideshow($id)
    {
        $data = array(
            'publish' => "y",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_slideshow', $id)->update('tbl_slideshow', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function decSlideshow($id)
    {
        $data = array(
            'publish' => "n",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_slideshow', $id)->update('tbl_slideshow', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function addESertifikat()
    {
        $data = array(
            'nama_lengkap'    => $this->input->post('nama_lengkap'),
            'nim'    => $this->input->post('nim'),
            'email'    => $this->input->post('email'),
            'acara'    => $this->input->post('acara'),
            'drive'    => $this->input->post('drive'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('e_sertifikat', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function importESertifikat()
    {
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        $config['upload_path'] = base_url('assets/upload/excel/');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            //upload gagal
            $this->session->set_flashdata('notifGagal', 'error');
            //redirect halaman
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            // redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data_upload = $this->upload->data();
            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('./assets/excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
            $data = array();
            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'nim'      => $row['A'],
                        'nama_lengkap'      => $row['B'],
                        'email'      => $row['C'],
                        'acara'      => $row['D'],
                        'drive'      => $row['E'],
                        'created'    => date('Y-m-d H:i:s'),
                        'updated'    => date('Y-m-d H:i:s')
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('e_sertifikat', $data);
            //delete file from server
            unlink('./assets/excel/' . $data_upload['file_name']);
            //redirect halaman
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updateESertifikat($id)
    {
        $data = array(
            'nama_lengkap'    => $this->input->post('nama_lengkap'),
            'nim'    => $this->input->post('nim'),
            'email'    => $this->input->post('email'),
            'acara'    => $this->input->post('acara'),
            'drive'    => $this->input->post('drive'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_sertifikat', $id)->update('e_sertifikat', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteESertifikat($id)
    {
        $query = $this->db->where('id_sertifikat', $id)->delete('e_sertifikat');
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function iklan()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['iklan'] = $this->db->get('tbl_iklan')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/iklan', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function tambahIklan()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $this->load->view('admin/templates/header');
                $this->load->view('admin/add_iklan');
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function updIklan($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['iklan'] = $this->db->where('id_iklan', $id)->get('tbl_iklan')->row();
                $data['poster'] = $this->db->where('created', $data['iklan']->created)->get('tbl_poster')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/upd_iklan', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function addIklan()
    {
        $tanggal = date('Y-m-d H:i:s');
        $nama_file = date("dMYHis");
        $config['upload_path'] = './assets/upload/iklan/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $jumlah_berkas = count($_FILES['poster']['name']);
        $this->upload->initialize($config);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
            if (!empty($_FILES['poster']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['poster']['name'][$i];
                $_FILES['file']['type'] = $_FILES['poster']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['poster']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['poster']['error'][$i];
                $_FILES['file']['size'] = $_FILES['poster']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $poster = array(
                        'file' => $this->upload->data('file_name'),
                        'created' => $tanggal,
                        'updated' => $tanggal
                    );
                    $this->db->insert('tbl_poster', $poster);
                    echo "Berhasil";
                } else {
                    echo "gagal";
                }
            }
        }
        $data = array(
            'judul'    => $this->input->post('judul'),
            'informasi'    => $this->input->post('informasi'),
            'status'    => $this->input->post('status'),
            'video'    => $this->input->post('video'),
            'created'   => $tanggal,
            'updated'   => $tanggal,
        );
        $query = $this->db->insert('tbl_iklan', $data);
        if ($query) {
            $from_email = "cdc@itenas.ac.id";
            $message = "<h3>Notifikasi Baru</h3><p>Judul : " . $this->input->post('judul') . "<br> Status :" . $this->input->post('status') . "<br> Bisa dicek di <a>cdc.itenas.ac.id</a> </p>";
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
            $this->email->to("puspasa99@gmail.com");
            $this->email->reply_to($from_email);
            $this->email->subject('[No-Reply] Lowongan Kerja Baru CDC Itenas');
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
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/iklan');
    }

    public function updateIklan($id)
    {
        $data = array(
            'judul'    => $this->input->post('judul'),
            'informasi'    => $this->input->post('informasi'),
            'video'    => $this->input->post('video'),
            'status'    => $this->input->post('status'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_iklan', $id)->update('tbl_iklan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteIklan($id)
    {
        // unlink('assets/upload/iklan/' . $file);
        $query = $this->db->where('id_iklan', $id)->delete('tbl_iklan');
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function responden($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['form'] = $this->db->select('tbl_soal.*,form_soal.id_form')->from('form_soal')->join('tbl_soal', 'tbl_soal.id_soal=form_soal.id_soal', 'left')->where('form_soal.id_acara', $id)->where('tbl_soal.jenis_jawaban !=', 'label')->where('tbl_soal.jenis_jawaban !=', 'label_kecil')->where('tbl_soal.jenis_jawaban !=', '1_respond')->get()->result();
                $data['jawaban'] = $this->db->where('id_acara', $id)->get('tbl_jawaban')->result();
                $data['max'] = $this->db->select_max("responden")->where('id_acara', $id)->get('tbl_jawaban')->row();
                $data['acara'] = $this->db->where('id_acara', $id)->get('tbl_acara')->row();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/responden', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function pesertaAcara($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['peserta'] = $this->db->where('id_acara', $id)->get('tbl_peserta')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/pesertaAcara', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function acara()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['acara'] = $this->db->order_by('created', 'DESC')->get('tbl_acara')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/acara', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function soal()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['soal'] = $this->db->get('tbl_soal')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/soal', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function form($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['acara'] = $this->db->where('id_acara', $id)->get('tbl_acara')->row();
                $data['soal'] = $this->db->get('tbl_soal')->result();
                $data['form'] = $this->db->select('tbl_soal.*,form_soal.id_form')->from('form_soal')->join('tbl_soal', 'tbl_soal.id_soal=form_soal.id_soal', 'left')->where('form_soal.id_acara', $id)->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/form_soal', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');;
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function addSoal()
    {
        $data = array(
            'soal'    => $this->input->post('soal'),
            'jenis_jawaban'    => $this->input->post('jenis_jawaban'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_soal', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateSoal($id)
    {
        $data = array(
            'soal'    => $this->input->post('soal'),
            'jenis_jawaban'    => $this->input->post('jenis_jawaban'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_soal', $id)->update('tbl_soal', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function addFormSoal($id)
    {
        $data = array(
            'id_soal' =>  $this->input->post('id_soal'),
            'id_acara' =>  $id,
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('form_soal', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteFormSoal($id)
    {
        $query = $this->db->where('id_form', $id)->delete('form_soal');
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function addAcara()
    {
        $data = array(
            'nama_acara'    => $this->input->post('nama_acara'),
            'tanggal_pelaksanaan'    => $this->input->post('tanggal_pelaksanaan'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_acara', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function mulaiPublish($id)
    {
        $data = array(
            'publish'    => "y",
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_acara', $id)->update('tbl_acara', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tidakPublish($id)
    {
        $data = array(
            'publish'    => "n",
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_acara', $id)->update('tbl_acara', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function mulaiKuesioner($id)
    {
        $data = array(
            'status'    => "Aktif",
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_acara', $id)->update('tbl_acara', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function akhiriKuesioner($id)
    {
        $data = array(
            'status'    => "Tidak Aktif",
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_acara', $id)->update('tbl_acara', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteAcara($id)
    {
        $query = $this->db->where('id_acara', $id)->delete('tbl_acara');
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function addEvent()
    {
        $data = array(
            'nama_event'    => $this->input->post('nama_event'),
            'tanggal_awal'    => $this->input->post('tanggal_awal'),
            'tanggal_akhir'    => $this->input->post('tanggal_akhir'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_event', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/event');
    }

    public function updateEvent($id)
    {
        $data = array(
            'nama_event'    => $this->input->post('nama_event'),
            'tanggal_awal'    => $this->input->post('tanggal_awal'),
            'tanggal_akhir'    => $this->input->post('tanggal_akhir'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_event', $id)->update('tbl_event', $data);
        if ($query) {
            $this->session->set_flashdata('insert_event', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/event');
    }

    public function addMahasiswa()
    {
        $data = array(
            'nama'    => $this->input->post('nama'),
            'email'             => $this->input->post('email'),
            'password'                 => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp'             => $this->input->post('telp'),
            'role'                => "mahasiswa",
            'status'            => "Aktif",
            'nomor_induk'        => $this->input->post('nrp'),
            'alamat'        => $this->input->post('alamat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_mahasiswa', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/mahasiswa');
    }

    public function editMahasiswa($id)
    {
        if (($this->input->post('passwordnew')) == "") {
            $data = array(
                'nama'        => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'     => $this->input->post('password'),
                'telp'         => $this->input->post('telp'),
                'role'        => "mahasiswa",
                'status'    => "Aktif",
                'nomor_induk' => $this->input->post('nrp'),
                'alamat'    => $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'nama'        => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'     => password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
                'telp'         => $this->input->post('telp'),
                'role'        => "mahasiswa",
                'status'    => "Aktif",
                'nomor_induk' => $this->input->post('nrp'),
                'alamat'    => $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        }
        $query = $this->db->where('id_akun', $id)->update('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
            redirect('admin/mahasiswa');
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/mahasiswa');
    }

    public function addAdmin()
    {
        $data = array(
            'nama_admin'    => $this->input->post('nama_admin'),
            'email' => $this->input->post('email'),
            'password'    => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );
        $query = $this->db->insert('tbl_admin', $data);
        if ($query) {
            $this->session->set_flashdata('insert_admin', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/akunAdmin');
    }

    public function editAdmin($id)
    {
        if (($this->input->post('passwordnew')) == "") {
            $data = array(
                'nama_admin'    => $this->input->post('nama_admin'),
                'email' => $this->input->post('email'),
                'password'    => $this->input->post('password')
            );
        } else {
            $data = array(
                'nama_admin'    => $this->input->post('nama_admin'),
                'email' => $this->input->post('email'),
                'password'    => password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT)
            );
        }
        $query = $this->db->where('id_admin', $id)->update('tbl_admin', $data);
        if ($query) {
            $this->session->set_flashdata('edit_admin', "Tambah Berhasil");
            redirect('admin/akunAdmin');
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/akunAdmin');
    }

    public function hapusEvent($id)
    {
        $this->db->where('id_event', $id)->delete('tbl_event');
        redirect('admin/event');
    }

    public function hapusAdmin($id)
    {
        $this->db->where('id_admin', $id)->delete('tbl_admin');
        redirect('admin/akunAdmin');
    }
    public function hapusAlumni($id)
    {
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/alumni');
    }
    public function hapusUmum($id)
    {
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/umum');
    }

    public function hapusArtikel($id)
    {
        $this->db->where('id_artikel', $id)->delete('tbl_artikel');
        redirect('admin/post');
    }

    public function hapusPerusahaan($id)
    {
        $this->session->set_flashdata('delete_persh', TRUE);
        $this->db->where('id_perusahaan', $id)->delete('tbl_perusahaan');
        redirect('admin/perusahaan');
    }
    public function hapusMahasiswa($id)
    {
        $this->db->where('id_akun', $id)->delete('tbl_akun');
        redirect('admin/mahasiswa');
    }

    public function alumni()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['alumni'] = $this->db->where('role', 'alumni')->get('tbl_akun')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/alumni', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function schedule()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['schedule'] = $this->db->order_by('jadwal_meeting', 'ASC')->get('tbl_schedule')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/schedule', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function pelamar($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['pelamar'] = $this->db->select('tbl_lamaran.*,tbl_loker.posisi,tbl_akun.nomor_induk,tbl_akun.nama,tbl_perusahaan.nama_perusahaan')->join('tbl_loker', 'tbl_loker.id_loker=tbl_lamaran.id_loker', 'left')->join('tbl_akun', 'tbl_akun.id_akun=tbl_lamaran.id_akun', 'left')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('tbl_lamaran.id_loker', $id)->get('tbl_lamaran')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/pelamar', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function pendaftar($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['pendaftar'] = $this->db->select('tbl_lamaran.id_lamaran, tbl_lamaran.status as lamaran,tbl_akun.*')->join('tbl_akun', 'tbl_akun.id_akun=tbl_lamaran.id_akun', 'left')->where('tbl_lamaran.id_loker', $id)->get('tbl_lamaran')->result();
                $data['berkas'] = $this->db->select('tbl_persyaratan.*,syarat_lowongan.id_syarat')->from('syarat_lowongan')->join('tbl_persyaratan', 'tbl_persyaratan.id_persyaratan=syarat_lowongan.id_persyaratan', 'left')->where('syarat_lowongan.id_loker', $id)->get()->result();
                $data['data'] = $this->db->get('tbl_berkas')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/pendaftar', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function verif($id_lamaran)
    {
        $data = array(
            'status' => "Telah Diverifikasi",
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_lamaran', $id_lamaran)->update('tbl_lamaran', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function terima_lamaran($id_lamaran)
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
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tolak_lamaran($id_lamaran)
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
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function data_pelamar($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['akun'] = $this->db->where('id_akun', $id)->get('tbl_akun')->row();
                $data['pendidikan'] = $this->db->where('id_akun', $id)->get('tbl_pendidikan')->result();
                $data['organisasi'] = $this->db->where('id_akun', $id)->get('tbl_organisasi')->result();
                $data['prestasi'] = $this->db->where('id_akun', $id)->get('tbl_prestasi')->result();
                $data['sertifikat'] = $this->db->where('id_akun', $id)->get('tbl_sertifikat')->result();
                $data['berkas'] = $this->db->where('id_akun', $id)->get('tbl_berkas')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/data_pelamar', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function addAlumni()
    {
        $data = array(
            'nama'        => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp'         => $this->input->post('telp'),
            'role'        => "alumni",
            'status'    => "Aktif",
            'nomor_induk' => $this->input->post('nrp'),
            'alamat'    => $this->input->post('alamat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/alumni');
    }

    public function addSchedule()
    {
        $data = array(
            'nama_meeting' => $this->input->post('nama_meeting'),
            'jadwal_meeting' => $this->input->post('jadwal_meeting'),
            'link' => $this->input->post('link'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_schedule', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/schedule');
    }

    public function deleteSchedule($id)
    {
        $query = $this->db->where('id_schedule', $id)->delete('tbl_schedule');
        if ($query) {
            $this->session->set_flashdata('delete_data', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/schedule');
    }

    public function addUmum()
    {
        $data = array(
            'nama'        => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'telp'         => $this->input->post('telp'),
            'role'        => "umum",
            'status'    => "Aktif",
            'nomor_induk' => $this->input->post('nrp'),
            'alamat'    => $this->input->post('alamat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/umum');
    }

    public function editAlumni($id)
    {
        if (($this->input->post('passwordnew')) == "") {
            $data = array(
                'nama'        => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'     => $this->input->post('password'),
                'telp'         => $this->input->post('telp'),
                'role'        => "alumni",
                'status'    => "Aktif",
                'nomor_induk' => $this->input->post('nrp'),
                'alamat'    => $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'nama'        => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'     => password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
                'telp'         => $this->input->post('telp'),
                'role'        => "alumni",
                'status'    => "Aktif",
                'nomor_induk' => $this->input->post('nrp'),
                'alamat'    => $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        }
        $query = $this->db->where('id_akun', $id)->update('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
            redirect('admin/alumni');
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/alumni');
    }

    public function editUmum($id)
    {
        if (($this->input->post('passwordnew')) == "") {
            $data = array(
                'nama'        => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'     => $this->input->post('password'),
                'telp'         => $this->input->post('telp'),
                'role'        => "umum",
                'status'    => "Aktif",
                'nomor_induk' => $this->input->post('nrp'),
                'alamat'    => $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'nama'        => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'     => password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
                'telp'         => $this->input->post('telp'),
                'role'        => "umum",
                'status'    => "Aktif",
                'nomor_induk' => $this->input->post('nrp'),
                'alamat'    => $this->input->post('alamat'),
                'updated'   => date('Y-m-d H:i:s'),
            );
        }
        $query = $this->db->where('id_akun', $id)->update('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
            redirect('admin/umum');
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/umum');
    }

    public function perusahaan()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['perusahaan'] = $this->db->where('status_daftar', 'pendaftar')->get('tbl_perusahaan')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/perusahaan', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function addPerusahaan()
    {
        //         $config['upload_path'] = './assets/upload/file_cv/';
        //         $config['allowed_types'] = 'pdf';
        //         $this->upload->initialize($config);
        //         $this->upload->do_upload('file_cv');        
        //         $data = array(
        // 			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
        // 			'email' 	=> $this->input->post('email'),
        // 			'password' 	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        // 			'telp_pj' 		=> $this->input->post('telp_pj'),
        // 			'jabatan'		=> "-",
        //             'pj'=> $this->input->post('pj'),
        //             'alamat'	=> $this->input->post('alamat'),
        //             'telp_perusahaan' => $this->input->post('telp'),
        //             'file_cv'   => $this->upload->data('file_name'),
        //             'created'   => date('Y-m-d H:i:s'),
        //             'updated'   => date('Y-m-d H:i:s'),
        // 		 );
        // 		$query = $this->db->insert('tbl_perusahaan',$data);
        // 		if($query){
        //         	$this->session->set_flashdata('insert_persh',"Tambah Berhasil");
        //         }else{
        //         	$this->session->set_flashdata('failed',"Tambah Gagal");
        //         }
        redirect('admin/perusahaan');
    }

    public function editPerusahaan($id)
    {
        $data = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'email'     => $this->input->post('email'),
            'telp_pj'         => $this->input->post('telp_pj'),
            'jabatan'        => "-",
            'pj' => $this->input->post('pj'),
            'alamat'    => $this->input->post('alamat'),
            'telp_perusahaan' => $this->input->post('telp'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_perusahaan', $id)->update('tbl_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('update_persh', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/perusahaan');
    }

    public function gantiPassPerusahaan($id)
    {
        $data = array(
            'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'updated'   => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id_perusahaan', $id)->update('tbl_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('update_persh', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/perusahaan');
    }


    public function loker()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan')->from('tbl_loker')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('jenis', 'vacancy')->order_by('tbl_loker.created', 'DESC')->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/loker', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function loker_persyaratan($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['loker'] = $this->db->where('id_loker', $id)->get('tbl_loker')->row();
                $data['syarat'] = $this->db->get('tbl_persyaratan')->result();
                $data['persyaratan'] = $this->db->select('tbl_persyaratan.*,syarat_lowongan.id_syarat')->from('syarat_lowongan')->join('tbl_persyaratan', 'tbl_persyaratan.id_persyaratan=syarat_lowongan.id_persyaratan', 'left')->where('syarat_lowongan.id_loker', $id)->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/loker_persyaratan', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function addPersyaratan($id)
    {
        $data = array(
            'id_persyaratan' =>  $this->input->post('id_persyaratan'),
            'id_loker' =>  $id,
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('syarat_lowongan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deletePersyaratan($id)
    {
        $query = $this->db->where('id_syarat', $id)->delete('syarat_lowongan');
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function persyaratan()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['persyaratan'] = $this->db->get('tbl_persyaratan')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/persyaratan', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function addSyarat()
    {
        $data = array(
            'nama_syarat' =>  $this->input->post('nama_syarat'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_persyaratan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_alumni', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateSyarat($id)
    {
        $data = array(
            'nama_syarat' =>  $this->input->post('nama_syarat'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_persyaratan', $id)->update('tbl_persyaratan', $data);
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteSyarat($id)
    {
        $query = $this->db->where('id_syarat', $id)->delete('syarat_lowongan');
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function magang()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan')->from('tbl_loker')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('jenis', 'magang')->order_by('tbl_loker.created', 'DESC')->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/magang', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function accLoker($id)
    {
        $data = array(
            'status' => "Disetujui",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        $loker = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan')->from('tbl_loker')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('jenis', 'vacancy')->where('id_loker', $id)->get()->row();
        $from_email = "cdc@itenas.ac.id";
        $message = "<h3>Publikasi Recruitment Baru</h3><p>Perusahaan: " . $loker->nama_perusahaan . "<br> Posisi :" . $loker->posisi . "<br> Bisa dicek di <a>cdc.itenas.ac.id</a> </p>";
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
        $this->email->to("puspasa99@gmail.com");
        $this->email->reply_to($from_email);
        $this->email->subject('[No-Reply] Lowongan Kerja Baru CDC Itenas');
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
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function accJobfair($id)
    {
        $data = array(
            'status' => "Disetujui",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // public function verifikasi($id){
    //     $data = array(
    //         'status' => "y",
    //         'updated' => date('Y-m-d H:i:s')
    //     );
    //     $this->db->where('id_perusahaan',$id)->update('tbl_perusahaan',$data);
    //     redirect('admin/loker');
    // }

    public function unpublishLoker($id)
    {
        $data = array(
            'status' => "Menunggu Konfirmasi",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function unpublishJobfair($id)
    {
        $data = array(
            'status' => "Menunggu Konfirmasi",
            'updated' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function editLoker($id)
    {
        if ($this->input->post('poster') != NULL) {
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $this->upload->do_upload('poster');
            $data = array(
                'judul' => $this->input->post('judul'),
                'posisi'     => $this->input->post('posisi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'poster'   => $this->upload->data('file_name'),
                'prodi'   => $this->input->post('prodi'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'posisi'     => $this->input->post('posisi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'prodi'   => $this->input->post('prodi'),
                'id_perusahaan' => $this->input->post('id_perusahaan'),
                'updated' => date('Y-m-d H:i:s')
            );
        }

        $query = $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        if ($query) {
            $this->session->set_flashdata('update_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/loker');
    }

    public function tidakMengikuti($id, $id_perusahaan)
    {
        $query = $this->db->where('id_event', $id)->where('id_perusahaan', $id_perusahaan)->delete('event_perusahaan');
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/peserta/' . $id);
    }

    public function ikut_jobfair($id)
    {
        $data = array(
            'id_event' => 2,
            'id_peserta'     => $id,
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
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function addVacancy()
    {
        $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        if ($ada_perusahaan) {
            $id_perusahaan = $ada_perusahaan['id_perusahaan'];
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $insert_logo = $this->upload->do_upload('poster');
            $poster = $this->upload->data('file_name');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $poster,
                'jenis'   => "vacancy",
                'id_perusahaan' => $id_perusahaan,
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
            $config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $upload_logo = $this->upload->do_upload('logo');
            $logo = $this->upload->data('file_name');
            if ($upload_logo) {
                $perusahaan = array(
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'email' => $this->input->post('email'),
                    'logo_perusahaan' => $logo,
                    'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                );
                $insert_perusahaan = $this->db->insert('tbl_perusahaan', $perusahaan);
                $id = $this->db->where('created', $perusahaan['created'])->get('tbl_perusahaan')->row();
                // echo date('Y-m-d H:i:s');
                if ($insert_perusahaan) {
                    $config['upload_path'] = './assets/upload/poster/';
                    $config['allowed_types'] = 'jpg|png';
                    $this->upload->initialize($config);
                    $insert_logo = $this->upload->do_upload('poster');
                    $poster = $this->upload->data('file_name');
                    $data = array(
                        'posisi'     => $this->input->post('posisi'),
                        'deadline' => $this->input->post('deadline'),
                        'lokasi'     => $this->input->post('lokasi'),
                        'syarat'     => $this->input->post('syarat'),
                        'deskripsi'     => $this->input->post('deskripsi'),
                        'informasi'     => $this->input->post('informasi'),
                        'status'     => 'Menunggu Konfirmasi',
                        'prodi'     => $this->input->post('prodi'),
                        'poster'   => $poster,
                        'jenis'   => "vacancy",
                        'id_perusahaan' => $id->id_perusahaan,
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
                    $this->session->set_flashdata('failed', "Tambah Gagal");
                }
            } else {
                $this->session->set_flashdata('failed', "Tambah Gagal");
            }
        }
        redirect('admin/loker');
    }

    public function addMagang()
    {
        $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        if ($ada_perusahaan) {
            $id_perusahaan = $ada_perusahaan['id_perusahaan'];
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $insert_logo = $this->upload->do_upload('poster');
            $poster = $this->upload->data('file_name');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $poster,
                'jenis'   => "magang",
                'id_perusahaan' => $id_perusahaan,
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
            $config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $upload_logo = $this->upload->do_upload('logo');
            $logo = $this->upload->data('file_name');
            if ($upload_logo) {
                $perusahaan = array(
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'email' => $this->input->post('email'),
                    'logo_perusahaan' => $logo,
                    'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                );
                $insert_perusahaan = $this->db->insert('tbl_perusahaan', $perusahaan);
                $id = $this->db->where('created', $perusahaan['created'])->get('tbl_perusahaan')->row();
                // echo date('Y-m-d H:i:s');
                if ($insert_perusahaan) {
                    $config['upload_path'] = './assets/upload/poster/';
                    $config['allowed_types'] = 'jpg|png';
                    $this->upload->initialize($config);
                    $insert_logo = $this->upload->do_upload('poster');
                    $poster = $this->upload->data('file_name');
                    $data = array(
                        'posisi'     => $this->input->post('posisi'),
                        'deadline' => $this->input->post('deadline'),
                        'lokasi'     => $this->input->post('lokasi'),
                        'syarat'     => $this->input->post('syarat'),
                        'deskripsi'     => $this->input->post('deskripsi'),
                        'informasi'     => $this->input->post('informasi'),
                        'status'     => 'Menunggu Konfirmasi',
                        'prodi'     => $this->input->post('prodi'),
                        'poster'   => $poster,
                        'jenis'   => "magang",
                        'id_perusahaan' => $id->id_perusahaan,
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
                    $this->session->set_flashdata('failed', "Tambah Gagal");
                }
            } else {
                $this->session->set_flashdata('failed', "Tambah Gagal");
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function editVacancy($id)
    {
        $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        // if($ada_perusahaan){
        if ($this->input->post('logo_poster')) {
            $id_perusahaan = $ada_perusahaan['id_perusahaan'];
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $insert_logo = $this->upload->do_upload('poster');
            $poster = $this->upload->data('file_name');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $poster,
                'jenis'   => "vacancy",
                'id_perusahaan' => $id_perusahaan,
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            // $id_perusahaan= $ada_perusahaan['id_perusahaan'];
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'jenis'   => "vacancy",
                // 'id_perusahaan' => $id_perusahaan,
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s')
            );
        }
        $query = $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        if ($query) {
            $this->session->set_flashdata('insert_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        // }else{
        //     // $config['upload_path'] = './assets/upload/logo/';
        //     // $config['allowed_types'] = 'jpg|png|jpeg';
        //     // $this->upload->initialize($config);
        //     // $upload_logo = $this->upload->do_upload('logo');
        //     // $logo = $this->upload->data('file_name');
        //     // if($upload_logo){
        //     //     $perusahaan = array(
        //     //         'nama_perusahaan' => $this->input->post('nama_perusahaan'),
        //     //         'email' => $this->input->post('email'),
        //     //         'logo_perusahaan' => $logo,
        //     //         'telp_perusahaan' => $this->input->post('telp_perusahaan'),
        //     //         'created' => date('Y-m-d H:i:s'),
        //     //         'updated' => date('Y-m-d H:i:s')
        //     //     );
        //     //     $insert_perusahaan = $this->db->insert('tbl_perusahaan',$perusahaan);
        //         // if($insert_perusahaan){
        //             if($this->input->post('logo_poster')){
        //                 $config['upload_path'] = './assets/upload/poster/';
        //                 $config['allowed_types'] = 'jpg';
        //                 $this->upload->initialize($config);
        //                 $insert_logo = $this->upload->do_upload('poster');        
        //                 $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
        //                 $poster = $this->upload->data('file_name');
        //                 $data = array(
        //                         'posisi' 	=> $this->input->post('posisi'),
        //                         'deadline' => $this->input->post('deadline'),
        //                         'lokasi' 	=> $this->input->post('lokasi'),
        //                         'syarat' 	=> $this->input->post('syarat'),
        //                         'deskripsi' 	=> $this->input->post('deskripsi'),
        //                         'informasi' 	=> $this->input->post('informasi'),
        //                         'status' 	=> 'Menunggu Konfirmasi',
        //                         'prodi' 	=> $this->input->post('prodi'),
        //                         'poster'   => $poster,
        //                         'jenis'   => "vacancy",
        //                         // 'id_perusahaan' => $id['id_perusahaan'],
        //                         'created' => date('Y-m-d H:i:s'),
        //                         'updated' => date('Y-m-d H:i:s')
        //                 );
        // }else{
        //     $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
        //     $data = array(
        //             'posisi' 	=> $this->input->post('posisi'),
        //             'deadline' => $this->input->post('deadline'),
        //             'lokasi' 	=> $this->input->post('lokasi'),
        //             'syarat' 	=> $this->input->post('syarat'),
        //             'deskripsi' 	=> $this->input->post('deskripsi'),
        //             'informasi' 	=> $this->input->post('informasi'),
        //             'status' 	=> 'Menunggu Konfirmasi',
        //             'prodi' 	=> $this->input->post('prodi'),
        //             'jenis'   => "vacancy",
        //             'id_perusahaan' => $id['id_perusahaan'],
        //             'created' => date('Y-m-d H:i:s'),
        //             'updated' => date('Y-m-d H:i:s')
        //     );
        // }
        $query = $this->db->where('id_loker', $id)->update('tbl_loker', $data);
        if ($query) {
            $this->session->set_flashdata('insert_loker', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        // }else{
        //     $this->session->set_flashdata('failed',"Tambah Gagal");
        // }
        // }else{
        //     $this->session->set_flashdata('failed',"Tambah Gagal");
        // }   

        redirect('admin/loker');
    }

    public function deleteVacancy($id)
    {
        $query = $this->db->where('id_loker', $id)->delete('tbl_loker');
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/loker');
    }

    public function cv($id)
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['akun'] = $this->db->where('id_akun', $id)->get('tbl_akun')->row();
                $data['berkas'] = $this->db->where('id_akun', $id)->get('tbl_berkas')->result();
                $data['pendidikan'] = $this->db->where('id_akun', $id)->get('tbl_pendidikan')->result();
                $data['organisasi'] = $this->db->where('id_akun', $id)->get('tbl_organisasi')->result();
                $data['prestasi'] = $this->db->where('id_akun', $id)->get('tbl_prestasi')->result();
                $data['sertifikat'] = $this->db->where('id_akun', $id)->get('tbl_sertifikat')->result();
                $data['kerja'] = $this->db->where('id_akun', $id)->get('tbl_kerja')->result();
                // $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_perusahaan'))->get('loker')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/cv', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function jobfair()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.nama_perusahaan')->from('tbl_loker')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('jenis', 'Job Fair 2021')->order_by('tbl_loker.created', 'DESC')->get()->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/jobfair', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function addPost()
    {
        $config['upload_path'] = './assets/upload/post/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $this->upload->initialize($config);
        $this->upload->do_upload('gambar');
        $data = array(
            'judul' => $this->input->post('judul'),
            'headline'     => $this->input->post('headline'),
            'konten'     => $this->input->post('konten'),
            'user_post' => $this->session->userdata('nama'),
            'gambar' => $this->upload->data('file_name'),
            'created'   => date('Y-m-d H:i:s'),
            'updated'   => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_artikel', $data);
        if ($query) {
            $this->session->set_flashdata('insert_artikel', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/post');
    }

    public function addJobfair()
    {
        $ada_perusahaan = $this->db->where('nama_perusahaan', $this->input->post('nama_perusahaan'))->get('tbl_perusahaan')->row_array();
        if ($ada_perusahaan) {
            $id_perusahaan = $ada_perusahaan['id_perusahaan'];
            $config['upload_path'] = './assets/upload/poster/';
            $config['allowed_types'] = 'jpg';
            $this->upload->initialize($config);
            $this->upload->do_upload('poster');
            $poster = $this->upload->data('file_name');
            $data = array(
                'posisi'     => $this->input->post('posisi'),
                'deadline' => $this->input->post('deadline'),
                'lokasi'     => $this->input->post('lokasi'),
                'syarat'     => $this->input->post('syarat'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'informasi'     => $this->input->post('informasi'),
                'status'     => 'Menunggu Konfirmasi',
                'prodi'     => $this->input->post('prodi'),
                'poster'   => $poster,
                'jenis'   => "jobfair",
                'id_perusahaan' => $id_perusahaan,
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
            $config['upload_path'] = './assets/upload/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->upload->initialize($config);
            $upload_logo = $this->upload->do_upload('logo');
            $logo = $this->upload->data('file_name');
            if ($upload_logo) {
                $perusahaan = array(
                    'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                    'email' => $this->input->post('email'),
                    'logo_perusahaan' => $logo,
                    'telp_perusahaan' => $this->input->post('telp_perusahaan'),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s')
                );
                $insert_perusahaan = $this->db->insert('tbl_perusahaan', $perusahaan);
                if ($insert_perusahaan) {
                    $config['upload_path'] = './assets/upload/poster/';
                    $config['allowed_types'] = 'jpg';
                    $this->upload->initialize($config);
                    $insert_logo = $this->upload->do_upload('poster');
                    $id = $this->db->where('created', date('Y-m-d H:i:s'))->get('tbl_perusahaan')->row_array();
                    $poster = $this->upload->data('file_name');
                    $data = array(
                        'posisi'     => $this->input->post('posisi'),
                        'deadline' => $this->input->post('deadline'),
                        'lokasi'     => $this->input->post('lokasi'),
                        'syarat'     => $this->input->post('syarat'),
                        'deskripsi'     => $this->input->post('deskripsi'),
                        'informasi'     => $this->input->post('informasi'),
                        'status'     => 'Menunggu Konfirmasi',
                        'prodi'     => $this->input->post('prodi'),
                        'poster'   => $poster,
                        'jenis'   => "jobfair",
                        'id_perusahaan' => $id['id_perusahaan'],
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
                    $this->session->set_flashdata('failed', "Tambah Gagal");
                }
            } else {
                $this->session->set_flashdata('failed', "Tambah Gagal");
            }
        }
        redirect('admin/jobfair');
    }

    public function verifikasi($id)
    {
        $this->db->set('status', 'y');
        $this->db->where('id_perusahaan', $id);
        $this->db->update('tbl_perusahaan');
        $toemail = $this->db->select('*')->from('tbl_perusahaan')->get()->row_array();
        $message = "<div style='margin:0;padding:0' bgcolor='#FFFFFF'><table width='100%' height='100%' style='min-width:348px' border='0' cellspacing='0' cellpadding='0' lang='en'><tbody><tr height='32' style='height:32px'><td></td></tr><tr align='center'><td><div><div></div></div><table border='0' cellspacing='0' cellpadding='0' style='padding-bottom:20px;max-width:516px;min-width:220px'><tbody><tr><td width='8' style='width:8px'></td><td><div style='background-color:#ffffff;direction:ltr;padding:16px;margin-bottom:8px'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tbody><tr><td style='vertical-align:top'></td><td width='13' style='width:13px'></td><td style='direction:ltr'><span></span> <span></span></span></td></tr></tbody></table></div><div style='border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px' align='center' class='m_663491267144960093mdv2rw'><div style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word'><div style='text-align:center;padding-bottom:16px;line-height:0'></div><div style='font-size:24px'>Yth. " . $toemail['nama_perusahaan'] . "</div><table align='center' style='margin-top:8px'><tbody><tr style='line-height:normal'><td align='right' style='padding-right:8px'></td><td><a style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px'>" . $toemail['nama_perusahaan'] . "</a></td></tr></tbody></table></div><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left'>Akun anda sudah diverifikasi oleh Admin, silahkan untuk login ke website kami. Terima Kasih<div style='padding-top:32px;text-align:center'><a href='https://cdc.itenas.ac.id'style='font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#d94235;border-radius:5px;min-width:90px' target='_blank' data-saferedirecturl='https://cdc.itenas.ac.id'>cdc.itenas.ac.id</a></div></div></div><div style='text-align:left'><div style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center'><div></div><div style='direction:ltr'><a class='m_663491267144960093afal' style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center'></a></div></div></div></td><td width='8' style='width:8px'></td></tr></tbody></table></td></tr><tr height='32' style='height:32px'><td></td></tr></tbody></table></div>";
        $config['smtp_host'] = 'cdc.itenas.ac.id';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'cdc@cdc.itenas.ac.id';
        $config['smtp_pass'] = 'JsS5v+EvZ)b5';
        $this->email->initialize($config);
        $this->email->from('cdc@cdc.itenas.ac.id', 'CDC Itenas');
        $this->email->to($toemail['email']);
        $this->email->subject('CDC Itenas Verifikasi Akun ' . $toemail['nama_perusahaan'] . '');
        $this->email->set_mailtype("html");
        $this->email->message($message);

        //Send mail 
        if ($this->email->send()) {
            $this->session->set_flashdata("aktivasi_akun", TRUE);
            // $this->session->set_flashdata("draft","Email berhasil terkirim.");
            //return true;
            redirect('admin/perusahaan');
        } else {
            echo $this->email->print_debugger();
            die;
            // $this->session->set_flashdata("notifGagal","Email gagal dikirim."); 
        }
    }

    public function post()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('admin')) {
                $data['artikel'] = $this->db->get('tbl_artikel')->result();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/post', $data);
                $this->load->view('admin/templates/js');
                $this->load->view('admin/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function editPost($id)
    {
        if ($this->input->post('gambar')) {
            $config['upload_path'] = './assets/upload/post/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar');
            $data = array(
                'judul' => $this->input->post('judul'),
                'headline'     => $this->input->post('headline'),
                'konten'     => $this->input->post('konten'),
                'user_post' => $this->session->userdata('nama'),
                'gambar' => $this->upload->data('file_name'),
                'created'   => $this->input->post('created'),
                'updated'   => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'headline'     => $this->input->post('headline'),
                'konten'     => $this->input->post('konten'),
                'user_post' => $this->session->userdata('nama'),
                'created'   =>  $this->input->post('created'),
                'updated'   => date('Y-m-d H:i:s')
            );
        }
        $query = $this->db->where('id_artikel', $id)->update('tbl_artikel', $data);
        if ($query) {
            $this->session->set_flashdata('insert_artikel', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/post');
    }

    public function identitasDiri($id)
    {

        if ($_FILES["pas_foto"]["name"]) {
            $this->upload_pasfoto();
            $data = array(
                'nama' => $this->input->post('nama'),
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
                'pas_foto' => $this->upload->data('file_name'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'agama' => $this->input->post('agama'),
                'email' => $this->input->post('email'),
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
                'updated' => date('Y-m-d H:i:s')
            );
        }

        $query = $this->db->where('id_akun', $id)->update('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('admin/cv/' . $id);
    }

    public function upload_pasfoto()
    {
        $nama_file = str_replace(" ", "_", "EDITEDADMIN_" . "PASFOTO");
        $config['upload_path'] = './assets/upload/pas_foto/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('pas_foto');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('admin/cv');
        }
    }

    public function upload_poster()
    {
        $nama_file = date("dMYHis");
        $config['upload_path'] = './assets/upload/iklan/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('poster');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function addPendidikan($id)
    {
        $data = array(
            'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
            'tempat_pendidikan' => $this->input->post('tempat_pendidikan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'id_akun' => $id,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_pendidikan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $id);
    }

    public function addKerja($id)
    {
        $data = array(
            'riwayat_kerja' => $this->input->post('riwayat_kerja'),
            'tahun' => $this->input->post('tahun'),
            'id_akun' => $id,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_kerja', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/' . $id);
    }

    public function deleteKerja($id, $akun)
    {
        $query = $this->db->where('id_kerja', $id)->delete('tbl_kerja');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function updatePendidikan($id, $akun)
    {
        $data = array(
            'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
            'tempat_pendidikan' => $this->input->post('tempat_pendidikan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_pendidikan', $id)->update('tbl_pendidikan', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function deletePendidikan($id, $akun)
    {
        $query = $this->db->where('id_pendidikan', $id)->delete('tbl_pendidikan');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function addOrganisasi($id)
    {
        $data = array(
            'nama_organisasi' => $this->input->post('nama_organisasi'),
            'jabatan' => $this->input->post('jabatan'),
            'tahun_aktif' => $this->input->post('tahun_aktif'),
            'id_akun' => $id,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_organisasi', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $id);
    }

    public function updateOrganisasi($id, $akun)
    {
        $data = array(
            'nama_organisasi' => $this->input->post('nama_organisasi'),
            'jabatan' => $this->input->post('jabatan'),
            'tahun_aktif' => $this->input->post('tahun_aktif'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_organisasi', $id)->update('tbl_organisasi', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function deleteOrganisasi($id, $akun)
    {
        $query = $this->db->where('id_organisasi', $id)->delete('tbl_organisasi');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function addPrestasi($id)
    {
        $this->upload_prestasi();
        $data = array(
            'nama_prestasi' => $this->input->post('nama_prestasi'),
            'file' => $this->upload->data('file_name'),
            'id_akun' => $id,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_prestasi', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $id);
    }

    public function deletePrestasi($id, $file, $akun)
    {
        unlink('assets/upload/prestasi/' . $file);
        $query = $this->db->where('id_prestasi', $id)->delete('tbl_prestasi');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function upload_prestasi()
    {
        $nama_file = str_replace(" ", "_", $this->session->admindata('nama') . "_" . "PRESTASI");
        $config['upload_path'] = './assets/upload/prestasi/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('file');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('admin/cv');
        }
    }

    public function addSertifikat($id)
    {
        $this->upload_sertifikat();
        $data = array(
            'nama_sertifikat' => $this->input->post('nama_sertifikat'),
            'file' => $this->upload->data('file_name'),
            'id_akun' => $id,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_sertifikat', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $id);
    }

    public function deleteSertifikat($id, $file, $akun)
    {
        unlink('assets/upload/sertifikat/' . $file);
        $query = $this->db->where('id_sertifikat', $id)->delete('tbl_sertifikat');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function upload_sertifikat()
    {
        $nama_file = str_replace(" ", "_", $this->session->admindata('nama') . "_" . "SERTIFIKAT");
        $config['upload_path'] = './assets/upload/sertifikat/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('file');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('admin/cv');
        }
    }

    public function addBerkas($id)
    {
        $this->upload_berkas();
        $data = array(
            'nama_berkas' => $this->input->post('nama_berkas'),
            'file' => $this->upload->data('file_name'),
            'id_akun' => $id,
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_berkas', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $id);
    }

    public function updateBerkas($id, $akun)
    {

        if ($_FILES["berkas"]["name"]) {
            $this->upload_berkas();
            $data = array(
                'file' => $this->upload->data('file_name'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('admin/cv/' . $akun);
        }
        $query = $this->db->where('id_berkas', $id)->update('tbl_berkas', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function deleteBerkas($id, $file, $akun)
    {
        unlink('assets/upload/berkas/' . $file);
        $query = $this->db->where('id_berkas', $id)->delete('tbl_berkas');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('admin/cv/' . $akun);
    }

    public function upload_berkas()
    {
        $nama_file = str_replace(" ", "_", "editedADMIN_" . $this->input->post('nama_berkas'));
        $config['upload_path'] = './assets/upload/berkas/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('berkas');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('admin/cv');
        }
    }

    public function update_stand($id)
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
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_cp($id)
    {
        $this->upload_cp();
        $data = array(
            'file_cp' => $this->upload->data('file_name'),
            'jenis_cp' => $this->input->post('jenis_cp'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_perusahaan', $id)->update('tbl_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_cp()
    {
        $config['upload_path'] = './assets/upload/file_cp/';
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'pdf|mp4';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('file_cp');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('admin/cv');
        }
    }

    public function upload_slideshow()
    {
        $config['upload_path'] = './assets/upload/slideshow/';
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('slideshow');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('user/cv');
        }
    }
}
