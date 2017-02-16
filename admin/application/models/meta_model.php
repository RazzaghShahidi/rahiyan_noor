<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/10/2017
 * Time: 10:13 PM
 *Description:
 */
class Meta_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    //insert ammaliyat
//    function insert($data, $terms)
//    {
//        $this->db->insert('media', $data);
//        $media_id = $this->db->insert_id();
//        foreach ($terms as $term_id => $term_type) {
//            $term_media = array(
//                'id' => NULL,
//                'term_id' => $term_id,
//                'term_type' => $term_type,
//                'media_id' => $media_id,
//            );
//            $this->db->insert('media_term', $term_media);
//        }
//        if ($media_id) {
//            return $media_id;
//        } else {
//            return false;
//        }
//    }
//
//
//    //############################################
    public function meta_count()
    {
        return $this->db->count_all("meta");
    }

//    public function fetch_media($limit, $start)
//    {
//        $this->db->select()
//            ->from('media')
//            ->join('media_term','media.media_id=media_term.media_id')
//            ->limit($limit)
//            ->offset($start);
//        $query = $this->db->get();
//
//        echo "<pre>";print_r($query->result());exit();
//
//        if ($query->num_rows() > 0) {
//            foreach ($query->result_array() as $row) {
//                $data[] = $row;
//
//
//            }
//
//            return $data;
//        }
//        return false;
//    }
//

}
