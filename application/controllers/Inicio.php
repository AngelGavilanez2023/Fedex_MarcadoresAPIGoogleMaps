<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("usuario");
        if(!$this->session->userdata("conectadoCICI")){
             redirect("seguridad/logout/no");
         }
    }



    public function index(){
      $this->load->view('inicio/header');
      $this->load->view('inicio/index');
      $this->load->view('inicio/footer');
    }

    // public function nuevo(){
    //   $this->load->view('inicio/header');
    //   $this->load->view('clientes/nuevo');
    //   $this->load->view('inicio/footer');
    // }

    public function nuevo()
    {
      $this->load->view('inicio/header');
      $this->load->view('inicio/clientes/nuevo');
      $this->load->view('inicio/footer');
    }





}
