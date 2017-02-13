<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/09/2017
 * Time: 09:35 AM
 *Description:
 */
class Shahidan extends RN_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('shahidan_model');
        $this->load->library("pagination");
    }

    //display list shahidan
    function index()
    {
        $data["username"] = $this->username;

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
        $config["base_url"] = base_url() . "index.php/shahidan/index";
        $config["total_rows"] = $this->shahidan_model->shahidan_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;//@todo should fix in server
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $shahidan = $this->shahidan_model->fetch_shahidan($config["per_page"], $page);


        $data["shahidan"] = array();
        foreach ($shahidan as $key => $value) {
            $shahidan_id = $value['shahidan_id'];
            if (array_key_exists($shahidan_id, $data["shahidan"])) {
                $data["shahidan"][$shahidan_id]["ammaliyat_name"] .= " ,{$value['ammaliyat_name']}";
            } else {
                $data["shahidan"][$shahidan_id] = array(
                    'shahidan_id' =>             $value['shahidan_id'],
                    'shahidan_name' =>           $value['shahidan_name'],
                    'shahidan_familly' =>        $value['shahidan_familly'],
                    'shahidan_birth_place' =>    $value['shahidan_birth_place'],
                    'shahidan_date_of_birth' =>  $value['shahidan_date_of_birth'],
                    'shahidan_date_of_deth' =>   $value['shahidan_date_of_deth'],
                    'shahidan_biography' =>      $value['shahidan_biography'],
                    'shahidan_will' =>           $value['shahidan_will'],
                    'shahidan_picture' =>        $value['shahidan_picture'],
                    'ammaliyat_id' =>            $value['ammaliyat_id'],
                    'ammaliyat_name' =>          $value['ammaliyat_name'],
                );
            }

        }
        $data['controller_name']= "shahidan";
        $data["links"] = $this->pagination->create_links();
        $this->template->load('shahidan/shahidan_view', $data);
    }


    function delete_shahidan_id() {
        $shahidan_id =  $this->input->post('shahidan_id');
        $data['status'] = $this->shahidan_model->delete_shahidan_id($shahidan_id);
        echo json_encode($data);
    }


    //add shahidan
    function add_shahidan()
    {
        $view_data['massage'] = "لطفا اطلاعات شهید را وارد کنید: ";

        if ($_POST) {

            $this->load->model('ammaliyat_model');

            $this->form_validation->set_rules('shahidan_name', 'نام شهید', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shahidan_familly', 'نام خانوادگی شهید ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shahidan_date_of_birth', 'تاریخ تولد', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shahidan_date_of_deth', 'تاریخ شهادت', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shahidan_birth_place', 'مکان شهادت', 'trim|required|xss_clean');
            $this->form_validation->set_rules('ingredients[]', 'عملیات', 'trim|required|xss_clean');
            $this->form_validation->set_rules('shahidan_will', 'وصیت نامه', 'xss_clean');
            $this->form_validation->set_rules('shahidan_biography', 'زندگی نامه', 'xss_clean');


            if ($this->form_validation->run() == true) {

                $data['shahidan_name']          = $this->input->post('shahidan_name');
                $data['shahidan_familly']       = $this->input->post('shahidan_familly');
                $data['shahidan_date_of_birth'] = $this->input->post('shahidan_date_of_birth');
                $data['shahidan_date_of_deth']  = $this->input->post('shahidan_date_of_deth');
                $data['shahidan_birth_place']   = $this->input->post('shahidan_birth_place');
                $data['shahidan_will']          = $this->input->post('shahidan_will');
                $data['shahidan_biography']     = $this->input->post('shahidan_biography');
                foreach ($_POST['ingredients'] as $ingredient) {
                    $ammaliyat[$ingredient]     = $ingredient;
                }

                $shahidan_id = $this->shahidan_model->insert($data, $ammaliyat);

                //if data are stored in database then set sucsess massage
                if ($shahidan_id) {
                    $view_data['massage'] = "اطلاعات وارد شد.";
                }

            } else {
                //Field sent data form then set  failed massage.
                $view_data['massage'] = "اطلاعات وارد نشد.";
            }
        }

        $view_data["username"] = $this->username;
        $view_data["manategh"] = $this->get_all_manategh();
        $view_data['controller_name'] = "shahidan";

        $this->template->load('shahidan/add_shahidan_view', $view_data);
    }

    function get_all_manategh()
    {
        $this->load->model('manategh_model');
        return $this->manategh_model->get_all_manategh();
    }

    function get_all_depend_ammaliyat()
    {
        $loadType = $_POST['loadType'];//ammaliyat
        $loadId = $_POST['loadId'];//id
        $this->load->model('ammaliyat_model');
        $ammaliyat_id = $this->ammaliyat_model->get_ammaliyat_id($loadType, $loadId);
        $HTML = "";
        foreach ($ammaliyat_id->result() as $row) {
            $result = $this->ammaliyat_model->get_depend_ammaliyat($row->ammaliyat_id);
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $list) {
                    $HTML .= "<option value='" . $list->ammaliyat_id . "'>" . $list->ammaliyat_name . "</option>";
                }
            }
        }
        echo $HTML;
    }

}