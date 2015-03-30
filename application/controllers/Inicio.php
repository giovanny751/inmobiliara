<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->load->model('Roles_model');
    }
    function seleccionrol(){
        
        $id = $this->data['user']->id;        
        $this->data['datos'] = $this->Roles_model->cantidadroles($id);
        $this->load->view('inicio/seleccionrol',$this->data);
        
    }


}
