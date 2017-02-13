<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 10:28 AM
 *Description:
 */
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }


    // Show login page
    public function index()
    {
        // check is usser loged in
        $is_logedin = $this->session->userdata('is_loged_in');
        $logedin_data = $this->session->userdata('loged_in_user');

        if (!empty($is_logedin) && $is_logedin == true) {
            if (!isset($logedin_data['username'])) {
                redirect('dashboard');
            }
        }
        $this->load->view('login_view');


    }


    // Check for user login process
    public
    function user_login_process()
    {

        // Retrieve session data
        $session_set_value = $this->session->all_userdata();

        // Check for remember_me data in retrieved session data
        if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {
            redirect("dashboard");
        } else {

            // Check for validation
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_view');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                //query the database
                $result = $this->user_model->login($username, $password);
                if ($result) {
                    $sess_data = array(
                        'username' => $username,
                    );
                    $sess_logedin = array(
                        'is_loged_in' => true,
                    );
                    $this->session->set_userdata('loged_in_user', $sess_data);
                    $this->session->set_userdata('is_loged_in', $sess_logedin);

                    redirect("dashboard");
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password'
                    );
                    $this->load->view('login_view', $data);
                }
            }
        }
    }

    // Logout from admin page
    public
    function logout()
    {
        // Destroying session data
        $this->session->sess_destroy();
        $data['message_display'] = 'شمااز اکانت کاربری خود خارج شدید.';
        $this->load->view('login_view', $data);
    }

}

?>