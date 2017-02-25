<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by sarwin
 * Date: 02/04/2017
 * Time: 11:14 PM
 *Description:
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Media extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('media_model');
    }

    public function index_get()
    {
        $conditions = $this->get();
        $response['media'] = $this->media_model->get($conditions);
        if ($response) {
            $this->response($response, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('status' => 'failed'), 404);
        }
    }

    public function conditional_get()
    {
        $conditions = $this->get();
        $response['media'] = $this->media_model->conditional_get($conditions);
        if ($response) {
            $this->response($response, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('status' => 'failed'), 404);
        }
    }

}
 