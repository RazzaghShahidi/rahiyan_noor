<?php

/**
 * Created by Sarwin
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

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $this->username = $this->tank_auth->get_username();
        }
    }
}