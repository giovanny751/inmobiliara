<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        //$this->load->library('My_PHPMailer');
    }

    public function index() {
        //FUNCION PRINCIPAL PARA EL LOGIN - CARGA LA VISTA LOGIN/INDEX.PHP
        $datos=$this->session->userdata('user_id');
        if (!empty($datos)) {
            redirect('index.php/presentacion/principal', 'location');
        } else {
            $this->load->view('login/principal');
        }
    }

    public function make_hash($var = 1) {
        //FUNCION PARA GENERAR NUEVAS CONTRASE�AS
        echo make_hash($var);
    }

    public function politica() {
        $this->data['username'] = $this->input->post('username');
        $this->data['password'] = $this->input->post('password');
        $this->user_model->listo_politica($this->data['username'], $this->data['password']);
        $this->verify();
    }

    function verify() {
        //RECOLECTAMOS LOS DATOS DE LOS CAMPOS DE USUARIO Y CONTRASE�A
        //CONSULTAMOS EL USUARIO CON BASE EN EL NUMERO DE DOCUMENTO
        $this->data['username'] = $this->input->post('username');
        $this->data['password'] = $this->input->post('password');
        $user = $this->user_model->get_user($this->data['username'], $this->data['password']);
        //VERIFICAMOS SI EL USUARIO EXISTE
        if (!empty($user) > 0) {
            if ($user[0]->usu_politicas == 0) {
                $this->data['inicio'] = $this->user_model->admin_inicio();
                $this->load->view('login/politicas', $this->data);
            } else {
                $this->acceso($user);
                redirect('index.php/presentacion/principal', 'location');
            }
            //PREPARAMOS LAS VARIABLES QUE VAMOS A GUARDAR EN SESSION
        } else {
            $this->session->set_flashdata(array('message' => 'Su n&uacute;mero de documento no se encuentra registrado en el sistema.', 'message_type' => 'warning'));
            redirect('', 'refresh');
        }
    }

    public function logout() {
        $this->session->set_userdata('logged_in', FALSE);
        $this->session->sess_destroy();
        //$this->load->view('login/index');
        redirect('index.php/login', 'location');
    }

    function acceso($user = null, $id = NULL) {
        $i = 0;
        if (!empty($id)) {
            $user = $this->user_model->validacionusuario(deencrypt_id($id));
            $i = 1;
        }

//        echo print_y($user);die;

        $newdata = array(
            'user_id' => $user[0]->usu_id,
            'usu_nombres' => $user[0]->usu_nombres,
            'usu_segundonombre' => $user[0]->usu_segundonombre,
            'usu_apellido' => $user[0]->usu_apellido,
            'usu_segundoapellido' => $user[0]->usu_segundoapellido,
            'usu_cc' => $user[0]->usu_cc,
            'gen_id' => $user[0]->gen_id,
            'usu_edad' => $user[0]->usu_edad,
            'usu_fecha_nacimiento' => $user[0]->usu_fecha_nacimiento,
            'ciu_id' => $user[0]->ciu_id,
            'usu_celular' => $user[0]->usu_celular,
            'usu_telF' => $user[0]->usu_telF,
            'usu_correo' => $user[0]->usu_correo,
//            'usu_tipo_contrato' => $user[0]->usu_tipo_contrato,
            'usu_confir_eps' => $user[0]->usu_confir_eps,
            'usu_confir_pension' => $user[0]->usu_confir_pension,
            'usu_confir_arl' => $user[0]->usu_confir_arl,
            'usu_confir_caja_compensacio' => $user[0]->usu_confir_caja_compensacio,
            'usu_confir_des_min' => $user[0]->usu_confir_des_min,
            'usu_rol_mision' => $user[0]->usu_rol_mision,
            'usu_desplazamiento_mision' => $user[0]->usu_desplazamiento_mision,
            'usu_frecuenciadesmision' => $user[0]->usu_frecuenciadesmision,
            'usu_tipo_despla_mision' => $user[0]->usu_tipo_despla_mision,
            'usu_nro_diaro_recorrido' => $user[0]->usu_nro_diaro_recorrido,
            'usu_rol_via' => $user[0]->usu_rol_via,
            'usu_tipo_transporte' => $user[0]->usu_tipo_transporte,
            'tipVeh_id' => $user[0]->tipVeh_id,
            'usu_date_vigencia_conduc' => $user[0]->usu_date_vigencia_conduc,
            'usu_date_expire_licen' => $user[0]->usu_date_expire_licen,
            'usu_categoria' => $user[0]->usu_categoria,
            'usu_restricciones' => $user[0]->usu_restricciones,
            'estCon_id' => $user[0]->estCon_id,
            'usu_runt_num' => $user[0]->usu_runt_num,
            'usu_estado_infra_vehiculo' => $user[0]->usu_estado_infra_vehiculo,
            'usu_organi_trabajo' => $user[0]->usu_organi_trabajo,
            'usu_mi_propia_conduccion' => $user[0]->usu_mi_propia_conduccion,
            'usu_otro' => $user[0]->usu_otro,
            'usu_cual' => $user[0]->usu_cual,
            'usu_intensidad_trafico' => $user[0]->usu_intensidad_trafico,
            'usu_estado_vehiculo' => $user[0]->usu_estado_vehiculo,
            'usu_propia_conduccion' => $user[0]->usu_propia_conduccion,
            'usu_conduc_climatrografica' => $user[0]->usu_conduc_climatrografica,
            'usu_organizacion' => $user[0]->usu_organizacion,
            'usu_estado_psicofisico' => $user[0]->usu_estado_psicofisico,
            'usu_otros_conductores' => $user[0]->usu_otros_conductores,
            'usu_estado_infraestructura' => $user[0]->usu_estado_infraestructura,
            'usu_falta_informacion' => $user[0]->usu_falta_informacion,
            'emp_id' => $user[0]->emp_id,
            'usu_tipo' => $user[0]->usu_tipo,
            'tipCon_id' => $user[0]->tipCon_id,
            'res_id' => $user[0]->res_id,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($newdata);

        if ($i == 1) {
            $ruta = 'index.php/presentacion/principal';
            redirect($ruta, 'location');
        }
    }
    function reset(){
        $mail=  $this->input->post('email');
        $password=$this->user_model->reset($mail);
        mail($mail, "Restablecer la contraseña. ", 'clave: '.$password);
    }

}
