<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Berita extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model', 'admin');         
        $this->load->helper('url');  
        if($this->session->userdata('level_user') != 1) {
            redirect('login');
        }   
    }

    public function index() {

        
        $this->db->select('*')->from('peminjaman PJ')
;		$this->db->join('kendaraan KD', 'KD.id_kendaraan=PJ.id_kendaraan');
		$this->db->join('publick_users Usr', 'Usr.id_users_public=PJ.id_users_public');
        $this->db->where('PJ.status_kembali', 0);
    
        $data = $this->db->get()->result();

        $isi['content']     = 'admin/berita';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Peminjam';  
        $isi['data']        = $data;
        $this->load->view('admin/index',$isi);
    }

}