<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sluzbenik
 *
 * @author Jeckaa
 */
class Sluzbenik extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('PacijentModel');
        $this->load->model('LekarModel');
        $this->load->model('Korisnik');
        $this->load->model('Bolnica');
        
        if ($this->session->userdata('type')!=NULL)
        {
            if ($this->session->userdata('type')==='A')
            {
                redirect("Admin");
            }
            else if ($this->session->userdata('type')==='P')
            {
                redirect("Pacijent");
            }
            else if ($this->session->userdata('type')==='L') redirect("Lekar");
        }
        else redirect("Gost");
    }
    
    public function index()
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data['username']= $this->session->userdata('user');
        $data['pacijenti']= $this->PacijentModel->sviPacijenti();
        $data['lekari']=$this->LekarModel->sviLekari();
        $this->load->view("sluzbenik/index.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Gost');
    }
    
    public function pacijenti()
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data['pacijenti']= $this->PacijentModel->sviPacijenti();
        $this->load->view("sluzbenik/pacijenti.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajPacijenta($message=NULL) 
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data=[];
        if ($message!=NULL) $data['message']=$message;
        $data['bolnice']= $this->Bolnica->dohvatiSveBolnice();
        $this->load->view("sluzbenik/dodajPacijenta1.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajPacijenta2($message=NULL)
    {
        $username= $this->input->post('username');
        $ime= $this->input->post('ime');
        $prezime= $this->input->post('prezime');
        $jmbg=$this->input->post('jmbg');
        $adresa=$this->input->post('adresa');
        $bolnica= $this->input->post('bolnica');
        $password=$this->input->post('password');
        $conf_password=$this->input->post('conf_pass');
        if (empty($username) || empty($ime) || empty($prezime) || empty($jmbg) || empty($adresa)|| $bolnica==='null' || empty($password) || empty($conf_password))
        {
            $poruka="Sva polja moraju biti popunjena!";
            $this->dodajPacijenta($poruka);
        }
        else
        {
            if ($this->Korisnik->isExisting($username))
            {
                $poruka="Vec postoji korisnik sa unetim korisnickim imenom!";
                $this->dodajPacijenta($poruka);
            }
            else if ($password!==$conf_password)
            {
                $poruka="Sifra i potvrda sifre moraju biti identicne!";
                $this->dodajPacijenta($poruka);
            }
            else
            {
                $this->session->set_userdata("temp_username", $username);
                $this->session->set_userdata("temp_pass", $password);
                $this->session->set_userdata("temp_ime", $ime);
                $this->session->set_userdata("temp_prezime", $prezime);
                $this->session->set_userdata("temp_adresa", $adresa);
                $this->session->set_userdata("temp_jmbg", $jmbg);
                $this->session->set_userdata("temp_bolnica", $bolnica);
                $lekari= $this->LekarModel->lekariIzBolnice($bolnica);
                $data['lekari']=$lekari;
                $this->load->view("sluzbenik/dodajPacijenta2.php", $data);
            }
        }
    }
    public function dodajPacijentaFinal()
    {
        $lekar= $this->input->post('lekar');
        $bolnica= $this->session->userdata('temp_bolnica');
        $username=$this->session->userdata("temp_username");
        $password=$this->session->userdata("temp_pass");
        $ime=$this->session->userdata("temp_ime");
        $prezime=$this->session->userdata("temp_prezime");
        $adresa=$this->session->userdata("temp_adresa");
        $jmbg=$this->session->userdata("temp_jmbg");
        if ($lekar==='null') 
        {
            $message="Morate da izaberete lekara!";
            $lekari= $this->LekarModel->lekariIzBolnice($bolnica);
            $data['lekari']=$lekari;
            $data['message']=$message;
            $this->load->view('pacijent/dodajPacijenta2.php', $data);
        }
        else
        {
            $this->Korisnik->dodajKorisnika($username, $password, 'P');
            $this->PacijentModel->dodajPacijenta($username, $ime, $prezime, $bolnica, $lekar, $adresa, $jmbg);
            $this->session->unset_userdata("temp_username");
            $this->session->unset_userdata("temp_pass");
            $this->session->unset_userdata("temp_ime");
            $this->session->unset_userdata("temp_prezime");
            $this->session->unset_userdata("temp_adresa");
            $this->session->unset_userdata("temp_jmbg");
            $this->session->unset_userdata("temp_bolnica");
            redirect("Sluzbenik");
        }
    }
    
    public function otkaziDodavanje()
    {
        $this->session->unset_userdata("temp_username");
        $this->session->unset_userdata("temp_pass");
        $this->session->unset_userdata("temp_ime");
        $this->session->unset_userdata("temp_prezime");
        $this->session->unset_userdata("temp_adresa");
        $this->session->unset_userdata("temp_jmbg");
        $this->session->unset_userdata("temp_bolnica");
        redirect("Sluzbenik");
    }


    public function izbrisiPacijenta() 
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data['pacijenti']= $this->PacijentModel->sviPacijenti();
        $this->load->view("sluzbenik/izbrisiPacijenta.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function brisanjePacijenata()
    {
        $pacijenti=$this->input->post('checkbox');
        foreach ($pacijenti as $pacijent)
        {
            $this->PacijentModel->izbrisi($pacijent);
            $this->Korisnik->izbrisi($pacijent);
        }
        $this->izbrisiPacijenta();
    }

    public function lekari()
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data['lekari']= $this->LekarModel->sviLekari();
        $this->load->view("sluzbenik/lekari.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajLekara($message=NULL) 
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data=[];
        if ($message!=NULL) $data['message']=$message;
        $data['bolnice']= $this->Bolnica->dohvatiSveBolnice();
        $this->load->view("sluzbenik/dodajLekara.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajLekara2()
    {
        $username= $this->input->post('username');
        $ime= $this->input->post('ime');
        $prezime= $this->input->post('prezime');
        $jmbg=$this->input->post('jmbg');
        $adresa=$this->input->post('adresa');
        $bolnica= $this->input->post('bolnica');
        $password=$this->input->post('password');
        $conf_password=$this->input->post('conf_pass');
        if (empty($username) || empty($ime) || empty($prezime) || empty($jmbg) || empty($adresa)|| $bolnica==='null' || empty($password) || empty($conf_password))
        {
            $poruka="Sva polja moraju biti popunjena!";
            $this->dodajLekara($poruka);
        }
        else
        {
            if ($this->Korisnik->isExisting($username))
            {
                $poruka="Vec postoji korisnik sa unetim korisnickim imenom!";
                $this->dodajLekara($poruka);
            }
            else if ($password!==$conf_password)
            {
                $poruka="Sifra i potvrda sifre moraju biti identicne!";
                $this->dodajLekara($poruka);
            }
            else
            {
                $this->Korisnik->dodajKorisnika($username, $password, 'L');
                $this->LekarModel->dodajLekara($username, $ime, $prezime, $jmbg, $adresa, $bolnica);
                $this->index();
            }
        }
    }
    
    public function izbrisiLekara() 
    {
        $this->load->view("sablon/headerSluzbenik.php");
        $data['lekari']= $this->LekarModel->sviLekari();
        $this->load->view("sluzbenik/izbrisiLekara.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function brisanjeLekara()
    {
        $lekari=$this->input->post('checkbox');
        foreach ($lekari as $lekar)
        {
            $username= $this->session->userdata('user');
            $this->PacijentModel->posaljiPoruku($lekar, $username);
            $this->LekarModel->izbrisi($lekar);
            $this->Korisnik->izbrisi($lekar);
        }
        $this->izbrisiLekara();
    }
}
