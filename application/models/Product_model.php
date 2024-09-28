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
        $this->db->where('category', 'OIL');
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
}
