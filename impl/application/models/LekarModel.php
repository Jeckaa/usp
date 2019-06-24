<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LekarModel
 *
 * @author Jeckaa
 */
class LekarModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function imeiPrezime($username)
    {
        $this->db->select('*');
        $this->db->from('lekar');
        $this->db->where('Username', $username);
        
        $res=$this->db->get()->row();
        $ret=$res->Ime." ".$res->Prezime;
        return $ret;         
    }
}
