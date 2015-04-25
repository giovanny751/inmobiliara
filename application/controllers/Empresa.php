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

        $id = $this->data['user']['emp_id'];
        
//        var_dump($id);die;
        
        $this->data['datos'] = $this->Empresa_model->datosempresa($id);
        
//        var_dump($this->data['datos']);die;
        
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

    function imagenesempresa($imgEnc_id=null) {
        $id = $this->data['user']['emp_id'];
        $this->data['datos'] = $this->Empresa_model->datosempresa($id);
        $this->data['categorias'] = $this->Empresa_model->categorias();
        $this->data['filtros'] = $this->Empresa_model->filtros($imgEnc_id);
        $this->data['listado'] = $this->Empresa_model->listado(NULL,NULL,$imgEnc_id);
        $this->layout->view('empresa/imagenesempresa', $this->data);
    }

    function doUploadFile() {
        $this->data['post'] = $this->input->get();
        $post = $this->data['post'];
        $id_user = $this->data['user']['emp_id'];


        define("RUTA_INI", "./uploads");
        $user = $this->data['user']['emp_id'];
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
            $config['allowed_types'] = 'png|jpg|gif';
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
    function doUploadFile_slider() {
        $this->data['post'] = $this->input->get();
        $post = $this->data['post'];
        $user_id = $this->data['user']['id_usuario'];


        define("RUTA_INI", "./uploads");
        $post['emp_id']=$emp_id = $this->data['user']['emp_id'];
        if (!is_dir(RUTA_INI . '/' . $emp_id)) {
            @mkdir(RUTA_INI . '/' . $emp_id, 0777);
        }
        if (!is_dir(RUTA_INI . '/' . $emp_id."/slider")) {
            @mkdir(RUTA_INI . '/' . $emp_id."/slider", 0777);
        }
        $status = '';
        $message = '';
        $background = '';
        $file_element_name = 'userFile';

        if ($status != 'error') {
            $config['upload_path'] = RUTA_INI . '/' . $emp_id . "/slider/";
//            $config['allowed_types'] = 'txt';
            $config['allowed_types'] = 'png|jpg|gif';
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
        
        $post['sli_nombre_archivo']=$data['file_name'];
        $id=$this->Empresa_model->Guardar_slider($post,$user_id);
        $tabla=$this->Empresa_model->obtener_slider($emp_id);
        $tabla=  base64_encode($tabla);
        echo $json_encode = json_encode(array('message' => $data['file_name'], 'ruta' => $emp_id . '/' . $data['file_name'],'tabla'=>$tabla));
    }

    function guardar_imagen_general() {
        $post = $this->input->post();
        $emp_id = $this->data['user']['emp_id'];
        if ($post['imgEnc_id'] > 0) {
            $this->Empresa_model->update_imagen_general($post, $emp_id);
        } else {
            $id = $this->Empresa_model->guarda_imagen_general($post, $emp_id);
        }
        redirect('index.php/Empresa/listado', 'location');
    }

    function img_principal() {
        $this->data['post'] = $this->input->post();
        $post = $this->data['post'];
        $id_user = $this->data['user']['emp_id'];
        $this->data['post'] = $this->input->post();
        $this->Empresa_model->img_principal($this->data['post']);
    }

    function buscar_sub_categorias() {
        $post = $this->input->post();
        echo $this->Empresa_model->buscar_sub_categorias($post);
    }

    function listado($num = 1) {
        $this->data['post']=$post = $this->input->post();
        $id = $this->data['user']['emp_id'];

        if (isset($post['imgEnc_nombre']))
            if ($post['imgEnc_nombre'] != "")
                $this->db->like('imgEnc_nombre', $post['imgEnc_nombre']);
        if (isset($post['imgEnc_descripcion_corta']))
            if ($post['imgEnc_descripcion_corta'] != "")
                $this->db->like('imgEnc_descripcion_corta', $post['imgEnc_descripcion_corta']);
        if (isset($post['cat_id']))
            if ($post['cat_id'] != "")
                $this->db->like('cat_id', $post['cat_id']);
        if (isset($post['subCat_id']))
            if ($post['subCat_id'] != "")
                $this->db->like('subCat_id', $post['subCat_id']);
        if (isset($post['imgEnc_descripcion_larga']))
            if ($post['imgEnc_descripcion_larga'] != "")
                $this->db->like('imgEnc_descripcion_larga', $post['imgEnc_descripcion_larga']);
        $this->data['listado'] = $this->Empresa_model->listado($num, $id);

        if ($num == 1)
            $this->data['num'] = $num;
        else
            $this->data['num'] = deencrypt_id($num);
        $this->data['categorias'] = $this->Empresa_model->categorias();
        $this->layout->view('empresa/listado', $this->data);
    }

    //funcion que inactiva los productos de los clientes
    function inactivar($url, $id, $num) {
        $id = deencrypt_id($id);
        $num = deencrypt_id($num);
        $this->Empresa_model->inactivar($id, $num);
        redirect('index.php/Empresa/listado/' . $url, 'location');
    }
    //funcion que destaca los productos de los clientes
    function destacar($url, $id, $num) {
        $id = deencrypt_id($id);
        $num = deencrypt_id($num);
        $this->Empresa_model->destacar($id, $num);
        redirect('index.php/Empresa/listado/' . $url, 'location');
    }
    //activa o inactiva las promociones de cada producto
    function promocion($url, $id, $num) {
        $id = deencrypt_id($id);
        $num = deencrypt_id($num);
        $this->Empresa_model->promocion($id, $num);
        redirect('index.php/Empresa/listado/' . $url, 'location');
    }
    //activa o desactiva las imagenes del slaider principal
    function slider($num=1){
        $id = $this->data['user']['emp_id'];
        $this->data['tabla']=$this->Empresa_model->obtener_slider($id);
        $this->layout->view('empresa/slider', $this->data);
    }
    function inactivar_slider($id,$num){
        $id=  deencrypt_id($id);
        $num=  deencrypt_id($num);
        $this->Empresa_model->inactivar_slider($id, $num);
        redirect('index.php/Empresa/slider', 'location');
    }

}
