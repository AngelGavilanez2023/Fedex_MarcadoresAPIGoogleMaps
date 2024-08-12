<?php
  class EnvioModal extends CI_Model //CI_Model ya viene con el framework
  {
    function __construct()
    {
      // Reconocer a las clases
      parent::__construct();
    }
    //Funcion para insertar un instructor de MYSQL
    function insertar($datos){
      //Active Record en CodeIgniter
      return $this->db->insert("envios",$datos);
    }

    //Funcion para consultar Pedidos
    function obtenerTodos(){
      $listadoPedidos=$this->db->get("envios"); //Devuelve un array   SIEMPRE VALIDAR CON UN IF
      if($listadoPedidos->num_rows()>0){ //SI HAY DATOS     num_rows nos deuelve el numero de filas que haya
        return $listadoPedidos->result();
      }else{ //NO HAY DATOS
        return false;
      }
    }

    //Nuevo PARA OBTENER EL ID
    function obtenerPorId($id_cli){
      $this->db->where("id_cli", $id_cli);
      $cliente=$this->db->get("clientes");
      if ($cliente->num_rows()>0) {
        return $cliente->row();
      }
      return false;
    }

    //Nuevo PARA OBTENER EL ID envio
    function obtenerPorIdEnvio($id_env){
      $this->db->select('envios.id_env, clientes.id_cli, clientes.nombres_cli, envios.fecha_envio_env, envios.fecha_entrega_env, estado.id_est, envios.peso_env, envios.costo_env, envios.detalle_env, envios.id_suc, sucursales.nombre_suc, envios.destino_env, estado.nombre_est, envios.latitud_env, envios.longitud_env');
      $this->db->from('envios');
      $this->db->join('clientes', 'clientes.id_cli = envios.id_cli');
      $this->db->join('sucursales', 'sucursales.id_suc = envios.id_suc');
      $this->db->join('estado', 'estado.id_est = envios.id_est');
      $this->db->where("id_env", $id_env);

      $datos=$this->db->get();
      if ($datos->num_rows()>0) {
        return $datos->row();
      }
      return false;
    }

    public function obtenerSucursales() {
        $this->db->select('id_suc, nombre_suc');
        $this->db->from('sucursales');
        $query = $this->db->get();
        return $query->result();
      }

      public function obtenerEstados() {
          $this->db->select('id_est, nombre_est');
          $this->db->from('estado');
          $query = $this->db->get();
          return $query->result();
        }

    public function obtenerCliente() {
        $this->db->select('id_suc, nombre_suc, latitud_suc, longitud_suc');
        $this->db->from('sucursales');
        $query = $this->db->get();
        return $query->result();
      }

    function obtenerDatos(){
      $this->db->select('envios.id_env, clientes.id_cli, clientes.nombres_cli, envios.fecha_envio_env, envios.fecha_entrega_env, sucursales.nombre_suc, envios.destino_env, estado.nombre_est, envios.peso_env');
      $this->db->from('envios');
      $this->db->join('clientes', 'clientes.id_cli = envios.id_cli');
      $this->db->join('estado', 'estado.id_est = envios.id_est');
      $this->db->join('sucursales', 'sucursales.id_suc = envios.id_suc');

      $query=$this->db->get();
      if($query->num_rows()>0){
        return $query->result();
      }else {
        return false;
      }
    }

    // public function obtener_coordenadas($sucursalId) {
    //     $this->db->select('latitud, longitud');
    //     $this->db->from('sucursales');
    //     $this->db->where('id_suc', $sucursalId);
    //     $query = $this->db->get();
    //     return $query->row();
    // }


    // Funcion para obtener coordenadas
    function obtener_coordenadas(){
      $sucursalId = $_GET['sucursalId'];
      // Realizar la consulta para obtener las coordenadas de la sucursal seleccionada desde la base de datos
      $this->db->select('latitud_suc, longitud_suc');
      $this->db->from('sucursales');
      $this->db->where('id_suc', $sucursalId);
      $query = $this->db->get();
      $result = $query;
    }

    function borrar($id_env){
      $this->db->where("id_env",$id_env);
      if ($this->db->delete("envios")) {
        return true;
      } else {
        return false;
      }
    }

    //MIOO ANGEL
    function actualizar($id_env, $datosEditados)
     {
       $this->db->where("id_env",$id_env);
       return $this->db->update('envios', $datosEditados);
     }

}// Cierre de la clase
 ?>
