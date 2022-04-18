<?php

class Home extends CI_Controller{

    public function index(){

        // $isi['paket'] = $this->db->get('paket')->result();

        $isi['paket'] = $this->m_paket->getDataPaket()->result();
        $this->load->view('frontend/header', $isi);
        $this->load->view('frontend/home');
        $this->load->view('frontend/footer');

    }
}

?>