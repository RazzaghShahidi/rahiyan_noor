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


     // check is usser loged in
        $is_logedin = $this->session->userdata('is_loged_in');
        $logedin_data = $this->session->userdata('loged_in_user');

        if (!empty($is_logedin)&& $is_logedin==true) {
            if (!isset($logedin_data['username'])) {
                redirect('login', 'refresh');
            }
        } else {
            //If no loged in, redirect to login page
            redirect('login', 'refresh');
        }

        $this->username = $logedin_data["username"];
    }
}