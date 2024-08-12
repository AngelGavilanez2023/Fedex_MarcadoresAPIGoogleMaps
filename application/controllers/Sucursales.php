<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursales extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("usuario");
        $this->load->model("SucursalModal");
        if(!$this->session->userdata("conectadoCICI")){
             redirect("seguridad/logout/no");
         }
    }



    public function listado(){
      $data['sucursales']=$this->SucursalModal->obtenerListadoSuc();

      $this->load->view('inicio/header');
      $this->load->view('sucursales/listado',$data);
      $this->load->view('inicio/footer');
    }


    public function nuevo()
    {
      $data['paises'] = $this->SucursalModal->obtener_paises();
      $data['continentes'] = $this->SucursalModal->obtener_continente();
      $this->load->view('inicio/header');
      $this->load->view('sucursales/nuevo', $data);
      $this->load->view('inicio/footer');
    }
    public function guardar()
    {
      $datosNuevoCandidato = array(
          "nombre_suc" => $this->input->post('nombre_suc'),
          "direccion_suc" => $this->input->post('direccion_suc'),
          "ciudad_suc" => $this->input->post('ciudad_suc'),
          "id_con" => $this->input->post('id_con'),
          "id_pai" => $this->input->post('id_pai'),
          "telefono_suc" => $this->input->post('telefono_suc'),
          "latitud_suc" => $this->input->post('latitud_suc'),
          "longitud_suc" => $this->input->post('longitud_suc'),
          "id_fed" => $this->input->post('id_fed'),

      );

      if($this->SucursalModal->insertar($datosNuevoCandidato))
      {
        $this->session->set_flashdata("confirmacion", "Sucursal guardada exitosamente");

      }else{
        $this->session->set_flashdata("error", "ERROR !!! al guardar intenta de nuevo");

      }
      redirect('sucursales/listado');


    }
    public function eliminar($id_suc)
    {
        if ($this->SucursalModal->borrar($id_suc)) {
          $this->session->set_flashdata("confirmacion", "Sucursal eliminada exitosamente");

        } else {
          $this->session->set_flashdata("error", "ERROR !!! al eliminar intenta de nuevo");

        }
        redirect('sucursales/listado');


    }


    //funcion renderiza vista editar con sucursales
    public function editar($id_suc){
      $data["sucursalEditar"]=$this->SucursalModal->obtenerPorId($id_suc);
      $data['paises'] = $this->SucursalModal->obtener_paises();
      $this->load->view('inicio/header');
      $this->load->view('sucursales/editar',$data);
      $this->load->view('inicio/footer');
    }



    public function procesarActualizacion(){
      $datosEditados=array(
        "nombre_suc" => $this->input->post('nombre_suc'),
        "direccion_suc" => $this->input->post('direccion_suc'),
        "ciudad_suc" => $this->input->post('ciudad_suc'),
        "id_pai" => $this->input->post('id_pai'),
        "telefono_suc" => $this->input->post('telefono_suc'),
        "latitud_suc" => $this->input->post('latitud_suc'),
        "longitud_suc" => $this->input->post('longitud_suc'),
        "id_fed" => $this->input->post('id_fed'),
      );
      $id_suc=$this->input->post("id_suc");
      if ($this->SucursalModal->actualizar($id_suc, $datosEditados)) {
        $this->session->set_flashdata("confirmacion","Sucursal actualizada exitosamente");
      } else {
        $this->session->set_flashdata("error","Error!!! al actualizar intente de nuevo");
      }
      redirect("sucursales/listado");
    }


} //fin clase
