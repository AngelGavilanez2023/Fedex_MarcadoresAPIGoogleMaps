<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('grocery_CRUD');
        if(!$this->session->userdata("conectadoCICI")){
             redirect("seguridad/logout/no");
         }
    }


		public function index()
		{

	        $tipos = new grocery_CRUD();
	        $tipos->set_table('tipo_sensor')
	            ->set_subject('Tipo de Sensor')
	            ->columns('codigo_tip','nombre_tip','descripcion_tip','imagen_tip')
	            ->display_as('codigo_tip','COD')
	            ->display_as('nombre_tip','Nombre')
	            ->display_as('descripcion_tip','Descripción')
	            ->display_as('imagen_tip','Imagen');
	        $tipos->set_language("spanish");
	        $tipos->set_theme("flexigrid");
	        $tipos->set_field_upload("imagen_tip","uploads/tipos/");
	        $tipos->fields('nombre_tip','descripcion_tip','imagen_tip');
	        $tipos->required_fields('nombre_tip','descripcion_tip');
	        $tipos->unset_clone();
	        $output = $tipos->render();
	    		$this->load->view('inicio/header');
	    		$this->load->view('tipos/index',$output);
	    		$this->load->view('inicio/footer');
		}








}



//
// create table tipo_sensor(
// 		id_tip integer AUTO_INCREMENT primary key,
//     	nombre_tip varchar(500),
//         descripcion_tip text,
//         imagen_tip varchar(1500)
// );
