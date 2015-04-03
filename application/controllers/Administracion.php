<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administracion_model');
        $this->load->model('Empresa_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('logged_in'));
    }

    function contenido() {
        $this->data['consultacantidad'] = $this->administracion_model->consultacantidad();
        $this->data['empresas'] = $this->Empresa_model->empresas();
//        var_dump($this->data['consultacantidad']);die;
        $this->layout->view('administracion/contenido', $this->data);
    }

    function guardarcantidadinicio() {

        $cantidad = $this->input->post('cantidad');
        $cantidaddesubir = $this->input->post('cantidaddesubir');
        $idempresa = $this->input->post('empresa');


        if (!empty($cantidad)) {
            $consultacantidad = $this->administracion_model->consultacantidad();
            if (!empty($consultacantidad))
                $this->administracion_model->actualizacantidad($cantidad);
            else
                $this->administracion_model->insertacantidad($cantidad);
        }
        if (!empty($cantidaddesubir)) {
            $this->administracion_model->actualizaempresacantidad($cantidaddesubir, $idempresa);
        }
    }
    function candidaempresa(){
        
        $empresa = $this->input->post('idempresa');
        $cantidad = $this->administracion_model->cantidadporempresa($empresa);
        
        if(!empty($cantidad[0]->emp_max_img)) echo $cantidad[0]->emp_max_img;
        else echo 0;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */