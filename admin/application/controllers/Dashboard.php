<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 10:31 AM
 *Description:
 */
class Dashboard extends RN_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['username'] = $this->username;
        $data['details']=$this->get_details();
        $this->template->load('dashboard/dashboard_view', $data);
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }


    function get_details()
    {
        $this->load->model('ammaliyat_model');
        $this->load->model('manategh_model');
        $this->load->model('shahidan_model');
        $this->load->model('media_model');
        $this->load->model('meta_model');
        $data['manategh']= $this->manategh_model->manategh_count();
        $data['ammaliyat']= $this->ammaliyat_model->ammaliyat_count();
        $data['shahidan']= $this->shahidan_model->shahidan_count();
        $data['media']= $this->media_model->media_count();
        $data['meta']= $this->meta_model->meta_count();
        return $data;
    }
}

?>