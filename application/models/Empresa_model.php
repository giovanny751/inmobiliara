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

        $this->db->where('empresa.emp_id', $id);
        $this->db->join('empresa', 'empresa.ing_id = ingreso.ing_id', 'left');
        $datos = $this->db->get('ingreso');
        return $datos->result();
    }

    function update_imagen_general($post, $id_user) {
        $this->db->set('id_emp', $id_user);
        $this->db->set('imgEnc_nombre', $post['nombre']);
        $this->db->set('imgEnc_descripcion_corta', $post['desc_corta']);
        $this->db->set('imgEnc_descripcion_larga', $post['desc_larga']);
        $this->db->set('imgEnc_user_id', $id_user);
        $this->db->where('imgEnc_id', $post['imagen']);
        $this->db->update('imagenes_encabezado');
    }

    function guarda_imagen_general($post, $id_user) {
        $this->db->set('id_emp', $id_user);
        $this->db->set('imgEnc_nombre', $post['nombre']);
        $this->db->set('imgEnc_descripcion_corta', $post['desc_corta']);
        $this->db->set('imgEnc_descripcion_larga', $post['desc_larga']);
        $this->db->set('imgEnc_fecha_crear', date('Y-m-d H:i:s'));
        $this->db->set('imgEnc_user_id', $id_user);
        $this->db->insert('imagenes_encabezado');
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    function insert_imagen_secundatia($nombre,$id){
        $this->db->set('imgEnc_id',$id);
        $this->db->set('imgDet_nombre',$nombre);
        $this->db->insert('imagenes_detalle');
    }
    function img_principal($post){
        //pasar todos en 0 
        $this->db->where('imgEnc_id',$post['id']);
        $this->db->set('imgDet_padre','0');
        $this->db->update('imagenes_detalle');
        // colocar uno como principal
        $this->db->where('imgDet_nombre',$post['nombre']);
        $this->db->where('imgEnc_id',$post['id']);
        $this->db->set('imgDet_padre','1');
        $this->db->update('imagenes_detalle');
    }

}
