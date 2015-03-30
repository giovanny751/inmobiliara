<?php

class Ingreso_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function menu($padre = null, $idusuario, $tipo) {

//        echo $padre."****";die;
//        echo $padre."*****"."<br>";
//        $idusuario = $idusuario->id;
        
//        $idusuario = 1;

        if ($padre != "prueba") {
            $this->db->where('menu_idpadre', $padre);
        } else {
            $this->db->where('menu_idpadre', 0);
        };

        $this->db->where('menu_estado', 1);
        $this->db->select('modulo.menu_id,modulo.menu_idpadre,modulo.menu_nombrepadre,modulo.menu_idhijo,'
                . 'modulo.menu_controlador,modulo.menu_accion,modulo.menu_estado,permisos.menu_id menudos');
        if ($tipo == 1) {
            $this->db->join("permisos", "permisos.menu_id = modulo.menu_id and permisos.usu_id=$idusuario", "left");
        }
        if ($tipo == 2) {
            $this->db->join("permisos", "permisos.menu_id = modulo.menu_id and permisos.usu_id=$idusuario");
            $this->db->join('permisos_rol','permisos_rol.rol_id = permisos.rol_id and permisos_rol.menu_id = modulo.menu_id');
//            $this->db->join("permisos", "permisos.menu_id = modulo.menu_id and permisos.usu_id=$idusuario",'left');
        }
        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

//        echo $this->db->last_query();die;

        return $envio;
    }
    function permisousuarioroles($padre,$idrol, $idusuario) {

        if ($padre != "prueba") {
            $this->db->where('modulo.menu_idpadre', $padre);
        } else {
            $this->db->where('modulo.menu_idpadre', 0);
        };

        $this->db->where('rol_id', $idrol);
        $this->db->where('menu_estado', 1);
        $this->db->select('modulo.menu_id,modulo.menu_idpadre,modulo.menu_nombrepadre,modulo.menu_idhijo,'
                . 'modulo.menu_controlador,modulo.menu_accion,modulo.menu_estado,permisos_rol.menu_id menudos');

        $this->db->join("permisos_rol", "permisos_rol.menu_id = modulo.menu_id");
        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

//        echo $this->db->last_query();die;

        return $envio;
    }

    function permisoroles($padre = null) {

//        echo $padre."****";die;
//        echo $padre."*****"."<br>";
//        $idusuario = $idusuario->id;
        
        $idusuario = 1;

        if ($padre != "prueba") {
            $this->db->where('menu_idpadre', $padre);
        } else {
            $this->db->where('menu_idpadre', 0);
        };

        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

//        echo $this->db->last_query();die;

        return $envio;
    }

    function consultamenu($idgeneral) {

        $this->db->where('menu_id', $idgeneral);
        $datos = $this->db->get('modulo');

        return $datos->result_array();
    }

    function cargamenu($padre) {
        if (empty($padre)) {
            $this->db->where('menu_idpadre', '0');
        } else {
            $this->db->where('menu_idpadre', $padre);
        }
        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

        return $envio;
    }

    function consultahijos($idgeneral = 0) {

//        $this->db->select('menu_id,menu_idpadre');
        if (!empty($idgeneral))
            $this->db->where('menu_idpadre', $idgeneral);
        else
            $this->db->where('menu_idpadre', '0');
        $dato = $this->db->get('modulo');

//        echo 1;die;
//        var_dump($dato->result_array());die;

        return $dato->result_array();
    }

    function hijos($hijo) {

        $this->db->where('menu_idpadre', $hijo);
        $dato = $this->db->get('modulo');
        $envio = $dato->result_array();

//        echo $this->db->last_query();
        return $envio;
    }

    function guardarmodulo($modulo, $padre = null, $general) {


        $data = array('menu_nombrepadre' => $modulo,
            'menu_idpadre' => $general
        );

        $this->db->insert('modulo', $data);

        return $this->db->insert_id();
    }

    function actualizahijos($padre) {

        $data = array('menu_idhijo' => $padre);

        $this->db->where('menu_id', $padre);
        $this->db->update('modulo', $data);
    }

    function guardarusuario($usuario, $email, $contrasena, $celular) {

        $data = array('username' => $usuario,
            'password' => sha1($contrasena),
            'email' => $email,
            'phone' => $celular,
            'active' => 1
        );
        $this->db->insert('users', $data);
    }

    function eliminar($eliminar) {

        $this->db->where('menu_id', $eliminar);
        $this->db->delete('modulo');
    }

    function usuarios() {

        $usuarios = $this->db->get('user');
        return $usuarios->result_array();
    }

    function menutotal() {
        $dato = $this->db->get('modulo');
//        echo $this->db->last_query();
        $envio = $dato->result_array();
        return $envio;
    }

    function permisosmodulo($datos) {


        $this->db->insert_batch('usermodule', $datos);
    }

    function eliminarpermisos($user) {

        $this->db->where('user_id', $user);
        $this->db->delete('usermodule');
    }

    function guardaatributos($idgeneral, $controlador, $accion, $estado, $nombre) {

        if (!empty($controlador))
            $this->db->set('menu_controlador', $controlador);
        if (!empty($accion))
            $this->db->set('menu_accion', $accion);
        if (!empty($estado))
            $this->db->set('menu_estado', $estado);
        if (!empty($nombre))
            $this->db->set('menu_nombrepadre', $nombre);
        $this->db->where('menu_id', $idgeneral);
        $this->db->update('modulo');
    }

    function totalusuarios() {

//        $this->db->where();
        $usuarios = $this->db->get('user');
        return $usuarios->result_array();
    }

    function consultausuario($id) {

        $this->db->where('usu_id', $id);
        $usuarios = $this->db->get('user');
        return $usuarios->result_array();
    }

    function guardaratributosmenu($nombre, $controlador, $accion, $estado, $id) {

        $this->db->set('menu_nombrepadre', $nombre);
        $this->db->set('menu_controlador', $controlador);
        $this->db->set('menu_accion', $accion);
        $this->db->set('menu_estado', $estado);
        $this->db->where('menu_id', $id);
        $this->db->update('modulo');
    }

    function areas() {


        $cargos = $this->db->get('areas');
        return $cargos->result_array();
    }

    function guardararea($area) {

        $this->db->set('are_area', $area);
        $this->db->insert('areas');
    }

    function guardarcargo($area, $cargo) {

        $this->db->set('are_id', $area);
        $this->db->set('car_nombre', $area);
        $this->db->insert('cargos');
    }

    function eliminarpermisosmenu($usuarioid) {
        $this->db->where('usu_id', $usuarioid);
        $this->db->delete('permisos');
    }

    function permisosusuariomenu($permiso) {
        $this->db->insert_batch('permisos', $permiso);
    }
    function rolesasignados($id){
        $this->db->select('permisos_rol.menu_id');
        $this->db->where('rol_id',$id);
        $rol = $this->db->get('permisos_rol');
        return $rol->result_array();
    }
    function eliminapermisosusuario($rol,$usuario){
        
        $this->db->where('rol_id',$rol);
        $this->db->where('usu_id',$usuario);
        $this->db->delete('permisos');
        
    }
    function guardarcontrasena($contrasena,$id){
        
        $this->db->where('usu_id',$id);
        $this->db->set('usu_password',$contrasena);
        $this->db->update('user');
        
    }
    function admin_inicio(){
        $dato = $this->db->get('inicio');
        return $dato->result();
    }
    function admin_inicio_emp($id) {
        $this->db->set('emp_inicio,emp_id');
        $this->db->where('emp_id',$id);
        $dato = $this->db->get('empresa');
        return $dato->result();
    }
}
