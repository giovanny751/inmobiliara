<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {
    
    
    public function get_user($username,$pass){
        $this->db->where('ing_correo',$username);
        $this->db->where('ing_contrasena',$pass);
        $query = $this->db->get('ingreso');
        return $query->result();
    }
    public function listo_politica($username,$pass){
        $this->db->set('ing_politica','1');
        $this->db->where('ing_correo',$username);
        $this->db->where('ing_contrasena',$pass);
        $this->db->update('ingreso');
    }
    public function get_empresa($id){
        $this->db->select('emp_identificacion documento,emp_nombre nombres,ing_id,emp_id');
        $this->db->where('ing_id',$id);
        $query = $this->db->get('empresa');
        return $query->result();
    }
    public function get_administrador($id){
        $this->db->select('adm_documnto documento,adm_nombre nombres,ing_id,emp_id');
        $this->db->where('ing_id',$id);
        $query = $this->db->get('administrador');
        return $query->result();
    }
    public function validacionusuario($iduser){
        $this->db->where('usu_id',$iduser);
//        $this->db->where('usu_status','0');
        $query = $this->db->get('user');
//        echo $this->db->last_query();die;
        return $query->result();
    }
    
    function admin_inicio(){
        $this->db->where('ini_id', 1);
        $dato = $this->db->get('inicio');
        return $dato->result();
    }
    function reset($mail){
        $datos=  rand(1000000, 8155555);
        $this->db->get('usu_password', $datos);
        $this->db->where('usu_correo', $mail);
        $this->db->get('user');
        return $datos;
    }

}
