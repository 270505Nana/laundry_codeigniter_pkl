<?php

class M_security extends CI_Model{

    public function getSecurity(){
        if(empty($this->session->userdata('username'))){
            $this->session->sess_destroy();
            redirect('panel', 'refresh');

            // Jika username tidak terdaftar, akan diarahkan ke halaman login
            // Membuat orang wajib login dulu
        }
    }
}