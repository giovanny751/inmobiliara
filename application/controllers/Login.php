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
        $this->load->model('administracion_model');
        $this->load->library('cart');
        //$this->load->library('My_PHPMailer');
    }

    public function index() {

        if (!empty($_SESSION['id'])) {
            $user = $_SESSION['id'];
//            var_dump($user);die;
            $datos = $this->Ingreso_model->datosusuario($user);
            $_SESSION['user'] = $datos;
            $this->data['user'] = $_SESSION['user'];
        } else {
            $this->data['user'] = "";
        }

//        var_dump($this->data['user']);die;

        $categoria = $this->input->post('categoria');
        $buscador = $this->input->post('buscador');

        if (empty($categoria)) {
            $categoria = "";
            $this->data['existenciacategoria'] = $categoria;
        } else {
            $this->data['existenciacategoria'] = $categoria;
        }
        if (empty($buscador)) {
            $this->data['buscador'] = "";
        } else {
            $this->data['buscador'] = $buscador;
        }
        if (empty($this->input->post('forma'))) {
            $this->data['forma'] = "";
        } else {
            $this->data['forma'] = $this->input->post('forma');
        }
//        echo $categoria."***".$buscador;

        $cantidad = $this->administracion_model->consultacantidad();

        $cantidad = $cantidad[0]->can_cantidadimgprincipal;

        $numeracion = $this->input->post('numeracion');
        if (!empty($numeracion)) {
            $desde = $numeracion * $cantidad - $cantidad;
        } else {
            $desde = 0;
            $numeracion = 1;
        }
        $categorias = $this->administracion_model->categorias();

//        var_dump($categorias);die;
        $i = array();

        foreach ($categorias as $cat) {
            $i[$cat->cat_categoria][$cat->sub_id] = $cat->sub_subcategoria;
        }
        $this->data['categorias'] = $i;

        $this->data['imagenesslide'] = $this->Ingreso_model->slide();
        $this->data['cantidad'] = $this->Ingreso_model->cantidadimagenes($categoria, $this->data['buscador']);
        $this->data['numeracion'] = ceil($this->data['cantidad'] / $cantidad);
        $this->data['numero'] = $numeracion;

        $this->data['imagenes'] = $this->Ingreso_model->imagenesprincipales($desde, $cantidad, $categoria, $this->data['buscador']);
        $this->load->view('login/principal', $this->data);
    }

    function autocomplete() {

        $data = array();
        $rows = $this->Ingreso_model->productos();
        foreach ($rows as $row) {
            $data[] = array(
                'label' => $row->imgEnc_id . ', ' . $row->imgEnc_nombre,
                'value' => $row->imgEnc_id . ', ' . $row->imgEnc_nombre);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
        }
        echo json_encode($data);


        $productos = $this->Ingreso_model->productos();

        $this->output->set_content_type('application/json')->set_output(json_encode($productos));
    }

    function envioolvidocontrasena() {

        $correo = $this->input->post('correo');
    }

    function registro() {

        $datos = array(
            'ing_celular' => $this->input->post('celular'),
            'ing_telefono' => $this->input->post('telefono'),
            'ing_nombre' => $this->input->post('nombre'),
            'ing_apellido' => $this->input->post('apellido'),
            'ing_correo' => $this->input->post('correo'),
            'ing_contrasena' => $this->input->post('contrasena'),
            'tipUsu_id' => 3
        );

        $id = $this->Ingreso_model->insertarusuario($datos);

        $data = array();
        if (!empty($_SESSION["cart_contents"])) {
            foreach ($_SESSION["cart_contents"] as $datos => $carro) {
                if (is_array($carro)) {
                    $data[] = array(
                        'ing_id' => $id,
                        'imgEnc_id' => $carro['id'],
                        'proUsu_Cantidad' => $carro['qty']
                    );
                }
            }
            $this->Ingreso_model->insertaproductosusuario($data);
        }
        $_SESSION['id'] = $id;
        redirect('index.php');
    }

    function producto() {

        $id = $this->input->get('img');

        if (!empty($id)) {
            $this->data['id'] = $id;

            $this->data['categorias'] = $this->administracion_model->categorias();
            $this->data['datos'] = $this->Ingreso_model->imagenseleccionada($id);

//         var_dump($this->data['datos']);die;

            $this->data['datosslide'] = $this->Ingreso_model->imagenseleccionada($id);
            $this->load->view('login/producto', $this->data);
        } else {
            redirect('index.php/login/index', 'location');
        }
    }

    function olvidocontrasena() {

        $this->load->view('login/olvidocontrasena');
    }

    function cambiocontrasenausuarios() {

        $this->load->view('login/cambiocontrasenausuarios');
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
                    case 2://empresa
                        $user = $this->user_model->get_empresa($user[0]->ing_id);
                        break;
                    case 1://administrador
                        $user = $this->user_model->get_administrador($user[0]->ing_id);
                        break;
                    case 3://visitante
                        $user[0]->nombres = $user[0]->ing_nombre." ".$user[0]->ing_apellido;
                        $user[0]->documento = 0;
                        $user[0]->emp_id = 0;
                        break;
                    default :
                        $this->session->set_flashdata(array('message' => 'Usuario sin permisos', 'message_type' => 'warning'));
                        redirect('', 'refresh');
                }
