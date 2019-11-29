<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model', 'admin');         
        $this->load->helper('url');     
        $this->authSession();
    }       

    private function authSession() {
        if($this->session->userdata('level_user') != 1) {
            redirect('login');
        }
    }

    public function index() {
         $data = array(                     
             'username' => $this->session->userdata('username'),
             'level_user' => $this->session->userdata('level_user')
        );         

        $isi['content']     = 'admin/isi';
        $isi['judul']       = 'Dashboard';         
        $isi['sub_judul']   = 'Home';         
        $isi['data']        = $this->admin->getprofile()->result();
        $isi['statistik']   = array(
            'peminjam'      => $this->admin->peminjamCount(),
            'peminjaman'    => $this->admin->peminjamaanCount(),
            'pemeliharaan'  => $this->admin->pemeliharaanCount(),
            'kendaraan'     =>$this->admin->kendaraanCount(),
            'peminjaman_aktif' => $this->admin->peminjaman_aktif(),
        );
        $this->load->view('admin/index',$isi);
    }       

    public function logout() {
        $this->session->sess_destroy('username');         
        redirect('login');     
    } 

   
    public function hapus($id) {
        $this->db->delete('users', array('id_user' => $id));
        echo "<script>alert('berhasil hapus  data users'); window.location='".base_url()."admin/tambah_user'</script>";
        
    }



   
}