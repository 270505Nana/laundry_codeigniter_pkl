<?php

class Laporan extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_laporan');
    }

    public function index(){

        $isi['content'] = 'backend/laporan/f_laporan';
        $isi['judul']   = 'Laporan';
        $this->load->view('backend/dashboard',$isi);
    }

    public function cetak_laporan(){


        $tgl_mulai  = $this->input->post('tanggal_mulai');
        // tanggal_mulai : sesuai dengan nama yang kita buat di f_laporan name formnya

        $tgl_selesai = $this->input->post('tanggal_selesai');
        $isi['laporan'] = $this->m_laporan->filter_laporan($tgl_mulai, $tgl_selesai);
        $this->load->view('backend/laporan/cetak_laporan');


    }
}
?>