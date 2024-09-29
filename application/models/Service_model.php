<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{
    public function get_all_orders()
    {
        $query = $this->db->get('service_orders');
        return $query->result_array();
    }

    public function get_orders_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('service_orders');
        return $query->result_array();
    }

    public function create_order($data)
    {
        return $this->db->insert('service_orders', $data);
    }
}
