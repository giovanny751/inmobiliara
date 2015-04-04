<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Empresa_model');
        $this->load->helper('security');
        validate_login($this->session->userdata('logged_in'));
    }

    function actualizacionempresa() {

        $id = $this->data['user']['id_usuario'];
        $this->data['datos'] = $this->Empresa_model->datosempresa($id);
        $this->layout->view('empresa/actualizacionempresa', $this->data);
    }

    function guardaractualizacion() {

        $data = array(
            'emp_direccion' => $this->input->post('emp_direccion'),
            'emp_identificacion' => $this->input->post('emp_identificacion'),
            'emp_nombre' => $this->input->post('emp_nombre'),
            'emp_telefono' => $this->input->post('emp_telefono'),
            'emp_telefonodos' => $this->input->post('emp_telefonodos'),
            'ing_id' => $this->data['user']['id_usuario']
        );
        $this->Empresa_model->guardaactualizacionempresa($data);
    }

    function imagenesempresa() {
        $id = $this->data['user']['user_id'];
        $this->data['datos'] = $this->Empresa_model->datosempresa($id);
        $this->data['categorias'] = $this->Empresa_model->categorias();
        $this->layout->view('empresa/imagenesempresa', $this->data);
    }

    function doUploadFile() {
        $this->data['post'] = $this->input->get();
        $post = $this->data['post'];
        $id_user = $this->data['user']['user_id'];


        define("RUTA_INI", "./uploads");
        $user = $this->data['user']['user_id'];
        if (!is_dir(RUTA_INI . '/' . $user)) {
            @mkdir(RUTA_INI . '/' . $user, 0777);
        }


        $status = '';
        $message = '';
        $background = '';
        $file_element_name = 'userFile';

        if ($status != 'error') {
            $config['upload_path'] = RUTA_INI . '/' . $user . "/";
//            $config['allowed_types'] = 'txt';
            $config['allowed_types'] = 'png|jpg|gif|pdf';
            $config['max_size'] = '100000';
            $config['encrypt_name'] = TRUE;
//            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($file_element_name)) {
                return false;
            } else {
                $data = $this->upload->data();
            }
            @unlink($_FILES[$file_element_name]);
        }
        $id = $post['imgEnc_id'];
        if ($post['imgEnc_id'] > 0) {
            $this->Empresa_model->update_imagen_general($post, $id_user);
        } else {
            $id = $this->Empresa_model->guarda_imagen_general($post, $id_user);
        }
        $this->Empresa_model->insert_imagen_secundatia($data['file_name'], $id);
//        $file = fopen("1.txt", "r") or exit("Unable to open file!");
        $tabla = "";
        echo $json_encode = json_encode(array('message' => $data['file_name'], 'ruta' => $user . '/' . $data['file_name'], 'id' => $id));
//        echo $json_encode = json_encode(array('message' => 'dd', 'ruta' => '999'));
    }

    function guardar_imagen_general() {
        $post = $this->input->post();
        $id_user = $this->data['user']['user_id'];
        if ($post['imgEnc_id'] > 0) {
            $this->Empresa_model->update_imagen_general($post, $id_user);
        } else {
            $id = $this->Empresa_model->guarda_imagen_general($post, $id_user);
        }
        redirect('index.php/Empresa/listado', 'location');
    }

    function img_principal() {
        $this->data['post'] = $this->input->post();
        $post = $this->data['post'];
        $id_user = $this->data['user']['user_id'];
        $this->data['post'] = $this->input->post();
        $this->Empresa_model->img_principal($this->data['post']);
    }

    function buscar_sub_categorias() {
        $post = $this->input->post();
        echo $this->Empresa_model->buscar_sub_categorias($post);
    }

    function listado($num = 1) {
        $id = $this->data['user']['user_id'];
        $this->data['listado'] = $this->Empresa_model->listado($num, $id);
        $this->data['cantidad'] = $this->Empresa_model->cantidad_listado($id);
        if ($num == 1)
            $this->data['num'] = $num;
        else
            $this->data['num'] = deencrypt_id($num);
        $this->layout->view('empresa/listado', $this->data);
    }

    //funcion que inactiva los productos de los clientes
    function inactivar($url, $id, $num) {
        $url = deencrypt_id($url);
        $id = deencrypt_id($id);
        $num = deencrypt_id($num);
        $this->data['listado'] = $this->Empresa_model->inactivar($id, $num);
    }

}
