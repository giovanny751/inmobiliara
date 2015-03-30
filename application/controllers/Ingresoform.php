<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ingresoform extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingresoform_model');
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
            $this->data['empresa'] = $this->Ingresoform_model->empresa($id);
            $this->data['ciiu'] = $this->Ingresoform_model->get_ciiu();
            $this->data['segmento'] = $this->Ingresoform_model->segmento();
            $this->data['totalvehiculos'] = $this->Ingresoform_model->totalvehiculos($this->data['id']);
            $this->data['conductores'] = $this->Ingresoform_model->totalconductores($this->data['id']);
//            echo "<pre>";
//            var_dump($this->data['totalvehiculos']);die;
            $this->data['tipo_empresa'] = get_dropdown($this->Ingresoform_model->tipo_empresa(), 'tipEmp_id', 'tipEmp_nombre');
            $this->layout->view('ingresoform/empresa', $this->data);
        } else {
            redirect('index.php/presentacion/principal', 'location');
        }
    }

    function guardar_emp() {
        $post = $this->input->post();
        $this->Ingresoform_model->guardar_emp($post);
        redirect('index.php/ingresoform/lisEmpresa', 'location');
    }

    function lisEmpresa($id = null) {
        $this->data['id'] = $id;
        if ($this->data['user']['usu_tipo'] != 0 && $this->data['user']['usu_tipo'] != 3) {
            $this->data['id'] = encrypt_id($this->data['user']['emp_id']);
        }
        $this->data['titulo'] = "Empresas";
        $this->layout->view('ingresoform/lisEmpresa', $this->data);
    }

    function lisVehiculos($id = null) {
        $this->data['titulo'] = "Vehiculos";
        if ($id == NULL) {
            $this->data['id'] = $this->data['user']['emp_id'];
        } else {
            $this->data['id'] = $id;
        }

        if ($this->data['user']['usu_tipo'] != 0 && $this->data['user']['usu_tipo'] != 3) {
            $this->data['id'] = encrypt_id($this->data['user']['emp_id']);
        }
        $this->layout->view('ingresoform/lisVehiculos', $this->data);
    }

    function lisEmpleado($id = null) {
        $this->data['titulo'] = "Empleado";
        $this->data['id'] = $id;
        if ($this->data['user']['usu_tipo'] != 0 && $this->data['user']['usu_tipo'] != 3) {
            $this->data['id'] = encrypt_id($this->data['user']['emp_id']);
        }
        $this->layout->view('ingresoform/lisEmpleado', $this->data);
    }

    function get_datatable($id = null) {
        $id = deencrypt_id($id);
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_table($id);
            echo $data;
        } else {
            echo 'Acceso no utorizado';
        }
    }

    function get_datavehiculo($id = NULL) {
        $id = deencrypt_id($id);
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_datavehiculo($id);
            echo $data;
        } else {
            echo 'Acceso no utorizado';
        }
    }

    function get_dataEmpleado($id = NULL) {
        $id = deencrypt_id($id);
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_dataEmpleado($id);
            echo $data;
        } else {
            echo 'Acceso no utorizado';
        }
    }

    function ingresarempresa() {

        $this->layout->view('ingresoform/ingresarempresa');
    }

    function enviocorreoempresa() {

        $empresa = $this->input->post('empresa');
        $correo = $this->input->post('correo');
        $nit = $this->input->post('nit');
        $user_id = $this->data['user']['user_id'];
        $log = array();
//        $random = encrypt_id($nit);
        $random = '12345';
        $log[] = array(
            'corEnv_nit' => $nit,
            'corEnv_empresa' => $empresa,
            'corEnv_correo' => $correo,
            'corEnv_contrasena' => $random,
            'usu_idagrego' => $user_id
        );



        $message = "<table>";
        $message .= "<tr>";
        $message .= "<td colspan='2' style='color:white;background-color:blue;'><center><b>" . $empresa . "</b></center></td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Usuario</td>";
        $message .= "<td>" . $correo . "</td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Contraseña</td>";
        $message .= "<td>" . $random . "</td>";
        $message .= "<tr>";

        $message .= "</table>";

        mail($correo, "Registro de empresas", $message);
        $this->Ingresoform_model->guardarlogenviocorreo($log);
        $idusuario = $this->Ingresoform_model->ingresousuarioempresa($correo, $random, $nit, $empresa);
        $this->Ingresoform_model->permisosusuarioempresa($idusuario);
    }

    function ingresausuario() {
        
        if (!empty($this->data['user']['emp_id']))
            $id = $this->data['user']['emp_id'];
        else
            $id = '';
        $this->data['empresa'] = get_dropdown($this->Ingresoform_model->empresa($id), 'emp_id', 'emp_razonSocial');
        $this->layout->view('ingresoform/ingresausuario', $this->data);
    }

    function enviocorreousuario() {

        $documento = $this->input->post('documento');
        $tipodocumento = $this->input->post('tipodocumento');
        $correo = $this->input->post('correo');
        $user_id = $this->data['user']['user_id'];
        $empresa = $this->input->post('emp_id');

        $log = array();
//        $random = encrypt_id($documento);
        $random = '12345';
        $log[] = array(
            'corUsu_documento' => $documento,
            'tipDoc_id' => $tipodocumento,
            'corUsu_correo' => $correo,
            'corUsu_contrasena' => $random,
            'usu_idagrego' => $user_id,
            'emp_id' => $empresa
        );

        $message = "<table>";
        $message .= "<tr>";
        $message .= "<td colspan='2' style='color:white;background-color:blue;'><center><b>" . $documento . "</b></center></td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Usuario</td>";
        $message .= "<td>" . $correo . "</td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Contraseña</td>";
        $message .= "<td>" . $random . "</td>";
        $message .= "<tr>";

        $message .= "</table>";

        mail($correo, "Registro de Usuario", $message);
        $this->Ingresoform_model->guardarlogenviocorreousuario($log);
        $idusuario = $this->Ingresoform_model->ingresousuariopagina($correo, $random, $documento, $empresa);


        $this->Ingresoform_model->permisosusuariousuario($idusuario);
    }

    // verificar si existe el nit
    function confir_nit() {
        $post = $this->input->post();
        $datos = $this->Ingresoform_model->confir_nit($post);
        echo count($datos);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */