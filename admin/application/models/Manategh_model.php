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


    //insert mantaghe
    function update($id, $data)
    {
        $this->db->where('manategh_id',$id);
        $updated_id=$this->db->update('manategh', $data);
        if ($updated_id) {
            return $updated_id;
        }
        return false;
    }



    //get all manategh
    function get_all_manategh()
    {
        return $this->db->get('manategh')->result_array();
    }


//###############################################################

    public function manategh_count()
    {
        return $this->db->count_all("manategh");
    }

    public function fetch_manategh($limit, $start,$id)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("manategh");
        if(isset($id)){
            $this->db->where('manategh_id',$id);
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // Function to Delete selected record from table .
    function delete_manategh_id($id)
    {
        $this->db->where('manategh_id', $id);
        $this->db->delete('manategh');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }


    }
}