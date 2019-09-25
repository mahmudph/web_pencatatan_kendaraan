<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model', 'admin');         
        $this->load->helper('url');     
        $this->authSession();
    }       

    private function authSession() {
        if($this->session->userdata('level_user') != 2) {
            redirect('login');
        }
    }

    public function index() {
         $data = array(                     
             'username' => $this->session->userdata('username'),
             'level_user' => $this->session->userdata('level_user')
        );         

        $isi['content']     = 'pemimpin/isi';
        $isi['judul']       = 'Dashboard';         
        $isi['sub_judul']   = 'Home';         
        $isi['data']        = $this->admin->getprofile()->result();
        $isi['statistik']   = array(
            'peminjam'      => $this->admin->peminjamCount(),
            'peminjaman'    => $this->admin->peminjamaanCount(),
            'pemeliharaan'  => $this->admin->pemeliharaanCount(),
            'kendaraan'     => $this->admin->kendaraanCount(),
            'peminjaman_aktif' => $this->admin->peminjaman_aktif(),

        );

        $isi['cn_peminjaman']   = $this->admin->static_peminjaman_count();
        $isi['cn_pemeliharaan'] = $this->admin->static_perbaikan_count();
        $isi['jmlh_meminjam']   = $this->admin->get_count_meminjam();
        $this->load->view('pemimpin/index',$isi);
    }       

    public function logout() {
        $this->session->sess_destroy();         
        redirect('login');     
    } 

     public function tambah_user() {
        $isi['content']     = 'admin/pengguna_apps/index';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'tambah pengguna';  
        $this->load->view('pemimpin/index',$isi);
    }


     public function add_user_save() {

        if($this->input->post('password') == $this->input->post('cn_password')) {
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $tipe     = $this->input->post('tipe');
            $cn_password = $this->input->post('cn_password');

            /*  */
            $data = array(
                'id_jabatan' => $tipe,
                'username'   => $username,
                'password'   => md5($password),
                'email'      => $email,
                'foto'       => 'avatar.png',
                'type_user'  => $tipe
            );

            $this->db->insert('users', $data);
            echo "<script>alert('berhasil menambah  data users'); window.location='".base_url()."admin/tambah_user'</script>";
        } else {
            echo "<script>alert('password tidak sama'); window.location='".base_url()."admin/tambah_user'</script>";
        }


    }
}