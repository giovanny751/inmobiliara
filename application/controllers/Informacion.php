<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$padre = "prueba";

class Informacion extends My_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('Informacion_model');
    }

    function url() {


        $this->data['url'] = $this->Informacion_model->informacion_personal();
        $this->layout->view('informacion/url', $this->data);
    }

    function guardarinformacion() {

        $data[] = array(
            'infPer_nombre' => $this->input->post('nombre'),
            'infPer_url' => $this->input->post('url')
        );

        $this->Informacion_model->guardarinformacion($data);
        $url = $this->Informacion_model->informacion_personal();

        $this->output->set_content_type('application/json')->set_output(json_encode($url));
    }

    function editarinformacion() {

        $id = $this->input->post('id');

        $data = array(
            'infPer_nombre' => $this->input->post('nombre'),
            'infPer_url' => $this->input->post('url')
        );

        $this->Informacion_model->editarinformacion($data, $id);
        $url = $this->Informacion_model->informacion_personal();

        $this->output->set_content_type('application/json')->set_output(json_encode($url));
    }

    function eliminarurl() {

        $id = $this->input->post('id');
        $this->Informacion_model->eliminarurl($id);
    }

    function consultarusuario() {

        $this->layout->view('informacion/consultarusuario');
    }

    function consultaurlusuario() {
        $datos = $this->Informacion_model->consultaurlusuario();
        $this->output->set_content_type('application/json')->set_output(json_encode($datos));
    }

    function fosyga() {
        //informacion_pagina
//        $this->data['url'] = $this->input->post('url2');
//        echo $this->load->view('informacion/informacion_pagina',$this->data);
//    
//        $this->curl->create('http://www.fosyga.gov.co/Aplicaciones/AfiliadoWebBDUA/Afiliado/Formulario/buda_consulta_afil_sin_dnn.aspx?id=1033741569&tipodocumento=CC');
        $this->curl->create('https://copnia.gov.co/matriculas/');
        //...........(rest of the code)...........
        $this->curl->option('connecttimeout', 600);
        $this->curl->option('SSL_VERIFYPEER', false); // For ssl site
        $this->curl->option('SSL_VERIFYHOST', false);
        $this->curl->option('SSLVERSION', 3); // end ssl
        $data = $this->curl->execute();
//////      
////        echo "<pre>";
////        $result = $this->curl->simple_get('http://www.fosyga.gov.co/Aplicaciones/AfiliadoWebBDUA/Afiliado/Formulario/buda_consulta_afil_sin_dnn.aspx?id=1033741569&tipodocumento=CC');
////        var_dump($result);die;
//        
//        
////        var_dump($data);
//        
        echo $data;
    }

    function dian() {

        // Start session (also wipes existing/previous sessions)
        $this->curl->create('https://muisca.dian.gov.co/WebRutMuisca/DefConsultaEstadoRUT.faces');
//        $this->curl->create('http://www.fosyga.gov.co/Aplicaciones/AfiliadoWebBDUA/Afiliado/Formulario/buda_consulta_afil_sin_dnn.aspx?id=1033741569&tipodocumento=CC');

// Option & Options
        $this->curl->option(CURLOPT_BUFFERSIZE, 10);
        $this->curl->options(array(CURLOPT_BUFFERSIZE => 10));

// More human looking options
        $this->curl->option('buffersize', 10);

// Login to HTTP user authentication
        $this->curl->http_login('1033741569');

// Post - If you do not use post, it will just run a GET request
//        $post = array('foo' => 'bar');
//        $this->curl->post($post);

// Cookies - If you do not use post, it will just run a GET request
//        $vars = array('foo' => 'bar');
//        $this->curl->set_cookies($vars);

// Proxy - Request the page through a proxy server
// Port is optional, defaults to 80
//$this->curl->proxy('http://example.com', 1080);
//$this->curl->proxy('http://example.com');
// Proxy login
//        $this->curl->proxy_login('username', 'password');

// Execute - returns responce
        echo $this->curl->execute();

// Debug data ------------------------------------------------
// Errors
//        $this->curl->error_code; // int
//        $this->curl->error_string;

// Information
        $this->curl->info; // array
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */