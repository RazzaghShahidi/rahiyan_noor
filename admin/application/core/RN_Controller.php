<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/07/2017
 * Time: 11:43 PM
 *Description:
 */
class RN_Controller extends CI_Controller
{
    public $username;
    public $user_id;

    function __construct()
    {
        parent::__construct();


        $logedin_data = $this->input->cookie('rahiyan_noor_login_cookie');
        if (!empty($logedin_data)) {
            $this->load->library('encrypt');
            $this->username = $this->encrypt->decode($logedin_data, ENCRIPT_KEY);

//@todo here should check with database
        } else {
            //check session
            $logedin_data = $this->session->userdata('logged_in');
            if (!empty($logedin_data)) {
                if (!$logedin_data['username']) {
                    redirect('login', 'refresh');
                }
            } else {
                //If no loged in, redirect to login page
                redirect('login', 'refresh');
            }
            $this->username = $this->session->userdata('logged_in');
            $this->user_id = $this->session->userdata('logged_in');
        }

    }
}