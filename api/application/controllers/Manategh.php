<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/04/2017
 * Time: 11:14 PM
 *Description:
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Manategh extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('manategh_model');
    }

    public function index_get()
    {
        $condition = $this->get();
        $response = $this->manategh_model->get($condition);
        $this->response($response);
    }


}
 