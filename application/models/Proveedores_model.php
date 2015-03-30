<?php

class Proveedores_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function proveedores() {
        $proveedores = $this->db->get('proveedores');
        return $proveedores->result_array();
    }

    function guardarproveedor($post) {
        $this->db->set('pai_id',$post['pais']); 
        $this->db->set('pro_identificacion',$post['identificacion']); 
        $this->db->set('tipPro_id',$post['tipoproveedor']); 
        $this->db->set('nac_id',$post['nacionalidad']); 
        $this->db->set('pro_nombre',$post['nombreorganizacion']); 
        $this->db->set('pro_web',$post['sitioweb']); 
        $this->db->set('pro_fechaIngreso',$post['iniciodeactividades']); 
        $this->db->set('actEco_id',$post['actividadeconomica']); 
        $this->db->set('pro_rubro',$post['rubro']); 
        $this->db->set('pro_canEmpleados',$post['cantidaddeempleados']); 
        $this->db->set('tamEmp_id',$post['clasificaciondelaempresa']); 
        $this->db->set('pro_conEntrega',$post['condiciondeentrega']); 
        $this->db->set('pro_modEntrega',$post['mododeentrega']); 
        $this->db->set('canVen_id',$post['canalesdeventa']); 
        $this->db->set('tipMon_id',$post['moneda']); 
        $this->db->set('forPag_id',$post['formadepago']); 
//        $this->db->set('pro_estado',$post['']); 
//        $this->db->set('pro_correo',$post['']); 
        $this->db->insert('proveedores'); 
        
       
    }

}
