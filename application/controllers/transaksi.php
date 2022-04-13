<?php

class Transaksi extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function tambah(){
        $isi['content']  = 'backend/transaksi/t_transaksi';
        $isi['judul']    =  'Form Tambah Transaksi';
        $isi['konsumen'] = $this->db->get('konsumen')->result();
        $isi['paket']    = $this->db->get('paket')->result();
        $isi['kode_transaksi'] = $this->m_transaksi->generateKode();
        $this->load->view('backend/dashboard', $isi);

        // get('konsumen') : nama table di database, kita mau ambil data dari table konsumen
        // ['paket'] : untuk menampung value data paket, biar bisa dipanggil
    }

    public function getHargaPaket(){

        $kode_paket  = $this->input->post('kode_paket');
        $harga_paket = $this->input->post('harga_paket');
        $data        =$this->m_transaksi->getHargaPaket($kode_paket);
        echo json_encode($data);
    }
}
?>