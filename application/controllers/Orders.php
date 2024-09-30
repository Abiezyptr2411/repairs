<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function index()
    {
        $this->load->view('history_orders');
    }
}
