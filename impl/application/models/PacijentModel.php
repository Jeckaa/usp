<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pacijent
 *
 * @author Jeckaa
 */
class PacijentModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function info($username)
    {
        $this->db->select('*');
        $this->db->from('pacijent');
        $this->db->where('Username', $username);
        return $this->db->get()->row();
    }
}
