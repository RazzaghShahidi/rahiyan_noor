<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/04/2017
 * Time: 11:14 PM
 *Description:
 */
class Manategh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('manategh_model');
    }

    function index()
    {
        $data=array();
       echo $this->template->load('manategh/index',$data);
    }
}
 