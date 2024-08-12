<?php


function obtenerRutaActual(){
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return  $actual_link;
}

function validarSesion($per_nombre=""){

    $CI=&get_instance();
    $CI->load->library('session');
    $CI->load->model('usuario');
    if(!$CI->session->userdata("conectadoCICI")){
        $CI->session->set_flashdata("permisos","No tiene permisos para acceder a la página solicitada.");
        redirect("seguridad/login");
    }else{

       $perfiles=$CI->usuario->obtenerPerfilesusuario($CI->session->userdata("conectadoCICI")->codigo_usu);

        if($perfiles){
          $control=0;
          foreach ($perfiles->result() as $perfil) {
              if($perfil->nombre_per==$per_nombre){
                  $control++;
              }
          }
          if($control<=0){
            redirect("seguridad/logout/Permisos");
          }
        }else{
            if($CI->session->userdata("conectadoCICI")->perfil_usu!=$per_nombre){
                redirect("seguridad/logout/Permisos");
            }
        }
    }
}




function validarSesionEstado($per_nombre=""){

    $CI=&get_instance();
    $CI->load->library('session');
    $CI->load->model('usuario');
    if(!$CI->session->userdata("conectadoCICI")){
        $CI->session->set_flashdata("permisos","No tiene permisos para acceder a la página solicitada.");
        return false;
    }else{

       $perfiles=$CI->usuario->obtenerPerfilesusuario($CI->session->userdata("conectadoCICI")->codigo_usu);

        if($perfiles){
          $control=0;
          foreach ($perfiles->result() as $perfil) {
              if($perfil->perfil_usu==$per_nombre){
                  return true;
              }
          }
        }else{
            if($CI->session->userdata("conectadoCICI")->perfil_usu!=$per_nombre){
                return false;
            }
        }
    }
      return false;
}

function obtenerCarrera($codigo_usu){
    $CI=&get_instance();
    $CI->load->library('session');
    $CI->load->model('usuario');
    return $CI->usuario->obtenerCarrera($codigo_usu);
}


function obtenerNombreSistema(){
    return "CONGRESO CICI";
}
