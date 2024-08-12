 <?php
class ReporteModal extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function obtenerSucursales()
  {
    $listadoSucursales=$this->db->get("sucursales");
    if ($listadoSucursales->num_rows()>0){
      return $listadoSucursales->result();
    }
    return false;
  }

  public function search($term) {
    $this->db->select('sucursales.nombre_suc, sucursales.latitud_suc, sucursales.longitud_suc');
    $this->db->from('sucursales');
    $this->db->join('paises', 'paises.id_pai = sucursales.id_pai');
    $this->db->where('nombre_pai', $term);
    $query = $this->db->get();
    if($query->num_rows()>0){
      return $query->result();
    }else {
      return false;
    }
  }


  function obtenerClientes()
  {
    $listadoClientes=$this->db->get("clientes");

    if ($listadoClientes->num_rows()>0){
      return $listadoClientes->result();
    }
    return false;
  }

  function obtenerEnvios()
  {
    $listadoEnvios=$this->db->get("envios");

    if ($listadoEnvios->num_rows()>0){
      return $listadoEnvios->result();
    }
    return false;
  }

  //Mpaa por busqueda
  public function obtenerCoordenadas($term)
  {
    $this->db->select('envios.detalle_env, envios.latitud_env, envios.longitud_env, sucursales.latitud_suc, sucursales.longitud_suc');
    $this->db->from('envios');
    $this->db->join('sucursales', 'sucursales.id_suc = envios.id_suc');
    $this->db->where('id_env', $term);
    $query=$this->db->get();

    if($query->num_rows()>0){
      return $query->result();
    }else {
      return false;
    }
  }

  //Mapa por seleccion
  public function obtenerCoordenadasSel($id_env)
  {
    $this->db->select('envios.detalle_env, envios.latitud_env, envios.longitud_env, sucursales.latitud_suc, sucursales.longitud_suc');
    $this->db->from('envios');
    $this->db->join('sucursales', 'sucursales.id_suc = envios.id_suc');
    $this->db->where('id_env', $id_env);
    $query=$this->db->get();

    if($query->num_rows()>0){
      return $query->result();
    }else {
      return false;
    }
  }
}
?>
