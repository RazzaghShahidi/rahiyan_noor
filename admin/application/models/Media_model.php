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
        $query_string = "SELECT  media.media_id ,media.media_title,media.media_file_name,media.media_size,media.media_path,media.media_detail ";
        $query_string .= "ammaliyat.ammaliyat_operation_code,ammaliyat.ammaliyat_Strength,ammaliyat.ammaliyat_commander_name, ";
        $query_string .= "ammaliyat.ammaliyat_description,manategh.manategh_id,manategh.manategh_name ";
        $query_string .= "from ammaliyat join ammaliyat_manategh join manategh ";
        $query_string .= "ON ammaliyat_manategh.ammaliyat_id = ammaliyat.ammaliyat_id && manategh.manategh_id = ammaliyat_manategh.manategh_id ";
        $query_string .= "LIMIT " . $limit . " OFFSET " . $start;

        $query = $this->db->query($query_string);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


}
