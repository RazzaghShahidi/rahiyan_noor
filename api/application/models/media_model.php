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
    function get($conditions )
    {
        $this->db->select();
        $this->db->from('media');
        if(isset($conditions['limit'])) {
            $this->db->limit($conditions['limit']);
        }
        if(isset($conditions['start'])) {
            $this->db->offset($conditions['start']);
        }
        $query = $this->db->get()->result_array();

        if (count($query) > 0) {
            //get term of each media
            foreach ($query as $key => $media) {
                $result[$key] = $media;
                $this->db->select();
                $this->db->from('media_term');
                $this->db->where('media_id', $media['media_id']);
                $result[$key]["media_term"] = $this->db->get()->result_array();
            }

            //get term name of each term
            foreach ($result as $key => $media) {
                foreach ($media['media_term'] as $term_key => $term) {
                    $this->db->select($term['term_type'] . '_name');
                    if ($term['term_type'] == "shahidan") {
                        $this->db->select($term['term_type'] . '_familly');
                    }
                    $this->db->from($term['term_type']);
                    $this->db->where($term['term_type'] . '_id', $term['term_id']);
                    $term_name = $this->db->get()->result_array();
                    if (isset($term_name[0][$term['term_type'] . '_name'])) {
                        $result[$key]["media_term"][$term_key]['term_name'] = $term_name[0][$term['term_type'] . '_name'];
                        if ($term['term_type'] == "shahidan") {
                            $result[$key]["media_term"][$term_key]['term_name'] .= " " . $term_name[0][$term['term_type'] . '_familly'];
                        }

                    } else {
                        $result[$key]["term"][$term_key]['term_name'] = "";
                    }
                }
            }
            return $result;
        } else {
            return false;
        }

    }


    /**@
     * @param $conditions
     * @return bool
     * @return object of ammaliyats
     */
    function conditional_get($conditions)
    {
        $media_colemn_name = $this->db->list_fields('media');
        $media_term_clemn = $this->db->list_fields('media_term');

        $this->db->select('*');
        $this->db->from("media_term");
        $this->db->join('media', 'media.media_id = media_term.media_id');
        foreach ($conditions as $colemn => $value) {
            if (in_array($colemn, $media_colemn_name)) {
                $this->db->where('media.' . $colemn, $value);
            } elseif (in_array($colemn, $media_term_clemn)) {
                $this->db->where($colemn, $value);
            }
        }

        //format array for json
        $media= array();
        if ($results = $this->db->get()->result_array()) {
            foreach ($results as $key => $result){
                unset($result['id']);
                foreach ($result as $item => $value){
                    if (in_array($item, $media_colemn_name)) {
                        $media[$key][$item]=$value;
                    } elseif (in_array($item, $media_term_clemn)) {
                        $media[$key]['media_terms'][$item]=$value;
                    }
                }
            }
            return $media;
        } else {
            return false;
        }

    }
}
