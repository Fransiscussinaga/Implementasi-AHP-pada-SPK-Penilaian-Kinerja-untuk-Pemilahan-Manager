<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Periode extends CI_Controller
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
        $this->load->model('periode_model');
    }

    public function index()
    {
        $data['periode'] = $this->periode_model->get_all_periode()->result();
        $this->load->view('periode/index', $data);
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('periode_penilaian', 'Periode Penilaian', 'required');

        $this->form_validation->set_message('required', 'Isi dulu %s');

        if ($this->form_validation->run()) {
            $params = array(
                'periode_penilaian' => $this->input->post('periode_penilaian', TRUE),
            );
            $this->periode_model->add_periode($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('periode/tambah');
        } else {
            $this->load->view('periode/tambah');
        }
    }

    public function ubah($id_periode = '')
    {
        $data['periode'] = $this->periode_model->get_periode($id_periode)->row();

        if (empty($data['periode'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('periode_penilaian', 'Periode Penilaian', 'required');

            $this->form_validation->set_message('required', 'Isi dulu %s');

            if ($this->form_validation->run()) {
                $params = array(
                    'periode_penilaian' => $this->input->post('periode_penilaian', TRUE),
                );
                $this->periode_model->update_periode($id_periode, $params);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('periode/ubah/' . $id_periode);
            } else {
                $this->load->view('periode/ubah', $data);
            }
        }
    }

    public function hapus($id_periode = '')
    {
        $periode = $this->periode_model->get_periode($id_periode);

        if ($periode->num_rows() > 0) {
            $this->periode_model->delete_periode($id_periode);
            redirect('periode');
        } else {
            show_404();
        }
    }
}


/* End of file Periode.php */
/* Location: ./application/controllers/Periode.php */