<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
       parent::__construct();
       $this->load->database();
       $this->load->library('grocery_CRUD');
       if(!$this->session->userdata("conectadoCICI")){
            redirect("seguridad/logout/no");
        }
       // error_reporting(0);
    }




	public function index()
	{
    if($this->session->userdata("conectadoCICI")->perfil_usu!="ADMINISTRADOR"){
  		redirect("seguridad/logout/no");
		}
        $carreras = new grocery_CRUD();
        $carreras->set_table('usuario')
            ->set_subject('Usuarios')
            ->columns('codigo_usu','apellido_usu','nombre_usu','telefono_usu','email_usu')
            ->display_as('codigo_usu','COD')
						->display_as('apellido_usu','Apellidos')
            ->display_as('nombre_usu','Nombres')
						->display_as('telefono_usu','Teléfono')
						->display_as('email_usu','Email')
						->display_as('password_usu','Contraseña');
        $carreras->set_language("spanish");
        $carreras->set_theme("flexigrid");
        $carreras->set_field_upload("imagen_exp","uploads/expositores/");
        $carreras->fields('apellido_usu','nombre_usu','telefono_usu','email_usu','password_usu');
        $carreras->required_fields('apellido_usu','nombre_usu','telefono_usu','email_usu','password_usu');
        $carreras->field_type('password_usu','password');
        $carreras->unset_clone();
        $output = $carreras->render();
    		$this->load->view('inicio/header');
    		$this->load->view('usuarios/index',$output);
    		$this->load->view('inicio/footer');
	}

}
