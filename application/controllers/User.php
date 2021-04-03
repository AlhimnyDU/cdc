<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            if ($this->session->userdata('user')) {
                $data['mengikuti'] = $this->db->where('role', 'peserta')->where('id_event', 1)->where('id_peserta', $this->session->userdata('id_akun'))->get('event_perusahaan')->row();
                $data['akun'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_akun')->row();
                $data['berkas'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_berkas')->result();
                $data['pendidikan'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_pendidikan')->result();
                $data['organisasi'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_organisasi')->result();
                $data['prestasi'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_prestasi')->result();
                $data['sertifikat'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_sertifikat')->result();
                $data['kerja'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_kerja')->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/home', $data);
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer', $data);
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function pengajuan()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('user')) {
                $data['akun'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_akun')->row();
                $data['pengajuan'] = $this->db->select('tbl_lamaran.*,tbl_loker.posisi,tbl_perusahaan.nama_perusahaan')->join('tbl_loker', 'tbl_loker.id_loker=tbl_lamaran.id_loker', 'left')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('id_akun', $this->session->userdata('id_akun'))->order_by('created', 'DESC')->get('tbl_lamaran')->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/pengajuan', $data);
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer', $data);
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function loker()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('user')) {
                $data['akun'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_akun')->row();
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.*')->from('tbl_loker')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('tbl_loker.status', 'Disetujui')->where('tbl_loker.jenis', 'vacancy')->order_by('tbl_loker.created', 'DESC')->get()->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/loker', $data);
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer', $data);
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
            if ($this->session->userdata('user')) {
                $data['event'] = $this->db->get('tbl_event')->result();
                $data['mengikuti'] = $this->db->where('role', 'peserta')->where('id_event', 1)->where('id_peserta', $this->session->userdata('id_akun'))->get('event_perusahaan')->result();
                $data['akun'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_akun')->row();
                $data['loker'] = $this->db->select('tbl_loker.*, tbl_perusahaan.*')->from('tbl_loker')->join('tbl_perusahaan', 'tbl_perusahaan.id_perusahaan=tbl_loker.id_perusahaan', 'left')->where('tbl_loker.status', 'Disetujui')->where('tbl_loker.jenis', 'jobfair')->get()->result();
                $data['jobfair'] = $this->db->where('role', 'peserta')->where('id_event', 1)->where('id_peserta', $this->session->userdata('id_akun'))->get('event_perusahaan')->row();
                // $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_perusahaan'))->get('loker')->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/jobfair', $data);
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer', $data);
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
            'role'     => "peserta",
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('event_perusahaan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_peserta', "Tambah Berhasil");
            $this->session->set_userdata('mengikuti', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tidakMengikuti($id)
    {
        $query = $this->db->where('id_event', $id)->where('id_perusahaan', $this->session->userdata('id_akun'))->delete('event_perusahaan');
        if ($query) {
            $this->session->set_flashdata('delete_peserta', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('user/jobfair');
    }

    public function cv()
    {
        if ($this->session->userdata('nama')) {
            if ($this->session->userdata('user')) {
                $data['akun'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_akun')->row();
                $data['berkas'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_berkas')->result();
                $data['pendidikan'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_pendidikan')->result();
                $data['organisasi'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_organisasi')->result();
                $data['prestasi'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_prestasi')->result();
                $data['sertifikat'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_sertifikat')->result();
                $data['kerja'] = $this->db->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_kerja')->result();
                // $data['loker'] = $this->db->where('id_perusahaan', $this->session->userdata('id_perusahaan'))->get('loker')->result();
                $this->load->view('user/templates/header');
                $this->load->view('user/cv', $data);
                $this->load->view('user/templates/js');
                $this->load->view('user/templates/footer');
            } else {
                redirect('welcome');
            }
        } else {
            redirect('login');
        }
    }

    public function identitasDiri()
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
                'universitas' => $this->input->post('universitas'),
                'fakultas' => $this->input->post('fakultas'),
                'prodi' => $this->input->post('prodi'),
                'ipk' => $this->input->post('ipk'),
                'nomor_induk' => $this->input->post('nomor_induk'),
                'semester' => $this->input->post('semester'),
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
                'universitas' => $this->input->post('universitas'),
                'fakultas' => $this->input->post('fakultas'),
                'prodi' => $this->input->post('prodi'),
                'ipk' => $this->input->post('ipk'),
                'nomor_induk' => $this->input->post('nomor_induk'),
                'semester' => $this->input->post('semester'),
                'updated' => date('Y-m-d H:i:s')
            );
        }

        $query = $this->db->where('id_akun', $this->session->userdata('id_akun'))->update('tbl_akun', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', "Tambah Berhasil");
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('user/cv');
    }

    public function upload_pasfoto()
    {
        $nama_file = str_replace(" ", "_", $this->session->userdata('nama') . "_" . "PASFOTO");
        $config['upload_path'] = './assets/upload/pas_foto/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('pas_foto');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('user/cv');
        }
    }

    public function addPendidikan()
    {
        $data = array(
            'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
            'tempat_pendidikan' => $this->input->post('tempat_pendidikan'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'id_akun' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_pendidikan', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function addKerja()
    {
        $data = array(
            'riwayat_kerja' => $this->input->post('riwayat_kerja'),
            'tahun' => $this->input->post('tahun'),
            'id_akun' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_kerja', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function deleteKerja($id)
    {
        $query = $this->db->where('id_kerja', $id)->delete('tbl_kerja');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function updatePendidikan($id)
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
        redirect('user/cv');
    }

    public function deletePendidikan($id)
    {
        $query = $this->db->where('id_pendidikan', $id)->delete('tbl_pendidikan');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function addOrganisasi()
    {
        $data = array(
            'nama_organisasi' => $this->input->post('nama_organisasi'),
            'jabatan' => $this->input->post('jabatan'),
            'tahun_aktif' => $this->input->post('tahun_aktif'),
            'id_akun' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_organisasi', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function updateOrganisasi($id)
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
        redirect('user/cv');
    }

    public function deleteOrganisasi($id)
    {
        $query = $this->db->where('id_organisasi', $id)->delete('tbl_organisasi');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function addPrestasi()
    {
        $this->upload_prestasi();
        $data = array(
            'nama_prestasi' => $this->input->post('nama_prestasi'),
            'file' => $this->upload->data('file_name'),
            'id_akun' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_prestasi', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function deletePrestasi($id, $file)
    {
        unlink('assets/upload/prestasi/' . $file);
        $query = $this->db->where('id_prestasi', $id)->delete('tbl_prestasi');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function upload_prestasi()
    {
        $nama_file = str_replace(" ", "_", $this->session->userdata('nama') . "_" . "PRESTASI");
        $config['upload_path'] = './assets/upload/prestasi/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('file');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('user/cv');
        }
    }

    public function addSertifikat()
    {
        $this->upload_sertifikat();
        $data = array(
            'nama_sertifikat' => $this->input->post('nama_sertifikat'),
            'file' => $this->upload->data('file_name'),
            'id_akun' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_sertifikat', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function deleteSertifikat($id, $file)
    {
        unlink('assets/upload/sertifikat/' . $file);
        $query = $this->db->where('id_sertifikat', $id)->delete('tbl_sertifikat');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function upload_sertifikat()
    {
        $nama_file = str_replace(" ", "_", $this->session->userdata('nama') . "_" . "SERTIFIKAT");
        $config['upload_path'] = './assets/upload/sertifikat/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('file');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('user/cv');
        }
    }

    public function addBerkas()
    {
        $this->upload_berkas();
        $data = array(
            'nama_berkas' => $this->input->post('nama_berkas'),
            'file' => $this->upload->data('file_name'),
            'id_akun' => $this->session->userdata('id_akun'),
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_berkas', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function updateBerkas($id)
    {

        if ($_FILES["berkas"]["name"]) {
            $this->upload_berkas();
            $data = array(
                'file' => $this->upload->data('file_name'),
                'updated' => date('Y-m-d H:i:s')
            );
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('user/cv');
        }
        $query = $this->db->where('id_berkas', $id)->update('tbl_berkas', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function deleteBerkas($id, $file)
    {
        unlink('assets/upload/berkas/' . $file);
        $query = $this->db->where('id_berkas', $id)->delete('tbl_berkas');
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect('user/cv');
    }

    public function upload_berkas()
    {
        $nama_file = str_replace(" ", "_", $this->session->userdata('nama') . "_" . $this->input->post('nama_berkas'));
        $config['upload_path'] = './assets/upload/berkas/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $upload = $this->upload->do_upload('berkas');
        if (empty($upload)) {
            $this->session->set_flashdata('failed', "Tambah Gagal");
            redirect('user/cv');
        }
    }
    public function daftarMagang($id)
    {
        $nama_file = str_replace(" ", "_", $this->session->userdata('nama') . "_berkasMagang");
        $config['upload_path'] = './assets/upload/berkas/';
        $config['file_name'] = $nama_file;
        $config['allowed_types'] = 'pdf';
        $this->upload->initialize($config);
        $jumlah_berkas = count($_FILES['berkas']['name']);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
            if (!empty($_FILES['berkas']['name'][$i])) {

                $_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
                $_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
                $_FILES['file']['size'] = $_FILES['berkas']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $berkas = array(
                        'nama_berkas' =>  $_POST['nama_berkas'][$i],
                        'file' => $this->upload->data('file_name'),
                        'id_akun' => $this->session->userdata('id_akun'),
                        'updated' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('tbl_berkas', $berkas);
                }
            }
        }

        $cv = array(
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
            'universitas' => $this->input->post('universitas'),
            'fakultas' => $this->input->post('fakultas'),
            'prodi' => $this->input->post('prodi'),
            'ipk' => $this->input->post('ipk'),
            'keahlian' => $this->input->post('keahlian'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'semester' => $this->input->post('semester'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_akun', $this->session->userdata('id_akun'))->update('tbl_akun', $cv);

        $data = array(
            'id_loker' => $id,
            'id_akun' => $this->session->userdata('id_akun'),
            'status' => "Menunggu Verifikasi",
            'created' => date('Y-m-d H:i:s'),
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('tbl_lamaran', $data);
        if ($query) {
            $this->session->set_flashdata('insert_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', TRUE);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function ajukan($id)
    {
        $check = $this->db->where('id_loker', $id)->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_lamaran')->row();
        if ($check) {
            $this->session->set_flashdata('sudah_mengajukan', TRUE);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // $ijazah = $this->db->where('nama_berkas', "Photocopy ijazah legalisir")->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_berkas')->row();
            // $transkrip = $this->db->where('nama_berkas', "Transkrip Nilai")->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_berkas')->row();
            // $psikotest = $this->db->where('nama_berkas', "Hasil Psikotest")->where('id_akun', $this->session->userdata('id_akun'))->get('tbl_berkas')->row();
            // if (empty($ijazah)) {
            //     $this->session->set_flashdata('lengkapi_persyaratan', TRUE);
            //     redirect($_SERVER['HTTP_REFERER']);
            // } else {
            //     $data = array(
            //         'id_loker' => $id,
            //         'id_akun' => $this->session->userdata('id_akun'),
            //         'status' => "Menunggu Verifikasi",
            //         'created' => date('Y-m-d H:i:s'),
            //         'updated' => date('Y-m-d H:i:s')
            //     );
            //     $query = $this->db->insert('tbl_lamaran', $data);
            //     if ($query) {
            //         $this->session->set_flashdata('insert_data', TRUE);
            //     } else {
            //         $this->session->set_flashdata('failed', TRUE);
            //     }
            // }
            $data = array(
                'id_loker' => $id,
                'id_akun' => $this->session->userdata('id_akun'),
                'status' => "Menunggu Verifikasi",
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s')
            );
            $query = $this->db->insert('tbl_lamaran', $data);
            if ($query) {
                $this->session->set_flashdata('insert_data', TRUE);
            } else {
                $this->session->set_flashdata('failed', TRUE);
            }
            redirect('user/pengajuan');
        }
    }

    public function terima_lamaran($id_lamaran)
    {
        $data = array(
            'status' => "Pelamar Menerima",
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_lamaran', $id_lamaran)->update('tbl_lamaran', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('user/pengajuan');
    }

    public function tolak_lamaran($id_lamaran)
    {
        $data = array(
            'status' => "Pelamar Menolak",
            'updated' => date('Y-m-d H:i:s')
        );
        $query = $this->db->where('id_lamaran', $id_lamaran)->update('tbl_lamaran', $data);
        if ($query) {
            $this->session->set_flashdata('update_data', TRUE);
        } else {
            $this->session->set_flashdata('failed', "Tambah Gagal");
        }
        redirect('user/pengajuan');
    }
}
