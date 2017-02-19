<?php

/**
 * Created by RAZZAGH SHAHIDI.(razagh.shahidi74@gmail.com)
 * Date: 02/06/2017
 * Time: 12:43 AM
 *Description: get user detail for auth
 */


/**@
 * Class User_model
 */
Class User_model extends CI_Model
{

    /**
     * @param $username
     * @param $password
     * @return object
     * @return bool
     * @description get user with username and password (if user exist return user object, else return false)
     */
    function login($username, $password)
    {
        //get user with username and password
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));

        //check is user exist
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>
