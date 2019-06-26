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
        if ($res!=NULL)
        $ret=$res->Ime." ".$res->Prezime;
        else $ret='<b style="color:red;">Izaberite lekara!</b>';
        return $ret;         
    }
    
    public function lekariIzBolnice($idBolnice, $idLekara=NULL)
    {
        $this->db->select('*');
        $this->db->from('lekar');
        $this->db->where('Bolnica', $idBolnice);
        if ($idLekara!=NULL) $this->db->where('Username !=', $idLekara);
        return $this->db->get()->result();
    }
    
    public function sviLekari()
    {
        $this->db->select('*');
        $this->db->from('lekar');
        return $this->db->get()->result();
    }
    
    public function dodajLekara($username, $ime, $prezime, $jmbg, $adresa, $bolnica)
    {
        $this->db->set('Username', $username);
        $this->db->set('Ime', $ime);
        $this->db->set('Prezime', $prezime);
        $this->db->set('JMBG', $jmbg);
        $this->db->set('Adresa', $adresa);
        $this->db->set('Bolnica', $bolnica);
        $this->db->insert('lekar');
    }
    
    public function izbrisi($lekar)
    {
        $this->db->where('Username', $lekar);
        $this->db->delete('lekar');
    }
}
