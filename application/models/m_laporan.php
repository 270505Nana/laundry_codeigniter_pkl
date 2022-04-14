<?php

class M_laporan extends CI_Model{

    public function filter_laporan($tgl_mulai, $tgl_selesai){

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen' );
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket' );
        $this->db->where('transaksi.tgl_masuk>=', $tgl_mulai);
        $this->db->where('transaksi.tgl_masuk<=', $tgl_selesai);
        // tgl_masuk : column di tabel transaksi (database)
        return $this->db->get()->result();

    }
}