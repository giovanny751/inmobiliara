<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administracion_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('logged_in'));
    }

    function contenido(){
        $this->data['consultacantidad'] = $this->administracion_model->consultacantidad();
//        var_dump($this->data['consultacantidad']);die;
        $this->layout->view('administracion/contenido',$this->data);
    }
    function guardarcantidadinicio(){
        
        $cantidad = $this->input->post('cantidad');
        $consultacantidad = $this->administracion_model->consultacantidad();
        if(!empty($consultacantidad))$this->administracion_model->actualizacantidad($cantidad);
        else $this->administracion_model->insertacantidad($cantidad);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */