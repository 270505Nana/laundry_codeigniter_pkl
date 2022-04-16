<?php

class About extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model('m_about');
    }


    public function index(){

        $isi['content'] = 'backend/about/v_about';
        $isi['judul']   = 'Data About';
        $isi['data']    = $this->db->get('about')->result();
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah(){

        $isi['content'] = 'backend/about/t_about';
        $isi['judul']   = 'Tambah Data About';
        $this->load->view('backend/dashboard', $isi);

    }

    public function simpan(){

        $judul_about    = $this->input->post('judul_about');
        $deskripsi_about= $this->input->post('deskripsi_about');
        $gambar_about   = $_FILES['gambar_about'] ['name']   ;
        

        if ($gambar_about=''){}else{
            // bikin path untuk menentukan penyimpanan gambarnya
            // jadi nanti file yang diupload otomatis akan tesimpan ke fila about
            $config ['upload_path'] = 'assets/images/about';
            //untuk menentukan tipe file yang diijinkan
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            //manggil library upload, karena ingin mengupload file
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar_about')){
                echo"Gambar gagal di upload";
            }else{
                $this->session->set_flashdata('info', ' Data About Berhasil Disimpan');
                $gambar_about=$this->upload->data('file_name');
            }
        }

        // Kita masukkan semua data ke dalam arry, buat array
        $data = array(
            'judul_about' => $judul_about,
            'deskripsi_about' => $deskripsi_about,
            'gambar_about' => $gambar_about
        );

        
        $this->m_about->tambah_about($data, 'about');
        redirect('about');
    }

    public function edit($id_about){

        $isi['content'] = 'backend/about/e_about';
        $isi['judul']   = 'Edit Data About';
        $isi['about']   = $this->m_about->edit($id_about);
        // Untuk mengedit perlu mengakses database, oleh karena itu edit disini memanggil model about/edit
        $this->load->view('backend/dashboard', $isi);

    }

    public function update(){

        $id_about = $this->input->post('id_about');
        $config['upload_path'] = 'assets/images/about';
        $config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
        $config['max_size'] = '20480';

        $this->load->library('upload', $config);

        if(!empty($_FILES['gambar_about']['name'])){
            $this->upload->do_upload('gambar_about');
            $upload = $this->upload->data();
            $gambar = $upload['file_name'];
            
            $data = array(

                'gambar_about'    => $gambar,
                'judul_about'     => $this->input->post('judul_about'),
                'deskripsi_about' => $this->input->post('deskripsi_about')

            );

            $_id   = $this->db->get_where('about', ['id_about' => $id_about])->row();
            $query = $this->m_about->update($id_about, $data);

            if ($query = true){
                $this->session->set_flashdata('info', 'Data Berhasil di Update');
                unlink('assets/images/about'.$_id->gambar_about);
                redirect('about');
            }else{
                $data = array(

                'judul_about'     => $this->input->post('judul_about'),
                'deskripsi_about' => $this->inout>post('deskripsi_about')

                );
                $query = $this->m_about->update($id_about, $data);
                if ($query = true){
                    $this->session->set_flashdata('info', 'Data Berhasil Di Update');
                    redirect('about');
                }
            }
        }
       
        // $judul_about     =$this->input->post('judul_about');
        // $deskripsi_about =$this->input->post('deskripsi_about');
        // $gambar_about    =$this->input->post('gambar_about');

        // // Lalu masukkan ke array
        // $data = array(

        //     'judul_about'      => $judul_about,
        //     'deskripsi_about'  => $deskripsi_about,
        //     'gambar_about'     => $gambar_about,
        // );

        // $where = array(

        //     'id_brg' => $id
        // );

        // $this->m_about->update($where, $data, 'about');
        // redirect('about');
       
    }

    public function delete($id_about){

        $id    = $this->db->get_where('about', ['id_about' => $id_about])->row();
        $query = $this->db->delete('about', ['id_about' => $id_about]);
        if($query = true ){
            unlink('assets/images/about/'.$id->gambar_about);
            // unlink : nanti file foto yang ada di folder about juga akan ikut dihapus ketika delete kita klik
            $this->session->set_flashdata('info', 'Data Berhasil di Hapus');
            redirect('about');
        }

    }

    
}