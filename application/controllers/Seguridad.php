<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridad extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("usuario");
    }



    public function autenticar(){
        $email=$this->input->post("email");
        $clave=$this->input->post("clave");
        $usuario=$this->usuario->obtenerPorEmailPassword($email,($clave));
        if($usuario){
            if($usuario->estado_usu==1){
                $dataSesion=array(
                    "conectadoCICI"=>$usuario
                );
                $this->session->set_userdata($dataSesion);
                $this->session->set_flashdata("bienvenida","Bienvenido, ".$usuario->nombre_usu." ".$usuario->apellido_usu);
                redirect("inicio/index");
            }else{
                $this->session->set_flashdata("email",$email);
                $this->session->set_flashdata("error","El usuario se encuentra bloqueado.");
            }

        }else{
            $this->session->set_flashdata("email",$email);
            $this->session->set_flashdata("error","El usuario o clave ingresados son incorrectos.");
        }
        redirect("welcome/cuenta");
    }

    public function logout($mensaje="")
    {
        $this->session->unset_userdata("conectadoCICI");
        if($mensaje!=""){
            $this->session->set_flashdata("permisos","No tiene permisos para acceder a la página solicitada");
        }else{
            $this->session->set_flashdata("salir","Sesión cerrada exitosamente.");
        }
        redirect("welcome/cuenta");
    }



    public function reenviarClave(){
        $cedula_usu=$this->input->post("cedula_usu");
        $clave =  rand (1200,32766);

        $usuario=$this->usuario->obtenerPorIdentificacion($cedula_usu);
        if($usuario){

            $contenido = "";
            $contenido .= '<h3 style="color: black; font-family: Verdana;">UNIVERSIDAD TÉCNICA DE COTOPAXI EXTENSIÓN LA MANÁ</h3>';
            $contenido .= "<b>Estimado/a: </b> $usuario->nombre_usu".' '."$usuario->apellido_usu </b><br>Recuperación de clave exitoso.<br>";
            $contenido .= "<b>Usuario: </b>$usuario->cedula_usu <br>";
            $contenido .= "<b>Clave de acceso: </b>$clave<br>";


            enviarEmailusuario($usuario->codigo_usu,$contenido,$adjunto="");
            $this->usuario->actualizar($usuario->codigo_usu,array("password_usu"=>$clave));
            $this->session->set_flashdata("registro","Solicitud de reenvio de clave exitoso. <br>Por favor revise su correo electrónico:  <i>".$usuario->pro_correo_electronico."</i> <br> Recuerde verificar la bandeja de correos de entrada y no deseados (Spam)");


        }else{
            $this->session->set_flashdata("errorA","El número de cédula o R.U.C ingresados no se encuentra registrado en el sistema.");
        }



        redirect("seguridad/login");



        /*$this->session->set_flashdata("registro","Usuario registrado exitosamente.<br>Por favor revise su correo electrónico.<b>".$clave."</b>");
        redirect("seguridad/login");*/

    }


    public function cambiarClave(){
        $clave_actual=$this->input->post("clave_actual");
        $clave_nueva=$this->input->post("clave_nueva");
        $confirmar_clave_nueva=$this->input->post("confirmar_clave_nueva");
        $usuario=$this->usuario->obtenerPorCodigo($this->session->userdata("conectadoCICI")->codigo_usu);

        if($usuario->password_usu==($clave_actual)){
            $valores=array(
                "password_usu"=>($clave_nueva)
            );
            if($this->usuario->actualizar($usuario->codigo_usu,$valores)){
                $data=array("estado"=>"ok","mensaje"=>"Su clave ha sido <b>CAMBIADA</b> exitosamente. Por favor vuelva a ingresar al sistema.");
            }else{
                $data=array("estado"=>"error","mensaje"=>"Error al procesar. Intente Nuevamente");
            }
        }else{
            $data=array("estado"=>"error","mensaje"=>"La CLAVE ACTUAL ingresada no es correcta");
        }
        echo json_encode($data);
    }


    function registrarUsuario(){
        $data=array(
          "apellido_usu" => $this->input->post("apellido_usu"),
          "nombre_usu" => $this->input->post("nombre_usu"),
          "telefono_usu" => $this->input->post("telefono_usu"),
          "email_usu" => $this->input->post("email_usu"),
          "password_usu" => ($this->input->post("password_usu")),
          "estado_usu" => 1
        );
        $codigo_usu=$this->usuario->insertar($data);
        if($this->usuario->insertarPerfilUsuario($codigo_usu,2)){
          $this->session->set_flashdata("salir","Registro Exitoso, ya puede acceder al sistema con su correo y contraseña ingresados.");
        }else{
          $this->session->set_flashdata("error","Error al registrar, intente nuevamente.");
        }
        redirect('welcome/cuenta');
    }



}
