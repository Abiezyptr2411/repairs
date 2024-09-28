<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiResponseStatus
{
    const SUCCESS = 'success';
    const ERROR = 'error';
    const BAD_REQUEST = 'bad_request';
    const UNAUTHORIZED = 'unauthorized';

    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_CONFLICT = 409;
    const HTTP_NOT_FOUND = 404;
}
