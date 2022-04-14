<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_login');
    }

    public function index(){

        $username = $this->input->post('username');
        // username : sesuai dengan name text usernamenya, ada di file views login 
        $password = $this->input->post('password');
        $this->m_login->proses_login($username, $password);
    }

    public function logout(){

        $this->session->sess_destroy();
        // Untuk mengakhiri session ketika kita klik logout
        redirect('panel');

    }
}
?>