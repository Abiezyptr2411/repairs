<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ServiceOrders extends CI_Controller
{
    public function index()
    {
        $this->load->view('service_orders');
    }
}
