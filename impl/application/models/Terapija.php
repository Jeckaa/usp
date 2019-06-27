<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Terapije
 *
 * @author Jeckaa
 */
class Terapija extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvTerapije($username)
    {
        $query="select * from terapija where Pacijent=".$this->db->escape($username)." order by Datum desc";
        return $this->db->query($query)->result();
    }
    
    public function getTherapyById($idTher){
        return $this->db->query("select + from terapija where IdTerapija={$idTher}")->row();
    }
}
