<?php

class Cek_laundry extends CI_Controller{

    public function __construct(){

        parent:: __construct();
        $this->load->model('m_cek_laundry');

    }

    public function index(){

        $kode_transaksi= $this->input->post('kode_transaksi');
        $isi['data']   = $this->m_cek_laundry->cek_status($kode_transaksi);
        $this->load->view('frontend/header');
        $this->load->view('frontend/cek_laundry', $isi);
        var_dump($isi['data'] );

        $this->load->view('frontend/footer');
    }

}
?>