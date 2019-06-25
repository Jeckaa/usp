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
        $this->load->model('Merenja');
        $this->load->model('Poruka');
        if ($this->session->userdata('type')!=NULL)
        {
            if ($this->session->userdata('type')==='A')
            {
                redirect("Admin");
            }
            else if ($this->session->userdata('type')==='S')
            {
                redirect("Sluzbenik");
            }
            else if ($this->session->userdata('type')==='L') redirect("Lekar");
        }
        else redirect("Gost");
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Gost');
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
        $this->index();
    }
    
    public function editBolnica($poruka=NULL)
    {
        $this->load->view("sablon/headerPacijent.php");
        $username= $this->session->userdata('user');
        $res=$this->PacijentModel->info($username);
        $data['bolnice']= $this->Bolnica->dohvatiBolnice($res->Bolnica);
        $data['idBolnice']=$res->Bolnica;
        $data['nazivBolnice']= $this->Bolnica->naziv($res->Bolnica);
        if ($poruka!=NULL) $data['message']= $poruka;
        $this->load->view("pacijent/editBolnica.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function editBolnica2()
    {
        $bolnica= $this->input->post('bolnica');
        $username= $this->session->userdata('user');
        $res=$this->PacijentModel->info($username);
        if ($bolnica===$res->Bolnica) 
        {
            $poruka="Izabrali ste bolnicu u kojoj ste trenutno prijavljeni! <br> Ukoliko zelite da promenite"
                    . "lekara na pocetnoj strani izaberite 'Promeni informacije'. <br> Ukoliko ne zelite da menjate bolnicu kliknite"
                    . "na 'Otkazi'.";
            $this->editBolnica($poruka);
        }
        else
        {
            $this->session->set_userdata('bolnicatmp', $bolnica);
            $lekari= $this->LekarModel->lekariIzBolnice($bolnica);
            $data['lekari']=$lekari;
            $this->load->view('pacijent/editBolnica2.php', $data);
        }
    }
    
    public function editBolnicaFinal()
    {
        $lekar=$this->input->post('lekar');
        $bolnica= $this->session->userdata('bolnicatmp');
        $username= $this->session->userdata('user');
        if ($lekar==='null') 
        {
            $message="Morate da izaberete lekara!";
            $lekari= $this->LekarModel->lekariIzBolnice($bolnica);
            $data['lekari']=$lekari;
            $data['message']=$message;
            $this->load->view('pacijent/editBolnica2.php', $data);
        }
        else
        {
            $this->PacijentModel->promeniBolnicu($username, $bolnica, $lekar);
            $this->session->unset_userdata('bolnicatmp');
            redirect('Pacijent');
        }
    }
    
    public function evidencija()
    {
        $this->load->view("sablon/headerPacijent.php");
        $username= $this->session->userdata('user');
        $data['merenja']=$this->Merenja->dohvMerenja($username);
        $this->load->view("pacijent/evidencija.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function slanjePoruke($message=NULL)
    {
        $this->load->view("sablon/headerPacijent.php");
        $username= $this->session->userdata('user');
        $lekar=$this->PacijentModel->info($username)->Lekar;
        $data['lekar']=$this->LekarModel->imeiPrezime($lekar);
        if ($message!=NULL) {
            $data['message']=$message;
        }
        $this->load->view("pacijent/slanjePoruke.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function posaljiPoruku()
    {
        $sadrzaj= $this->input->post('sadrzaj');
        if (empty($sadrzaj))
        {
            $message="Morate uneti poruku!";
            $this->slanjePoruke($message);
        }
        else
        {
            $username= $username= $this->session->userdata('user');
            $lekar=$this->PacijentModel->info($username)->Lekar;
            $this->Poruka->posalji($username, $lekar, $sadrzaj);
            $this->index();
        }
    }
}
