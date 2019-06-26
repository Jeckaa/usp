<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Merenja
 *
 * @author Jeckaa
 */
class Merenja extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvMerenja($username)
    {
        $query="select * from merenja where Username=".$this->db->escape($username)."order by Datum DESC";
        return $this->db->query($query)->result();
    }
    
    public function dohvMerenjaPoTipu($username, $type)
    {
        $query="select * from merenja where Username=".$this->db->escape($username)." and Tip=".$this->db->escape($type)." order by Datum DESC";
        return $this->db->query($query)->result();
    }
}
