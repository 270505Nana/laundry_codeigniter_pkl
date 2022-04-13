<?php

class Paket extends CI_Controller{

    public function __construct(){

        // Untuk menghubungkan controller ini dengan model paket
        parent::__construct();
        $this->load->model('m_paket');
        //$this->load->model('m_paket');
        //Kalau mau hubugnkan ke dua model juga bisa
    }

    public function index(){
        $isi['content'] ='backend/paket/v_paket.php';
        $isi['judul']   = 'Daftar Data Paket';
        $isi['data']    = $this->m_paket->getDataPaket();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah(){
        $isi['content'] ='backend/paket/t_paket.php';
        $isi['judul'] = 'Form Tambah Paket';
        $isi['kode_paket'] = $this->m_paket->generate_kode_paket();
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan(){

        $data = array(

            'kode_paket'  => $this->input->post('kode_paket'),
            'nama_paket'  => $this->input->post('nama_paket'),
            'harga_paket' => $this->input->post('harga_paket'),
        );
        $query = $this->db->insert('paket', $data);
        // Jadi kita perlu masukkan nilai diatas sebagai parameter
        // query : sebuah variable, kita bebas ngasih namanya apa
    
        if($query = TRUE){
            // Percabangan kalau $query berhasil/benar dan datanya  berhasil di kirim maka akan muncul flashdata dibawah
            // info                     : nama flashdatanya
            // Data Paket Telah bla bla : pesan flashdata yang akan disampaikan

            $this->session->set_flashdata('info', 'Data Paket Berhasil Disimpan');
            redirect('paket');
            // paket : nama controllernya, kalau  yang kita pilih itu index kita ga perlu tambah index dibelakangnya, karena otomatis

        }
    }

    public function edit($kode_paket){
        // kode_paket : parameter, bisa diisi bebas

        $isi['content'] = 'backend/paket/e_paket';
        // Memanggil file view
        $isi['judul']    = 'Form Edit paket';
        $isi['data']     = $this->m_paket->edit($kode_paket);
        $this->load->view('backend/dashboard', $isi);

    }

    public function update(){

        $kode_paket = $this->input->post('kode_paket');
        $data = array(

            'kode_paket'  => $this->input->post('kode_paket'),
            'nama_paket'  => $this->input->post('nama_paket'),
            'harga_paket' => $this->input->post('harga_paket'),
        );
        $query = $this->m_paket->update($kode_paket, $data);
        // Jadi kita perlu masukkan nilai diatas sebagai parameter
        // query : sebuah variable, kita bebas ngasih namanya apa
    
        if($query = TRUE){
            // Percabangan kalau $query berhasil/benar dan datanya  berhasil di kirim maka akan muncul flashdata dibawah
            // info                     : nama flashdatanya
            // Data Paket Telah bla bla : pesan flashdata yang akan disampaikan

            $this->session->set_flashdata('info', 'Data Paket Berhasil di Update');
            redirect('paket');
            // paket : nama controllernya, kalau  yang kita pilih itu index kita ga perlu tambah index dibelakangnya, karena otomatis

        }
    }

    public function delete($kode_paket){

        $query = $this->m_paket->delete($kode_paket);
        // Jadi kita perlu masukkan nilai diatas sebagai parameter
        // query : sebuah variable, kita bebas ngasih namanya apa
    
        if($query = TRUE){
            // Percabangan kalau $query berhasil/benar dan datanya  berhasil di kirim maka akan muncul flashdata dibawah
            // info                     : nama flashdatanya
            // Data Paket Telah bla bla : pesan flashdata yang akan disampaikan

            $this->session->set_flashdata('info', 'Data Paket Berhasil di Hapus');
            redirect('paket');
            // paket : nama controllernya, kalau  yang kita pilih itu index kita ga perlu tambah index dibelakangnya, karena otomatis

        }
    }

    


}
?>