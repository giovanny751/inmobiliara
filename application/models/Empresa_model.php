<?php

class Empresa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    //datos de empresa
    function guardaactualizacionempresa($data) {
        $this->db->update('empresa',$data);
    }
    function datosempresa($id){
        
        $this->db->where('ingreso.ing_id',$id);
        $this->db->join('empresa','empresa.ing_id = ingreso.ing_id','left');
        $datos = $this->db->get('ingreso');
        return $datos->result();
    }
    
}
