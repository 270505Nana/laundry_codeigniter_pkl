<?php

class Home extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_about');
    }

    public function index(){

        // $isi['about'] = $this->m_about->tampil_data()->result();
        $isi['data'] = $this->db->get('about')->result();
        $this->load->view('frontend/header');
        $this->load->view('frontend/home');
        $this->load->view('frontend/footer');

    }
}

?>