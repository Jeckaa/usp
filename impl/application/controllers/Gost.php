<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gost
 *
 * @author Jeckaa
 */
class Gost extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Korisnik');
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
            else if ($this->session->userdata('type')==='S')
            {
                redirect("Sluzbenik");
            }
            else if ($this->session->userdata('type')==='L') redirect("Lekar");
        }
    }
    
    public function index($message=NULL)
    {
        $data=[];
        if ($message!=NULL) $data['message']=$message;
        $this->load->view("login.php", $data);
    }
    
    public function login()
    {
        $username= $this->input->post('username');
        $password= $this->input->post('password');
        if (empty($username) || empty($password))
        {
            $message="Morate da popunite sva polja!";
            $this->index($message);
        }
        else
        {
            $result=$this->Korisnik->login($username, $password);
            if ($result==='1')
            {
                $message="Uneli ste pogresanu lozinku!";
                $this->index($message);
            }
            else if ($result==='2')
            {
                $message="Uneli ste pogresno korisnicko ime!";
                $this->index($message);
            }
            else
            {
                $type=$result->Tip;
                $user=$result->Username;
                $this->session->set_userdata('type', $type);
                $this->session->set_userdata('user', $user);
                if ($type==='P') redirect('Pacijent');
                else if ($type==='L') redirect('Lekar');
                else if ($type==='A') redirect('Admin');
                else if ($type==='S') redirect('Sluzbenik');
            }
        }
    }
    
}
