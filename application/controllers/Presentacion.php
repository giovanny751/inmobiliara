<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presentacion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingreso_model');
        $this->load->model('Roles_model');
        $this->load->helper('miscellaneous');
        $this->load->helper('security');
        validate_login($this->session->userdata('user_id'));
    }

    function principal() {
        $id = $this->data['user']['emp_id'];
        $this->data['inicio']= $this->Ingreso_model->admin_inicio();
        $this->data['inicio2']= $this->Ingreso_model->admin_inicio_emp($id);
        $this->data['content'] = $this->modulos('prueba', null, $this->data['user']['user_id']);
        $this->layout->view('presentacion/principal', $this->data);
    }
    function modulos($datosmodulos, $html = null, $usuarioid) {
        $tipo = 2;
        $menu = $this->Ingreso_model->menu($datosmodulos, $usuarioid, $tipo);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);
        if ($datosmodulos == 'prueba')
            $html .="<ul class='nav navbar-nav'>";
        else
            $html .="<ul class='dropdown-menu'>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        $html .= "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "' >" . strtoupper($nombrepapa) . "</a>";
                        if (!empty($submenus[0]))
                            $html .=$this->modulos($submenus[0], null, $usuarioid);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function principal_menu() {
        return $menu = $this->load->view('presentacion/modulos');
    }

    function administracionmenu() {

        $this->load->view('presentacion/menu', $this->data);
    }

    function consultadatosmenu() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $datos = $this->Ingreso_model->consultamenu($idgeneral);

            $this->output->set_content_type('application/json')->set_output(json_encode($datos[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    public function creacionmenu() {

        $this->data['hijo'] = $this->input->post('menu');
        $this->data['nombrepadre'] = $this->input->post('nombrepadre');
        $this->data['idgeneral'] = $this->input->post('idgeneral');

//            echo $this->data['idgeneral'];

        if (empty($this->data['idgeneral']))
            $this->data['hijo'] = 0;

        $this->data['menu'] = $this->Ingreso_model->consultahijos($this->data['idgeneral']);

//            var_dump($this->data['menu'] );

        if (!empty($this->data['idgeneral'])) {

            $this->data['menu'] = $this->Ingreso_model->hijos($this->data['idgeneral']);
        }

//            $this->data['content'] = 'presentacion/menu';
        $this->layout->view('presentacion/menu', $this->data);
    }

    function guardarmodulo() {


        if (!empty($this->data['user'])) {
            $modulo = $this->input->post('modulo');
            $padre = $this->input->post('padre');
            $general = $this->input->post('general');
            $actualizamodulo = $this->Ingreso_model->actualizahijos($general);

            $guardamodulo = $this->Ingreso_model->guardarmodulo($modulo, $padre, $general);
            $menu = $this->Ingreso_model->cargamenu($general);


            $this->output->set_content_type('application/json')->set_output(json_encode($menu));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardaatribustosmodulo() {

        $idgeneral = $this->input->post('idgeneral');

        if (!empty($idgeneral)) {

            $controlador = $this->input->post('controlador');
            $accion = $this->input->post('accion');
            $estado = $this->input->post('estado');
            $nombre = $this->input->post('nombre');

            $this->Ingreso_model->guardaatributos($idgeneral, $controlador, $accion, $estado, $nombre);
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function usuario() {

        $this->data['roles'] = $this->Roles_model->roles();
        $this->data['usaurios'] = $this->Ingreso_model->totalusuarios();
//        $this->data['content'] = 'presentacion/usuario';
        $this->layout->view('presentacion/usuario', $this->data);
//        $this->load->view('presentacion/usuario', $this->data);
    }

    function permisosporrol() {

        $idrol = $this->input->post('idrol');
        $idusuario = $this->input->post('idusuario');
        $permisos = $this->permisorolporusuario('prueba', $idrol, $idusuario);

        echo $permisos;
    }

    function permisorolporusuario($datosmodulos = 'prueba', $idrol, $idusuario, $html = "") {

        $menu = $this->Ingreso_model->permisousuarioroles($datosmodulos, $idrol, $idusuario);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);

        $html .="<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        $html .= "<li>" . strtoupper($nombrepapa) . "<input type='checkbox' class='seleccionados' name='permisorol[]' value='" . $padre . "'>";
                        if (!empty($submenus[0])) {
//                            echo $submenus[0]."****";die;
                            $html .=$this->permisorolporusuario($submenus[0], $idrol, $idusuario);
                        }
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function consultausuario() {

        $id = $this->input->post('id');
        if (!empty($id)) {
            $usuario = $this->Ingreso_model->consultausuario($id);
            $this->output->set_content_type('application/json')->set_output(json_encode($usuario[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardarusuario() {

        $usuario = $this->input->post('usuario');
        $email = $this->input->post('email');
        $contrasena = $this->input->post('contrasena');

        $enviodatos = $this->Ingreso_model->guardarusuario($usuario, $email, $contrasena);
    }

    function eliminarmodulo() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $eliminar = $this->Ingreso_model->eliminar($idgeneral);
        } else {
            
        }
    }

    function permisosusuarios() {

        $this->data['usuarios'] = $this->Ingreso_model->usuarios();

        $this->layout->view('presentacion/permisosusuarios', $this->data);
    }

    function permisosmenu($iduser, $datosmodulos = 'prueba', $dato = null) {

//        echo $iduser;die;

        $this->load->model("Ingreso_model");

        $menu = $this->Ingreso_model->menu($iduser, $datosmodulos, 1);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']][$modulo['modulo_menuid']] [] = $modulo['menu_idhijo'];

        if ($datosmodulos == 'prueba')
            echo "<ul class='principal'>";
        else
            echo "<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $permiosos => $menuprincipal)
                        foreach ($menuprincipal as $submenus):
                            if (!empty($permiosos))
                                echo "<li><a href=''>" . strtoupper($nombrepapa) . "</a><input type='checkbox' checked='checked' value='" . $padre . "' name='" . $padre . "' papa='" . $padre . "'>";
                            else
                                echo "<li><a href=''>" . strtoupper($nombrepapa) . "</a><input type='checkbox'  value='" . $padre . "' name='" . $padre . "' papa='" . $padre . "'>";
                            if (!empty($submenus))
                                $this->permisosmenu($iduser, $submenus);
                            echo "</li>";
                        endforeach;
        echo "</ul>";
    }

    function retornamenutotal() {

        $usuario = $this->input->post('usuario');
        $menu = $this->permisosmenu($usuario);

        return $menu;
    }

    function savepermissionsuser() {

        $this->data['user'] = $this->input->post('usuario');

        $eliminarpermisos = $this->Ingreso_model->eliminarpermisos($this->data['user']);

        $usuario = $this->input->post();
//        echo "<pre>";
//        var_dump($usuario);
        $datos = array();
        foreach ($usuario as $papa => $modulos) {

//            echo $papa."****".$modulos;
//            if($modulos != '$modulos')
            $datos[] = array('user_id' => $this->data['user'], 'modulo_menuid' => $modulos);
        }

        $guardarpermisos = $this->Ingreso_model->permisosmodulo($datos);
    }

    function permisoroles($datosmodulos, $html = null) {

        $menu = $this->Ingreso_model->permisoroles($datosmodulos);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);

        $html .="<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        $html .= "<li><div>" . strtoupper($nombrepapa) . "</div><div align='right'><input type='checkbox' class='seleccionados' name='permisorol[]' value='" . $padre . "'></div>";
                        if (!empty($submenus[0]))
                            $html .=$this->permisoroles($submenus[0]);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function roles() {

        $this->data['content'] = $this->permisoroles('prueba', null);

        $this->data['roles'] = $this->Roles_model->roles();

//        var_dump($this->data['roles']);die;

        $this->layout->view('presentacion/roles', $this->data);
    }

    function guardarroles() {

        $nombre = $this->input->post('nombre');

        if (!empty($nombre)) {

            $permisorol = $this->input->post('permisorol');
            $id = $this->Roles_model->guardarrol($nombre);
            $insert = array();
            for ($i = 0; $i < count($permisorol); $i++) {
                $insert[] = array('rol_id' => $id, 'menu_id' => $permisorol[$i]);
            }
            $this->Roles_model->insertapermisos($insert);
            $roles = $this->Roles_model->roles();
            $this->output->set_content_type('application/json')->set_output(json_encode($roles));
        }else{
            $id = $this->input->post('rol');
            $this->Roles_model->eliminpermisosrol($id);
            
        }
        
        $permisorol = $this->input->post('permisorol');
        $insert = array();
        for ($i = 0; $i < count($permisorol); $i++) {
            $insert[] = array('rol_id' => $id, 'menu_id' => $permisorol[$i]);
        }
        $this->Roles_model->insertapermisos($insert);
    }

    function eliminarrol() {

        $id = $this->input->post('id');


        $this->Roles_model->eliminarrol($id);
        $this->Roles_model->eliminpermisosrol($id);
    }

    function guardaratributosmenu() {

        $nombre = $this->input->post('nombre');
        $controlador = $this->input->post('controlador');
        $accion = $this->input->post('accion');
        $estado = $this->input->post('estado');
        $id = $this->input->post('id');

        $this->Ingreso_model->guardaratributosmenu($nombre, $controlador, $accion, $estado, $id);
    }

    function administracionareas() {

        $this->data['cargos'] = $this->Ingreso_model->areas();
        $this->data['pais'] = $this->Ingreso_model->paises();

        $this->layout->view('presentacion/administracionareas', $this->data);
    }

    function guardararea() {

        $area = $this->input->post('area');

        $this->Ingreso_model->guardararea($area);

        $areas = $this->Ingreso_model->areas();
        $this->output->set_content_type('application/json')->set_output(json_encode($areas));
    }

    function guardarcargo() {

        $area = $this->input->post('area');
        $cargo = $this->input->post('cargo');

        $this->Ingreso_model->guardarcargo($area, $cargo);
    }

    function permisousuarios($datosmodulos, $html = null, $idusuario) {

        $tipo = 1;
        $menu = $this->Ingreso_model->menu($datosmodulos, $idusuario, $tipo);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion'], $modulo['menudos']);
        if ($datosmodulos == 'prueba')
            $html .="<ul>";
        else
            $html .="<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        if ($submenus[3] == $padre) {
                            $checked = 'checked';
                        } else {
                            $checked = '';
                        }
                        $html .= "<li> <div>" . strtoupper($nombrepapa) . "</div><div align='center'><input type='checkbox' " . $checked . " name='permisousuario[]' value='" . $padre . "'></div>";
                        if (!empty($submenus[0]))
                            $html .=$this->permisousuarios($submenus[0], null, $idusuario);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function permisos() {
        $idusuario = $this->input->post('id');
        echo $this->permisousuarios('prueba', null, $idusuario);
    }

    function guardarpermisos() {
        $rol = $this->input->post('roluser');
        $usuario = $this->input->post('usuarioid');
        $this->Ingreso_model->eliminapermisosusuario($rol,$usuario);
        $permisorol = $this->input->post('permisorol');
        $permiso = array();
        for ($i = 0; $i < count($permisorol); $i++) {
            $permiso[] = array('usu_id' => $usuario, 'menu_id' => $permisorol[$i], 'rol_id' => $rol);
        }
        $this->Ingreso_model->permisosusuariomenu($permiso);
    }

    function guardarpais() {

        $pais = $this->input->post('pais');
        $this->Ingreso_model->guardarpais($pais);


        $pais = $this->Ingreso_model->paises();
        $this->output->set_content_type('application/json')->set_output(json_encode($pais));
    }

    function guardarciudad() {

        $pais = $this->input->post('pais');
        $ciudad = $this->input->post('ciudad');

        $insertar[] = array('pai_id' => $pais, 'ciu_nombre' => $ciudad);

        $this->Ingreso_model->guardarciudad($insertar);
    }

    function guardartipoproducto() {

        $tipoproducto = $this->input->post('tipoproducto');
        $this->Ingreso_model->guardartipoproducto($tipoproducto);

        //$pais = $this->Ingreso_model->paises();
        //$this->output->set_content_type('application/json')->set_output(json_encode($pais));
    }

    function rolesasignados() {

        $id = $this->input->post('id');
        $roles = $this->Ingreso_model->rolesasignados($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($roles));
    }
    function recordarcontrasena(){
        
        $this->layout->view('presentacion/recordarcontrasena');
        
    }
    function guardarcontrasena(){
        
        $contrasena = $this->input->post('password');
        $user_id = $this->data['user']['user_id'];
        $this->Ingreso_model->guardarcontrasena($contrasena,$user_id);
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */