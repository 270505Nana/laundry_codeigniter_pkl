<?php

class Slider extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_slider');

    }

    public function index(){

        $isi['content'] = 'backend/slider/v_slider';
        $isi['judul']   = 'Kelola Slider';
        $isi['slider']  = $this->m_slider->getSlider();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah(){

        $isi['content'] = 'backend/slider/t_slider';
        $isi['judul']   = 'Tambah Slider';
        $this->load->view('backend/dashboard', $isi);
    }

    public function simpan(){
       
        $gambar =$_FILES['gambar'] ['name']   ;
        $status_slider= $this->input->post('status_slider');

        if ($gambar=''){}else{
            // bikin path untuk menentukan penyimpanan gambarnya
            // jadi nanti file yang diupload otomatis akan tesimpan ke fila slider
            $config ['upload_path'] = 'assets/images/slider';
            //untuk menentukan tipe file yang diijinkan
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            //manggil library upload, karena ingin mengupload file
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo"Gambar gagal di upload";
            }else{
                $this->session->set_flashdata('info', ' Data Slider Berhasil Disimpan');
                $gambar=$this->upload->data('file_name');
            }
        }

        // Kita masukkan semua data ke dalam arry, buat array
        $data = array(
            'status_slider' => $status_slider,
            'gambar' => $gambar
        );

        
        $this->m_slider->tambah_slider($data, 'slider');
        redirect('slider');

        // INI GAGAL !!

        // Perlu mengkonfigurasi untuk upload gambarnya
        // $config['upload_path']   =  'assets/images/slider';
        // $config['allowed_types'] = 'jpg|png|gif|jpeg|webp';
        // $config['max_size']      = '20480';
        // $this->load->library('upload', $config);
        // $this->upload->do_upload('gambar');
        // $file_name = $this->upload->data();

        // $data = array(

        //     'gambar' => $file_name['file_name'],
        //     'status_slider' => ''
        // );

        // $query = $this->db->insert('slider', $data);
        // // Untuk mengirim data ke database, memanggil parameter yang ingin dikirim

        // if ($query = true){
        //     $this->session->set_flashdata('info', ' Data Slider Berhasil Disimpan');
        //     redirect('slider');
        //     //Ketika kita berhasil menyimpan data, maka akan di redirect ke halaman slider

        // }
    }


}
?>