<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 10:28 AM
 *Description:
 */

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->helper(array('form'));
        $this->load->view('login_view');
    }

}

?>