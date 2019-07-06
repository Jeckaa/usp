<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lekar
 *
 * @author Stefan
 */
class Lekar extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('type')===NULL) redirect("Gost");
        else
        {
            if ($this->session->userdata('type')==='A')
            {
                redirect("Admin");
            }
            else if ($this->session->userdata('type')==='P')
            {
                redirect("Pacijent");
            }
            else if ($this->session->userdata('type')==='S')
            {
                redirect("Sluzbenik");
            }
        }
        $this->load->model("PacijentModel");
        $this->load->model("Poruka");
        $this->load->model("Merenja");
        $this->load->model("Terapija");
        $this->load->model("LekarModel");
        $this->load->model("Bolnica");
    }

    public function index(){
        $data = [];
        $username = $this->session->userdata("user");
        $res= $this->LekarModel->info($username);
        $data['username']=$username;
        $data['ime']=$res->Ime;
        $data['prezime']= $res->Prezime;
        $data['adresa']=$res->Adresa;
        $data['JMBG'] = $res->JMBG;
        $bolnica = $this->Bolnica->dohvatiBolnicu($res->Bolnica);
        $data['bolnica']= $bolnica->Naziv;
        $data["active"] = $bolnica->isActive;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/info.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function promeniUstanovu($msg = null){
        $bolnice = $this->Bolnica->dohvatiSveBolnice();
        $data = [];
        $data["msg"] = $msg;
        $data["bolnice"] = $bolnice;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/promenaBolnice.php", $data);
        $this->load->view("sablon/footer.php");
        
    }
    
    public function promenaBolniceFn(){
        $bolnica = $this->input->post("selectBolnica");
        if(!isset($bolnica)){
            $this->promeniUstanovu("Niste izabrali ni jednu ustanovu");
        }
        $username = $this->session->userdata("user");
        $res= $this->LekarModel->info($username);
        if($res->Bolnica == $bolnica){
            $this->promeniUstanovu("Već ste prijavljeni na tom radnom mestu");
        }else{
            $this->LekarModel->promeniUstanovu($username, $bolnica);
            $this->index();
        }
    }
    
    public function pacijenti($msg=null){
        $data = [];
        $data["msg"] = $msg;
        $patients = $this->PacijentModel->mojiPacijenti($this->session->userdata("user"));
        $data["patients"] = $patients;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/pacijenti.php", $data);
        $this->load->view("sablon/footer.php");
        
    }
    
    public function merenja(){
        $pacUsername = $this->input->post("selectPacijent");
        $data = [];
        $data["merenja"] = $this->Merenja->dohvMerenja($pacUsername);
        $info = $this->PacijentModel->info($pacUsername);
        $data["ime"] = $info->Ime ." ". $info->Prezime;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/pregledMerenja.php", $data);
        $this->load->view("sablon/footer.php");
        
    }
    
    public function terapije($pacUser=null, $msg = null){
        $pacUsername ="";
        if($pacUser == null){
            $pacUsername = $this->input->post("selectPacijent");
        }else{
            $pacUsername = $pacUser;
        }
        $data = [];
        $data["msg"] = $msg;
        $data["terapije"] = $this->Terapija->dohvTerapije($pacUsername);
        $info = $this->PacijentModel->info($pacUsername);
        $data["ime"] = $info->Ime ." ". $info->Prezime;
        $data["pacUser"] = $pacUsername;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/pregledTerapija.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajTerapiju($msg = null){
        $data = [];
        $pacUsername = $this->input->post("selectPacijent");
        $info = $this->PacijentModel->info($pacUsername);
        $data["ime"] = $info->Ime ." ". $info->Prezime;
        $data["usernamePac"] = $pacUsername;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/dodavanjeTerapije.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajTerapijuFn(){
        $lekar = $this->session->userdata("user");
        $pac = $this->input->post("userPac");
        $sadrzaj = $this->input->post("sadrzaj");
        $this->Terapija->dodajTerapiju($pac,$lekar,$sadrzaj);
        $this->terapije($pac);
    }
    
    public function obrisiTerapiju(){
        $id = $this->input->post("theradio");
        if(!isset($id)){ 
            $this->terapije($this->input->post("pacUser"));
            return;
        }
        $ther = $this->Terapija->getTherapyById($id);
        $pacUser = $ther->Pacijent;
        $this->Terapija->obrisiTerapiju($id);
        $this->terapije($pacUser);
    }
    
    public function izmeniTerapiju(){
        $id = $this->input->post("theradio");
        if(!isset($id)){ 
            $this->terapije($this->input->post("pacUser"));
            return;
        }
        $ther = $this->Terapija->getTherapyById($id);
        $data = [];
        $data["id"] = $id;
        $data["text"] = $ther->Opis;
        
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/izmenaTerapije.php",$data);
        $this->load->view("sablon/footer.php");
    }
    
    public function izmeniTerapijuFn(){
        $id = $this->input->post("id");
        $sadrzaj = $this->input->post("text");
        $this->Terapija->izmeniTerapiju($id, $sadrzaj);
        $pacUser = $this->Terapija->getTherapyById($id)->Pacijent;
        $this->terapije($pacUser);
    }
    
    public function izmenaNazad(){
        $id = $this->input->post("id");
        $pacUser = $this->Terapija->getTherapyById($id)->Pacijent;
        $this->terapije($pacUser);
    }
    
    public function slanjePoruke($message=NULL){
        $this->load->view("sablon/headerLekar.php");
        $username= $this->session->userdata('user');
        $patients = $this->PacijentModel->mojiPacijenti($this->session->userdata("user"));
        $data["patients"] = $patients;
        if ($message!=NULL) {
            $data['message']=$message;
        }
        $this->load->view("lekar/slanjePoruke.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function posaljiPoruku(){
        $sadrzaj= $this->input->post('sadrzaj');
        $id = $this->input->post("pacSelect");
        if (empty($sadrzaj) || !isset($id))
        {
            $message="Morate uneti poruku!";
            $this->slanjePoruke($message);
        }
        else
        {
            $username= $this->session->userdata('user');
            $this->Poruka->posalji($username, $id, $sadrzaj);
            $this->index();
            
        }
    }
    
    public function pregledPoruka()
    {
        $this->load->view("sablon/headerLekar.php");
        $username= $this->session->userdata('user');
        $poruke= $this->Poruka->dohvPoruke($username);
        $data['poruke']=$poruke;
        $data['username']=$username;
        $this->load->view('lekar/svePoruke.php', $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function procitajPoruku()
    {
        $idPoruka= $this->input->get('idPoruka');
        $username= $this->session->userdata('user');
        $poruka=$this->Poruka->procitajPoruku($idPoruka, $username);
        $data['poruka']=$poruka;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/poruka.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function primljene()
    {
        $this->load->view("sablon/headerLekar.php");
        $username= $this->session->userdata('user');
        $poruke= $this->Poruka->dohvPrimljene($username);
        $data['poruke']=$poruke;
        $data['username']=$username;
        $this->load->view('lekar/svePoruke.php', $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function poslate()
    {
        $this->load->view("sablon/headerLekar.php");
        $username= $this->session->userdata('user');
        $poruke= $this->Poruka->dohvProcitane($username);
        $data['poruke']=$poruke;
        $data['username']=$username;
        $this->load->view('lekar/svePoruke.php', $data);
        $this->load->view("sablon/footer.php");
    }
    
    
    
    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('type');
        redirect("Gost");
    }
}
