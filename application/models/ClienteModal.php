<?php
/**
 *
 */
class ClienteModal extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }
  function insertar($datos){
      //ACTIVE RECORD -> CODEiGNITER
      return $this->db->insert("clientes",$datos);
  }
  function obtenerTodos(){
    $this->db->select('clientes.id_cli, clientes.cedula_cli, clientes.apellidos_cli, clientes.nombres_cli, clientes.direccion_cli, clientes.ciudad_cli, paises.nombre_pai, clientes.telefono_cli, clientes.email_cli, clientes.latitud_cli, clientes.longitud_cli');
    $this->db->from('clientes');
    $this->db->join('paises', 'paises.id_pai = clientes.id_pai');
    $datos=$this->db->get();//esto devuelve un array

    if($datos->num_rows()>0) { //si hay datos
        return $datos->result();
    }else{ //si no hay datos
        return false;
    }
  }

  public function search($term) {
    $this->db->select('clientes.id_cli, clientes.cedula_cli, clientes.apellidos_cli, clientes.nombres_cli, clientes.direccion_cli, clientes.ciudad_cli, paises.nombre_pai, clientes.telefono_cli, clientes.email_cli, clientes.latitud_cli, clientes.longitud_cli');
    $this->db->from('clientes');
    $this->db->join('paises', 'paises.id_pai = clientes.id_pai');
    $this->db->where('cedula_cli', $term); // Suponiendo que deseas buscar por la columna 'nombre'
    $query = $this->db->get();

    return $query->result();
  }

    public function obtener_paises() {
        $this->db->select('id_pai, nombre_pai');
        $this->db->from('paises');
        $query = $this->db->get();
        return $query->result();
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

  //funcion para actualizar un cliente
  function actualizar($id_cli,$datosEditados)
  {
    $this->db->where("id_cli",$id_cli);
    return $this->db->update('clientes',$datosEditados);
    }

  function borrar($id_cli){
      //"id_ins"-> es el campo de la base de datos  y la $id_ins es la variable que creamos puede tener otro nombre
      $this->db->where("id_cli",$id_cli);

      //instructor tabla de base de datos
      if ($this->db->delete("clientes")) {
          return true;
      } else {
          return false;
      }

      //El codigo de arriba en una solo linea
      // return $this->db->delete("instructor");
  }
}

?>
