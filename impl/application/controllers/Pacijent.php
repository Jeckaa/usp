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
class Pacijent extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('PacijentModel');
    }
    
    public function index()
    {
        $this->load->view("sablon/headerPacijent.php");
        $username= $this->session->userdata('user');
        $res= $this->PacijentModel->info($username);
        $data['username']=$username;
        $data['ime']=$res->Ime;
        $data['prezime']= $res->Prezime;
        $data['adresa']=$res->Adresa;
        $data['JMBG'] = $res->JMBG;
        $this->load->view("sablon/footer.php");
    }
    
}
