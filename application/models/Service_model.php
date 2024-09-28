<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{

    public function create_order($data)
    {
        return $this->db->insert('service_orders', $data);
    }

    public function get_orders_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('service_orders')->result();
    }
}
