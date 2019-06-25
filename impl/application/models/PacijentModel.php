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
    
    public function promeniIme($ime, $username)
    {
        $this->db->set('Ime', $ime);
        $this->db->where('Username', $username);
        $this->db->update('pacijent');
    }
    
    public function promeniPrezime($prezime, $username)
    {
        $this->db->set('Prezime', $prezime);
        $this->db->where('Username', $username);
        $this->db->update('pacijent');
    }
    
    
    public function promeniAdresu($adresa, $username)
    {
        $this->db->set('Adresa', $adresa);
        $this->db->where('Username', $username);
        $this->db->update('pacijent');
    }
    
    public function promeniLekara($lekar, $username)
    {
        $this->db->set('Lekar', $lekar);
        $this->db->where('Username', $username);
        $this->db->update('pacijent');
    }
    
    public function promeniBolnicu($username, $bolnica, $lekar)
    {
        $this->db->set('Bolnica', $bolnica);
        $this->db->set('Lekar', $lekar);
        $this->db->where('Username', $username);
        $this->db->update('pacijent');
    }
}
