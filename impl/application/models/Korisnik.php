<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Korisnik
 *
 * @author Jeckaa
 */
class Korisnik extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('Korisnik');
        $this->db->where('Username',$username);
        $this->db->where('isActive', 1);
        $result= $this->db->get()->row();
        if ($result!=NULL)
        {
            if ($password== $result->Password)
            {
                return $result;
            }
            else return '1';
        }
        else return '2';
    }
    public function promeniPassword($password, $username) 
    {
        $this->db->set('Password', $password);
        $this->db->where('Username', $username);
        $this->db->update('korisnik');
    }
    
    public function isExisting($username)
    {
        $this->db->select('*');
        $this->db->from('Korisnik');
        $this->db->where('Username',$username);
        $result= $this->db->get()->row();
        if ($result!=NULL) return TRUE;
        else return FALSE;
    }
    
    public function dodajKorisnika($username, $password, $type)
    {
        $this->db->set('Username', $username);
        $this->db->set('Password', $password);
        $this->db->set('Tip', $type);
        $this->db->set('isActive', 1);
        $this->db->insert('korisnik');
    }
    
    public function izbrisi($username)
    {
        $this->db->set('isActive', 0);
        $this->db->where('Username', $username);
        $this->db->update('korisnik');
    }
}
