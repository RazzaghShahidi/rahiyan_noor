<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/03/2017
 * Time: 01:23 PM
 *Description: model for manategh. get and insert into manategh table
 */

/**@
 * Class Manategh_model
 */
class Manategh_model extends CI_Model
{

    /**@
     * Manategh_model constructor.
     */
    function __construct()
    {
        parent::__construct();
    }


    /**@
     * @param $data
     * @return mixed
     * @description insert manategh
     */
    function insert($data)
    {
        $inserted_id = $this->db->insert('manategh', $data); //insert manategh and return insert detail
        if ($inserted_id) {
            return $this->db->insert_id();
        }
    }


    /**@
     * @param $id
     * @param $data
     * @return bool
     * @description Update manategh
     */
    function update($id, $data)
    {
        $this->db->where('manategh_id', $id);
        $updated_id = $this->db->update('manategh', $data);
        if ($updated_id) {
            return $updated_id;
        }
        return false;
    }


    /**@
     * @return mixed
     * @description Get all manategh
     */
    function get_all_manategh()
    {
        return $this->db->get('manategh')->result_array();
    }


    /**@
     * @return mixed
     * @description count number of manategh
     */
    public function manategh_count()
    {
        return $this->db->count_all("manategh");
    }


    /**@
     * @param $limit
     * @param $start
     * @param $id
     * @return array|bool
     * @description fetch all manategh with
     */
    public function fetch_manategh($limit, $start, $id)
    {
        $this->db->limit($limit, $start);
        if (isset($id)) {
            $this->db->where('manategh_id', $id);
        }
        $query = $this->db->get("manategh")->result_array();
        return $query;

    }


    /**@
     * @param $id
     * @return bool
     * @description  Function to Delete selected record from table .
     */
    function delete_manategh_id($id)
    {
        $this->db->where('manategh_id', $id);
        $this->db->delete('manategh');

        $this->db->where('manategh_id', $id);
        $this->db->delete('ammaliyat_manategh');

        //dalete from table media_term
        $this->db->where('term_type', 'manategh');
        $this->db->where('term_id', $id);
        $this->db->delete('media_term');

        //dalete from table meta_term
        $this->db->where('term_type', 'manategh');
        $this->db->where('term_id', $id);
        $this->db->delete('meta_term');

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }


    }
}