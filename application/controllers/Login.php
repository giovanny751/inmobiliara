<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        $this->load->model('Ingreso_model');
        //$this->load->library('My_PHPMailer');
    }

    public function index() {
        //FUNCION PRINCIPAL PARA EL LOGIN - CARGA LA VISTA LOGIN/INDEX.PHP
//        $datos = $this->session->userdata('user_id');
//        if (!empty($datos)) {
//            redirect('index.php/presentacion/principal', 'location');
//        } else {
//            $this->load->view('login/principal');
//        }
        
        $cantidad = 16;
        $numeracion = $this->input->post('numeracion');
        if(!empty($numeracion))
        {
            $desde = $numeracion*$cantidad-$cantidad;
        }else{
            $desde = 0;
            $numeracion = 1;
        }
       
        $this->data['cantidad'] = $this->Ingreso_model->cantidadimagenes();        
        $this->data['numeracion'] = ceil($this->data['cantidad']/$cantidad);
        $this->data['numero'] =  $numeracion;
        $this->data['imagenes'] = $this->Ingreso_model->imagenesprincipales($desde,$cantidad);
        $this->load->view('login/principal',$this->data);
    }
    function producto(){
        
//        $id = $this->input->post('imagen');
        $id = 1;
        $this->data['datos'] = $this->Ingreso_model->imagenseleccionada($id);  
        
        $this->load->view('login/producto',$this->data);
        
    }

    public function make_hash($var = 1) {
        //FUNCION PARA GENERAR NUEVAS CONTRASE�AS
        echo make_hash($var);
    }

    function politica() {
        $this->data['username'] = $this->input->post('username');
        $this->data['password'] = $this->input->post('password');
        $this->user_model->listo_politica($this->data['username'], $this->data['password']);
        $post = $this->input->post();
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
                $acceso = $user[0]->tipUsu_id;
                $ing_id = $user[0]->ing_id;
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
                if (count($user) == 0) {
                    $user[0]->nombres = 0;
                    $user[0]->documento = 0;
                    $user[0]->ing_id = 0;
                    $user[0]->emp_id = 0;
                }
                $this->acceso($user, $acceso,$ing_id);
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

    function acceso($user = null, $acceso = null,$ing_id=NULL) {
        $i = 0;
        if (!empty($id)) {
            $user = $this->user_model->validacionusuario(deencrypt_id($id));
            $i = 1;
        }

        $newdata = array(
            'nombres' => $user[0]->nombres,
            'documento' => $user[0]->documento,
            'id_usuario' => $ing_id,
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
