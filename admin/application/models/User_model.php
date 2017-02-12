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

//        $this->db->select('id, username, password' );
//        $this->db->from('users');
//        $this->db->where('username', $username);
//        $this->db->where('password', $password);//md5()
//        $this->db->limit(1);

        $query = $this->db->get_where('users',array('username'=>$username,'password'=>$password));
        if ($query->num_rows() ==1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>
