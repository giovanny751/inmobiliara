<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Reportes_model');
    }

    public function creacionreporte() {


        $this->data['hijo'] = $this->input->post('menu');
        $this->data['nombrepadre'] = $this->input->post('nombrepadre');
        $this->data['idgeneral'] = $this->input->post('idgeneral');

        if (empty($this->data['idgeneral']))
            $this->data['hijo'] = 0;

        $this->data['menu'] = $this->Reportes_model->consultahijos($this->data['idgeneral']);

        if (!empty($this->data['idgeneral'])) {

            $this->data['menu'] = $this->Reportes_model->hijos($this->data['idgeneral']);
        }

        $this->layout->view('reportes/creacionreporte', $this->data);
    }

    function guardarmodulo() {

        $modulo = $this->input->post('modulo');
        $padre = $this->input->post('padre');
        $general = $this->input->post('general');
        $actualizamodulo = $this->Reportes_model->actualizahijos($general);

        $guardamodulo = $this->Reportes_model->guardarmodulo($modulo, $padre, $general);
        $menu = $this->Reportes_model->cargamenu($general);


        $this->output->set_content_type('application/json')->set_output(json_encode($menu));
    }

    function consultadatosmenu() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $datos = $this->ingreso_model->consultamenu($idgeneral);

            $this->output->set_content_type('application/json')->set_output(json_encode($datos[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function inforeport() {
        $id = $this->input->post('id');
        $informacion = $this->Reportes_model->inforeport($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($informacion[0]));
    }

    function editreport() {

        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $estado = $this->input->post('estado');

        $editar = $this->Reportes_model->editreport($id, $nombre, $estado);
    }

    function allreport() {

        $id = $this->input->post('id');
        $reportes = $this->Reportes_model->inforeport($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($reportes[0]));
    }

    function guardartodoreporte() {

        $id = $this->input->post('idreporte');

        $query = $this->input->post('query');

        $data = array(
            'rep_nombrepadre' => $this->input->post('reporte'),
            'rep_query' => $query,
            'rep_host' => $this->input->post('host'),
            'rep_user' => $this->input->post('user'),
            'rep_password' => $this->input->post('password'),
        );

        $this->Reportes_model->guardartodoreporte($data, $id);
    }

    function validarquery() {
        $query = $this->input->post('query');
        $id = 1;
        $validar = $this->Reportes_model->validarquery($id, $query);

//        var_dump($validar);die;
    }

    function guardarreporte() {
        $reporte = $this->input->post('nuevoreporte');
        $this->Reportes_model->guardarreporte($reporte);

        $reportes = $this->Reportes_model->totalreportes();
        $this->output->set_content_type('application/json')->set_output(json_encode($reportes));
    }

    function logicareportes($datosmodulos = 'prueba', $report = null) {


        $informacion = $this->Reportes_model->visualizacionreporte($datosmodulos);
        $i = array();
        foreach ($informacion as $modulo)
            $i[$modulo['rep_id']][$modulo['rep_nombrepadre']][$modulo['rep_idpadre']] [] = array($modulo['rep_idhijo']);




        $report .= "<ul>";
        foreach ($i as $padre => $nombrepapa):
//                        if ($padre == 14) {
//                            echo "<pre>";
//                            var_dump($report);
//                            die;
//                        }  
            foreach ($nombrepapa as $nombrepapa => $menuidpadre):
                foreach ($menuidpadre as $modulos => $menu):
                    foreach ($menu as $submenus):
                        $report .= "<li>" . strtoupper($nombrepapa) . "<input type='radio' value='" . $padre . "' name='seleccionreporte'>";
//        if (!empty($submenus[0]))
                            $report = $this->logicareportes($submenus[0], $report);
                        $report .= "</li>";
                    endforeach;
                endforeach;
            endforeach;
        endforeach;
        
        $report .= "</ul>";
        


        return $report;
    }

    function informacionreporte() {


        $this->data['logicareportes'] = $this->logicareportes($datosmodulos = 'prueba');

//        echo $this->data['logicareportes'];die;

        $this->layout->view('reportes/informacionreporte', $this->data);
    }

    function abrirxml() {

        $idreporte = $this->input->post('seleccionreporte');

        $reporte = $this->Reportes_model->consultareporte($idreporte);

//        var_dump($reporte);die;
        
        if(!empty($reporte[0]['rep_query'])){
        
        
        $query = $reporte[0]['rep_query'];


        $t = <<< EOF
<?xml version="1.0" encoding="iso-8859-1"?>    
<datos>        
$query
</datos>        
EOF;

        $this->data['xml'] = @simplexml_load_string($t);

//        $calcular = $this->data['xml']->calculate;
//        foreach($this->data['xml']->calculate as $campo => $alias){
//            echo $campo."***".$alias."<br>";
//        }
//        die;
//            $xml   = simplexml_load_string($this->data['xml'], 'SimpleXMLElement', LIBXML_NOCDATA);
//            $array = json_decode(json_encode($xml), TRUE);
//            var_dump($array);die;
//        
//        echo "<pre>";
//        var_dump($this->data['xml']->calculate);die;
//        
        $this->data['informacion'] = $this->Reportes_model->ejecucionquery($this->data['xml']->query);
//        $this->data['totales'] = $this->Reportes_model->totales($this->data['xml']->query,$calcular);
        
                    $this->data['opcion'] = 1;

                    $this->layout->view('reportes/abrirxml', $this->data);
        }else{
            $this->data['opcion'] = 2;
             $this->data['info'] =  "<div class='alert alert-info'><center>NO HAY REPORTE</center></div>";
             $this->layout->view('reportes/abrirxml', $this->data);
        }

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */