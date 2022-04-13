<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_dashboard');
    }


    public function index(){

        $isi['content'] = 'backend/home';
        $isi['judul']   = 'Dashboard';
        $isi['total_konsumen'] = $this->m_dashboard->total_konsumen();
        $isi['transaksi_baru'] = $this->m_dashboard->transaksi_baru();
        $isi['total_transaksi'] = $this->m_dashboard->total_transaksi();
        $this->load->view('backend/dashboard', $isi);
       

    }
}

?>
