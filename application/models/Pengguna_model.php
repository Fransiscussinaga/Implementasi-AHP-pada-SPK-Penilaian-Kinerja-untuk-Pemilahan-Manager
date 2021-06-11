<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pengguna_model extends CI_Model {

    public function get_all_pengguna($sort = 'asc')
    {
        $this->db->order_by('id_admin', $sort);
        return $this->db->get('admin');
    }

    public function get_pengguna($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        return $this->db->get('admin');
    }

    public function add_pengguna($params)
    {
        return $this->db->insert('admin', $params);
    }

    public function update_pengguna($id_admin, $params)
    {
        $this->db->where('id_admin', $id_admin);
        return $this->db->update('admin', $params);
    }

    public function delete_pengguna($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        return $this->db->delete('admin');
    }

    public function get_by_username($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('admin');
    }

    public function cek_unik_username($username, $username_tmp)
    {
        $this->db->where('username', $username);
        $this->db->where('username <>', $username_tmp);
        return $this->db->get('admin');
    }

}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */