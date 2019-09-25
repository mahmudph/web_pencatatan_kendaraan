<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Pegawai extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Peminjam_model', 'peminjam');  
        $this->load->model('Admin_model', 'admin');   
        $this->load->helper('url');  
        if($this->session->userdata('level_user') != 2) {
            redirect('login');
        }   
    }       
    public function tambah() {
        $isi['content']     = 'pemimpin/pemantauan/pegawai/index';
        $isi['judul']       = 'Dasboard';            
        $isi['sub_judul']   = 'Peminjam';         
        $this->load->view('pemimpin/index',$isi);
    }       

    
    public function index() {
        $isi['content']     = 'pemimpin/pemantauan/pegawai/content';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Peminjam';  
        $isi['datas']        = $this->peminjam->showlistPeminjam()->result();

        $this->load->view('pemimpin/index',$isi);
    }   

    public function add_data() {

        /* upload foto */
        $this->upload('photo', $_FILES['photo']['name']);    
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'nip'       => $this->input->post('nip'),
            'id_gender' => $this->input->post('gender'),
            'umur'      => $this->input->post('umur'),
            'alamat'    => $this->input->post('alamat'),
            'foto'      => str_replace(' ', '_', $_FILES['photo']['name'])

        );

        $this->db->insert('publick_users', $data);
        echo "<script>alert('berhasil menambah  data pegawai'); window.location='".base_url()."admin/peminjam'</script>";

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

    public function update($id) {
        $isi['content']     = 'pemimpin/pemantauan/pegawai/update';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Pegawai';  
        $isi['data']        = $this->db->get_where('publick_users', array('id_users_public' => $id))->row();
        $this->load->view('admin/index', $isi);
    }

    public function edit_simpan() {
        $id  = $this->input->post('id');

        $name = "";
        if($_FILES['photo']['name']) {
            if($this->upload('photo', $_FILES['photo']['name'])) {
                $name = $_FILES['photo']['name'];
            } 
        } else {
            $name = $this->input->post('old_foto');
        }

        $data = array(
            'nama_user' => $this->input->post('nama'),
            'nip'       => $this->input->post('nip'),
            'id_gender' => $this->input->post('gender'),
            'umur'      => $this->input->post('umur'),
            'alamat'    => $this->input->post('alamat'),
            'foto'      => str_replace(' ', '_', $name)
        );

        $this->db->where(array('id_users_public' => $id));
        $this->db->update('publick_users', $data);

        echo "<script>alert('berhasil edit  data pegawai'); window.location='".base_url()."admin/pegawai'</script>";
    }

    public function hapus($id) {
        $this->db->delete('publick_users', array('id_users_public' => $id));
        echo "<script>alert('berhasil hapus  data pegawai'); window.location='".base_url()."admin/pegawai'</script>";
    }

}
