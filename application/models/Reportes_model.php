<?php

class Reportes_model extends CI_Model {

    function __construct() {
        parent::__construct();       
    }
    
    function visualizacionreporte($padre = null){
        
        if ($padre != "prueba") {
            $this->db->where('rep_idpadre', $padre);
//            echo $padre."paso por aca<br>";
        } else {
            $this->db->where('rep_idpadre', 0);
//             echo $padre."xxxxxxxx  paso por aca<br>";
        };
        
        $reporte = $this->db->get('reporte');
        return $reporte->result_array();
    }
    
    function validarquery($id,$query){
        
       $query = $this->db->query("desc $query");
       
       return $query->result_array();
    }
    function guardarreporte($reporte){
        
        $this->db->set('rep_nombre',$reporte);
        $this->db->insert('reportes');
    }
    function totalreportes(){
        $reportes= $this->db->get('reportes');
        return $reportes->result_array();
    }
    
    function inforeport($id){
        
        $this->db->where('rep_id',$id);
        $reportes= $this->db->get('reporte');
        return $reportes->result_array(); 
    }
    function editreport($id,$nombre,$estado){
        
        $this->db->where('rep_id',$id);
        $this->db->set('rep_nombre',$nombre);
        $this->db->set('rep_estado',$estado);
        $this->db->update('reportes');
        echo $this->db->last_query();
    }
    function guardartodoreporte($data,$id){
        
        $this->db->where('rep_id',$id);
        $this->db->update('reporte',$data);
        
    }
    function consultahijos($idgeneral = 0) {

//        $this->db->select('menu_id,menu_idpadre');
        if (!empty($idgeneral))
            $this->db->where('rep_idpadre', $idgeneral);
        else
            $this->db->where('rep_idpadre', '0');
        $dato = $this->db->get('reporte');

//        echo 1;die;
//        var_dump($dato->result_array());die;
//        echo $this->db->last_query();die;
        return $dato->result_array();
    }
    function hijos($hijo) {

        $this->db->where('rep_idpadre', $hijo);
        $dato = $this->db->get('reporte');
        $envio = $dato->result_array();

//        echo $this->db->last_query();
        return $envio;
    }
     function guardarmodulo($modulo, $padre = null, $general) {


        $data = array('rep_nombrepadre' => $modulo,
            'rep_idpadre' => $general
        );

        $this->db->insert('reporte', $data);

        return $this->db->insert_id();
    }
     function cargamenu($padre) {
        if (empty($padre)) {
            $this->db->where('rep_idpadre', '0');
        } else {
            $this->db->where('rep_idpadre', $padre);
        }
        $dato = $this->db->get('reporte');
        $envio = $dato->result_array();

        return $envio;
    }
    function consultamenu($idgeneral) {

        $this->db->where('rep_id', $idgeneral);
        $datos = $this->db->get('reporte');

        return $datos->result_array();
    }
    function actualizahijos($padre) {

        $data = array('rep_idhijo' => $padre);

        $this->db->where('rep_id', $padre);
        $this->db->update('reporte', $data);
    }
    function consultareporte($idreporte){
       $this->db->where('rep_id',$idreporte); 
       $reporte = $this->db->get('reporte');
       return $reporte->result_array(); 
    }
    function ejecucionquery($query){
        
//        echo $query;die;
        
        $query = $this->db->query($query);
        
//        echo $this->db->last_query();
        
        return $query->result_array();
    }
    function totales($query,$campos){
        
        //        echo $query;die;
        
        $query = $this->db->query($query);
        
//        echo $this->db->last_query();
        
        return $query->result_array();
        
    }
}