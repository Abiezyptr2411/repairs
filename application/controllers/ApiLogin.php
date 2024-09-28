<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
        $this->load->helper('url');
        $this->load->library('ResponseEnum'); 
    }

    public function index() {
    $phone = $this->input->post('phone');

    // Validasi input
    if (empty($phone)) {
        $response = [
            'status' => ResponseEnum::ERROR,
            'message' => ResponseEnum::getMessages()['PHONE_REQUIRED']
        ];
        echo json_encode($response);
        return;
    }

    // check existing phone number 
    $this->db->where('phone', $phone);
    $user = $this->db->get('users')->row();

    if ($user) {
        $response = [
            'status' => ResponseEnum::SUCCESS,
            'data' => [
                'id' => $user->id,
                'phone' => $user->phone,
            ]
        ];
    } else {
        $response = [
            'status' => ResponseEnum::ERROR,
            'message' => ResponseEnum::getMessages()['USER_NOT_FOUND']
        ];
    }

    echo json_encode($response);
}
}
