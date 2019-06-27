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
        $this->load->model("Poruke");
        $this->load->model("Merenja");
    }

    public function index(){
        $this->load->view("sablon/headerLekar.php");
        //TODO:??
        $this->load->view("sablon/footer.php");
        
    }
    
    public function pacijenti($msg=null){
        $data = [];
        $data["msg"] = msg;
        $patients = $this->PacijentModel->getPatients();
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
    
    public function terapije($pacUser=null){
        $pacUsername ="";
        if($pacUser == null){
            $pacUsername = $this->input->post("selectPacijent");
        }else{
            $pacUsername = $pacUser;
        }
        $data = [];
        $data["terapija"] = $this->Terapije->dohvTerapije($pacUsername);
        $info = $this->PacijentModel->info($pacUsername);
        $data["ime"] = $info->Ime ." ". $info->Prezime;
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/pregledTerapija.php", $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function obrisiTerapiju(){
        $id = $this->input->post("theradio");
        $ther = $this->Terapija->getTherapyById($id);
        $pacUser = $ther->Pacijent;
        $this->db->where('IdTerapija', $id);
        $this->db->delete('terapija');
        $this->terapije($pacUser);
    }
    
    public function izmeniTerapiju(){
        $id = $this->input->post("theradio");
        $ther = $this->Terapija->getTherapyById($id);
        $data = [];
        $data["id"] = $id;
        $data["text"] = $ther->Opis;
        
        $this->load->view("sablon/headerLekar.php");
        $this->load->view("lekar/izmenaTerapije.php",$data);
        $this->load->view("sablon/footer.php");
    }
    
    public function izmeniTerapijuFn(){
        $this->db->set('Opis', $this->input->post("text"));
        $this->db->where('IdTerapija', $this->input->post("id"));
        $this->db->update('terapija');
        $pacUser = $this->Terapija->getTherapyById($id)->Pacijent;
        $this->terapije($pacUser);
    }
    
    public function izmenaNazad(){
        $pacUser = $this->Terapija->getTherapyById($id)->Pacijent;
        $this->terapije($pacUser);
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('type');
        redirect("Gost");
    }
}
