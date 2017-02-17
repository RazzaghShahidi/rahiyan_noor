<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/10/2017
 * Time: 10:13 PM
 *Description:
 */
class Media_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    //insert ammaliyat
    function insert($data, $terms)
    {
        $this->db->insert('media', $data);
        $media_id = $this->db->insert_id();
        foreach ($terms as $term_id => $term_type) {
            $term_media = array(
                'id' => NULL,
                'term_id' => $term_id,
                'term_type' => $term_type,
                'media_id' => $media_id,
            );
            $this->db->insert('media_term', $term_media);
        }
        if ($media_id) {
            return $media_id;
        } else {
            return false;
        }
    }


    //############################################
    public function media_count()
    {
        return $this->db->count_all("media");
    }

    public function fetch_media($limit, $start)
    {
        $this->db->select()
            ->from('media')
            ->limit($limit)
            ->offset($start);
        $query = $this->db->get()->result_array();
        if (count($query) > 0) {

            //get term of each media
            foreach ($query as $key => $media) {
                $result[$key] = $media;
                $this->db->select();
                $this->db->from('media_term');
                $this->db->where('media_id', $media['media_id']);
                $result[$key]["term"] = $this->db->get()->result_array();
            }

            //get term name of each media
            foreach ($result as $key => $media) {
                foreach ($media['term'] as $term_key => $term) {
                    $this->db->select($term['term_type'] . '_name');
                    if($term['term_type']=="shahidan"){
                        $this->db->select($term['term_type'] . '_familly');
                    }
                    $this->db->from($term['term_type']);
                    $this->db->where($term['term_type'] . '_id', $term['term_id']);
                    $term_name = $this->db->get()->result_array();
                    if (isset($term_name[0][$term['term_type'] . '_name'])) {
                        $result[$key]["term"][$term_key]['term_name'] = $term_name[0][$term['term_type'] . '_name'];
                        if($term['term_type']=="shahidan"){
                            $result[$key]["term"][$term_key]['term_name'] .= " ".$term_name[0][$term['term_type'] . '_familly'];
                        }

                    }else{
                        $result[$key]["term"][$term_key]['term_name']="";
                    }
                }
            }
            return $result;
        }
        return false;
    }


}
