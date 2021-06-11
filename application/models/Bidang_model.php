<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bidang_model extends CI_Model
{

    public function get_all_bidang($sort = 'asc')
    {
        $this->db->order_by('id_bidang', $sort);
        return $this->db->get('bidang');
    }

    public function get_bidang($id_bidang)
    {
        $this->db->where('id_bidang', $id_bidang);
        return $this->db->get('bidang');
    }

    public function add_bidang($params)
    {
        return $this->db->insert('bidang', $params);
    }

    public function update_bidang($id_bidang, $params)
    {
        $this->db->where('id_bidang', $id_bidang);
        return $this->db->update('bidang', $params);
    }

    public function delete_bidang($id_bidang)
    {
        $this->db->where('id_bidang', $id_bidang);
        return $this->db->delete('bidang');
    }
}

/* End of file Bidang_model.php */
/* Location: ./application/models/Bidang_model.php */