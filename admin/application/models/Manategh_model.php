<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/03/2017
 * Time: 01:23 PM
 *Description: model for manategh. get and insert into manategh table
 */
class Manategh_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    //insert mantaghe
    function insert($data)
    {
        $inserted_id = $this->db->insert('manategh', $data);
        if ($inserted_id) {
            return $this->db->insert_id();
        }
    }


    /**@
     * @param $id
     * @param $data
     * @return bool
     * @description insert mantaghe
     */
    function update($id, $data)
    {
        $this->db->where('manategh_id',$id);
        $updated_id=$this->db->update('manategh', $data);
        if ($updated_id) {
            return $updated_id;
        }
        return false;
    }


    /**@
     * @return mixed
     * @description get all manategh
     */
    function get_all_manategh()
    {
        return $this->db->get('manategh')->result_array();
    }

    /**@
     * @return mixed
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
     */
    public function fetch_manategh($limit, $start,$id)
    {
        $this->db->limit($limit, $start);
        if(isset($id)){
            $this->db->where('manategh_id',$id);
        }
        $query = $this->db->get("manategh");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }


    }
}