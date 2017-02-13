<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/06/2017
 * Time: 12:43 AM
 *Description:
 */
Class User_model extends CI_Model
{
    function login($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>
