<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResponseEnum {
    const SUCCESS = 'success';
    const ERROR = 'error';

    public static function getMessages() {
        return [
            'USER_NOT_FOUND' => 'Users not found.',
            'PHONE_REQUIRED' => 'Phone number cannot be empty'
        ];
    }
}
