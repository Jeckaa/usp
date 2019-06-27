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
        $this->load->model('Poruka');
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
    
    public function sviPacijenti()
    {
        $this->db->select('*');
        $this->db->from('pacijent');
        $this->db->where('isActive', 1);
        return $this->db->get()->result();
    }
    
    public function dodajPacijenta($username, $ime, $prezime, $bolnica, $lekar, $adresa, $jmbg)
    {
        $this->db->set('Username', $username);
        $this->db->set('Lekar', $lekar);
        $this->db->set('Ime', $ime);
        $this->db->set('Prezime', $prezime);
        $this->db->set('JMBG', $jmbg);
        $this->db->set('Adresa', $adresa);
        $this->db->set('Bolnica', $bolnica);
        $this->db->set('isActive', 1);
        $this->db->insert('pacijent');
    }
    
    public function izbrisi($username)
    {
        $this->db->set('isActive', 0);
        $this->db->where('Username', $username);
        $this->db->update('pacijent');
    }
    
    public function posaljiPoruku($lekar, $username)
    {
        $this->db->select('*');
        $this->db->from('pacijent');
        $this->db->where('Lekar', $lekar);
        $this->db->where('isActive', 1);
        $res= $this->db->get()->result();
        foreach ($res as $pacijent)
        {
            $sadrzaj="Molimo vas da ponovo izaberete lekara!";
            $this->Poruka->posalji($username, $pacijent->Username, $sadrzaj);
        }
    }
}
