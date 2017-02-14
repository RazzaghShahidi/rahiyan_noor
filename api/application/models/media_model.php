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
class Media_model extends CI_Model
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
        $colemn_name = $this->db->list_fields('media');
        $media_term_clemn = $this->db->list_fields('media_term');
        $this->db->select('*');
        $this->db->from("media_term");
        $this->db->join('media', 'media.media_id = media_term.media_id');
        foreach ($conditions as $colemn => $value) {
            if (in_array($colemn, $colemn_name)) {
                $this->db->where( 'media.'.$colemn, $value);
            }elseif (in_array($colemn, $media_term_clemn)){
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
