<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bolnica
 *
 * @author Jeckaa
 */
class Bolnica extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function naziv($id)
    {
        $this->db->select('*');
        $this->db->from('bolnica');
        $this->db->where('IdBolnica', $id);
        return $this->db->get()->row()->Naziv;
    }
    
    public function dohvatiBolnice($id)
    {
        $this->db->select('*');
        $this->db->from('bolnica');
        $this->db->where('IdBolnica!=', $id);
        return $this->db->get()->result();
    }
    
    public function dohvatiSveBolnice()
    {
       $this->db->select('*');
        $this->db->from('bolnica');
        return $this->db->get()->result(); 
    }
}
