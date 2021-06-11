<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bidang extends CI_Controller
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
        $this->load->model('bidang_model');
    }

    public function index()
    {
        $data['bidang'] = $this->bidang_model->get_all_bidang('desc')->result();
        $this->load->view('bidang/index', $data);
    }

    public function tambah()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('bidang_pekerjaan', 'Bidang Pekerjaan', 'required');

        $this->form_validation->set_message('required', 'Isi dulu %s');

        if ($this->form_validation->run()) {
            $params = array(
                'bidang_pekerjaan' => $this->input->post('bidang_pekerjaan', TRUE),
            );
            $this->bidang_model->add_bidang($params);

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('bidang/tambah');
        } else {
            $this->load->view('bidang/tambah');
        }
    }

    public function ubah($id_bidang = '')
    {
        $data['bidang'] = $this->bidang_model->get_bidang($id_bidang)->row();

        if (empty($data['bidang'])) {
            show_404();
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('bidang_pekerjaan', 'Bidang Pekerjaan', 'required');

            $this->form_validation->set_message('required', 'Isi dulu %s');

            if ($this->form_validation->run()) {
                $params = array(
                    'bidang_pekerjaan' => $this->input->post('bidang_pekerjaan', TRUE),
                );
                $this->bidang_model->update_bidang($id_bidang, $params);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('bidang/ubah/' . $id_bidang);
            } else {
                $this->load->view('bidang/ubah', $data);
            }
        }
    }

    public function hapus($id_bidang = '')
    {
        $bidang = $this->bidang_model->get_bidang($id_bidang);

        if ($bidang->num_rows() > 0) {
            $this->bidang_model->delete_bidang($id_bidang);
            redirect('bidang');
        } else {
            show_404();
        }
    }
}


/* End of file Bidang.php */
/* Location: ./application/controllers/Bidang.php */