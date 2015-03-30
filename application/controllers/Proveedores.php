<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proveedores extends My_Controller {

    function __construct() {
        parent::__construct();
//        $numero = "";

        $this->load->database();
        $this->load->model('ingreso_model');
        $this->load->model('Proveedores_model');
        $this->data['user'] = $this->ion_auth->user()->row();
//        echo "<pre>";print_r($this->data['user']);die();
        define("ID_USER", $this->data['user']->user_id);
        define("RUTA_INI", "./uploads/archivo");
    }

    function index() {
        $this->data['proveedores'] = $this->Proveedores_model->proveedores();
        $this->layout->view('Proveedores/creaciondeproveedores', $this->data);
    }

    function guardarproveedor() {
        $post=  $this->input->post();
        $this->Proveedores_model->guardarproveedor($post);
    }

    function crear_provedor() {
        $this->load->view('Proveedores/crear_provedor', $this->data);
    }

    function crear_prodcutos() {
        $this->data['post'] = $this->input->post();
        $this->load->view('Proveedores/crear_prodcutos', $this->data);
    }

    function doUploadFile() {
        $this->data['post'] = $this->input->get();

        if (!is_dir(RUTA_INI . ID_USER)) {
            @mkdir(RUTA_INI . ID_USER, 0777);
        }

        $status = '';
        $message = '';
        $background = '';
        $file_element_name = 'userFile';

        if ($status != 'error') {
            echo "lists";
            $config['upload_path'] = RUTA_INI . ID_USER . '/';
//            $config['allowed_types'] = 'txt';
            $config['allowed_types'] = 'png|jpg|gif|pdf|txt';
            $config['max_size'] = '10000';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($file_element_name)) {
                return false;
            } else {

                $data = $this->upload->data();
            }
            @unlink($_FILES[$file_element_name]);
        }
//        $file = fopen("1.txt", "r") or exit("Unable to open file!");
        $tabla = "";
        echo $json_encode = json_encode(array('message' => $data['file_name'], 'ruta' => RUTA_INI . ID_USER . '/' . $data['file_name']));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */