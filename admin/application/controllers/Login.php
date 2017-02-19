<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 10:28 AM
 *Description:
 */

/**@
 * Class Login
 */
class Login extends CI_Controller
{

    /**@
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }


    /**@
     * @description Check if user is not loged in, load 'LOGIN_VIEW'
     */
    public function index()
    {
        // Get loged in userdate
        $is_logedin = $this->session->userdata('is_loged_in');
        $logedin_data = $this->session->userdata('loged_in_user');

        //Check is user loged in
        if (!empty($is_logedin) && $is_logedin == true) {

            if (!isset($logedin_data['username'])) {
                //if user loged in, redirect into dashboard controller
                redirect('dashboard');
            }

        }
        $this->load->view('login_view');


    }


    // Check for user login process
    /**
     * @description Get Login form data and validate an authenticate it, if it was
     *               valid user then set userdata and login user
     */
    public function user_login_process()
    {

        // Retrieve session data
        $session_set_value = $this->session->all_userdata();


        // Check for validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //if login form data are not valid then redirect to login form
            redirect('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            //query to database for user with username and password
            $result = $this->user_model->login($username, $password);

            //check is user exist?
            if ($result) {

                //set userdata for login
                $this->session->set_userdata('loged_in_user', array('username' => $username,));
                $this->session->set_userdata('is_loged_in', array('is_loged_in' => true,));

                redirect("dashboard");
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_view', $data);
            }
        }
    }


    //
    /**@
     * @description Logout from admin panel
     */
    public function logout()
    {
        // Destroying session data for logout
        $this->session->sess_destroy();
        $data['message_display'] = 'شمااز اکانت کاربری خود خارج شدید.';
        redirect('login');
    }
}

?>