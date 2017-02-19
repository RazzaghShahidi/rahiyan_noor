<?php

/**
 * @Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * @Date: 02/08/2017
 * @Time: 09:12 PM
 * @Description:
 */

/**@
 * Class Ammaliyat_model
 */
class Ammaliyat_model extends CI_Model
{
    /**@
     * Ammaliyat_model constructor.
     */
    function __construct()
    {
        parent::__construct();
    }


    /**@
     * @param $data
     * @param $manategh
     * @return bool
     * @description insert ammaliyat into ammaliyat table
     *              and insert each relation with manategh into ammaliyat_manategh
     */
    function insert($data, $manategh)
    {
        //insert ammaliyat detail in ammaliyat_table
        $this->db->insert('ammaliyat', $data);

        //getting id of inserted ammaliyat for inserting in ammaliyat_manategh
        $inserted_id = $this->db->insert_id();

        //inserting relation with manategh in ammaliyat_manategh
        foreach ($manategh as $mantaghe) {
            //for each manategh insert in ammaliyat_manategh
            $relation = array(
                'ammaliyat_id' => $inserted_id,
                'manategh_id' => $mantaghe,
            );
            $this->db->insert('ammaliyat_manategh', $relation);
        }

        if ($inserted_id) {
            return $inserted_id;
        } else {
            return false;
        }
    }



    /**@
     * @param $id
     * @param $data
     * @param $manategh
     * @return mixed
     * @description update ammaliyat in ammaliyat table and it's relation with manategh in
     *               ammaliyat_manategh table
     *
     */
    function update($id, $data, $manategh)
    {
        $this->db->where('ammaliyat_id', $id);
        $updated_id = $this->db->update('ammaliyat', $data);

        $this->db->where('ammaliyat_id',$id);
        $this->db->delete('ammaliyat_manategh');

        //inserting relation with manategh in ammaliyat_manategh
        foreach ($manategh as $mantaghe) {
            //for each manategh insert in ammaliyat_manategh
            $relation = array(
                'ammaliyat_id' => $id,
                'manategh_id' => $mantaghe,
            );
            $this->db->insert('ammaliyat_manategh', $relation);
        }
        return $updated_id;
    }


    /**@
     * @param $ammaliyat
     * @param $mantaghe_id
     * @return bool
     * @return object of ammaliyat_id
     * @description get ammaliyat_id with specific manategh_id (return just ammaliyat_id)
     */
    function get_ammaliyat_id($ammaliyat, $mantaghe_id)
    {
        if ($ammaliyat == "ammaliyat") {
            $this->db->select('ammaliyat_id');
            $this->db->where('manategh_id', $mantaghe_id);
            $this->db->from('ammaliyat_manategh');
            return $this->db->get();
        } else {
            return false;
        }
    }


    /**@
     * @param $ammaliyat_id
     * @return mixed
     * @description get ammaliyat detail depemd on ammaliyat_id (no detail about manategh)
     */
    function get_depend_ammaliyat($ammaliyat_id)
    {
        $this->db->where('ammaliyat_id', $ammaliyat_id);
        $this->db->from('ammaliyat');
        return $this->db->get();
    }


    /**@
     * @return mixed
     * @description return number of ammaliyat
     */
    public function ammaliyat_count()
    {
        return $this->db->count_all("ammaliyat");
    }


    /**@
     * @param $limit
     * @param $start
     * @param $id
     * @return array|bool
     * @description fetch all ammaliyat with them manategh details
     */
    public function fetch_ammaliyat($limit, $start, $id)
    {
        $this->db->select('*');
        $this->db->from('ammaliyat');
        $this->db->limit($limit, $start);
        if (isset($id)) {
            //for getting spesific ammaliyat with certain ammaliyat_id
            $this->db->where("ammaliyat.ammaliyat_id", $id);
        }
        $query = $this->db->get()->result_array();

        foreach ($query as $key => $ammaliyat) {
            $result[$key] = $ammaliyat;
            $this->db->select('*');
            $this->db->from('ammaliyat_manategh');
            $this->db->join('manategh', 'ammaliyat_manategh.manategh_id=manategh.manategh_id');
            $this->db->where('ammaliyat_manategh.ammaliyat_id', $ammaliyat['ammaliyat_id']);
            $result[$key]["manategh"] = $this->db->get()->result_array();
        }

        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    /**@
     * @param $id
     * @return bool
     * @description delete ammaliyat from ammaliyat table and ammaliyat_manategh and depended relation with shahidan, media,term tables
     */
    // Function to Delete selected record from table .
    function delete_ammaliyat_id($id)
    {
        //dalete from table ammaliyat
        $this->db->where('ammaliyat_id', $id);
        $this->db->delete('ammaliyat');
        $status = $this->db->affected_rows();

        //dalete from table ammaliyat_manategh
        $this->db->where('ammaliyat_id', $id);
        $this->db->delete('ammaliyat_manategh');

        //dalete from table shahidan_ammaliyat
        $this->db->where('ammaliyat_id', $id);
        $this->db->delete('shahidan_ammaliyat');

        //dalete from table media_term
        $this->db->where('term_type', 'ammaliyat');
        $this->db->where('term_id', $id);
        $this->db->delete('media_term');

        //dalete from table meta_term
        $this->db->where('term_type', 'ammaliyat');
        $this->db->where('term_id', $id);
        $this->db->delete('meta_term');

        if ($status) {
            return true;
        } else {
            return false;
        }
    }

}
