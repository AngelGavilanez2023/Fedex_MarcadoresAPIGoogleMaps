<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("usuario");
        $this->load->model("ClienteModal");
        if(!$this->session->userdata("conectadoCICI")){
             redirect("seguridad/logout/no");
         }
    }

    public function listado(){
      $data['clientes']=$this->ClienteModal->obtenerTodos();
      $this->load->view('inicio/header');
      $this->load->view('clientes/listado',$data);
      $this->load->view('inicio/footer');
    }
    public function listadoSearch(){
      $term = $this->input->post('search_term'); // Suponiendo que estás enviando el término de búsqueda desde un formulario POST
      $data['results'] = $this->ClienteModal->search($term);
      $this->load->view('inicio/header');
      $this->load->view('clientes/listadoSearch',$data);
      $this->load->view('inicio/footer');
    }


    public function nuevo()
    {
      $data['paises'] = $this->ClienteModal->obtener_paises();
      $this->load->view('inicio/header');
      $this->load->view('clientes/nuevo', $data);
      $this->load->view('inicio/footer');
    }

    public function guardar()
    {
        $datosNuevoCandidato = array(
            "cedula_cli" => $this->input->post('cedula_cli'),
            "apellidos_cli" => $this->input->post('apellidos_cli'),
            "nombres_cli" => $this->input->post('nombres_cli'),
            "id_pai" => $this->input->post('id_pai'),
            "ciudad_cli" => $this->input->post('ciudad_cli'),
            "direccion_cli" => $this->input->post('direccion_cli'),
            "telefono_cli" => $this->input->post('telefono_cli'),
            "email_cli" => $this->input->post('email_cli'),
            "latitud_cli" => $this->input->post('latitud_cli'),
            "longitud_cli" => $this->input->post('longitud_cli'),
        );

        if($this->ClienteModal->insertar($datosNuevoCandidato))
        {
          $this->session->set_flashdata("confirmacion", "Cliente guardado exitosamente");

        }else{
          $this->session->set_flashdata("error", "ERROR !!! al guardar intenta de nuevo");

        }
        redirect('clientes/listado');


    }

    public function eliminar($id_cli)
    {
        if ($this->ClienteModal->borrar($id_cli)) {
          $this->session->set_flashdata("confirmacion", "Cliente eliminado exitosamente");


        } else {
          $this->session->set_flashdata("error", "ERROR !!! al eliminar intenta de nuevo");
        }
        redirect('clientes/listado');


    }

    //funcion renderiza vista editar con el instructor
    public function editar($id_cli){
      $data["clienteEditar"]=$this->ClienteModal->obtenerPorId($id_cli);
      $data['paises'] = $this->ClienteModal->obtener_paises();
      $this->load->view('inicio/header');
      $this->load->view('clientes/editar',$data);
      $this->load->view('inicio/footer');
    }

    public function procesarActualizacion(){
      $datosEditados=array(
        "cedula_cli" => $this->input->post('cedula_cli'),
        "apellidos_cli" => $this->input->post('apellidos_cli'),
        "nombres_cli" => $this->input->post('nombres_cli'),
        "id_pai" => $this->input->post('id_pai'),
        "ciudad_cli" => $this->input->post('ciudad_cli'),
        "direccion_cli" => $this->input->post('direccion_cli'),
        "telefono_cli" => $this->input->post('telefono_cli'),
        "email_cli" => $this->input->post('email_cli'),
        "latitud_cli" => $this->input->post('latitud_cli'),
        "longitud_cli" => $this->input->post('longitud_cli'),
      );
      $id_cli=$this->input->post("id_cli");
      if ($this->ClienteModal->actualizar($id_cli, $datosEditados)) {
        $this->session->set_flashdata("confirmacion","Cliente actualizado exitosamente");
      } else {
        $this->session->set_flashdata("error","Error al actualizar intente de nuevo");
      }
      redirect("Clientes/listado");
    }

} //fin clase
