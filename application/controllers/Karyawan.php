<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Anda harus login</div>');
            redirect('login');
        }
        $allowed = array('Admin');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            redirect('home');
        }
        $this->load->model('karyawan_model');
        $this->load->model('kriteria_model');
        $this->load->model('karyawan_kriteria_model');
        $this->load->model('periode_model');
        $this->load->model('bidang_model');
        $this->load->model('nilai_model');
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawan_model->get_all_karyawan('desc')->result();
        $this->load->view('karyawan/index', $data);
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();

        $this->form_validation->set_rules('id_periode', 'Periode Penilaian', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('id_bidang', 'Bidang Pekerjaan', 'required');
        foreach ($data['kriteria'] as $row) {
            $this->form_validation->set_rules('kriteria' . $row->id_kriteria, $row->nama_kriteria, 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[1]');
        }
        $this->form_validation->set_rules('userfile', 'Syarat', 'callback_validasi_file');

        $this->form_validation->set_message('required', 'Isi dulu %s');
        $this->form_validation->set_message('numeric', '%s harus angka');
        $this->form_validation->set_message('less_than_equal_to', '%s maksimal 100');
        $this->form_validation->set_message('greater_than_equal_to', '%s minimal 1');

        if ($this->form_validation->run()) {
            $upload = $this->upload->data();
            $file_name = $upload['file_name'];
            $params = array(
                'nik' => $this->input->post('nik', TRUE),
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'id_bidang' => $this->input->post('id_bidang', TRUE),
                'id_periode' => $this->input->post('id_periode', TRUE),
                'syarat' => $file_name,
                'pemimpin_project' => $this->input->post('pemimpin_project', TRUE),
                'minimal_s1' => $this->input->post('minimal_s1', TRUE),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir', TRUE),
            );
            $id_karyawan = $this->karyawan_model->add_karyawan($params);

            foreach ($data['kriteria'] as $row) {
                $params2 = array(
                    'id_karyawan' => $id_karyawan,
                    'id_kriteria' => $row->id_kriteria,
                    'id_nilai' => $this->get_id_nilai($this->input->post('kriteria' . $row->id_kriteria, TRUE)),
                    'nilai' => $this->input->post('kriteria' . $row->id_kriteria, TRUE),
                );
                $this->karyawan_kriteria_model->add_karyawan_kriteria($params2);
            }

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('karyawan/tambah');
        } else {
            $data['bidang'] = $this->bidang_model->get_all_bidang()->result();
            $data['periode'] = $this->periode_model->get_all_periode()->result();
            $this->load->view('karyawan/tambah', $data);
        }
    }

    public function ubah($id_karyawan = '')
    {
        $data['karyawan'] = $this->karyawan_model->get_karyawan($id_karyawan)->row();
        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();

        if (empty($data['karyawan'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_periode', 'Periode Penilaian', 'required');
            $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
            $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('id_bidang', 'Bidang Pekerjaan', 'required');
            foreach ($data['kriteria'] as $row) {
                $this->form_validation->set_rules('kriteria' . $row->id_kriteria, $row->nama_kriteria, 'required|numeric|less_than_equal_to[100]|greater_than_equal_to[1]');
            }
            $userfile = isset($_FILES['userfile']['name']) ? $_FILES['userfile']['name'] : '';
            if (!empty($userfile)) {
                $this->form_validation->set_rules('userfile', 'Syarat', 'callback_validasi_file');
            }

            $this->form_validation->set_message('required', 'Isi dulu %s');
            $this->form_validation->set_message('numeric', '%s harus angka');
            $this->form_validation->set_message('less_than_equal_to', '%s maksimal 100');
            $this->form_validation->set_message('greater_than_equal_to', '%s minimal 1');

            if ($this->form_validation->run()) {
                $karyawan = $data['karyawan'];
                $file_name = $karyawan->syarat;
                if (!empty($userfile)) {
                    if (!empty($file_name)) {
                        unlink('./public/file/' . $file_name);
                    }
                    $upload = $this->upload->data();
                    $file_name = $upload['file_name'];
                }

                $params = array(
                    'nik' => $this->input->post('nik', TRUE),
                    'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                    'id_bidang' => $this->input->post('id_bidang', TRUE),
                    'id_periode' => $this->input->post('id_periode', TRUE),
                    'syarat' => $file_name,
                    'pemimpin_project' => $this->input->post('pemimpin_project', TRUE),
                    'minimal_s1' => $this->input->post('minimal_s1', TRUE),
                    'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir', TRUE),
                );
                $this->karyawan_model->update_karyawan($id_karyawan, $params);

                foreach ($data['kriteria'] as $row) {
                    $karyawan_kriteria = $this->karyawan_kriteria_model->get_karyawan_kriteria($id_karyawan, $row->id_kriteria)->row();
                    if (empty($karyawan_kriteria)) {
                        $params2 = array(
                            'id_karyawan' => $id_karyawan,
                            'id_kriteria' => $row->id_kriteria,
                            'id_nilai' => $this->get_id_nilai($this->input->post('kriteria' . $row->id_kriteria, TRUE)),
                            'nilai' => $this->input->post('kriteria' . $row->id_kriteria, TRUE),
                        );
                        $this->karyawan_kriteria_model->add_karyawan_kriteria($params2);
                    } else {
                        $params2 = array(
                            'id_nilai' => $this->get_id_nilai($this->input->post('kriteria' . $row->id_kriteria, TRUE)),
                            'nilai' => $this->input->post('kriteria' . $row->id_kriteria, TRUE),
                        );
                        $this->karyawan_kriteria_model->update_karyawan_kriteria($id_karyawan, $row->id_kriteria, $params2);
                    }
                }

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('karyawan/ubah/' . $id_karyawan);
            } else {
                $nilai = array();
                foreach ($data['kriteria'] as $row) {
                    $karyawan_kriteria = $this->karyawan_kriteria_model->get_karyawan_kriteria($id_karyawan, $row->id_kriteria)->row();
                    $nilai[$row->id_kriteria] = empty($karyawan_kriteria) ? '' : $karyawan_kriteria->nilai;
                }
                $data['nilai'] = $nilai;
                $data['bidang'] = $this->bidang_model->get_all_bidang()->result();
                $data['periode'] = $this->periode_model->get_all_periode()->result();
                $this->load->view('karyawan/ubah', $data);
            }
        }
    }

    public function hapus($id_karyawan = '')
    {
        $karyawan = $this->karyawan_model->get_karyawan($id_karyawan);

        if ($karyawan->num_rows() > 0) {
            $karyawan = $karyawan->row();
            if (!empty($karyawan->syarat)) {
                unlink('./public/file/' . $karyawan->syarat);
            }
            $this->karyawan_model->delete_karyawan($id_karyawan);
            redirect('karyawan');
        } else {
            show_404();
        }
    }

    public function detail($id_karyawan = '')
    {
        $data['karyawan'] = $this->karyawan_model->get_karyawan($id_karyawan)->row();

        if (empty($data['karyawan'])) {
            show_404();
        } else {
            $kriteria = $this->kriteria_model->get_all_kriteria()->result();
            $nilai = array();
            foreach ($kriteria as $row) {
                $karyawan_kriteria = $this->karyawan_kriteria_model->get_karyawan_kriteria($id_karyawan, $row->id_kriteria)->row();
                $nilai[$row->id_kriteria] = empty($karyawan_kriteria) ? '' : $karyawan_kriteria->nilai;
            }
            $data['nilai'] = $nilai;
            $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();
            $this->load->view('karyawan/detail', $data);
        }
    }

    public function get_id_nilai($nilai)
    {
        $nilai = $this->nilai_model->get_rentang_nilai($nilai)->row();
        if (empty($nilai)) {
            return null;
        } else {
            return $nilai->id_nilai;
        }
    }

    public function validasi_file()
    {
        $config['upload_path'] = './public/file/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048;
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validasi_file', $this->upload->display_errors());
            return FALSE;
        }
    }
}


/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */