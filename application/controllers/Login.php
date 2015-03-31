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
        $datos = $this->session->userdata('user_id');
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

    function politica() {
        $this->data['username'] = $this->input->post('username');
        $this->data['password'] = $this->input->post('password');
        $this->user_model->listo_politica($this->data['username'], $this->data['password']);
        $post=$this->input->post();
//         echo print_y($post);
        $this->verify();
    }

    function verify() {
        //RECOLECTAMOS LOS DATOS DE LOS CAMPOS DE USUARIO Y CONTRASE�A
        //CONSULTAMOS EL USUARIO CON BASE EN EL NUMERO DE DOCUMENTO
        $this->data['username'] = $this->input->post('username');
        $this->data['password'] = $this->input->post('password');
        $user = $this->user_model->get_user($this->data['username'], $this->data['password']);
//        echo print_y($user);
        //VERIFICAMOS SI EL USUARIO EXISTE
        if (!empty($user) > 0) {
            if ($user[0]->ing_politica == 0) {
                $this->data['inicio'] = $this->user_model->admin_inicio();
                $this->load->view('login/politicas', $this->data);
            } else {
                $acceso=$user[0]->ing_acceso;
                switch ($acceso) {
                    case 1://empresa
                        $user = $this->user_model->get_empresa($user[0]->ing_id);
                        break;
                    case 2://administrador
                        $user = $this->user_model->get_administrador($user[0]->ing_id);
                        break;
                    default :
                        $this->session->set_flashdata(array('message' => 'Usuario sin permisos', 'message_type' => 'warning'));
                        redirect('', 'refresh');
                }
//                echo print_y($user);
//                die;
                $this->acceso($user,$acceso);
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

    function acceso($user = null, $acceso=null) {
        $i = 0;
        if (!empty($id)) {
            $user = $this->user_model->validacionusuario(deencrypt_id($id));
            $i = 1;
        }

//        echo print_y($user);die;

        $newdata = array(
            'nombres' => $user[0]->nombres,
            'documento' => $user[0]->documento,
            'id_usuario' => $user[0]->id_ingreso,
            'user_id' => $user[0]->emp_id,
            'acceso' => $acceso,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($newdata);

        if ($i == 1) {
            $ruta = 'index.php/presentacion/principal';
            redirect($ruta, 'location');
        }
    }

    function reset() {
        $mail = $this->input->post('email');
        $password = $this->user_model->reset($mail);
        mail($mail, "Restablecer la contraseña. ", 'clave: ' . $password);
    }

}
