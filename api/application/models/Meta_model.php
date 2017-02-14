<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/03/2017
 * Time: 01:23 PM
 * get and insert into ammaliyat table
 *
 * list of methods:
 *      get()
 *      get_all()
 */
class Meta_model extends CI_Model
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
        $colemn_name = $this->db->list_fields('meta');
        $meta_term_clemn = $this->db->list_fields('meta_term');
        $this->db->select('*');
        $this->db->from("meta_term");
        $this->db->join('meta', 'meta.meta_id = meta_term.meta_id');
        foreach ($conditions as $colemn => $value) {
            if (in_array($colemn, $colemn_name)) {
                $this->db->where( 'meta.'.$colemn, $value);
            }elseif (in_array($colemn, $meta_term_clemn)){
                $this->db->where( $colemn, $value);
            }
        }
        if ($result = $this->db->get()->result()) {
            return $result;
        } else {
            return false;
        }

    }


}
