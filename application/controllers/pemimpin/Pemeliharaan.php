<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Pemeliharaan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Pemeliharaan_model', 'pemeliharaan');    
        $this->load->model('Admin_model', 'admin');   
        $this->load->model('Kendaraan_model', 'kendaraan');  
        $this->load->helper('url');     

        if($this->session->userdata('level_user') != 2) {
            redirect('login');
        }
    }   
    
    private function checkKendaraanData() {
        if($this->admin->kendaraanCount() < 1 ) {
            echo "<script>alert('data kendaraan kosong!'); window.location='".base_url()."admin/kendaraan/tambah'</script>";
            exit;
        }
    }
    
    public function tambah() {
        $this->checkKendaraanData();

        $isi['content']     = 'pemimpin/pemantauan/pemeliharaan/index';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Pemeliharaan'; 
        $isi['users']       = $this->db->get('publick_users')->result();
        $isi['kendaraan']   = $this->kendaraan->getAllKendaraan();   
        $isi['kondisi_kn']  = $this->kendaraan->getKondisi();
        $this->load->view('pemimpin/index',$isi);
    }       

    public function index() {
       $isi['content']     = 'pemimpin/pemantauan/pemeliharaan/content';
       $isi['judul']       = 'Dasboard';         
       $isi['sub_judul']   = 'Pemeliharaan'; 
       $isi['data']        = $this->pemeliharaan->listAllData()->result();
       $this->load->view('pemimpin/index',$isi);
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
    public function save_pemeliharaan() {
        $tgl_perbaikan    = strtotime($this->input->post('tgl_perbaikan'));
        $upload = $this->upload('photo', $_FILES['photo']['name']);
        if($upload) {
            $data = array(
                'id_kendaraan'      => $this->input->post('kendaraan'),
                'id_users_public'   => $this->input->post('id_user'),
                'tanggal_perbaikan' => date('Y-m-d', $tgl_perbaikan),
                'keterangan'        => $this->input->post('description'),
                'harga_pemeliharaan'=> $this->input->post('biaya'),
                'foto_perbaikan'    => str_replace(' ', '_', $_FILES['photo']['name'])
            );

            $this->db->insert('pemeliharaan', $data);
            echo "<script>alert('berhasil menambahkan perbaikan kendaraan'); window.location='".base_url()."admin/pemeliharaan'</script>";

        } else {
            die('error');
        }
    }


    public function update($id) {
        $isi['content']     = 'admin/pemeliharaan/update_form';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'update pemeliharaan'; 
        $isi['users']       = $this->db->get('publick_users')->result();
        $isi['kendaraan']   = $this->kendaraan->getAllKendaraan();   
        $isi['kondisi_kn']  = $this->kendaraan->getKondisi();
        $isi['data']        = $this->pemeliharaan->get_pemeliharaan_by_id($id);
        $this->load->view('pemimpin/index',$isi);
    }
    

    public function save_update() {
        $id = $this->input->post('id');
        $tgl_perbaikan    = strtotime($this->input->post('tgl_perbaikan'));

        $name = "";
        if($_FILES['photo']['name']) {
            if($this->upload('photo', $_FILES['photo']['name'])) {
                $name = $_FILES['photo']['name'];
            } 
        } else {
            $name = $this->input->post('old_foto');
        }
        $data = array(
            'id_kendaraan'      => $this->input->post('kendaraan'),
            'id_users_public'   => $this->input->post('id_user'),
            'tanggal_perbaikan' => date('Y-m-d', $tgl_perbaikan),
            'keterangan'        => $this->input->post('description'),
            'harga_pemeliharaan'=> $this->input->post('biaya'),
            'foto_perbaikan'    => str_replace(' ', '_', $name)
        );

        $this->db->where('id_pemeliharaan', $id);
        $this->db->update('pemeliharaan', $data);
        echo "<script>alert('berhasil update perbaikan kendaraan'); window.location='".base_url()."admin/pemeliharaan'</script>";
     
    }

    public function hapus($id) {
        $this->db->delete('pemeliharaan', array('id_pemeliharaan' => $id));
        echo "<script>alert('berhasil menghapus data perbaikan kendaraan'); window.location='".base_url()."admin/pemeliharaan'</script>";
    }

}
