<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administracion_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->library('tcpdf/tcpdf.php');
        validate_login($this->session->userdata('user_id'));
    }

    function index() {
        $this->data['titulo'] = "Administracion de Formilarios";
        $formulario = $this->administracion_model->formulario_general();
        $this->data['formularios'] = get_dropdown_select($formulario, 'form_formulario', 'form_nombreForm', '-1', 'Seleccionar...');
        $this->layout->view('administracion/list', $this->data);
    }

    function nuevo_formulario_envio() {
        $this->data['titulo'] = "Administracion de Formilarios";
        $formulario = $this->administracion_model->formulario_general();
        $this->data['formularios'] = get_dropdown_select($formulario, 'form_formulario', 'form_nombreForm', '-1', 'Seleccionar...');
        $this->load->view('administracion/list', $this->data);
    }

    function nuevo_formulario() {
        $this->data['url2'] = $this->administracion_model->maxForm();
        $this->load->view('administracion/nuevo_formulario', $this->data);
    }

    function guardar_formulario() {
        $post = $this->input->post();
        $this->administracion_model->guardar_formulario($post);
        echo $this->nuevo_formulario_envio();
    }

    function administracionempleado() {

        $this->layout->view('administracion/administracionempleado');
    }

    function empleado_el($id = null) {
        $this->administracion_model->empleado_el($id);
//        ingresoform/lisEmpresa
        redirect('index.php/ingresoform/lisEmpresa', 'location');
    }

    function vehicuo_el($id_emp = null, $id = null) {
        $this->administracion_model->vehiculo_el($id);
//        ingresoform/lisEmpresa
        redirect('index.php/ingresoform/lisVehiculos/' . $id_emp, 'location');
    }

    function empresa_el($id = null) {
        $this->administracion_model->empresa_el($id);
//        ingresoform/lisEmpresa
        redirect('index.php/ingresoform/lisEmpresa', 'location');
    }

    function empleado($id = null) {

//        $tipousuario = $this->data['user']['tipUsu_id'];

        if (!empty($id)) {
            $id = deencrypt_id($id);
            $this->data['id'] = $id;
        } else {
            $id = $this->data['user']['user_id'];
        }

        $this->data['cargos'] = $this->administracion_model->cargos();
        $this->data['grupotrabajo'] = $this->administracion_model->grupotrabajo();
        $this->data['genero'] = $this->administracion_model->genero();
        $this->data['confirmacion'] = $this->administracion_model->desicion();
        $this->data['causas'] = $this->administracion_model->causas($id);
        $this->data['categoria'] = $this->administracion_model->categoria();
        $this->data['tipovehiculo'] = $this->administracion_model->tipovehiculo();

        $this->data['usuario'] = $this->administracion_model->datosusuario($id);

        $this->data['ciudad'] = $this->administracion_model->ciudad();
        $this->data['tipocontrato'] = $this->administracion_model->tipocontrato();
        $this->data['frecuencia'] = $this->administracion_model->frecuencia();
        $this->data['tipotrasporte'] = $this->administracion_model->tipotrasporte();
        $this->data['factoresriesgo'] = $this->administracion_model->factoresriesgo($id);
        $this->data['tipodesplazamiento'] = $this->administracion_model->tipodesplazamiento();
        $this->data['estadoconductor'] = $this->administracion_model->estadoconductor();
        $this->data['restricciones'] = $this->administracion_model->restricciones();
        $this->data['rol'] = $this->administracion_model->rol();
        $this->data['confirmacion'] = $this->administracion_model->confirmacion();

        $this->data['funcionario'] = $id;
        $this->layout->view('administracion/empleado', $this->data);
    }

    function guardarempleado() {

        $formulario = $this->input->post();
        $id = $this->input->post('funcionario');
        $idinterno = $this->data['user']['user_id'];
        $ruta = 'index.php/login/acceso/pp/' . encrypt_id($idinterno);

//        echo "<pre>";
//        var_dump($formulario);die;
//        echo $ruta;die;
        $data = array();
        $factoresriesgo = $this->input->post('facRis_id');
        $causas = $this->input->post('cau_id');

//------------------------------------------------------------------------------
//                      ELIMINA FACTORES        
//------------------------------------------------------------------------------      
        $this->administracion_model->eliminafactores($id);
//------------------------------------------------------------------------------
//                      ELIMINA CAUSAS       
//------------------------------------------------------------------------------        
        $this->administracion_model->eliminacausas($id);
        $factores = array();
        foreach ($factoresriesgo as $campo => $valor) {
            $factores[] = array(
                'facRis_id' => $valor,
                'usu_id' => $id
            );
        }

        if (!empty($factoresriesgo))
            $this->administracion_model->guardarfactores($factores);

        $causales = array();
        foreach ($causas as $campo => $valor) {
            $causales[] = array(
                'cau_id' => $valor,
                'usu_id' => $id
            );
        }


//        echo '<pre>';
//        var_dump($causales);die;

        if (!empty($causales))
            $this->administracion_model->guardarcausas($causales);

        foreach ($formulario as $campo => $valor) {
            if ($campo != 'facRis_id' && $campo != 'cau_id' && $campo != 'funcionario')
                $data[$campo] = $valor;
        }



//        echo "<pre>";
        $this->administracion_model->guardarempleado($data, $id);
//        $this->administracion_model->guardarempleado($formulario);



        redirect($ruta, 'location');
    }

    function vehiculo($id_emp = null, $id = null) {
        $this->data['titulo'] = "Registro Empresa";
        $this->data['id'] = deencrypt_id($id);
        if ($id_emp == NULL) {
            $this->data['id_emp'] = $this->data['user']['emp_id'];
            if ($this->data['user']['emp_id'] == 0) {
                redirect('index.php/presentacion/principal', 'location');
            }
        } else {
            $this->data['id_emp'] = deencrypt_id($id_emp);
        }

        $this->data['vehiculo'] = $this->administracion_model->vehiculo($this->data['id']);
        $this->data['tiposervicio'] = $this->administracion_model->tiposervicio();
        $this->data['tipovehiculo'] = $this->administracion_model->tipovehiculo();
        $this->data['confirmacion'] = $this->administracion_model->confirmacion();
        $this->data['tipovinculacion'] = $this->administracion_model->tipovinculacion();
        $this->data['tipocarroceria'] = $this->administracion_model->tipocarroceria();
        $this->data['entidades'] = $this->administracion_model->entidades();

//        var_dump($this->data['tipovinculacion']);die;

        $this->layout->view('administracion/vehiculo', $this->data);
    }

    function guardarvehiculo() {

        $vehiculo = $this->input->post();
        $this->administracion_model->guardarvehiculo($vehiculo);
        redirect('index.php/ingresoform/lisVehiculos', 'location');
    }

    function guardaradminempleado() {

        $name = $this->input->post('name');
        $contenido = $this->input->post('contenido');

        switch ($name) {
            case 'tipocarroceria':
                $campos[] = array('tipCar_nombre' => $contenido);
                $tabla = 'tipo_carroceria';
                break;
            case 'vinculacion':
                $campos[] = array('tipVin_nombre' => $contenido);
                $tabla = 'tipo_vinculacion';
                break;
            case 'rol':
                $campos[] = array('rol_nombre' => $contenido);
                $tabla = 'rol';
                break;
            case 'segmento':
                $campos[] = array('seg_nombre' => $contenido);
                $tabla = 'segmento';
                break;
            case 'entidadsoat':
                $campos[] = array('entSoa_nombre' => $contenido);
                $tabla = 'entidad_soat';
                break;
            case 'genero':
                $campos[] = array('gen_genero' => $contenido);
                $tabla = 'genero';
                break;
            case 'grupo':
                $campos[] = array('gruTra_nombre' => $contenido);
                $tabla = 'grupo_trabajo';
                break;
            case 'tipoempresa':
                $campos[] = array('tipEmp_nombre' => $contenido);
                $tabla = 'tipo_empresa';
                break;
            case 'actividadeconomica':
                $campos[] = array('actEco_Detalle' => $contenido);
                $tabla = 'actividad_economica';
                break;
            case 'cargo':
                $campos[] = array('car_nombre' => $contenido);
                $tabla = 'cargo';
                break;
            case 'ciudad':
                $campos[] = array('ciu_nombre' => $contenido);
                $tabla = 'ciudad';
                break;
            case 'tipocontrato':
                $campos[] = array('tipCon_nombre' => $contenido);
                $tabla = 'tipo_contrato';
                break;
            case 'frecuenciadesplazamiento':
                $campos[] = array('freDes_nombre' => $contenido);
                $tabla = 'frecuencia_desplazamiento';
                break;
            case 'tipodesplazamiento':
                $campos[] = array('tipDes_nombre' => $contenido);
                $tabla = 'tipo_desplazamiento';
                break;
            case 'tipotransporte':
                $campos[] = array('tipTra_nombre' => $contenido);
                $tabla = 'tipo_transporte';
                break;
            case 'tipovehiculo':
                $campos[] = array('tipVeh_nombre' => $contenido);
                $tabla = 'tipo_vehiculo';
                break;
            case 'categoria':
                $campos[] = array('cat_nombre' => $contenido);
                $tabla = 'categoria';
                break;
            case 'restricciones':
                $campos[] = array('res_nombre' => $contenido);
                $tabla = 'restricciones';
                break;
            case 'estadoconductor':
                $campos[] = array('estCon_nombre' => $contenido);
                $tabla = 'estado_conductor';
                break;
            case 'factoresriesgo':
                $campos[] = array('facRie_nombre' => $contenido);
                $tabla = 'factores_riesgo';
                break;
            case 'causas':
                $campos[] = array('cau_nombre' => $contenido);
                $tabla = 'causas';
                break;
            case 'tiposervicio':
                $campos[] = array('tipSer_nombre' => $contenido);
                $tabla = 'tipo_servicio';
                break;
            default:
                break;
        }

        $this->administracion_model->guardaradministracion($campos, $tabla);
    }

    function usuarios() {

        $this->data['usuarios'] = $this->administracion_model->usuarios();

        $this->layout->view('administracion/usuarios', $this->data);
    }

    function eliminarusuario() {

        $idusuario = $this->input->post('usuario');
        $this->data['usuarios'] = $this->administracion_model->eliminarusuario($idusuario);
    }

    function eliminarvehiculo() {

        $vehiculo = $this->input->post('vehiculo');
        $this->data['usuarios'] = $this->administracion_model->eliminarvehiculo($vehiculo);
    }

    function cambioestado() {

        $idusuario = $this->input->post('usuario');
        $numero = $this->input->post('numero');
        $this->data['usuarios'] = $this->administracion_model->cambioestado($idusuario, $numero);
    }

    function cambioestadovehiculo() {

        $idusuario = $this->input->post('usuario');
        $numero = $this->input->post('numero');
        $this->data['usuarios'] = $this->administracion_model->cambioestadovehiculo($idusuario, $numero);
    }

    function reportevehiculo() {

        $this->data['vehiculos'] = $this->administracion_model->reportevehiculos();
        $this->layout->view('administracion/reportevehiculo', $this->data);
    }

    function administracion() {
        $this->data['inicio'] = $this->administracion_model->admin_inicio();
        $this->layout->view('administracion/inicio', $this->data);
    }

    function administracion_emp() {
        $id = $this->data['user']['emp_id'];
        $this->data['inicio'] = $this->administracion_model->admin_inicio_emp($id);
        $this->layout->view('administracion/inicio_emp', $this->data);
    }

    function guardar_admin_inicio() {
        $post = $this->input->post();
        $this->administracion_model->guardar_admin_inicio($post);
    }

    function guardar_admin_inicio_emp() {
        $post = $this->input->post();
        $id = $this->data['user']['emp_id'];
        $this->administracion_model->guardar_admin_inicio_emp($post, $id);
    }

    function pesv() {
        $id = $this->data['user']['emp_id'];
        $this->data['empresa'] = $this->administracion_model->empresa($id);
        $this->data['introduccion'] = $this->administracion_model->visualizacionintroduccion($id);
        $this->data['general'] = $this->administracion_model->visualizacionobjgen($id);
        $this->data['especificos'] = $this->administracion_model->solovisualizacionobjesp($id);
        $this->data['textomiembro'] = $this->administracion_model->textomiembro($id);
        $this->data['consultatextocomite'] = $this->administracion_model->consultatextocomite($id);
        $this->data['diagnostico'] = $this->administracion_model->consultadiagnostico($id);
        $this->data['comportamiento'] = $this->administracion_model->comportamiento();
        $this->data['riesgo'] = $this->administracion_model->riesgo();

//        echo "<pre>";
//        var_dump($this->data['textomiembro']);die;
       $this->data['comunicacion'] = $this->administracion_model->comunicacion($id);  
        $this->data['miembros'] = $this->administracion_model->visualizacionmiembros($id);
        $this->data['responsables'] = $this->administracion_model->visualizacionresponsables($id);
        $this->data['comites'] = $this->administracion_model->visualizacioncomite($id);
        $this->data['politicas'] = $this->administracion_model->verificapolitica($id);
        $this->data['prioridades'] = $this->administracion_model->verificaprioridad($id);
        $this->data['estadistica'] = $this->administracion_model->estadisticas($id);
        $this->data['itiniere'] = $this->administracion_model->itiniere($id);
        $this->data['tipotransporte'] = $this->administracion_model->tipotransporte($id);
        $this->data['tipoobjetivo'] = $this->administracion_model->tipoobjetivo();

        


        $this->layout->view('administracion/pesv', $this->data);
    }

    function pesv_pdf() {
        set_time_limit(0);
        $id = $this->data['user']['emp_id'];
//        $this->data['empresa'] = $this->administracion_model->empresa($id);
        $this->data['empresa'] = $this->administracion_model->info_empresa($id);
        $this->data['introduccion'] = $this->administracion_model->visualizacionintroduccion($id);
        $this->data['general'] = $this->administracion_model->visualizacionobjgen($id);
        $this->data['especificos'] = $this->administracion_model->visualizacionobjesp($id);
        $this->data['miembros'] = $this->administracion_model->visualizacionmiembros($id);
        $this->data['responsables'] = $this->administracion_model->visualizacionresponsables($id);
        $this->data['comites'] = $this->administracion_model->visualizacioncomite($id);
        $this->data['politicas'] = $this->administracion_model->verificapolitica($id);
        $this->data['prioridades'] = $this->administracion_model->verificaprioridad($id);
        
//        var_dump($this->data['prioridades']);die;
        
        $this->data['estadistica'] = $this->administracion_model->estadisticas($id);
        $this->data['textomiembro'] = $this->administracion_model->textomiembro($id);
        $this->data['itiniere'] = $this->administracion_model->itiniere($id);
        $this->data['tipotransporte'] = $this->administracion_model->tipotransporte($id);
        $this->data['consultatextocomite'] = $this->administracion_model->consultatextocomite($id);
        $this->data['diagnostico'] = $this->administracion_model->consultadiagnostico($id);
        $this->data['especificoslineaaccion'] = $this->administracion_model->visualizacionobjesplineaaccion($id);
        $this->data['allcronograma'] = $this->administracion_model->cronograma($id);
        $this->data['comunicacion'] = $this->administracion_model->comunicacion($id);
        
        $j = array();
        foreach($this->data['allcronograma'] as $cro){
            $j[$cro['cro_semestre']][$cro['cro_eje']][] = $cro['cro_cronograma'];
        }
        $i = array();
        foreach ($this->data['especificoslineaaccion'] as $key => $val) {
            $i[$val['tipObj_nombre']][] = $val['objEsp_objetivo'];
        }
        
        $this->data['cronograma'] = $j;
        $this->data['lineaaccion'] = $i;

        
        $html= $this->load->view('administracion/pesv_pdf', $this->data, true);
//        echo $html;

        if (!empty($this->data['empresa'][0]->userfile)) {
            $logo = "../../uploads/" . $this->data['empresa'][0]->userfile;
            $nombre = $this->data['empresa'][0]->emp_razonSocial;
        } else{
            $logo = "";
            $nombre="";
        }
                
        $html=str_replace("style=", 's=', $html);
        $html=str_replace("width=", 'w=', $html);
//        echo $html;die();
        pdf($html, $logo,$nombre);
    }

    function eliminar() {

        $id = $this->input->post('id');
        $dato = $this->input->post('dato');
        $ideliminar = $this->input->post('doc');

        $idempresa = $this->data['user']['emp_id'];

        switch ($dato) {
            case 'especifico':
                $tabla = "objetivos_especificos";
                $campo = 'objEsp_id';


                break;
            case 'general':
                $tabla = "objetivos_generales";
                $campo = 'objGen_id';


                break;
            case 'compromiso':
                $tabla = "miembros";
                $campo = 'mie_id';


                break;
            case 'responsable':
                $tabla = "responsables";
                $campo = 'res_id';


                break;
            case 'comite':
                $tabla = "comite";
                $campo = 'com_id';


                break;
            case 'prioridad':
                $tabla = "prioridades";
                $campo = 'pri_id';


                break;

            default:
                break;
        }
        $this->administracion_model->eliminarpesv($tabla, $campo, $id, $idempresa);
    }

    function guardarcronograma(){
        
        $cronograma = $this->input->post('cronograma');
        $semestre = $this->input->post('semestre');
        $eje = $this->input->post('eje');
        $id = $this->data['user']['emp_id'];
        
        $existencia = $this->administracion_model->consultacronograma($id, $semestre,$eje);
        
        if(!empty($existencia)){
            $this->administracion_model->actualizacronograma($id, $semestre,$eje,$cronograma);
        }else{
            $this->administracion_model->insertacronograma($id, $semestre,$eje,$cronograma);    
        }
    } 
    function eliminarprioridad(){
        
        $id = $this->input->post('id');
        $this->administracion_model->eliminarprioridad($id);  
    }
    
    function guardarcomunicacion(){
        
        $comunicaciontexto = $this->input->post('comunicacion');
        
        $id = $this->data['user']['emp_id'];
        
        $comunicacion = $this->administracion_model->comunicacion($id);
        
        if(!empty($comunicacion)){
            $this->administracion_model->actualizacomunicacion($id,$comunicaciontexto);
        }else{
            $this->administracion_model->insertacomunicacion($id,$comunicaciontexto);
        }
        
    }
    
    function cargarcronograma(){
        
        $semestre = $this->input->post('semestre');
        $eje = $this->input->post('eje');
        $id = $this->data['user']['emp_id'];
        
        $cronograma = $this->administracion_model->consultacronograma($id, $semestre,$eje);
        if(!empty($cronograma)){
        $this->output->set_content_type('application/json')->set_output(json_encode($cronograma[0]));
        }
    }
            
    function guardardiagnostico() {

        $texto = $this->input->post('diagnostico');
        $id = $this->data['user']['emp_id'];



        $diagnostico = $this->administracion_model->consultadiagnostico($id);
        if (!empty($diagnostico)) {
            $this->administracion_model->actualizardiagnostico($texto, $id);
        } else {
            $this->administracion_model->insertardiagnostico($texto, $id);
        }
    }

    function guardarintroduccion() {

        $introduccion = $this->input->post('introduccion');
        $id = $this->data['user']['emp_id'];

//        echo "<pre>";
//        var_dump($this->data['user']);die;

        $consultaintroudccion = $this->administracion_model->consultaingtroduccion($id);

        if (empty($consultaintroudccion))
            $this->administracion_model->guardarintroduccion($introduccion, $id);
        else
            $this->administracion_model->actualizaintroduccion($introduccion, $id);
    }

    function guardarobjetivos() {

        $general = $this->input->post('objetivos');
        $especifico = $this->input->post('objetivosespecificos');
        $id = $this->data['user']['emp_id'];
        $tipoobjetivo = $this->input->post('tipoobjetivo');
        $data = array();
        if (!empty($general)) {
            $data = array();
            for ($i = 0; $i < count($general); $i++) {

                $data[] = array(
                    'objGen_objetivo' => utf8_decode($general[$i]),
                    'emp_id' => $id
                );
            }
            $tabla = 'objetivos_generales';
            $campo = 'objGen_objetivo';
            $this->administracion_model->eliminabjetivos($id, $tabla, $campo);
            $this->administracion_model->guardarobjetivos($data, $tabla);
        }
        $data = array();
        if (!empty($especifico)) {
            for ($i = 0; $i < count($especifico); $i++) {

                $data[] = array(
                    'tipObj_id' => $tipoobjetivo[$i],
                    'objEsp_objetivo' => utf8_decode($especifico[$i]),
                    'emp_id' => $id
                );
            }
//            echo "<pre>";
//            var_dump($data);die;
            $tabla = 'objetivos_especificos';
            $campo = 'objEsp_objetivo';
            $this->administracion_model->eliminabjetivos($id, $tabla, $campo);
            $this->administracion_model->guardarobjetivos($data, $tabla);
        }
    }

    function guardarmiembros() {

        $cargo = $this->input->post('cargo');
        $nombre = $this->input->post('nombre');
        $id = $this->data['user']['emp_id'];
        $texto = $this->input->post('textomiembro');
//        echo $id."*****";die;

        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[] = array(
                'mie_cargo' => $cargo[$i],
                'mie_nombre' => $nombre[$i],
                'emp_id' => $id
            );
        }

        $this->administracion_model->guardartextomiembro($texto, $id);
        $this->administracion_model->eliminarmiembros($id);
        $this->administracion_model->miembros($data);
    }

    function guardarprioridades() {
        
        $comportamiento = $this->input->post('comportamiento');
        $riesgoprincipal = $this->input->post('riesgoprincipal');
        $conductor = $this->input->post('conductor');
        $descripcion = $this->input->post('descripcion');
        $estrategia = $this->input->post('estrategia');
        $pasajero = $this->input->post('pasajero');
        $peaton = $this->input->post('peaton');
        $responsable = $this->input->post('responsable');
        $tiporiesgo = $this->input->post('tiporiesgo');
        $id = $this->data['user']['emp_id'];
        $contador = count($comportamiento);
        $data = array();
        
        
        $this->administracion_model->eliminarprioridades($id);
        for($i = 0; $i < $contador;$i++){
            $data[] = array(
                'pri_riesgo'=>$riesgoprincipal[$i],
                'pri_estrategia'=>$estrategia[$i],
                'pri_responsable'=>$responsable[$i],
                'pri_pasajero'=>$pasajero[$i],
                'pri_conductor'=>$conductor[$i],
                'pri_peaton'=>$peaton[$i],
                'pri_descripcion'=>$descripcion[$i],
                'tipRie_id'=>$tiporiesgo[$i],
                'pri_comportamiento'=>$comportamiento[$i],
                'emp_id'=>$id
            );
        }
        
        
        
        $this->administracion_model->insertaprioridades($data);
    }

    function guardarresponsables() {

        $cargo = $this->input->post('cargo');
        $nombre = $this->input->post('nombre');
        $id = $this->data['user']['emp_id'];
        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[] = array(
                'res_cargo' => $cargo[$i],
                'res_nombre' => $nombre[$i],
                'emp_id' => $id
            );
        }
        $this->administracion_model->eliminarresponsables($id);
        $this->administracion_model->guardarresponsables($data);
    }

    function guardarcomite() {

        $cargo = $this->input->post('cargo');
        $nombre = $this->input->post('nombre');
        $texto = $this->input->post('textocom');
        $id = $this->data['user']['emp_id'];
        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[] = array(
                'com_cargo' => $cargo[$i],
                'com_nombre' => $nombre[$i],
                'emp_id' => $id
            );
        }
        $consulta = $this->administracion_model->consultatextocomite($id);
        if (!empty($consulta)) {
            $this->administracion_model->guardartextocomite($texto, $id);
        } else {
            $this->administracion_model->insertartextocomite($texto, $id);
        }
        $this->administracion_model->eliminarcomite($id);
        $this->administracion_model->guardarcomite($data);
    }

    function guardapolitica() {

        $politica = $this->input->post('politica');
        $empresa = $this->data['user']['emp_id'];


        $verificacion = $this->administracion_model->verificapolitica($empresa);
        if (empty($verificacion))
            $this->administracion_model->guardapolitica($politica, $empresa);
        else
            $this->administracion_model->actualizarpolitica($politica, $empresa);
    }

    function do_upload($id = NULL) {
        set_time_limit(0);
        if ($id == NULL) {
            $this->data['id'] = $id = $this->data['user']['emp_id'];
        } else {
            $this->data['id'] = $id = deencrypt_id($id);
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
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
            $this->administracion_model->guardar_emp($this->data['userfile'], $this->data['id']);
        }
        redirect('index.php/administracion/pesv', 'location');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */