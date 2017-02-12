<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/08/2017
 * Time: 09:12 PM
 *Description:
 */
class Ammaliyat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    //insert ammaliyat
    function insert($data, $manategh)
    {
        $this->db->insert('ammaliyat', $data);
        $inserted_id = $this->db->insert_id();
        foreach ($manategh as $mantaghe) {
            $da = array(
                'id' => NULL,
                'ammaliyat_id' => $inserted_id,
                'manategh_id' => $mantaghe
            );
            $this->db->insert('ammaliyat_manategh', $da);
        }
        if ($inserted_id) {
            return $inserted_id;
        } else {
            return false;
        }
    }

    function get_ammaliyat_id($ammaliyat, $mantaghe_id)
    {
        if ($ammaliyat == "ammaliyat") {
            $this->db->select('ammaliyat_id');
            $this->db->where('manategh_id', $mantaghe_id);
            $this->db->from('ammaliyat_manategh');
            return $this->db->get();
        } else {
            return false;
        }
    }

    function get_depend_ammaliyat($ammaliyat_id)
    {
        $this->db->where('ammaliyat_id', $ammaliyat_id);
        $this->db->from('ammaliyat');
        return $this->db->get();
    }

    //############################################
    public function ammaliyat_count()
    {
        return $this->db->count_all("ammaliyat");
    }

    public function fetch_ammaliyat($limit, $start)
    {
        $query_string = "SELECT ammaliyat.ammaliyat_id,ammaliyat.ammaliyat_name,ammaliyat.ammaliyat_start_date,ammaliyat.ammaliyat_end_date, ";
        $query_string .= "ammaliyat.ammaliyat_operation_code,ammaliyat.ammaliyat_Strength,ammaliyat.ammaliyat_commander_name, ";
        $query_string .= "ammaliyat . ammaliyat_description,manategh . manategh_id,manategh . manategh_name ";
        $query_string .= "from ammaliyat join ammaliyat_manategh join manategh ";
        $query_string .= "ON ammaliyat_manategh . ammaliyat_id = ammaliyat . ammaliyat_id && manategh . manategh_id = ammaliyat_manategh . manategh_id ";
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
