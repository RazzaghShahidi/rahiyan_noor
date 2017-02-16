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


    function update($id, $data, $ammaliyat)
    {
        $this->db->where('shahidan_id', $id);
        $updated_id = $this->db->update('shahidan', $data);

        $this->db->where('shahidan_id', $id);
        $this->db->delete('shahidan_ammaliyat');

        //inserting relation with ammaliyat in shahidan_ammaliyat
        foreach ($ammaliyat as $ammal) {
            //for each ammaliyat insert in shahidan_ammaliyat
            $relation = array(
                'shahidan_id' => $id,
                'ammaliyat_id' => $ammal,
            );
            $this->db->insert('shahidan_ammaliyat', $relation);
        }
        return $updated_id;

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

    public function fetch_shahidan($limit, $start, $id)
    {
        $this->db->select('*');
        $this->db->from('shahidan');
        $this->db->limit($limit, $start);
        if (isset($id)) {
            //for getting spesific shahidan with certain shahidan_id
            $this->db->where("shahidan.shahidan_id", $id);
        }
        $query = $this->db->get()->result_array();

        //get ammaliyat of each shahida
        foreach ($query as $key => $shahidan) {
            $result[$key] = $shahidan;
            $this->db->select('*');
            $this->db->from('shahidan_ammaliyat');
            $this->db->join('ammaliyat', 'shahidan_ammaliyat.ammaliyat_id=ammaliyat.ammaliyat_id');
            $this->db->where('shahidan_ammaliyat.shahidan_id', $shahidan['shahidan_id']);
            $result[$key]["ammaliyat"] = $this->db->get()->result_array();
        }

        if (count($query) > 0) {
            return $result;
        }
        return false;
    }


    // Function to Delete selected record from table .
    function delete_shahidan_id($id)
    {
        $this->db->where('shahidan_id', $id);
        $this->db->delete('shahidan');

        $this->db->where('shahidan_id', $id);
        $this->db->delete('shahidan_ammaliyat');

        $this->db->where('term_type', "shahidan");
        $this->db->where('term_id', $id);
        $this->db->delete('media_term');

        $this->db->where('term_type', "shahidan");
        $this->db->where('term_id', $id);
        $this->db->delete('meta_term');


        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}
 