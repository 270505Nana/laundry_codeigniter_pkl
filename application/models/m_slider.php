<?php

// Jadi models itu yang menghubungkan ke database, jadi kaya mengelola databasenya disini
// jadi misal tambah barang itu kan ada insert jadi intinya untuk menghubungkan antara value dan database itu di models

class M_slider extends CI_Model{
    
    public function getSlider()
    {
        return $this->db->get('slider');
        //  dia akan ambil dari database, dengan nama tablenya tb_barang(disesuain sama yang di databasenya)
        
    }

    public function tambah_slider ($data,$table){
        $this->db->insert($table, $data);
    }

    
}
