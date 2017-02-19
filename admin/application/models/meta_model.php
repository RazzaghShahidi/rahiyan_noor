<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/10/2017
 * Time: 10:13 PM
 *Description:
 */
class meta_model extends CI_Model
{

    /**@
     * meta_model constructor.
     */
    function __construct()
    {
        parent::__construct();
    }



    /**@
     * @param $data
     * @param $terms
     * @return bool
     * @description insert ammaliyat
     */
    function insert($data, $terms)
    {
        $this->db->insert('meta', $data);
        $meta_id = $this->db->insert_id();
        foreach ($terms as $term_id => $term_type) {
            $term_meta = array(
                'id' => NULL,
                'term_id' => $term_id,
                'term_type' => $term_type,
                'meta_id' => $meta_id,
            );
            $this->db->insert('meta_term', $term_meta);
        }
        if ($meta_id) {
            return $meta_id;
        } else {
            return false;
        }
    }


    /**@
     * @return mixed
     */
    public function meta_count()
    {
        return $this->db->count_all("meta");
    }


    /**@
     * @param $limit
     * @param $start
     * @return array
     */
    public function fetch_meta($limit, $start)
    {
        $result=array();
        $this->db->select()
            ->from('meta')
            ->limit($limit)
            ->offset($start);
        $query = $this->db->get()->result_array();

        if (count($query) > 0) {

            //get term of each meta
            foreach ($query as $key => $meta) {
                $result[$key] = $meta;
                $this->db->select();
                $this->db->from('meta_term');
                $this->db->where('meta_id', $meta['meta_id']);
                $result[$key]["term"] = $this->db->get()->result_array();
            }

            //get term name of each meta
            foreach ($result as $meta_key => $meta_detail) {
                foreach ($meta_detail['term'] as $term_key => $term) {
                    $this->db->select($term['term_type'] . '_name');
                    if($term['term_type']=="shahidan"){
                        $this->db->select($term['term_type'] . '_familly');
                    }
                    $this->db->from($term['term_type']);
                    $this->db->where($term['term_type'] . '_id', $term['term_id']);
                    $term_name = $this->db->get()->result_array();

                    if (isset($term_name[0][$term['term_type'] . '_name'])) {
                        $result[$meta_key]["term"][$term_key]['term_name'] = $term_name[0][$term['term_type'] . '_name'];
                        if($term['term_type']=="shahidan"){
                            $result[$meta_key]["term"][$term_key]['term_name'] .= " ".$term_name[0][$term['term_type'] . '_familly'];
                        }

                    }else{
                        $result[$meta_key]["term"][$term_key]['term_name']="";
                    }
                }

            }

        }
        return $result;
    }

    /**
     * @param $id
     * @return bool
     * @description Delete selected record from meta, meta_term table .
     */
    function delete_meta_id($id)
    {
        $this->db->where('meta_id', $id);
        $this->db->delete('meta');

        $this->db->where('meta_id', $id);
        $this->db->delete('meta_term');

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}
