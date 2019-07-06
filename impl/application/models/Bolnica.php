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

    public function naziv($id) {
        $this->db->select('*');
        $this->db->from('bolnica');
        $this->db->where('IdBolnica', $id);
        return $this->db->get()->row()->Naziv;
    }

    public function dohvatiBolnice($id) {
        $this->db->select('*');
        $this->db->from('bolnica');
        $this->db->where('isActive', 1);
        $this->db->where('IdBolnica!=', $id);
        return $this->db->get()->result();
    }

    public function dohvatiSveBolnice() {
        $this->db->select('*');
        $this->db->from('bolnica');
        $this->db->where('isActive', 1);
        return $this->db->get()->result();
    }

    public function dodajBolnicu($naziv, $adresa) {
        $data = [];
        $data["Naziv"] = $naziv;
        $data["Adresa"] = $adresa;
        $data["isActive"] = 1;
        $this->db->insert("bolnica",$data);
    }
    
    public function deactivateById($idBolnica){
        $this->db->set("isActive",0);
        $this->db->where("IdBolnica", $idBolnica);
        $this->db->update("bolnica");
    }
    
    public function izmeniBolnicu($idB, $naziv, $adresa){
        $this->db->set("Naziv",$naziv);
        $this->db->set("Adresa",$adresa);
        $this->db->where("IdBolnica", $idB);
        $this->db->update("bolnica");
    }
    
    public function dohvatiBolnicu($id){
        $this->db->select('*');
        $this->db->from('bolnica');
        $this->db->where('IdBolnica', $id);
        return $this->db->get()->row();
    }
    

}
