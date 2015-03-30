<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Community Auth - MY_Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 2.1.3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2013, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
class MY_Controller extends CI_Controller {

//  public $template_file = 'templates/main2';
    protected $data = array();

    /**
     * Class constructor
     */
    public function __construct() {
        // creación dinámica del menú
        parent::__construct();
        header('Pragma: no-cache');
        $this->load->library('layout', 'layout_main');
        $this->load->helper('miscellaneous');
        $this->data['user']=$this->session->userdata();
    }

}

/* End of file MY_Controller.php */
/* Location: /application/libraries/MY_Controller.php */