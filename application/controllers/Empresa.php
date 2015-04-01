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
    function guardaractualizacion(){
        
        $data = array( 
                    'emp_direccion'=>$this->input->post('emp_direccion'),
                    'emp_identificacion'=>$this->input->post('emp_identificacion'),
                    'emp_nombre'=>$this->input->post('emp_nombre'),
                    'emp_telefono'=>$this->input->post('emp_telefono'),
                    'emp_telefonodos'=>$this->input->post('emp_telefonodos'),
                    'ing_id'=>$this->data['user']['id_usuario']
                );
        $this->Empresa_model->guardaactualizacionempresa($data);
    }
    function imagenesempresa(){
        
        $this->layout->view('empresa/imagenesempresa', $this->data);
        
    }
//    function upload(){
//        
//        // A list of permitted file extensions
//        $allowed = array('png', 'jpg', 'gif','zip');
//        
////        echo $_FILES['upl']["error"];die;
//
//        if(isset($_FILES['upl']) ){
//
//                $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
//
////                echo $extension;die;
//                
////                if(!in_array(strtolower($extension), $allowed)){
////                        echo '{"status":"error"}';
////                        exit;
////                }
////                echo move_uploaded_file($_FILES['upl']['tmp_name']);die;
//                if(move_uploaded_file($_FILES['upl']['tmp_name'], base_url('uploads').'/'.$_FILES['upl']['name'])){
//                        echo '{"status":"success"}';
//                        exit;
//                }
//        }
//        echo '{"status":"error"}';
//        exit;
//    }
    
       function do_upload($id = NULL) {
        set_time_limit(0);

        $config['upload_path'] = base_url('uploads/');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
        
        echo "<pre>";
        var_dump($this->upload);die;
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_view', $error);
        } else {
            //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
            //ENV�?AMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //AS�? YA TENEMOS LA IMAGEN REDIMENSIONADA
            $data = array('upload_data' => $this->upload->data());
            $this->data['userfile'] = $file_info['file_name'];
        }
        redirect('index.php/empresa/imagenesempresa', 'location');
    }	
}