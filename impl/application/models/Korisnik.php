<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Korisnik
 *
 * @author Jeckaa
 */
class Korisnik extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('Korisnik');
        $this->db->where('Username',$username);
        $result= $this->db->get()->row();
        if ($result!=NULL)
        {
            if ($password== $result->Password)
            {
                return $result;
            }
            else return 1;
        }
        else return 2;
    }
    public
            function promeniPassword($password, $username) 
    {
        $this->db->set('Password', $password);
        $this->db->where('Username', $username);
        $this->db->update('korisnik');
    }
}
