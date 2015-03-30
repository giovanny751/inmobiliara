<?php
class Cplantilla extends CI_Controller{
    
    function index(){
        
        $this->data['contenido']="Has entrado a la pagina";
        $this->load->view('plantilla',$this->data);
    }
}
?>