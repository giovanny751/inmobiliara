<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {
    
    
    public function get_user($username,$pass){
        $this->db->where('usu_correo',$username);
        $this->db->where('usu_password',$pass);
//        $this->db->where('usu_status','0');
        $query = $this->db->get('user');
//        echo $this->db->last_query();die;
        return $query->result();
    }
    public function listo_politica($username,$pass){
        $this->db->set('usu_politicas','1');
        $this->db->where('usu_correo',$username);
        $this->db->where('usu_password',$pass);
        $this->db->update('user');
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
