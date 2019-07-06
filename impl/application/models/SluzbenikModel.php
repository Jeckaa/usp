<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SluzbenikModel
 *
 * @author Stefan
 */
class SluzbenikModel extends CI_Model{
    public function dodajSluzbenika($username, $pass){
        $data = [];
        $data["Username"] = $username;
        $data["Password"] = $pass;
        $data["isActive"] = 1;
        $data["Tip"] = "S";
        $this->db->insert("korisnik",$data);
    }
    
    public function getAll(){
        $this->db->select("*");
        $this->db->from("korisnik");
        $this->db->where("Tip", "S");
        $this->db->where("isActive", 1);
        return $this->db->get()->result();
    }
    
    public function deactivate($username){
        $this->db->set("isActive", 0);
        $this->db->where("Username", $username);
        $this->db->update("korisnik");
    }
}
