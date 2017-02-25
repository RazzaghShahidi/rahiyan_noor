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
    function get($conditions = array('start' => 0, 'limit' => 10))
    {
        $this->db->select();
        $this->db->from('meta');
        if (isset($conditions['limit'])) {
            $this->db->limit($conditions['limit']);
        }
        if (isset($conditions['start'])) {
            $this->db->offset($conditions['start']);
        }
        $query = $this->db->get()->result_array();

        if (count($query) > 0) {
            //get term of each meta
            foreach ($query as $key => $meta) {
                $result[$key] = $meta;
                $this->db->select();
                $this->db->from('meta_term');
                $this->db->where('meta_id', $meta['meta_id']);
                $result[$key]["meta_term"] = $this->db->get()->result_array();
            }

            //get term name of each term
            foreach ($result as $key => $meta) {
                foreach ($meta['meta_term'] as $term_key => $term) {
                    $this->db->select($term['term_type'] . '_name');
                    if ($term['term_type'] == "shahidan") {
                        $this->db->select($term['term_type'] . '_familly');
                    }
                    $this->db->from($term['term_type']);
                    $this->db->where($term['term_type'] . '_id', $term['term_id']);
                    $term_name = $this->db->get()->result_array();
                    if (isset($term_name[0][$term['term_type'] . '_name'])) {
                        $result[$key]["meta_term"][$term_key]['term_name'] = $term_name[0][$term['term_type'] . '_name'];
                        if ($term['term_type'] == "shahidan") {
                            $result[$key]["meta_term"][$term_key]['term_name'] .= " " . $term_name[0][$term['term_type'] . '_familly'];
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
        $meta_colemn_name = $this->db->list_fields('meta');
        $meta_term_clemn = $this->db->list_fields('meta_term');

        $this->db->select('*');
        $this->db->from("meta_term");
        $this->db->join('meta', 'meta.meta_id = meta_term.meta_id');
        foreach ($conditions as $colemn => $value) {
            if (in_array($colemn, $meta_colemn_name)) {
                $this->db->where('meta.' . $colemn, $value);
            } elseif (in_array($colemn, $meta_term_clemn)) {
                $this->db->where($colemn, $value);
            }
        }

        //format array for json
        $meta = array();
        if ($results = $this->db->get()->result_array()) {
            foreach ($results as $key => $result) {
                unset($result['id']);
                foreach ($result as $item => $value) {
                    if (in_array($item, $meta_colemn_name)) {
                        $meta[$key][$item] = $value;
                    } elseif (in_array($item, $meta_term_clemn)) {
                        $meta[$key]['meta_terms'][$item] = $value;
                    }
                }
            }
            return $meta;
        } else {
            return false;
        }

    }
}
