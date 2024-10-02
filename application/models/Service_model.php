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

    public function get_orders_product_by_user_id($user_id)
    {
        $this->db->select('product_orders.*, users.name as name_users, product_orders.user_id, products.name as product_name, products.description as product_description');
        $this->db->from('product_orders');
        $this->db->join('products', 'product_orders.product_id = products.id');
        $this->db->join('users', 'product_orders.user_id = users.id');
        $this->db->where('product_orders.user_id', $user_id);
        $this->db->where('product_orders.deleted_at IS NULL');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function create_order_product($data)
    {
        return $this->db->insert('product_orders', $data);
    }
}
