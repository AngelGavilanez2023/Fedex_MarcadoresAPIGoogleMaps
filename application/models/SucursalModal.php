<?php
/**
 *
 */
class SucursalModal extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }
  function insertar($datos){
      //ACTIVE RECORD -> CODEiGNITER
      return $this->db->insert("sucursales",$datos);

      // return $this->db->insert("sucursales","fedex",(1),$datos);
  }
  function obtenerTodos(){
    $listadoCandidatos=$this->db->get("sucursales");//esto devuelve un array
    if($listadoCandidatos->num_rows()>0) { //si hay datos
        return $listadoCandidatos->result();
    }else{ //si no hay datos
        return false;
    }
  }

  public function obtener_paises() {
      $this->db->select('id_pai, nombre_pai');
      $this->db->from('paises');
      $query = $this->db->get();
      return $query->result();
    }
  public function obtener_continente() {
      $this->db->select('id_con, nombre_con');
      $this->db->from('continentes');
      $query = $this->db->get();
      return $query->result();
    }

    //Nuevo PARA OBTENER EL ID
  function obtenerPorId($id_suc){
    $this->db->where("id_suc", $id_suc);
    $sucursal=$this->db->get("sucursales");
    if ($sucursal->num_rows()>0) {
      return $sucursal->row();
    }
    return false;
  }
  //funcion para actualizar unna sucursal
  function actualizar($id_suc,$datosEditados)
    {
    $this->db->where("id_suc",$id_suc);
    return $this->db->update('sucursales',$datosEditados);
    }

  function obtenerListadoSuc(){
    $this->db->select('sucursales.id_suc, sucursales.nombre_suc,sucursales.direccion_suc, sucursales.ciudad_suc, paises.nombre_pai, sucursales.telefono_suc, sucursales.latitud_suc, sucursales.longitud_suc');
    $this->db->from('sucursales');
    $this->db->join('paises', 'paises.id_pai = sucursales.id_pai');

    $listadoSuc=$this->db->get();

    if($listadoSuc->num_rows()>0){
      return $listadoSuc->result();
    }else {
      return false;
    }
  }

  function borrar($id_suc){
      //"id_ins"-> es el campo de la base de datos  y la $id_ins es la variable que creamos puede tener otro nombre
      $this->db->where("id_suc",$id_suc);

      //instructor tabla de base de datos
      if ($this->db->delete("sucursales")) {
          return true;
      } else {
          return false;
      }

      //El codigo de arriba en una solo linea
      // return $this->db->delete("instructor");
  }
}

?>
