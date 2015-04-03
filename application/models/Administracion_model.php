<?php

class administracion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //datos de vehiculo
    
    function consultacantidad(){
        
        $cantidad = $this->db->get('cantidad');
        return $cantidad->result();
    }
    function actualizacantidad($cantidad) {
        
        $this->db->set('can_cantidadimgprincipal', $cantidad);
        $dato = $this->db->update('cantidad');
    }
    function insertacantidad($cantidad) {
        
        $this->db->set('can_cantidadimgprincipal', $cantidad);
        $dato = $this->db->insert('cantidad');
    }

    
}
