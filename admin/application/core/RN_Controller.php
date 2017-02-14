<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/07/2017
 * Time: 11:43 PM
 *Description: the base controller that check authentication and set user loged in info
 */
class RN_Controller extends CI_Controller
{
    /**@
     * @var username
     * for username in extended class
     */
    public $username;


    /**
     * RN_Controller constructor.
     */
    function __construct()
    {
        parent::__construct();


        // check is usser loged in
        $is_logedin     = $this->session->userdata('is_loged_in');
        $logedin_data   = $this->session->userdata('loged_in_user');

        if (!empty($is_logedin) && $is_logedin == true) {

            if (!isset($logedin_data['username'])) {
                //If username not set, redirect to login page
                redirect('login', 'refresh');
            }

        } else {
            //If no loged in, redirect to login page
            redirect('login', 'refresh');
        }

        //set username from session
        $this->username = $logedin_data["username"];
    }
}