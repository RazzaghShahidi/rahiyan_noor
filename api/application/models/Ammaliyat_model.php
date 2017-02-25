<?php

/**
 * Created by
 * Date: 02/03/2017
 * Time: 01:23 PM
 * get and insert into ammaliyat table
 *
 * list of methods:
 *      get()
 *      get_all()
 */
class Ammaliyat_model extends CI_Model
{





    /**@
     * Ammaliyat_model constructor.
     */
    function __construct()
    {
        parent::__construct();
    }


    /**@
     * @param $conditions
     * @return bool
     * @return object of ammaliyats
     */
    function get($conditions)
    {
        $colemn_name = $this->db->list_fields('ammaliyat');
        $manategh_id = $conditions['manategh'];
        $this->db->select('*');
        $this->db->from("ammaliyat_manategh");
        $this->db->where('ammaliyat_manategh.manategh_id',$manategh_id);
        $this->db->join('ammaliyat','ammaliyat_manategh.ammaliyat_id = ammaliyat.ammaliyat_id');
        foreach ($conditions as $colemn => $value) {
            if (in_array('ammaliyat_' . $colemn, $colemn_name)) {
                $this->db->where('ammaliyat_' . $colemn, $value);
            }
        }

        //unset unused column (id & manategh_id)
        $ammaliyats=array();
        if ($results = $this->db->get()->result_array()) {
            foreach ($results as $result){
                unset($result["id"]);
                unset($result["manategh_id"]);
                $ammaliyats[]=$result;
            }
            return $ammaliyats;
        } else {
            return false;
        }

    }


}
