<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user($email)
    {
        $this->db->where('email', $email);
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function get_all_users()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function get_active_users()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function create_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($username, $data)
    {
        $this->db->where('username', $username);
        return $this->db->update('users', $data);
    }

    public function soft_delete_user($username)
    {
        $this->db->where('username', $username);
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        return $this->db->update('users');
    }
}
