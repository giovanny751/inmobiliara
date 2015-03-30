<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preguntas extends My_Controller {

    function __construct() {
        parent::__construct();

//        $numero = "";
//        $this->load->js('js/jquery.min.js');
        $this->load->database();
        $this->load->model('preguntas_model');
        $this->data['usuario'] = $this->data['user']['user_id'];
    }

    function administracionpreguntas() {

        $this->data['tipo'] = $this->preguntas_model->tipopregunta();
        $this->layout->view('preguntas/administracionpreguntas', $this->data);
    }

    function guardartipopregunta() {

        $tipopregunta = $this->input->post('tipo');
        $tipousuario = $this->input->post('tipousuario');

        $this->preguntas_model->guardartipopregunta($tipopregunta, $tipousuario);
        $tipo = $this->preguntas_model->tipopregunta();
        $this->output->set_content_type('application/json')->set_output(json_encode($tipo));
    }

    function guardaropcionpregunta() {

        $tipopregunta = $this->input->post('tipo');
        $opcion = $this->input->post('opcion');
        $tipousuario = $this->input->post('tipousuario');

        $this->preguntas_model->guardaropcionpregunta($tipopregunta, $opcion, $tipousuario);
    }

    function tipocategorias() {

        $tipo = $this->input->post('tipo');

        $categoria = $this->preguntas_model->tipocategoria($tipo);

        $this->output->set_content_type('application/json')->set_output(json_encode($categoria));
    }

    function selecciontipo() {

        $this->data['title'] = 'Seleccion Pregunta';
        $this->layout->view('preguntas/selecciontipo', $this->data);
    }

    function preguntasseleccion() {

        $tipo = $this->input->post('tipUsu_id');
        if (!empty($tipo)) {
            $this->data['tipousuario'] = $tipo;
            $this->data['tipo'] = $this->preguntas_model->tipopregunta($tipo);
            $this->data['preguntas'] = $this->preguntas_model->todaspreguntasseleccion($tipo);
            $this->layout->view('preguntas/preguntasseleccion', $this->data);
        }else{
             redirect('index.php/presentacion/principal', 'location');
        }
    }

    function consultaopciones() {

        $id = $this->input->post('id');
        $opciones = $this->preguntas_model->opcionpregunta($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($opciones));
    }

    function guardarpreguntas() {

        $pregunta = $this->input->post('pregunta');
        $tipousuario = $this->input->post('tipousuario');
        $opcionpregunta = $this->input->post('opcionpregunta');
        $tipos = $this->input->post('tipos');
        $id = $this->input->post('id');
        $opcion = $this->input->post('opcion');

        if ($opcion == 1) {
            $preguntas = $this->preguntas_model->guardarpregunta($pregunta, $opcionpregunta, $tipos,$tipousuario);
        } else {
            $preguntas = $this->preguntas_model->editarpregunta($pregunta, $id, $opcionpregunta, $tipos,$tipousuario);
        }
    }

    function eliminarpregunta() {

        $id = $this->input->post('id');
        $preguntas = $this->preguntas_model->eliminarpregunta($id);
    }

    function preguntasusuario() {

        $id = $this->data['usuario'];
        $usutipo = $this->data['user']['usu_tipo'];
        
//        echo $usutipo;die;
        if($usutipo == 1){
            $preguntascontestadas = $this->preguntas_model->preguntasusuario($id,$usutipo);
            $this->data['tipo'] = $usutipo;
        }
        if($usutipo == 2){
            $id = $this->data['user']['emp_id'];
            $preguntascontestadas = $this->preguntas_model->preguntasusuario($id,$usutipo);
            $this->data['tipo'] = $usutipo;
        }
        if($usutipo == 1 || $usutipo == 2 ){
        $this->data['contador'] = count($preguntascontestadas);
        if ($this->data['contador'] == 0) {
            $this->data['preguntas'] = $this->preguntas_model->todaspreguntas($usutipo);
            $this->data['i'] = array();
//        echo "<pre>";
//        var_dump($this->data['preguntas']);die;
            foreach ($this->data['preguntas'] as $pregunta) {
                $this->data['i'][$pregunta['tipPre_tipo']][$pregunta['opcPre_opcion']][$pregunta['pre_id']] = $pregunta['pre_pregunta'];
            }
        }

        $this->layout->view('preguntas/preguntasusuario', $this->data);
        }else{
            redirect('index.php/presentacion/principal', 'location');
        }
    }

    function guardarpreguntasusuario() {

        $si = $this->input->post('si');
        $no = $this->input->post('no');
        $na = $this->input->post('na');
        $tipousuario = $this->input->post('tipousuario');

        $contadorsi = count($si);
        $contadorno = count($no);
        $contadorna = count($na);

//        echo $contadorsi."***".$contadorno."***".$contadorna;die;

        $array = array();
         $idusuario = $this->data['usuario'];
        if($tipousuario == 2){
            $idusuario = $this->data['user']['emp_id'];
        }
       
        if (!empty($si)) {
            for ($i = 0; $i < $contadorsi; $i++) {
                $array[] = array('resUsu_respuesta' => "1", 'usu_id' => $idusuario, 'pre_id' => $si[$i],'tipUsu_id'=>$tipousuario);
            }
        }
        if (!empty($no)) {
            for ($i = 0; $i < $contadorno; $i++) {
                $array[] = array('resUsu_respuesta' => "2", 'usu_id' => $idusuario, 'pre_id' => $no[$i],'tipUsu_id'=>$tipousuario);
            }
        }
        if (!empty($na)) {
            for ($i = 0; $i < $contadorna; $i++) {
                $array[] = array('resUsu_respuesta' => "3", 'usu_id' => $idusuario, 'pre_id' => $na[$i],'tipUsu_id'=>$tipousuario);
            }
        }

//        echo "<pre>";
//        var_dump($array);die;
        $this->preguntas_model->ingresarrespuestas($array);

        redirect('index.php/preguntas/preguntasusuario', 'location');
    }

    function informacionusuario() {

        $this->layout->view('preguntas/informacionusuario');
    }

    function cambiodeestadopregunta() {

        $id = $this->input->post('id');
        $estado = $this->input->post('estado');
        $this->preguntas_model->actualizacionestadopregunta($id, $estado);
    }

}
