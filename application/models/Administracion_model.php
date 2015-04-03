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
    function insertacantidad($cantidad,$cantidaddesubir) {
        
        $this->db->set('can_cantidadimgprincipal', $cantidad);
        $dato = $this->db->insert('cantidad');
    }
    function actualizaempresacantidad($cantidaddesubir,$idempresa){
        
        $this->db->where('emp_id',$idempresa);
        $this->db->set('emp_max_img',$cantidaddesubir);
        $this->db->update('empresa');
    }
    function cantidadporempresa($idempresa){
        
        $this->db->where('emp_id',$idempresa);
        $cantidad = $this->db->get('empresa');
        return $cantidad->result();
        
    }
    function categoria($categoria){
        
        $this->db->set('cat_categoria',$categoria);
        $this->db->insert('categoria');
        
    }
    function subcategoria($categoria,$subcategoria){
        
        $this->db->set('cat_id',$categoria);
        $this->db->set('sub_subcategoria',$subcategoria);
        $this->db->insert('subcategoria');
        
    }
    function categorias(){
        
        $categoria = $this->db->get('categoria');
        return $categoria->result();
    }
}
