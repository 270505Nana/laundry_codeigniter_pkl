<?php

class M_cek_laundry extends CI_Model{

    public function cek_status($kode_transaksi){
    // Ini kalau mau nama functionnya bukan index gapppa

    return $this->db->get('transaksi');
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('konsumen', 'transaksi.kode_konsumen,nama_konsumen = konsumen.kode_konsumen,nama_konsumen');
    $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
    // $this->db->join('konsumen', 'transaksi.nama_konsumen = konsumen.nama_konsumen');
    $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
    return $this->db->get()->result();

    }
}