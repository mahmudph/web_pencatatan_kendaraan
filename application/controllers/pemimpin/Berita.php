<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Berita extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model', 'admin');       
        $this->load->model('Kendaraan_model', 'kendaraan');  
        $this->load->helper('url');     
        if($this->session->userdata('level_user') != 2) {
            redirect('login');
        }
    }

    public function kendaran_aktif() {
        $this->db->select('*')->from('peminjaman PJ');
		$this->db->join('kendaraan KD', 'KD.id_kendaraan=PJ.id_kendaraan');
		$this->db->join('publick_users Usr', 'Usr.id_users_public=PJ.id_users_public');
        $this->db->where('PJ.status_kembali', 0);    
        $data = $this->db->get()->result();

        $isi['content']     = 'admin/berita';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Peminjam';  
        $isi['data']        = $data;
        $this->load->view('pemimpin/index',$isi);
    }

    public function statistik_kendaraan() {
        $isi['content']     = 'pemimpin/pemantauan/berita/content_kendaraan';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Kendaraan';   
        $isi['data']        = $this->kendaraan->showlist()->result();
        $this->load->view('pemimpin/index',$isi);
    }

    public function show($id) {
        $isi['content']     = 'pemimpin/pemantauan/kendaraan/index';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Kendaraan';      
        $isi['his_pinjam']  = $this->kendaraan->history_pinjam($id);
        $isi['perbaikan']   = $this->db->get_where('pemeliharaan', array('id_kendaraan' => $id))->result();
        $isi['cn_peminjaman'] = $this->kendaraan->count_pinjam($id);
        $isi['cn_pemeliharaan'] = $this->kendaraan->count_perbaikan($id);
        $this->load->view('pemimpin/index',$isi);
    }

  /*  public function kendaran_berakhir() {
        $this->db->select('*')->from('peminjaman PJ');
		$this->db->join('kendaraan KD', 'KD.id_kendaraan=PJ.id_kendaraan');
		$this->db->join('publick_users Usr', 'Usr.id_users_public=PJ.id_users_public');
        $this->db->where('PJ.tanggal_kembali <', date('Y-m-d'));
    
        $isi['content']     = 'pemimpin/pemantauan/berita/kendaraan_berakhir';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'peminjaman berakhir';  
        $isi['data']        = $this->db->get()->result();
        $this->load->view('pemimpin/index',$isi);
    }*/

}