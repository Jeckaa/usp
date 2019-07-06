<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Stefan
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('type') === NULL)
            redirect("Gost");
        else {
            if ($this->session->userdata('type') === 'L') {
                redirect("Lekar");
            } else if ($this->session->userdata('type') === 'P') {
                redirect("Pacijent");
            } else if ($this->session->userdata('type') === 'S') {
                redirect("Sluzbenik");
            }
        }
        $this->load->model("SluzbenikModel");
        $this->load->model("Bolnica");
    }

    public function index() {
        $this->load->view("sablon/headerAdmin.php");
        $this->load->view("admin/index.php");
        $this->load->view("sablon/footer.php");
    }
    


    public function ustanove($msg = null) {
        $this->load->view("sablon/headerAdmin.php");
        $bolnice = $this->Bolnica->dohvatiSveBolnice();
        $data = [];
        if (isset($msg)) {
            $data["msg"] = $msg;
        }
        $data["bolnice"] = $bolnice;
        //the rest
        $this->load->view("admin/ustanove.php", $data);
        $this->load->view("sablon/footer.php");
    }

    public function dodajUstanovuFn() {
        $naziv = $this->input->post("naziv");
        $adresa = $this->input->post("adresa");

        if (empty($naziv) || empty($adresa)) {
            $this->dodajUstanovu("Neophodno je popuniti sva polja");
        } else {
            $this->Bolnica->dodajBolnicu($naziv, $adresa);
            $this->dodajUstanovu("Uspesno ste dodali ustanovu");
        }
    }

    public function dodajUstanovu($msg = null) {
        $this->load->view("sablon/headerAdmin.php");
        $data = [];
        if ($msg != null) {
            $data["msg"] = $msg;
        }
        $this->load->view("admin/dodajUstanovu.php", $data);
        $this->load->view("sablon/footer.php");
    }

    public function izbrisiUstanovu() {
        $idBolnica = $this->input->post("bolnica");
        if (!isset($idBolnica)) {
            $msg = "Niste izabrali ni jednu od ustanova";
            $this->ustanove($msg);
            return;
        } else {
            $this->Bolnica->deactivateById($idBolnica);
            $this->ustanove("Uspesno ste izbrisali izabranu ustanovu");
        }
    }

    public function izmeniUstanovu($msg = null, $idB = null) {
        $idBolnica = null;
        if (!isset($idB)) {
            $idBolnica = $this->input->post("bolnica");
        } else {
            $idBolnica = $idB;
        }
        if (empty($idBolnica)) {
            $msg = "Niste izabrali ni jednu od ustanova";
            $this->ustanove($msg);
            return;
        }
        $bolnica = $this->Bolnica->dohvatiBolnicu($idBolnica);
        $data = [];
        $data["naziv"] = $bolnica->Naziv;
        $data["adresa"] = $bolnica->Adresa;
        $data["idBolnica"] = $idBolnica;
        $this->load->view("sablon/headerAdmin.php");
        $this->load->view("admin/izmeniUstanovu.php", $data);
        $this->load->view("sablon/footer.php");
    }

    public function izmeniUstanovuFn() {
        $idB = $this->input->post("idB");
        $naziv = $this->input->post("naziv");
        $adresa = $this->input->post("adresa");
        if (empty($naziv) || empty($adresa)) {
            $this->izmeniUstanovu("Neophodno je popuniti sva polja", $idB);
        } else {
            $this->Bolnica->izmeniBolnicu($idB, $naziv, $adresa);
            $this->ustanove("Uspesno ste izmenili ustanovu");
        }
    }

    public function dodajSluzbenika($msg = null) {
        $data = [];
        $data["msg"] = $msg;
        $this->load->view("sablon/headerAdmin.php");
        $this->load->view("admin/dodajSluzbenika", $data);
        $this->load->view("sablon/footer.php");
    }

    public function dodajSluzbenikaFn() {
        $username = $this->input->post("username");
        $pass = $this->input->post("pass");
        $confPass = $this->input->post("confPass");
        if (empty($username) || empty($pass) || empty($confPass)) {
            $this->dodajSluzbenika("Molimo vas da popunite sva polja");
        } else if ($pass !== $confPass) {
            $this->dodajSluzbenika("Polja za lozinku se ne poklapaju");
        } else {
            $this->SluzbenikModel->dodajSluzbenika($username, $pass);
            $this->dodajSluzbenika("Sluzbenik " . $username . " uspesno dodat");
        }
    }

    public function izbrisiSluzbenika($msg = null) {
        $data = [];
        $data["msg"] = $msg;
        $data["sluzbenici"] = $this->SluzbenikModel->getAll();
        $this->load->view("sablon/headerAdmin.php");
        $this->load->view("admin/sluzbenici.php", $data);
        $this->load->view("sablon/footer.php");
    }

    public function izbrisiSluzbenikaFn() {
        $sluzbenik = $this->input->post("selectSluzbenik");
        if (empty($sluzbenik)) {
            $this->izbrisiSluzbenika("Molimo vas da izaberete sluzbenika.");
        } else {
            $this->SluzbenikModel->deactivate($sluzbenik);
            $this->izbrisiSluzbenika("Sluzbenik " . $sluzbenik . " uspesno obrisan");
        }
    }

    public function logout() {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('type');
        redirect("Gost");
    }

}
