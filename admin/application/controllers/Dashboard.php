<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 10:31 AM
 *Description:
 */


class Dashboard extends RN_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $logedin_data = $this->session->userdata('logged_in');
        $data['username']=$logedin_data['username'];
        $this->template->load('dashboard/dashboard_view', $data);
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
}

?>