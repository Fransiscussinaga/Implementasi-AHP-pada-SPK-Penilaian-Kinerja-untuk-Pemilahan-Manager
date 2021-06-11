<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Periode_model extends CI_Model
{

    public function get_all_periode($sort = 'asc')
    {
        $this->db->order_by('id_periode', $sort);
        return $this->db->get('periode');
    }

    public function get_periode($id_periode)
    {
        $this->db->where('id_periode', $id_periode);
        return $this->db->get('periode');
    }

    public function add_periode($params)
    {
        return $this->db->insert('periode', $params);
    }

    public function update_periode($id_periode, $params)
    {
        $this->db->where('id_periode', $id_periode);
        return $this->db->update('periode', $params);
    }

    public function delete_periode($id_periode)
    {
        $this->db->where('id_periode', $id_periode);
        return $this->db->delete('periode');
    }
}

/* End of file Periode_model.php */
/* Location: ./application/models/Periode_model.php */