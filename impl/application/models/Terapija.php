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
        return $this->db->query("select * from terapija where IdTerapija={$idTher}")->row();
    }
    
    public function dodajTerapiju($userPac, $userLekar, $sadrzaj){
        $data = [];
        $data["Datum"] = date("Y-m-d H:i:s");
        $data["Pacijent"] = $userPac;
        $data["Lekar"] = $userLekar;
        $data["Opis"] = $sadrzaj;
        $this->db->insert("terapija", $data);
    }
    
    public function obrisiTerapiju($idTher){
        $this->db->where("IdTerapija", $idTher);
        $this->db->delete("terapija");
    }
    
    public function izmeniTerapiju($id, $sadrzaj){
        $this->db->set('Opis', $sadrzaj);
        $this->db->where('IdTerapija', $id);
        $this->db->update('terapija');
    }
}
