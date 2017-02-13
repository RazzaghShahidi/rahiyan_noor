<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 09:11 PM
 *Description:
 */
class Ammaliyat extends RN_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ammaliyat_model');
        $this->load->library("pagination");


    }

    function index()
    {
        $data["username"] = $this->username;
        $data['controller_name'] = "ammaliyat";

        $config = array();
        $config['next_link'] = '&gt;';
        $config['prev_link'] = '&lt;';
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

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $ammaliyat = $this->ammaliyat_model->fetch_ammaliyat($config["per_page"], $page);
        $data["results"] = array();
        foreach ($ammaliyat as $key => $value) {
            $ammaliyat_id = $value['ammaliyat_id'];
            if (array_key_exists($ammaliyat_id, $data["results"])) {
                $data["results"][$ammaliyat_id]["manategh_name"] .= " ,{$value['manategh_name']}";
            } else {
                $data["results"][$ammaliyat_id] = array(
                    'ammaliyat_id' => $value['ammaliyat_id'],
                    'ammaliyat_name' => $value['ammaliyat_name'],
                    'ammaliyat_start_date' => $value['ammaliyat_start_date'],
                    'ammaliyat_end_date' => $value['ammaliyat_end_date'],
                    'ammaliyat_operation_code' => $value['ammaliyat_operation_code'],
                    'ammaliyat_Strength' => $value['ammaliyat_Strength'],
                    'ammaliyat_commander_name' => $value['ammaliyat_commander_name'],
                    'ammaliyat_description' => $value['ammaliyat_description'],
                    'manategh_id' => $value['manategh_id'],
                    'manategh_name' => $value['manategh_name'],
                );
            }

        }

        $data["links"] = $this->pagination->create_links();
        $this->template->load('ammaliyat/ammaliyat_view', $data);
    }



    function delete_ammaliyat_id() {
        $ammaliyat_id =  $this->input->post('ammaliyat_id');
        $data['status'] = $this->ammaliyat_model->delete_ammaliyat_id($ammaliyat_id);
        echo json_encode($data);
    }


    function add_ammaliyat()
    {
        $this->load->model('manategh_model');
        $this->load->library('form_validation');
        $view_data['massage'] = "لطفا اطلاعات عملیات را وارد کنید: ";


        if ($this->input->post()) { //form sent

            //validate add ammaliyat form data
            $this->form_validation->set_rules('ammaliyat_name', 'نام عملیات', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_commander_name', 'نام فرمانده', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ammaliyat_start_date', 'تاریخ شروع', 'trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('ammaliyat_end_date', 'تاریخ پایان عملیات', 'trim|xss_clean|callback_checkDateFormat');
            $this->form_validation->set_rules('ammaliyat_operation_code', 'رمز عملیات', 'trim|xss_clean');
            $this->form_validation->set_rules('ammaliyat_Strength', 'نیروهای عمل کننده', 'trim|xss_clean');
            $this->form_validation->set_rules('ingredients', 'مناطق عملیات', 'trim|xss_clean');
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
        $view_data["username"] = $this->username;
        $view_data["manategh"] = $this->manategh_model->get_all_manategh();//get list of manategh to display in select manategh
        $view_data['controller_name'] = "ammaliyat";

        $this->template->load('ammaliyat/add_ammaliyat_view', $view_data);


    }


    public function checkDateFormat($date)
    {
        if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
            if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
                return true;
            else
                return false;
        } else {
            return false;
        }


    }
}
