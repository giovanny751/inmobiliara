<?php

class Empresa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //datos de empresa
    function guardaactualizacionempresa($data) {
        $this->db->update('empresa', $data);
    }

    function datosempresa($id) {

        $this->db->where('ingreso.ing_id', $id);
        $this->db->join('empresa', 'empresa.ing_id = ingreso.ing_id', 'left');
        $datos = $this->db->get('ingreso');
        return $datos->result();
    }

    function update_imagen_general($post, $id_user) {
        $this->db->set('id_emp', $id_user);
        $this->db->set('img_nombre', $post['nombre']);
        $this->db->set('img_descripcion_corta', $post['desc_corta']);
        $this->db->set('img_descripcion_larga', $post['desc_larga']);
        $this->db->set('img_user_modificacion', $id_user);
        $this->db->where('img_id', $post['imagen']);
        $this->db->update('imagenes');
    }

    function guarda_imagen_general($post, $id_user) {
        $this->db->set('id_emp', $id_user);
        $this->db->set('img_nombre', $post['nombre']);
        $this->db->set('img_descripcion_corta', $post['desc_corta']);
        $this->db->set('img_descripcion_larga', $post['desc_larga']);
        $this->db->set('img_fecha_crear', date('Y-m-d H:i:s'));
        $this->db->set('img_user_id', $id_user);
        $this->db->insert('imagenes');
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    function insert_imagen_secundatia($nombre,$id){
        $this->db->set('imgSec_img_id',$id);
        $this->db->set('imgSec_nombre',$nombre);
        $this->db->insert('imgenes_secundarias');
    }

}
