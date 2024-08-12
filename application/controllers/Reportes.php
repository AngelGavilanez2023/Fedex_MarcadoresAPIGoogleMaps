<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //CASO DE SALIR ERROR CON LOS PATH, SALE ESTE MENSAJE

class Reportes extends CI_Controller {
	//En el constructor se inicializa la clase y se hace la carga de los modelos
  public function __construct(){
      parent::__construct();
      $this->load->model("usuario");
      $this->load->model("ReporteModal");
      if(!$this->session->userdata("conectadoCICI")){
           redirect("seguridad/logout/no");
       }
  }
  public function sucursalesR()
  {
    $data["sucursales_api"]=$this->ReporteModal->obtenerSucursales();
    $this->load->view('inicio/header');
    $this->load->view('reportes/sucursalesR',$data);
    $this->load->view('inicio/footer');
  }
  public function sucursalesSearch()
  {
    $term = $this->input->post('search_term'); // Suponiendo que estás enviando el término de búsqueda desde un formulario POST
    $data['results'] = $this->ReporteModal->search($term);
    $this->load->view('inicio/header');
    $this->load->view('reportes/sucursalesSearch',$data);
    $this->load->view('inicio/footer');
  }
  public function clientesR()
  {
    $data["clientes_api"]=$this->ReporteModal->obtenerClientes();
    $this->load->view('inicio/header');
    $this->load->view('reportes/clientesR',$data);
    $this->load->view('inicio/footer');
  }
  public function enviosR()
  {
    $env["envios_api"]= $this->ReporteModal->obtenerEnvios();
    $this->load->view('inicio/header');
    $this->load->view('reportes/enviosR', $env);
    $this->load->view('inicio/footer');
  }

  public function enviosRoute()
  {
    $env["envios_api"]= $this->ReporteModal->obtenerEnvios();
    $this->load->view('inicio/header');
    $this->load->view('reportes/enviosRoute', $env);
    $this->load->view('inicio/footer');
  }
  public function enviosRouteSearch()
  {
    $term = $this->input->post('search_term'); // Suponiendo que estás enviando el término de búsqueda desde un formulario POST
    // Extraer las coordenadas de la base de datos
    $coordenadas['results'] = $this->ReporteModal->obtenerCoordenadas($term);
    // Pasar las coordenadas a la vista
    $this->load->view('inicio/header');
    $this->load->view('reportes/enviosRouteSearch', $coordenadas);
    $this->load->view('inicio/footer');
  }

  public function enviosRouteSel($id_env)
  {
    $term = $id_env;
    $coordenadas['results'] = $this->ReporteModal->obtenerCoordenadasSel($term);
    // Pasar las coordenadas a la vista
    $this->load->view('inicio/header');
    $this->load->view('reportes/enviosRouteSearch', $coordenadas);
    $this->load->view('inicio/footer');
  }

}//Cierre de la clase
