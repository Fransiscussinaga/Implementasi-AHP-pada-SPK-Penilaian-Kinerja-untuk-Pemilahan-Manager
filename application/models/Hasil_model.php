<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Hasil_model extends CI_Model
{

    public function get_all_hasil($sort = 'asc', $id_periode = '')
    {
        $this->db->order_by('id_hasil', $sort);
        $this->db->join('karyawan', 'karyawan.id_karyawan=hasil.id_karyawan', 'left');
        if (!empty($id_periode)) {
            $this->db->where('hasil.id_periode', $id_periode);
        }
        return $this->db->get('hasil');
    }

    public function get_by_nilai($id_periode)
    {
        $this->db->order_by('nilai_hasil', 'desc');
        $this->db->join('karyawan', 'karyawan.id_karyawan=hasil.id_karyawan', 'left');
        $this->db->where('hasil.id_periode', $id_periode);
        return $this->db->get('hasil');
    }

    public function add_hasil($params)
    {
        return $this->db->insert('hasil', $params);
    }

    public function delete_hasil($id_periode)
    {
        $this->db->where('id_periode', $id_periode);
        return $this->db->delete('hasil');
    }
}

/* End of file Hasil_model.php */
/* Location: ./application/models/Hasil_model.php */