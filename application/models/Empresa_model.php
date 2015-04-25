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

//        echo $this->db->last_query();

        return $datos->result();
    }

    function update_imagen_general($post, $id_user) {
        $fil['filter'] = $post['filter'];
        unset($post['filtro']);
        unset($post['filter']);
        $this->db->set('id_emp', $id_user);
        $this->db->set('imgEnc_user_id', $id_user);
        $this->db->where('imgEnc_id', $post['imgEnc_id']);
        $this->db->update('imagenes_encabezado', $post);

        
        $this->db->where('id_img', $post['imgEnc_id']);
        $this->db->delete('filtro');
        
        if (count($fil['filter']) != 0) {
            for ($i = 0; $i < count($fil['filter']); $i++) {
                $this->db->set('id_emp', $id_user);
                $this->db->set('fil_nombre', $fil['filter'][$i]);
                $this->db->set('id_img', $post['imgEnc_id']);
                $this->db->insert('filtro');
            }
        }
    }

    function guarda_imagen_general($post, $id_user) {

        $fil['filter'] = $post['filter'];
        unset($post['filtro']);
        unset($post['filter']);
        $this->db->set('id_emp', $id_user);
        $this->db->set('imgEnc_fecha_crear', date('Y-m-d H:i:s'));
        $this->db->set('imgEnc_user_id', $id_user);
        $this->db->insert('imagenes_encabezado', $post);
        $last_id = $this->db->insert_id();

        if (count($fil['filter']) != 0) {
            for ($i = 0; $i < count($fil['filter']); $i++) {
                $this->db->set('id_emp', $id_user);
                $this->db->set('fil_nombre', $fil['filter'][$i]);
                $this->db->set('id_img', $last_id);
                $this->db->insert('filtro');
            }
        }

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

    function listado($num = null, $id = null, $imgEnc_id = NULL) {
        if ($num == 1) {
            $num = 10;
        } else {
            $num = deencrypt_id($num) * 10;
        }
        $this->db->select('del.imgDet_padre,sub.sub_id,sub.sub_subcategoria,enc.ingEnc_promocion,enc.imgEnc_destacado,enc.est_id,enc.imgEnc_descripcion_larga,enc.imgEnc_nombre,enc.imgEnc_descripcion_corta,enc.imgEnc_id,enc.id_emp,del.imgDet_nombre,cat_categoria');
        $this->db->join('imagenes_detalle del ', 'del.imgEnc_id=enc.imgEnc_id', 'left', false);
        $this->db->join('categoria cat ', 'cat.cat_id=enc.cat_id', 'left', false);
        $this->db->join('subcategoria sub ', 'cat.cat_id=sub.cat_id', 'left', false);
        if ($id != NULL) {
            $this->db->where('enc.id_emp', $id);
            $this->db->where('del.imgDet_padre', '1');
        } else {
            $imgEnc_id = deencrypt_id($imgEnc_id);
            $num = 10;
            $this->db->where('enc.imgEnc_id', $imgEnc_id);
        }
        $this->db->where('enc.est_id <>', 3);
        $this->db->order_by('imgEnc_id', 'asc');
        $datos = $this->db->get('imagenes_encabezado enc', 10, $num - 10);
        if ($id != NULL) {
            $new_query = $this->db->last_query();
            $new_query = strstr($new_query, 'ORDER BY', true);
            $new_query = $this->db->query($new_query);
            $new_query = $new_query->result();
        } else {
            $new_query = array();
        }
        return array($datos->result(), $new_query);
    }

    function filtros($imgEnc_id) {
        $imgEnc_id = deencrypt_id($imgEnc_id);
        $this->db->where('id_img', $imgEnc_id);
        $datos = $this->db->get('filtro');
        return $datos->result();
    }

    function inactivar($id, $num) {
        $this->db->set('est_id', $num);
        $this->db->where('imgEnc_id', $id);
        $this->db->update('imagenes_encabezado');
//                echo $this->db->last_query();
    }

    function inactivar_slider($id, $num) {
        $this->db->set('est_id', $num);
        $this->db->where('sli_id', $id);
        $this->db->update('sliderEmpresa');
//                echo $this->db->last_query();
    }

    function destacar($id, $num) {
        $this->db->set('imgEnc_destacado', $num);
        $this->db->where('imgEnc_id', $id);
        $this->db->update('imagenes_encabezado');
//                echo $this->db->last_query();
    }

    function promocion($id, $num) {
        $this->db->set('ingEnc_promocion', $num);
        $this->db->where('imgEnc_id', $id);
        $this->db->update('imagenes_encabezado');
//                echo $this->db->last_query();
    }

    function Guardar_slider($post, $id_user) {
        if ($post['sli_id'] == '') {
            $this->db->set('sli_user_creacion', $id_user);
            $this->db->set('sli_fecha_creacion', date('Y-m-d H:i:s'));
            $this->db->insert('sliderEmpresa', $post);
        } else {
            $this->db->where('sli_id', $post['sli_id']);
            $this->db->set('sli_fecha_modificacion', $id_user);
            $this->db->set('sli_user_modificacion', date('Y-m-d H:i:s'));
            $this->db->update('sliderEmpresa', $post);
        }
    }

    function obtener_slider($emp_id) {
        $this->db->where('emp_id', $emp_id);
        $this->db->where('est_id <>', '3');
        $datos = $this->db->get('sliderEmpresa');
        $datos = $datos->result();
        $table = "<table style='width:100%'>";
        $table.="<thead>"
                . "<th>Imagen</th>"
                . "<th>Información</th>"
                . "<th>Fecha Inicial</th>"
                . "<th>Fecha Fin</th>"
                . "<th>Acción</th>"
                . "</thead>";
        foreach ($datos as $value) {
            $table.="<tr>"
                    . "<td> <img style='width:100px' src='" . base_url('uploads') . '/' . $value->emp_id . "/slider/" . $value->sli_nombre_archivo . "'></td>"
                    . "<td>" . $value->sli_descripcion . "</td>"
                    . "<td>" . $value->sli_fecha_inicio . "</td>"
                    . "<td>" . $value->sli_fecha_final . "</td>"
                    . '<td>'
                    . '<a href="' . base_url('index.php/Empresa/inactivar_slider') . "/" . encrypt_id($value->sli_id) . "/" . encrypt_id(3) . '"><i class="fa fa-trash-o fa-fw fa-2x" title="Eliminar"></i> </a>';
            if ($value->est_id == 2) {
                $table.= '<a href="' . base_url('index.php/Empresa/inactivar_slider') . "/" . encrypt_id($value->sli_id) . "/" . encrypt_id(1) . '"><i class="fa fa-eye-slash fa-2x" title="Inactivo"></i> </a>';
            } else {
                $table.= '<a href="' . base_url('index.php/Empresa/inactivar_slider') . "/" . encrypt_id($value->sli_id) . "/" . encrypt_id(2) . '"><i class="fa fa-eye fa-2x" title="Activo"></i> </a>';
            }
            $editar = "'" . $value->sli_descripcion . "','" . $value->sli_id . "'";
            $table.= '<a href="javascript:" onclick="editar(' . $editar . ')"; ><i class="fa fa-pencil fa-2x" title="Editar"></i></td>'
                    . "</tr>";
        }
        $table.="</table>";
        return $table;
    }

}
