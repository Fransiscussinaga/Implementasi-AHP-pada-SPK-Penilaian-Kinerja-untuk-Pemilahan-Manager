<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Karyawan_model extends CI_Model
{

    public function get_all_karyawan($sort = 'asc', $id_periode = '')
    {
        $this->db->order_by('id_karyawan', $sort);
        $this->db->join('bidang', 'bidang.id_bidang=karyawan.id_bidang', 'left');
        $this->db->join('periode', 'periode.id_periode=karyawan.id_periode', 'left');
        if (!empty($id_periode)) {
            $this->db->where('karyawan.id_periode', $id_periode);
        }
        return $this->db->get('karyawan');
    }

    public function get_karyawan($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->join('bidang', 'bidang.id_bidang=karyawan.id_bidang', 'left');
        $this->db->join('periode', 'periode.id_periode=karyawan.id_periode', 'left');
        return $this->db->get('karyawan');
    }

    public function add_karyawan($params)
    {
        $this->db->insert('karyawan', $params);
        return $this->db->insert_id();
    }

    public function update_karyawan($id_karyawan, $params)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->update('karyawan', $params);
    }

    public function delete_karyawan($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->delete('karyawan');
    }
}

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */