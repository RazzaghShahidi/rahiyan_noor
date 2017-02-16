<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/04/2017
 * Time: 11:14 PM
 *Description:
 */
class Manategh extends RN_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('manategh_model');
        $this->load->library("pagination");

    }

    function index()
    {
        $data["username"] = $this->username;
        $data['controller_name'] = 'manategh';

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
        $config["base_url"] = base_url() . "index.php/manategh/index";
        $config["total_rows"] = $this->manategh_model->manategh_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;//@todo should fix in server
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->manategh_model->fetch_manategh($config["per_page"], $page, null);
        $data["links"] = $this->pagination->create_links();

        $this->template->load('manategh/manategh_view', $data);
    }

    function delete_manategh_id()
    {
        $manategh_id = $this->input->post('manategh_id');
        $data['status'] = $this->manategh_model->delete_manategh_id($manategh_id);
        echo json_encode($data);
    }


    function add()
    {
        $view_data['form_type']="add";
        $view_data["massage"] = "اطلاعات زیر را وارد کنید:";
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'نام منطقه', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'توضیحات', 'trim|required|xss_clean');

            if ($this->form_validation->run() == true) {
                $this->load->model('manategh_model');
                $data['manategh_name'] = $this->input->post('name');
                $data['manategh_description'] = $this->input->post('description');
                $mantaghe_id = $this->manategh_model->insert($data);
                if ($mantaghe_id) {
                    $view_data["massage"] = "اطلاعات وارد شد.";
                }
            } else {
                //Field validation failed.
                $view_data["massage"] = "اطلاعات وارد نشد.";
            }
        }

        $view_data["username"] = $this->username;
        $view_data['controller_name'] = "manategh";

        $this->template->load('manategh/add_manategh_view', $view_data);
    }

    function edite($id)
    {
        $view_data['form_type']="edite/".$id;
        $view_data["massage"] = "اطلاعات برای ویرایش اماده شده است:";
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'نام منطقه', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'توضیحات', 'trim|required|xss_clean');

            if ($this->form_validation->run() == true) {
                $this->load->model('manategh_model');

                $data['manategh_name'] = $this->input->post('name');
                $data['manategh_description'] = $this->input->post('description');
                $mantaghe_id = $this->manategh_model->update($id,$data);
                if ($mantaghe_id) {
                    $view_data["massage"] = "اطلاعات ویرایش شد.";
                }
            } else {
                //Field validation failed.
                $view_data["massage"] = "ویرایش انجام نشد.";
            }
        }
        $view_data["username"] = $this->username;
        $view_data['controller_name'] = 'manategh';
        $view_data['results'] = null;
        $view_data["results"] = $this->manategh_model->fetch_manategh(1, 0, $id);

        $this->template->load('manategh/add_manategh_view', $view_data);
    }
}