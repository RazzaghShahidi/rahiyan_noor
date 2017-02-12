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

    //get all manategh
    function get_all_manategh(){
        return $this->db->get('manategh');
    }
}