//                echo print_y($user);
//                die;
                if (count($user) == 0) {
                    $this->session->set_flashdata(array('message' => 'Usuario sin permisos', 'message_type' => 'warning'));
                    redirect('index.php', 'location');
                }
//                echo print_y($user);
//                die();
                $this->acceso($user, $acceso, $ing_id);
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

    function acceso($user = null, $acceso = null, $ing_id = NULL) {
        $i = 0;
        if (!empty($id)) {
            $user = $this->user_model->validacionusuario(deencrypt_id($id));
            $i = 1;
        }

        $newdata = array(
            'nombres' => $user[0]->nombres,
            'documento' => $user[0]->documento,
            'id_usuario' => $ing_id,
            'emp_id' => $user[0]->emp_id,
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

    function agregar_carrito() {
        $opciones = array();

        $filtros = array();

        if (!empty($this->input->post('categoria'))) {
            $categoria = array('categoria' => $this->input->post('categoria'));
        }

        if ($this->input->post('opciones')) {
            $opciones = $this->input->post('opciones');
        }
        $data = array(
            'id' => $this->input->post('id_producto'),
            'qty' => $this->input->post('cantidad'),
            'price' => $this->input->post('precio_producto'),
            'name' => $this->input->post('nombre_producto'),
            'options' => $opciones
        );
        $this->cart->insert($data);
        redirect('index.php/carrito');
//        redirect('index.php/Login/mostrar_carrito');
//        redirect('index.php/Login/lista_productos');
    }

    function filtros() {

        $filtros = array();

        if (!empty($this->input->post('forma'))) {
            $categoria = array('forma' => $this->input->post('forma'));
        }

//        if($this->input->post('opciones')) {
//            $opciones = $this->input->post('opciones');
//        }
//        $data = array(
//            'id' => $this->input->post('id_producto'),
//            'qty' => $this->input->post('cantidad'),
//            'price' => $this->input->post('precio_producto'),
//            'name' => $this->input->post('nombre_producto'),
//            'options' => $opciones
//        );
        $this->cart->insert($data);
        redirect('index.php');
//        redirect('index.php/Login/mostrar_carrito');
//        redirect('index.php/Login/lista_productos');
    }

    function lista_productos() {
        $datos['titulo'] = 'Listado de productos';
        $datos['contenido'] = 'lista_productos';
        $this->load->view('Login/lista_productos', $datos);
    }

    function mostrar_carrito() {
        $datos['titulo'] = 'Listado de productos';
        $datos['contenido'] = 'carrito';
        $this->load->view('login/carrito', $datos);
    }

    function vaciar_carrito() {
        $this->cart->destroy();
        redirect('index.php/productos');
//        redirect('index.php/Login/lista_productos');
    }

    function actualizar_carrito() {
        $rows = $this->input->post('rowid');
        $cantidades = $this->input->post('qty');
        $data = array();

        for ($i = 0; $i < sizeof($rows); $i++) {
            $data[] = array(
                'rowid' => $rows[$i],
                'qty' => $cantidades[$i]
            );
        }
        $this->cart->update($data);
        redirect('index.php/productos');
    }

}
