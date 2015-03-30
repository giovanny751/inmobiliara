<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Empresa_model');
        $this->load->model('Administracion_model');
        $this->load->helper('security');
        validate_login($this->data['user']['user_id']);
    }
    function empresa($id = null) {

        if ($id == NULL) {
            $this->data['id'] = $id = $this->data['user']['emp_id'];
        } else {
            $this->data['id'] = $id = deencrypt_id($id);
        }

        if (!empty($id)) {
            $this->data['titulo'] = "Registro Empresa";
            $this->data['empresa'] = $this->Empresa_model->empresa($id);
            $this->data['ciiu'] = $this->Empresa_model->get_ciiu();
            $this->data['segmento'] = $this->Empresa_model->segmento();
//            $this->data['totalvehiculos'] = $this->Empresa_model->totalvehiculos($this->data['id']);
//            $this->data['conductores'] = $this->Empresa_model->totalconductores($this->data['id']);
//            echo "<pre>";
//            var_dump($this->data['totalvehiculos']);die;
            $this->data['tipo_empresa'] = get_dropdown($this->Empresa_model->tipo_empresa(), 'tipEmp_id', 'tipEmp_nombre');
            $this->layout->view('empresa/empresa', $this->data);
        } else {
            redirect('index.php/presentacion/principal', 'location');
        }
    }
}