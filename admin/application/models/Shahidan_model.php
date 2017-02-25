<?php

/**
 * Created by Sarwin
 * Date: 02/03/2017
 * Time: 12:54 PM
 *Description:
 */

/**@
 * Class Shahidan_model
 */
class Shahidan_model extends CI_Model
{
    /**@
     * Shahidan_model constructor.
     */
    function __construct()
    {
        parent::__construct();
    }



    /**@
     * @param $data
     * @param $ammaliyat
     * @return bool
     * @description Insert shahidan and it's depend ammaliyat into database
     */
    function insert($data, $ammaliyat)
    {

        //insert shahidan
        $this->db->insert('shahidan', $data);

        //get id of inserted shahidan to insert depend  ammaliyat
        $inserted_id = $this->db->insert_id();

        //insert all ammaliyat
        foreach ($ammaliyat as $ammal) {

            //format each depend ammaliyat
            $shahidan_ammaliyat = array(
                'id' => NULL,
                'shahidan_id' => $inserted_id,
                'ammaliyat_id' => $ammal,
            );

            //insert ammaliyat
            $this->db->insert('shahidan_ammaliyat', $shahidan_ammaliyat);
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
     * @param $ammaliyat
     * @return mixed
     * @description update shahidan
     */
    function update($id, $data, $ammaliyat)
    {

        //update  shahidan
        $this->db->where('shahidan_id', $id);
        $updated_id = $this->db->update('shahidan', $data);

        //delete ammaliyat (first delete old ammaliyat then insert ammaliyat)
        $this->db->where('shahidan_id', $id);
        $this->db->delete('shahidan_ammaliyat');

        //inserting relation with ammaliyat in shahidan_ammaliyat
        foreach ($ammaliyat as $ammal) {

            //format array to insert
            $relation = array(
                'shahidan_id' => $id,
                'ammaliyat_id' => $ammal,
            );

            //for each ammaliyat insert in shahidan_ammaliyat
            $this->db->insert('shahidan_ammaliyat', $relation);
        }
        return $updated_id;

    }

    /**
     * @param $shahidan
     * @param $amamliyat_id
     * @return bool
     * @description get just id of shahidan depend on ammaliyat id (list shahidan)
     */
    function get_shahidan_id($shahidan, $amamliyat_id)
    {
        if ($shahidan == "shahidan") {
            $this->db->select('shahidan_id');
            $this->db->where('ammaliyat_id', $amamliyat_id);
            $this->db->from('shahidan_ammaliyat');
            return $this->db->get();
        } else {
            return false;
        }
    }

    /**
     * @param $shahidan_id
     * @return mixed
     * @description get shahidan with shshidan id
     */
    function get_depend_shahidan($shahidan_id)
    {
        $this->db->where('shahidan_id', $shahidan_id);
        $this->db->from('shahidan');
        return $this->db->get();
    }


    /**
     * @return mixed
     * @description  count number of shahidan
     */
    public function shahidan_count()
    {
        return $this->db->count_all("shahidan");
    }


    /**
     * @param $limit
     * @param $start
     * @param $id
     * @return bool
     * @description Get list of all shahidan and them ammaliyat
     */
    public function fetch_shahidan($limit, $start, $id)
    {

        $this->db->select('*');
        $this->db->from('shahidan');
        $this->db->limit($limit, $start);

        //if spesific shahid id needed
        if (isset($id)) {
            //for getting spesific shahidan with certain shahidan_id
            $this->db->where("shahidan.shahidan_id", $id);
        }

        $query = $this->db->get()->result_array();

        if (count($query) > 0) {
            //get ammaliyat of each shahida
            foreach ($query as $key => $shahidan) {
                $result[$key] = $shahidan;
                $this->db->select('*');
                $this->db->from('shahidan_ammaliyat');
                $this->db->join('ammaliyat', 'shahidan_ammaliyat.ammaliyat_id=ammaliyat.ammaliyat_id');
                $this->db->where('shahidan_ammaliyat.shahidan_id', $shahidan['shahidan_id']);
                $result[$key]["ammaliyat"] = $this->db->get()->result_array();
            }

            return $result;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool
     * @description Delete selected record from shahidan, shahidan ammaliyat, meta, media table .
     */
    function delete_shahidan_id($id)
    {
        $this->db->where('shahidan_id', $id);
        $this->db->delete('shahidan');

        $this->db->where('shahidan_id', $id);
        $this->db->delete('shahidan_ammaliyat');

        $this->db->where('term_type', "shahidan");
        $this->db->where('term_id', $id);
        $this->db->delete('media_term');

        $this->db->where('term_type', "shahidan");
        $this->db->where('term_id', $id);
        $this->db->delete('meta_term');


        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}
 