<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Hasil extends CI_Controller
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
        $this->load->model('kriteria_model');
        $this->load->model('karyawan_model');
        $this->load->model('nilai_model');
        $this->load->model('karyawan_kriteria_model');
        $this->load->model('hasil_model');
        $this->load->model('periode_model');
    }

    public function index()
    {
        $this->load->helper('form');

        $id_periode = isset($_GET['id_periode']) ? $_GET['id_periode'] : '';
        $data['id_periode'] = $id_periode;

        if(empty($id_periode)){
            $data['periode'] = $this->periode_model->get_all_periode()->result();
        }else{
            $this->hasil_model->delete_hasil($id_periode);
            $data['karyawan'] = $this->karyawan_model->get_all_karyawan('asc', $id_periode)->result();
            $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();
            $data['data_nilai'] = $this->nilai_model->get_all_nilai()->result();
            $nilai = array();
            $nilai_ahp = array();
            $nilai_prioritas = array();
            $hasil = array();
            foreach ($data['karyawan'] as $row_karyawan) {
                $nilai_total = 0;
                foreach ($data['kriteria'] as $row_kriteria) {
                    $karyawan_kriteria = $this->karyawan_kriteria_model->get_karyawan_kriteria($row_karyawan->id_karyawan, $row_kriteria->id_kriteria)->row();
                    $nilai[$row_karyawan->id_karyawan][$row_kriteria->id_kriteria] = empty($karyawan_kriteria) ? '' : $karyawan_kriteria->nilai;

                    $result = $this->nilai_model->get_nilai($karyawan_kriteria->id_nilai)->row();
                    $nilai_ahp[$row_karyawan->id_karyawan][$row_kriteria->id_kriteria] = empty($result) ? '' : $result->nama;

                    $prioritas = $row_kriteria->prioritas * $result->prioritas;
                    $nilai_prioritas[$row_karyawan->id_karyawan][$row_kriteria->id_kriteria] = number_format($prioritas, 5);

                    $nilai_total += $prioritas;
                }
                $hasil[] = array(
                    "id_karyawan" => $row_karyawan->id_karyawan,
                    "nik" => $row_karyawan->nik,
                    "nama_karyawan" => $row_karyawan->nama_karyawan,
                    "nilai_hasil" => number_format($nilai_total, 5),
                );
                $params = array(
                    "id_karyawan" => $row_karyawan->id_karyawan,
                    "nilai_hasil" => number_format($nilai_total, 5),
                    "id_periode" => $id_periode,
                );
                $this->hasil_model->add_hasil($params);
            }
            $this->array_sort_by_column($hasil, 'nilai_hasil');
            $data['nilai'] = $nilai;
            $data['nilai_ahp'] = $nilai_ahp;
            $data['nilai_prioritas'] = $nilai_prioritas;
            $data['hasil'] = $hasil;
        }
        $this->load->view('hasil/index', $data);
    }

    public function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

    public function cetak($id_periode)
    {
        $data['hasil'] = $this->hasil_model->get_by_nilai($id_periode)->result();
        $data['periode'] = $this->periode_model->get_periode($id_periode)->row();
        $html = $this->load->view('hasil/cetak', $data, TRUE);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan-hasil-penilaian.pdf", array("Attachment" => FALSE));
    }
}


/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */