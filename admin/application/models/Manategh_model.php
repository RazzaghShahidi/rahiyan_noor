<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/03/2017
 * Time: 01:23 PM
 *Description: model for manategh. get and insert into manategh table
 */
class Manategh_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    //insert mantaghe
    function insert($data)
    {
        $inserted_id = $this->db->insert('manategh', $data);
        if ($inserted_id) {
            return $this->db->insert_id();
        }
    }



    //get all manategh
    function get_all_manategh()
    {
        return $this->db->get('manategh')->result_array();
    }


//###############################################################

    public function manategh_count() {
        return $this->db->count_all("manategh");
    }

    public function fetch_manategh($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("manategh");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}
