<?php

class Empresa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function empresas() {

        $empresa = $this->db->get('empresa');
        return $empresa->result();
    }

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
        $this->db->set('imgEnc_user_id', $id_user);
        $this->db->where('imgEnc_id', $post['imgEnc_id']);
        $this->db->update('imagenes_encabezado', $post);
    }

    function guarda_imagen_general($post, $id_user) {
        $this->db->set('id_emp', $id_user);
        $this->db->set('imgEnc_fecha_crear', date('Y-m-d H:i:s'));
        $this->db->set('imgEnc_user_id', $id_user);
        $this->db->insert('imagenes_encabezado', $post);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    function insert_imagen_secundatia($nombre, $id) {
        $this->db->set('imgEnc_id', $id);
        $this->db->set('imgDet_nombre', $nombre);
        $this->db->insert('imagenes_detalle');
    }

    function img_principal($post) {
        //pasar todos en 0 
        if ($post['accion'] == 'update') {
            $this->db->where('imgEnc_id', $post['id']);
            $this->db->set('imgDet_padre', '0');
            $this->db->update('imagenes_detalle');
        }

        // colocar uno como principal
        $this->db->where('imgDet_nombre', $post['nombre']);
        $this->db->where('imgEnc_id', $post['id']);
        $this->db->set('imgDet_padre', '1');
        $this->db->$post['accion']('imagenes_detalle');
    }

    function subcategoria($categoria, $subcategoria) {

        $this->db->set('cat_id', $categoria);
        $this->db->set('sub_subcategoria', $subcategoria);
        $this->db->insert('subcategoria');
    }

    function categorias() {

        $categoria = $this->db->get('categoria');
        return $categoria->result();
    }

    function buscar_sub_categorias($post) {
        $this->db->where('cat_id', $post['cat_id']);
        $datos = $this->db->get('subcategoria');
        $datos = $datos->result();
        $info = "<option value=''></option>";
        foreach ($datos as $value) {
            $info.="<option value='" . $value->sub_id . "'>" . $value->sub_subcategoria . "</option>";
        }
        return $info;
    }

    function listado($num = null, $id) {
        if ($num == 1) {
            $num=10;
        }else{
            $num = deencrypt_id($num)*10;
        }
        $this->db->select('enc.imgEnc_nombre,enc.imgEnc_descripcion_corta,enc.imgEnc_id,enc.id_emp,del.imgDet_nombre');
        $this->db->join('imagenes_detalle del ','del.imgEnc_id=enc.imgEnc_id',false,false);
        $this->db->where('del.imgDet_padre','1');
        $this->db->where('enc.id_emp',$id);
        $this->db->where('enc.est_id <>',3);
        $datos=$this->db->get('imagenes_encabezado enc',10,$num-10);
//        echo $this->db->last_query();
        return $datos->result();
    }
    function cantidad_listado( $id) {
        $this->db->select('count(*) cantidad',FALSE);
        $this->db->join('imagenes_detalle del ','del.imgEnc_id=enc.imgEnc_id',false,false);
        $this->db->where('del.imgDet_padre','1');
        $this->db->where('enc.id_emp',$id);
        $this->db->where('enc.est_id <>',3);
        $datos=$this->db->get('imagenes_encabezado enc');
        return $datos->result();
    }
    function inactivar($id,$num){
        $this->db->get('est_id',$num);
        $this->db->where('imgEnc_id',$id);
        $this->db->get('imagenes_encabezado');
    }

}
