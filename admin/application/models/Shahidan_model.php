<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/03/2017
 * Time: 12:54 PM
 *Description:
 */
class Shahidan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }



    //insert ammaliyat
    function insert($data, $ammaliyat)
    {
        $this->db->insert('shahidan', $data);
        $inserted_id = $this->db->insert_id();
        foreach ($ammaliyat as $ammal) {
            $shahidan_ammaliyat = array(
                'id' => NULL,
                'shahidan_id' => $inserted_id,
                'ammaliyat_id' => $ammal,
            );
            $this->db->insert('shahidan_ammaliyat', $shahidan_ammaliyat);
        }
        if ($inserted_id) {
            return $inserted_id;
        } else {
            return false;
        }
    }





//#############################################
    function get_shahidan_id($shahidan, $amamliyat_id)
    {
        if ($shahidan == "shahidan") {
            $this->db->select('shahidan_id');
            $this->db->where('ammaliyat_id', $amamliyat_id);
            $this->db->from('shahidan_ammaliyat');
            return $this->db->get();
        } else {
            return false;
        }
    }


    function get_depend_shahidan($shahidan_id)
    {
        $this->db->where('shahidan_id', $shahidan_id);
        $this->db->from('shahidan');
        return $this->db->get();
    }




    //############################################
    public function shahidan_count()
    {
        return $this->db->count_all("shahidan");
    }

    public function fetch_shahidan($limit, $start)
    {
        $query_string = "SELECT shahidan.shahidan_id, shahidan.shahidan_name , shahidan.shahidan_familly,shahidan.shahidan_birth_place, ";
        $query_string.= " shahidan.shahidan_date_of_birth ,shahidan.shahidan_date_of_deth , shahidan.shahidan_biography , shahidan.shahidan_will , ";
        $query_string.="shahidan.shahidan_picture, ammaliyat.ammaliyat_id , ammaliyat.ammaliyat_name ";
        $query_string.= "FROM shahidan join shahidan_ammaliyat join ammaliyat ";
        $query_string.= "ON shahidan_ammaliyat.ammaliyat_id = ammaliyat.ammaliyat_id && shahidan.shahidan_id = shahidan_ammaliyat.shahidan_id ";
        $query_string .= "LIMIT " . $limit . " OFFSET " . $start;

        $query = $this->db->query($query_string);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

}
 