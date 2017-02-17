<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/10/2017
 * Time: 08:00 PM
 *Description:
 */
class Media extends RN_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('media_model');
        $view_data['$controller_name'] = "media";
    }

    function index()
    {
        $this->load->library('pagination');
        $view_data["links"] = $this->pagination->create_links();
        $view_data["username"] = $this->username;
        $view_data['controller_name'] = "media";

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
        $config["base_url"] = base_url() . "index.php/media/index";
        $config["total_rows"] = $this->media_model->media_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;//@todo should fix in server
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $view_data['results'] = $this->media_model->fetch_media($config["per_page"], $page);
//        echo "<pre>";print_r($view_data['results']);
        $this->template->load('media/media_view', $view_data);
    }


    function add()
    {
        $view_data['massage']= "اطلاعات خود را وارد کنید";

        if ($_POST) {
            $this->load->model('ammaliyat_model');
            $this->form_validation->set_rules('media_title', 'عنوان مدیا', 'trim|required|xss_clean');
            $this->form_validation->set_rules('uploaded_files[]', 'فایل های آپلود شده', 'trim|required|xss_clean');
            $this->form_validation->set_rules('media_terms[]', 'برچسب های مدیا', 'trim|required|xss_clean');
            $this->form_validation->set_rules('media_detail', 'توضیحات مدیا', 'xss_clean');

            if ($this->form_validation->run() == true) {

                $terms = $_POST['media_terms'];
                foreach ($_POST['uploaded_files'] as $upload_name => $uploaded_file) {
                    $data['media_title'] = $this->input->post('media_title');
                    $data['media_file_name'] = $upload_name;
                    $data['media_file_ext'] = $uploaded_file['ext'];
                    $data['media_path'] = $uploaded_file['server_path'];
                    $data['media_size'] = $uploaded_file['size'];
                    $data['media_detail'] = $this->input->post('media_detail');
                    $media_id= $this->media_model->insert($data, $terms);

                    if($media_id){
                        $view_data['massage']= "اطلاعات وارد شد.";
                    }

                }

            } else {
                //Field validation failed.
                $view_data['massage']= "اطلاعات وارد نشد.";

            }
        }
            $view_data["username"] = $this->username;
            $view_data["controller_name"] = "media";
            $view_data["manategh"] = $this->get_all_manategh();
            $this->template->load('media/add_media_view', $view_data);

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

    function get_all_depend_shahidan()
    {
        $loadType = $_POST['loadType'];//shahidan
        $loadId = $_POST['loadId'];//id ammaliyat
        $this->load->model('shahidan_model');
        $shahidan_id = $this->shahidan_model->get_shahidan_id($loadType, $loadId);
        $HTML = "";
        foreach ($shahidan_id->result() as $row) {
            $result = $this->shahidan_model->get_depend_shahidan($row->shahidan_id);
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $list) {
                    $HTML .= "<option value='" . $list->shahidan_id . "'>" . $list->shahidan_name ." ".$list->shahidan_familly. "</option>";
                }
            }
        }
        echo $HTML;
    }


    //work with ajax
    public function upload()
    {
        if (!empty($_FILES)) {
            $config['upload_path'] = "./../uploads";
            $config['allowed_types'] = 'gif|jpg|png|mp4|ogv|zip';

            $this->load->library('upload');

            $files = $_FILES;
            $number_of_files = count($_FILES['file']['name']);
            $errors = 0;

            // codeigniter upload just support one file
            // to upload. so we need a litte trick
            for ($i = 0; $i < $number_of_files; $i++) {
                $_FILES['file']['name'] = $files['file']['name'][$i];
                $_FILES['file']['type'] = $files['file']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                $_FILES['file']['error'] = $files['file']['error'][$i];
                $_FILES['file']['size'] = $files['file']['size'][$i];

                // we have to initialize before upload
                $this->upload->initialize($config);

                if (!$this->upload->do_upload("file")) {
                    $errors++;
                }
                $file_details[$i] = $this->upload->data();

            }

            if ($errors > 0) {
                $error = array('error' => $this->upload->display_errors());
                print json_encode($error);
            } else {
                print json_encode($file_details);
            }

        } elseif ($this->input->post('file_to_remove')) {
            $file_to_remove = $this->input->post('file_to_remove');
            unlink("./uploads/" . $file_to_remove);
        }
    }


}