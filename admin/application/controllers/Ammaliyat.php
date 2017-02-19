<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 09:11 PM
 *Description:
 */

/**@
 * Class Ammaliyat
 */
class Ammaliyat extends RN_Controller
{
    /**@
     * Ammaliyat constructor.
     */
    function __construct()
    {
        parent::__construct();

        $this->load->model('ammaliyat_model');
        $this->load->library("pagination");
    }

    /**@
     * @description Display list of ammaliyat with them manategh
     */
    function index()
    {
        $view_data["username"] = $this->username;
        $view_data['controller_name'] = "ammaliyat";
        $view_data["results"] =array();

        //intial pagination
        $config = array();
        $config['next_link'] = '&lt;';
        $config['prev_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config["base_url"] = base_url() . "index.php/ammaliyat/index";
        $config["total_rows"] = $this->ammaliyat_model->ammaliyat_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;//@todo should fix in server
        $this->pagination->initialize($config);

        $view_data["links"] = $this->pagination->create_links();

        //setting offset of pagination record
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view_data["results"] = $this->ammaliyat_model->fetch_ammaliyat($config["per_page"], $page,null);

        $this->template->load('ammaliyat/ammaliyat_view', $view_data);
    }


    /**@
     * @description delete ammaliyat
     */
    function delete_ammaliyat_id()
    {
        $ammaliyat_id = $this->input->post('ammaliyat_id');

        $data['status'] = $this->ammaliyat_model->delete_ammaliyat_id($ammaliyat_id);

        echo json_encode($data);
    }


    /**@
     * @description add new ammaliyat and it's selected manategh to database
     */
    function add()
    {
        $this->load->model('manategh_model');
        $this->load->library('form_validation');

        $view_data["username"] = $this->username;
        $view_data['controller_name'] = "ammaliyat";
        $view_data['form_type'] = "add";
        $view_data['massage'] = "لطفا اطلاعات عملیات را وارد کنید: ";



        if ($this->input->post()) { //is form sent?

            //validate add ammaliyat form data
            $this->form_validation->set_rules('ammaliyat_name', 'نام عملیات', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_commander_name', 'نام فرمانده', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_start_date', 'تاریخ شروع', 'trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('ammaliyat_end_date', 'تاریخ پایان عملیات', 'trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('ammaliyat_operation_code', 'رمز عملیات', 'trim|xss_clean');
            $this->form_validation->set_rules('ammaliyat_Strength', 'نیروهای عمل کننده', 'trim|xss_clean');
            $this->form_validation->set_rules('ingredients[]', 'مناطق عملیات', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_description', 'توضیحات', 'trim|xss_clean');


            if ($this->form_validation->run() == true) {

                //geting form data and store them in data array for insert to data base
                $data['ammaliyat_name'] = $this->input->post('ammaliyat_name');
                $data['ammaliyat_commander_name'] = $this->input->post('ammaliyat_commander_name');
                $data['ammaliyat_start_date'] = $this->input->post('ammaliyat_start_date');
                $data['ammaliyat_end_date'] = $this->input->post('ammaliyat_end_date');
                $data['ammaliyat_operation_code'] = $this->input->post('ammaliyat_operation_code');
                $data['ammaliyat_Strength'] = $this->input->post('ammaliyat_Strength');
                $data['ammaliyat_description'] = $this->input->post('ammaliyat_description');
                $manategh = $_POST['ingredients'];

                //insert data array into database (insert ammaliyat into database)
                $ammaliyat_id = $this->ammaliyat_model->insert($data, $manategh);

                //if insert was sucsess then set sucsess massage
                if ($ammaliyat_id) {
                    $view_data['massage'] = "اطلاعات وارد شد.";
                } else {
                    //Field to sent form then set fail massage
                    $view_data['massage'] = "اطلاعات وارد نشد.";
                }
            }
        }
        //Get list of manategh to display in select manategh
        $view_data["manategh"] = $this->manategh_model->get_all_manategh();

        $this->template->load('ammaliyat/add_ammaliyat_view', $view_data);


    }

    /**@
     * @param $id
     * @description
     */
    function edite($id)
    {
        $this->load->model('manategh_model');
        $view_data["username"]        = $this->username;
        $view_data['form_type']       = "edite/" . $id;
        $view_data['massage']         = "اطلاعات برای ویرایش آماده شده است: ";
        $view_data['controller_name'] = "ammaliyat";
        $view_data["results"]=array();

        if ($this->input->post()) { //if form sent

            //validate add ammaliyat form data
            $this->form_validation->set_rules('ammaliyat_name', 'نام عملیات', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_commander_name', 'نام فرمانده', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_start_date', 'تاریخ شروع', 'trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('ammaliyat_end_date', 'تاریخ پایان عملیات', 'trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('ammaliyat_operation_code', 'رمز عملیات', 'trim|xss_clean');
            $this->form_validation->set_rules('ammaliyat_Strength', 'نیروهای عمل کننده', 'trim|xss_clean');
            $this->form_validation->set_rules('ingredients[]', 'مناطق عملیات', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_description', 'توضیحات', 'trim|xss_clean');

            //Check if form data valid
            if ($this->form_validation->run() == true) {

                //Geting form data and store them in data array for insert to data base
                $data['ammaliyat_name']           = $this->input->post('ammaliyat_name');
                $data['ammaliyat_commander_name'] = $this->input->post('ammaliyat_commander_name');
                $data['ammaliyat_start_date']     = $this->input->post('ammaliyat_start_date');
                $data['ammaliyat_end_date']       = $this->input->post('ammaliyat_end_date');
                $data['ammaliyat_operation_code'] = $this->input->post('ammaliyat_operation_code');
                $data['ammaliyat_Strength']       = $this->input->post('ammaliyat_Strength');
                $data['ammaliyat_description']    = $this->input->post('ammaliyat_description');
                $manategh= $_POST['ingredients'];

                //Insert data array into database (insert ammaliyat into database)
                $ammaliyat_id = $this->ammaliyat_model->update($id,$data,$manategh);

                //If insert was sucsess then set sucsess massage
                if ($ammaliyat_id) {
                    $view_data['massage'] = "اطلاعات ویرایش شد.";
                } else {
                    //Field to sent form then set fail massage
                    $view_data['massage'] = "ویرایش انجام نشد.";
                }
            }
        }
        $view_data["results"]= $this->ammaliyat_model->fetch_ammaliyat(1, 0, $id)[0];
        $view_data["manategh"] = $this->manategh_model->get_all_manategh();//get list of manategh to display in select manategh

        $this->template->load('ammaliyat/add_ammaliyat_view', $view_data);
    }


    /**@
     * @param $date
     * @return bool
     * @description date validator callback function
     */
    public function checkDateFormat($date)
    {
        if (preg_match("/^[1-9][0-9]{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

}
