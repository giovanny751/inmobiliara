<?php

class Informacion_model extends CI_Model {

    
    function __construct() {
        parent::__construct();       
    }
    
    function informacion_personal(){
        
        $informacion = $this->db->get('informacion_personal');
        return $informacion->result_array();
    }
    
    function guardarinformacion($data){
        
        $this->db->insert_batch('informacion_personal',$data);
        
    }
    function editarinformacion($data,$id){
        
        $this->db->where('infPer_id',$id);
        $this->db->update('informacion_personal',$data);
        
    }
    function eliminarurl($id) {
        
        $this->db->where('infPer_id',$id);
        $this->db->delete('informacion_personal');
    }
    function consultaurlusuario(){
        $datos=$this->db->get('informacion_personal');
        return $datos->result_array();
    }
}

?>