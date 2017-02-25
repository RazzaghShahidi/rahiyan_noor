<?php

/**
 * Created by sarwin
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

    function get($conditions)
    {
        $colemn_name = $this->db->list_fields('manategh');
        foreach ($conditions as $colemn => $value) {
            if (in_array('manategh_' . $colemn, $colemn_name)) {
                $this->db->where('manategh_' . $colemn, $value);
            }
        }
        if ($result = $this->db->get("manategh")->result_array()) {
            return $result;
        } else {
            return false;
        }

    }
}
