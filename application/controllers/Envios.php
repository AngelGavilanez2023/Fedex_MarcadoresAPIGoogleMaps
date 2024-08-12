<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //Cargar aqui todos los modelos
        //Modelo User
        $this->load->model("usuario");
        if(!$this->session->userdata("conectadoCICI")){
             redirect("seguridad/logout/no");
         }
         //Modelo Pedido
         $this->load-> model('EnvioModal');
         //MODELO CLIENTES
         // $this->load-> model('ClienteModal');


    }
    
    //Funcion para select Envio
    public function listado (){
      //Datos extraidos de tabla Envios
      $data['datos']=$this->EnvioModal->obtenerDatos();
      $this->load->view('inicio/header');
      $this->load->view('envios/listado', $data);
      $this->load->view('inicio/footer');
    }

    public function nuevo($id_cli){
      $data["cliente"]=$this->EnvioModal->obtenerPorId($id_cli);
      $data['sucursales'] = $this->EnvioModal->obtenerSucursales();
      $this->load->view('inicio/header');
      $this->load->view('envios/nuevo', $data);
      $this->load->view('inicio/footer');
    }
    public function editar($id_env)
    {
      $data["datos"]=$this->EnvioModal->obtenerPorIdEnvio($id_env);
      // $data["clientes"]=$this->db->get('clientes')->result();
      $data['sucursales'] = $this->EnvioModal->obtenerSucursales();
      $data['estados'] = $this->EnvioModal->obtenerEstados();
      $this->load->view('inicio/header');
      $this->load->view('envios/editar',$data);
      $this->load->view('inicio/footer');
    }

    //Funcion para eliminar Pedido
    public function eliminar($id_env){
      if ($this->EnvioModal->borrar($id_env)) {
        $this->session->set_flashdata("confirmacion","Envío eliminado exitosamente");
      } else {
        $this->session->set_flashdata("error","Error al eliminarr intente de nuevo");
      }
      redirect('Envios/listado');

    }

    public function obtener_coordenadas() {
        $sucursalId = $this->input->get('sucursalId');
        // Obtener las coordenadas de la sucursal seleccionada
        $coordenadas = $this->Sucursal_model->obtener_coordenadas($sucursalId);
        // Enviar la respuesta JSON a la vista
        header('Content-Type: clientes/nuevo/json');
        echo json_encode($coordenadas);
    }

   //Funcion para guardar Pedido
   public function guardar(){
     $datosNuevoPedido=array(
       "id_cli"=>$this->input->post('id_cli'),
       "id_suc"=>$this->input->post('id_suc'),
       "destino_env"=>$this->input->post('destino_env'),
       "id_est"=>$this->input->post('id_est'),
       "fecha_envio_env"=>$this->input->post('fecha_envio_env'),
       "fecha_entrega_env"=>$this->input->post('fecha_entrega_env'),
       "costo_env"=>$this->input->post('costo_env'),
       "detalle_env"=>$this->input->post('detalle_env'),
       "peso_env"=>$this->input->post('peso_env'),
       "latitud_env"=>$this->input->post('latitud_env'),
       "longitud_env"=>$this->input->post('longitud_env')
     );
     if($this->EnvioModal->insertar($datosNuevoPedido)){
       redirect('Envios/listado');
     }else{
       echo "<h1>ERROR AL INSERTAR</H1>"; //EMBEBER CODIGO
     }
   }

    public function procesarActualizacion(){
      $datosEditados=array(
        "id_cli"=>$this->input->post('id_cli'),
        "id_suc"=>$this->input->post('id_suc'),
        "destino_env"=>$this->input->post('destino_env'),
        "id_est"=>$this->input->post('id_est'),
        "fecha_envio_env"=>$this->input->post('fecha_envio_env'),
        "fecha_entrega_env"=>$this->input->post('fecha_entrega_env'),
        "costo_env"=>$this->input->post('costo_env'),
        "detalle_env"=>$this->input->post('detalle_env'),
        "peso_env"=>$this->input->post('peso_env'),
        "latitud_env"=>$this->input->post('latitud_env'),
        "longitud_env"=>$this->input->post('longitud_env')
      );
      $id_env=$this->input->post("id_env");
      if ($this->EnvioModal->actualizar($id_env, $datosEditados)) {
        $this->session->set_flashdata("confirmacion","Envío actualizado exitosamente");
      } else {
        $this->session->set_flashdata("error","Error al actualizar intente de nuevo");
      }
      redirect("Envios/listado");
    }


}
