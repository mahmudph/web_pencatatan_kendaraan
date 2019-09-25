<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Kendaraan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Kendaraan_model', 'kendaraan'); 
        $this->load->model('Admin_model', 'admin');           
        $this->load->helper('url');     

        if($this->session->userdata('level_user') != 1) {
            redirect('login');
        }   
    }       
    public function tambah() {
       $isi['content']     = 'admin/kendaraan/index';
       $isi['judul']       = 'Dasboard';         
       $isi['sub_judul']   = 'Kendaraan';      
       $isi['type']        = $this->kendaraan->typekendaraan();
       $isi['kondisi_kn']  = $this->kendaraan->kondisikendaraan();
       $this->load->view('admin/index',$isi);
   }       

    public function index() {
        $isi['content']     = 'admin/kendaraan/content';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Kendaraan';   
        $isi['data']        = $this->kendaraan->showlist()->result();
        $this->load->view('admin/index',$isi);
    }   


    private function upload($name, $filename) {
        $config['upload_path']          = './assets/upload_foto_image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['filename']             = str_replace(' ', '_', $filename);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($name)) {
            die($this->upload->display_errors());
            return false;
        } else{
            return true;
        }
    }

    public function simpan() {
        $upload = $this->upload('photo', $_FILES['photo']['name']);
        if($upload) {
            $data = array(
                'nama_kendaraan' => $this->input->post('nama_kendaraan'),
                'id_type_kendaraan' => $this->input->post('type'),
                'no_polisi'     =>  $this->input->post('no_polisi'),
                'id_kondisi'    => $this->input->post('kondisi'),
                'merek'         => $this->input->post('merek'),
                'spesifikasi'   => $this->input->post('spesifikasi'),
                'description'   => $this->input->post('description'),
                'foto'          => str_replace(' ', '_', $_FILES['photo']['name']),
                'tahun_keluaran' => $this->input->post('tahun_keluar')
            );

            $this->kendaraan->simpandata($data);
            echo "<script>alert('berhasil menambahkan data kendaraan'); window.location='".base_url()."admin/kendaraan'</script>";
        } else {
            die('errror');
        }
    }

    public function hapus($id) {
        try{
            if($this->kendaraan->hapus($id)) {
                echo "<script>alert('berhasil menghapus data kendaraan'); window.location='".base_url()."admin/kendaraan'</script>";
            }
        }catch(Exception $e) {
            echo "<script>alert('kendaraan masih di dalam prose peminjaman / pemeliharaan'); window.location='".base_url()."admin/kendaraan'</script>";
        }
    }

    public function update($id) {
        $isi['content']     = 'admin/kendaraan/update_form';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Kendaraan';      
        $isi['type']        = $this->kendaraan->typekendaraan();
        $isi['kondisi_kn']  = $this->kendaraan->kondisikendaraan();
        $isi['data']        = $this->kendaraan->get_where($id);
        $this->load->view('admin/index',$isi);
    }

    public function simpan_update() {
        $id = $this->input->post('id');

        /* upload foto jika variable foto tidak kosong  */
        $name = "";
        if($_FILES['photo']['name']) {
            if($this->upload('photo', $_FILES['photo']['name'])) {
                $name = $_FILES['photo']['name'];
            } 
        } else {
            $name = $this->input->post('old_foto');
        }

        $data = array(
            'nama_kendaraan' => $this->input->post('nama_kendaraan'),
            'id_type_kendaraan' => $this->input->post('type'),
            'no_polisi'     =>  $this->input->post('no_polisi'),
            'id_kondisi'    => $this->input->post('kondisi'),
            'merek'         => $this->input->post('merek'),
            'spesifikasi'   => $this->input->post('spesifikasi'),
            'description'   => $this->input->post('description'),
            'foto'          => str_replace(' ', '_', $name),
            'tahun_keluaran' => $this->input->post('tahun_keluar')
        );

        if($this->kendaraan->edit_save($id, $data)) {
            echo "<script>alert('berhasil memeperbarui data kendaraan'); window.location='".base_url()."admin/kendaraan'</script>";
        }
    }

  


}
