<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Karyawan_kriteria_model extends CI_Model {

    public function get_karyawan_kriteria($id_karyawan, $id_kriteria)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('karyawan_kriteria');
    }

    public function add_karyawan_kriteria($params)
    {
        return $this->db->insert('karyawan_kriteria', $params);
    }

    public function update_karyawan_kriteria($id_karyawan, $id_kriteria, $params)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->update('karyawan_kriteria', $params);
    }

    public function get_all_karyawan_kriteria()
    {
        return $this->db->get('karyawan_kriteria');
    }

    public function update_by_id($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('karyawan_kriteria', $params);
    }

}

/* End of file Karyawan_kriteria_model.php */
/* Location: ./application/models/Karyawan_kriteria_model.php */