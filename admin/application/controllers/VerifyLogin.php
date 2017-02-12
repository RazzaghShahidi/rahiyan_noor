<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 10:30 AM
 *Description:
 */
class VerifyLogin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
    }

    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_rules('remember', 'Remember', 'trim|xss_clean|callback_set_login_cookie');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_view');
        } else {
            //Go to private area
            redirect('dashboard', 'refresh');
        }

    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user_model->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    function set_login_cookie($remember)
    {
        if ($remember == 1) {
            $this->load->library('encrypt');
            $username = $this->input->post('username');

            $username = $this->encrypt->encode($username,ENCRIPT_KEY);
            $data_cookie = array(
                'name' => 'rahiyan_noor_login_cookie',
                'value' => $username,
                'expire' => '31536000',
            );
            $this->input->set_cookie($data_cookie);


        }

    }
}

?>