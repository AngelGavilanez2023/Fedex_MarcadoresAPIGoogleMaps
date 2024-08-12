<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		 parent::__construct();
		 // $this->load->model("fecha");
		 // $this->load->model("expositor");
		 // $this->load->model("evento");
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}
	// FUNCION QUE RENDEREIZA LA VISTA NOSOTROS
	public function nosotros()
	{
			$this->load->view('header');
			$this->load->view('nosotros');
			$this->load->view('footer');
	}
	// FUNCION QUE RENDEREIZA LA VISTA SERVICIOS
	public function servicios()
	{
			$this->load->view('header');
			$this->load->view('servicios');
			$this->load->view('footer');
	}
	// FUNCION QUE RENDEREIZA LA VISTA TESTIMONIOS
  // public function testimonios()
	// {
  //     $this->load->view('header');
  //     $this->load->view('testimonios');
  //     $this->load->view('footer');
  // }
	// FUNCION QUE RENDEREIZA LA VISTA NUESTRAS SUCURSALES
	public function nuestrasSucursales()
	{
			$this->load->view('header');
			$this->load->view('nuestrasSucursales');
			$this->load->view('footer');
	}
	// FUNCION QUE RENDEREIZA LA VISTA INGRESAR
	public function cuenta()
	{
			$this->load->view('header');
			$this->load->view('cuenta');
			$this->load->view('footer');
	}

}
