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
        $this->load->model('LekarModel');
        $this->load->model('Bolnica');
        $this->load->model('Korisnik');
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
        $data['lekar']= $this->LekarModel->imeiPrezime($res->Lekar);
        $data['bolnica']= $this->Bolnica->naziv($res->Bolnica);
        $this->load->view('pacijent/info.php', $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function edit()
    {
        $this->load->view("sablon/headerPacijent.php");
        $username= $this->session->userdata('user');
        $res= $this->PacijentModel->info($username);
        $data['ime']=$res->Ime;
        $data['prezime']= $res->Prezime;
        $data['adresa']=$res->Adresa;
        $data['lekarUsername']= $res->Lekar;
        $data['lekarImePrez'] = $this->LekarModel->imeiPrezime($res->Lekar);
        $data['lekari']= $this->LekarModel->lekariIzBolnice($res->Bolnica, $res->Lekar);
        $this->load->view("pacijent/edit.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function promeniPodatke()
    {
        $username= $this->session->userdata('user');
        $ime= $this->input->post('ime');
        $prezime=$this->input->post('prezime');
        $adresa=$this->input->post('adresa');
        $password= $this->input->post('password');
        $lekar= $this->input->post('lekar');
        if (!empty($ime)) 
        {
            $this->PacijentModel->promeniIme($ime, $username);
        }
        if (!empty($prezime)) 
        {
            $this->PacijentModel->promeniPrezime($prezime, $username);
        }
        if (!empty($password)) 
        {
            $this->Korisnik->promeniPassword($password, $username);
        }
        if (!empty($adresa)) 
        {
            $this->PacijentModel->promeniAdresu($adresa, $username);
        }
        $mainLekar= $this->PacijentModel->info($username)->Lekar;
        if ($lekar!==$mainLekar) 
        {
            $this->PacijentModel->promeniLekara($lekar, $username);
        }
        $this->load->view("sablon/headerPacijent.php");
        $this->load->view("pacijent/edit.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
}
