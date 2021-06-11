<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Anda harus login</div>');
            redirect('login');
        }
        $allowed = array('Admin','Pimpinan');
        if (!in_array($this->session->userdata('role'), $allowed)) {
            redirect('home');
        }
    }

    public function index()
    {
        $this->load->helper('form');

        $this->load->model('hasil_model');
        $this->load->model('periode_model');

        $id_periode = isset($_GET['id_periode']) ? $_GET['id_periode'] : '';

        $data['id_periode'] = $id_periode;
        $data['hasil'] = $this->hasil_model->get_all_hasil('asc', $id_periode)->result();
        $data['periode'] = $this->periode_model->get_all_periode()->result();

        $this->load->view('grafik/index', $data);
    }
}


/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */