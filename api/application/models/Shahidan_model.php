<?php

/**
 * Created by sarwin
 * Date: 02/03/2017
 * Time: 01:23 PM
 * get and insert into ammaliyat table
 *
 * list of methods:
 *      get()
 *      get_all()
 */
class shahidan_model extends CI_Model
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
        $colemn_name = $this->db->list_fields('shahidan');
        $ammaliyat_id = $conditions['ammaliyat'];
        $this->db->select('*');
        $this->db->from("shahidan_ammaliyat");
        $this->db->where('shahidan_ammaliyat.ammaliyat_id', $ammaliyat_id);
        $this->db->join('shahidan', 'shahidan_ammaliyat.shahidan_id = shahidan.shahidan_id');
//        foreach ($conditions as $colemn => $value) {
//            if (in_array('shahidan_' . $colemn, $colemn_name)) {
//                $this->db->where('shahidan_' . $colemn, $value);
//            }
//        }
        $shahidan= array();
        if ($results = $this->db->get()->result_array()) {
            foreach ($results as $result){
                unset($result["id"]);
                unset($result["ammaliyat_id"]);
                $shahidan[]=$result;
            }

            return $shahidan;
        } else {
            return false;
        }

    }


}
