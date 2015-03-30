<?php

class Roles_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
        
    }
    function cantidadroles($id){
        
        $this->db->select('roles.rol_id,rol_nombre');
        $this->db->distinct('roles.rol_id,rol_nombre');
        $this->db->where('permisos.usu_id',$id);
        $this->db->join('permisos','permisos.rol_id = roles.rol_id');
        $roles = $this->db->get('roles');
        return $roles->result_array();
    }
    
    function roles(){
        
        $consulta = $this->db->get('roles');
        
//        echo $this->db->last_query();die;
        
        return $consulta->result_array();
    }
    
    function guardarrol($nombre){
        
        $this->db->set('rol_nombre',$nombre);
        
        $this->db->insert('roles');
        
        return $this->db->insert_id();
    } 
    function insertapermisos($insert){
        
        $this->db->insert_batch('permisos_rol',$insert);
        
    }
    
    function eliminarrol($id){
        
        $this->db->where('rol_id',$id);
        $this->db->delete('roles');
    }
    function eliminpermisosrol($idrol){
        
        $this->db->where('rol_id',$idrol);
        $this->db->delete('permisos_rol');
    }
}