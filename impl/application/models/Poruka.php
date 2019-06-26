<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Poruka
 *
 * @author Jeckaa
 */
class Poruka extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function posalji($od, $do, $sadrzaj)
    {
        $query="select * from poruka order by IdPoruka desc";
        $row=$this->db->query($query)->row();
        $id= $row->IdPoruka+1;
        $this->db->set('IdPoruka', $id); 
        $this->db->set('Procitana', 0);
        $this->db->set('PorukaOd', $od);
        $this->db->set('PorukaDo', $do);
        $this->db->set('Sadrzaj', $sadrzaj);
        $datum=date("Y-m-d H:i:s");
        $this->db->set('Datum', $datum);
        $this->db->insert('poruka');
        
    }
    
    public function dohvPoruke($user)
    {
        $query="select * from poruka where PorukaOd=".$this->db->escape($user)." or PorukaDo=". $this->db->escape($user)." order by Datum desc";
        return $this->db->query($query)->result();
    }
    
    public function procitajPoruku($idPoruka, $username)
    {
        $this->db->select('*');
        $this->db->from('poruka');
        $this->db->where('IdPoruka', $idPoruka);
        $poruka= $this->db->get()->row();
        if ($poruka!=NULL)
        {
            if ($poruka->PorukaDo===$username)
            {
                $this->db->set('Procitana', 1);
                $this->db->where('IdPoruka', $idPoruka);
                $this->db->update('poruka');
            }
        }
        return $poruka;
    }
    
    public function dohvPrimljene($username)
    {
        $query="select * from poruka where PorukaDo=".$this->db->escape($username)." order by Datum desc";
        return $this->db->query($query)->result();
    }
    
    public function dohvProcitane($username)
    {
        $query="select * from poruka where PorukaOd=".$this->db->escape($username)." order by Datum desc";
        return $this->db->query($query)->result();
    }
}
