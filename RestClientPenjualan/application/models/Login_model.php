<?php
class Login_model extends CI_Model{
    //cek Login Admin
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
    //cek Login Users
    function auth_users($username,$password){
        $query=$this->db->query("SELECT * FROM users WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
 
}