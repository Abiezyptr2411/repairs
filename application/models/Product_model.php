<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function generate_unique_product_code()
    {
        $code = 'PRD' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));

        while ($this->db->where('product_code', $code)->get('products')->num_rows() > 0) {
            $code = 'PRD' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));
        }

        return $code;
    }

    public function get_products_category_oil()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function get_products_category_engine()
    {
        $this->db->where('deleted_at', NULL);
        $this->db->where('category', 'ENGINE');
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function get_product_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('products');
        return $query->row_array();
    }

    public function create_product($data)
    {
        $data['product_code'] = $this->generate_unique_product_code();
        return $this->db->insert('products', $data);
    }

    public function update_product($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    public function insert_cart_item($user_id, $product_id, $quantity)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('cart');

        if ($query->num_rows() > 0) {
            $existingItem = $query->row();
            return $this->update_cart_item($existingItem->id, $quantity);
        } else {
            $data = [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ];
            return $this->db->insert('cart', $data);
        }
    }

    public function update_cart_item($cart_id, $quantity)
    {
        return $this->db->update('cart', ['quantity' => $quantity], ['id' => $cart_id]);
    }

    public function get_cart_items($user_id)
    {
        $this->db->select('c.product_id, c.quantity, p.product_code, p.name, p.price, p.image_url');
        $this->db->from('cart c');
        $this->db->join('products p', 'c.product_id = p.id');
        $this->db->where('c.user_id', $user_id);
        return $this->db->get()->result();
    }

    public function delete_cart_item($user_id, $product_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('product_id', $product_id);
        return $this->db->delete('cart');
    }
}
