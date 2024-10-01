<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coupon_model extends CI_Model
{
    public function get_all_active_coupons()
    {
        $this->db->where('deleted_at', null);
        $query = $this->db->get('coupons');
        return $query->result_array();
    }

    public function create_coupon($data)
    {
        return $this->db->insert('coupons', $data);
    }

    public function get_coupon_by_id($id)
    {
        $this->db->where('deleted_at', null);
        $this->db->where('id', $id);
        $query = $this->db->get('coupons');
        return $query->row();
    }

    public function get_coupons_by_user_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('deleted_at', null);
        $query = $this->db->get('coupons');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_coupon_by_code($coupon_code)
    {
        $this->db->where('coupon_code', $coupon_code);
        $query = $this->db->get('coupons');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_coupon($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('coupons', $data);
    }

    public function soft_delete_coupon($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('coupons', $data);
    }
}
