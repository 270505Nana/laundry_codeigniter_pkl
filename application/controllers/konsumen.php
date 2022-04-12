<?php

class Konsumen extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_konsumen');
    }

    public function index(){

        $isi['content']       = 'backend/konsumen/v_konsumen';
        // Memanggil file view
        $isi['judul']         = 'Data Konsumen';
        $isi['data']          = $this->m_konsumen->getAllDataKonsumen();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah(){

        $isi['content'] = 'backend/konsumen/t_konsumen';
        // Memanggil file view
        $isi['judul'] = 'Form Tambah Konsumen';
        $isi['kode_konsumen'] = $this->m_konsumen->generate_kode_konsumen();
        $this->load->view('backend/dashboard', $isi);

    }

    public function simpan(){

        // Disini menampung nama_konsumen, alamat_konsumen, no_telp yang ada di views/backend/konsumen/t_konsumen

        $data = array(

            'kode_konsumen'   => $this->input->post('kode_konsumen'),
            'nama_konsumen'   => $this->input->post('nama_konsumen'),
            'alamat_konsumen' => $this->input->post('alamat_konsumen'),
            'no_telepon'         => $this->input->post('no_telepon'),
        );

        $query = $this->db->insert('konsumen', $data);
        // konsumen  : Nama table di dalam database sesuai dengan yang kita pakai 

        if($query = true){

            $this->session->set_flashdata('info', 'Data Konsumen Berhasil di Simpan');
            // Info : nama flashdatanya
            // Data Konsumen Berhasil di Simpan : Isi pesan tersebut

            redirect('konsumen');
        }

    }

    public function edit($id){

        $isi['content'] = 'backend/konsumen/e_konsumen';
        // Memanggil file view
        $isi['judul']    = 'Form Edit Konsumen';
        $isi['konsumen'] = $this->m_konsumen->edit($id);
        $this->load->view('backend/dashboard', $isi);
    }

    public function update(){

            // Disini menampung nama_konsumen, alamat_konsumen, no_telp yang ada di views/backend/konsumen/t_konsumen

            $kode_konsumen = $this->input->post('kode_konsumen');
            $data = array(

                'kode_konsumen'   => $this->input->post('kode_konsumen'),
                'nama_konsumen'   => $this->input->post('nama_konsumen'),
                'alamat_konsumen' => $this->input->post('alamat_konsumen'),
                'no_telepon'         => $this->input->post('no_telepon'),
            );
    
            $query = $this->m_konsumen->update($kode_konsumen, $data);
            // konsumen  : Nama table di dalam database sesuai dengan yang kita pakai 
    
            if($query = true){
    
                $this->session->set_flashdata('info', 'Data Konsumen Berhasil di Update');
                // Info : nama flashdatanya
                // Data Konsumen Berhasil di Simpan : Isi pesan tersebut
    
                redirect('konsumen');
            }
    
    }

    public function delete($id){

        $query = $this->m_konsumen->delete($id);
        if($query = true){
    
            $this->session->set_flashdata('info', 'Data Konsumen Berhasil di Hapus');
            // Info : nama flashdatanya
            // Data Konsumen Berhasil di Simpan : Isi pesan tersebut

            redirect('konsumen');
        }
        
    }
}
?>