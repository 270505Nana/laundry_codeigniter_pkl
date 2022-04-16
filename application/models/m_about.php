<?php

class M_about extends CI_Model{

    public function  tampil_data(){

        return $this->db->get('about');
    }

    
    public function tambah_about ($data,$table){
        $this->db->insert($table, $data);
    }

    public function edit($id_about){

        $this->db->where('id_about', $id_about);
        return $this->db->get('about')->row_array();
    }

    public function update($id_about, $data){

            $this->db->where('id_about', $id_about);
            $this->db->update('about', $data);
    }
}
?>