<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Peminjamaan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Peminjaman_model', 'peminjaman');         
        $this->load->model('Admin_model', 'admin');  
        $this->load->model('Peminjam_model', 'peminjam');
        $this->load->model('Kendaraan_model', 'kendaraan');
        $this->load->helper('url');   
        
        if($this->session->userdata('level_user') != 1) {
            redirect('login');
        }   
    }       
    public function tambah() {
        $isi['content']     = 'admin/peminjaman/index';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Peminjamaan'; 
               
       $this->load->view('admin/index',$isi);
   }       
    
    private function checkKendaraanData() {
        if($this->admin->kendaraanCount() < 1 ) {
            echo "<script>alert('data kendaraan kosong!'); window.location='".base_url()."admin/kendaraan/tambah'</script>";
            exit;
        }
    }

    public function add_data() {
        $time_pinjam    = strtotime($this->input->post('tgl_pinjam'));
        $time_kembali   = strtotime($this->input->post('tgl_kembali'));

        $data = array(
            'id_kendaraan'      => $this->input->post('kendaraan'),
            'id_users_public'   => $this->input->post('users'),
            'tgl_pemakaian'     => date('Y-m-d', $time_pinjam),
            'tanggal_kembali'   => date('Y-m-d', $time_kembali),
            'keterangan'        => $this->input->post('keterangan'),

        );

        $this->db->insert('peminjaman', $data);


        /*  ganti status kendaraan menjadi dipakai */
        $this->db->where(array('id_kendaraan' => $this->input->post('kendaraan') ));
        $this->db->update('kendaraan', array('status'=> 1)); // dipinjam

        /* respons to the user page  */
        echo "<script>alert('tambah pemijam kendaraan berhasil');</script>";
        echo "<script>window.location='".base_url('admin/berita')."'</script>";
    }

    public function index() {
        $isi['content']     = 'admin/peminjaman/content';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Riwayat Peminjamaan';         
        $isi['data']        = $this->peminjaman->showallpeminjaman()->result();
        $this->load->view('admin/index',$isi);
    }   

    public function save_pemeliharaan() {
        $time_pinjam    = strtotime($this->input->post('tgl_pinjam'));
        $time_kembali   = strtotime($this->input->post('tgl_kembali'));

        $data = array(
            'id_kendaraan'      => $this->input->post('kendaraan'),
            'id_users_public'   => $this->input->post('users'),
            'tgl_pemakaian'     => date('Y-m-d', $time_pinjam),
            'tanggal_kembali'   => date('Y-m-d', $time_kembali),
            'keterangan'        => $this->input->post('keterangan'),

        );

        $this->db->where('id_peminjaman', $this->input->post('id'));
        $this->db->update('peminjaman', $data);
       
        /* respons to the user page  */
        echo "<script>alert('update pemijam kendaraan berhasil');</script>";
        echo "<script>window.location='".base_url('admin/peminjamaan')."'</script>";
    }

    public function update($id) {
        $isi['content']     = 'admin/peminjaman/update';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Update Peminjamaan';         
        $isi['data']        = $this->peminjaman->get_karyawan_peminjam($id);
        $this->load->view('admin/index',$isi);
    }

    public function hapus($id) {
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('peminjaman');
        echo "<script>alert('hapus data pemeliharaan berhasil');</script>";
        echo "<script>window.location='".base_url('admin/peminjamaan')."'</script>";
    }

    public function kembali($id) {
        $isi['content']      = 'admin/pengembalian/index';
        $isi['judul']        = 'Dasboard';         
        $isi['sub_judul']    = 'pengembalian kendaraan';      
        $isi['kendaraan']    = $this->peminjaman->kendaraan_kembali($id);
       $this->load->view('admin/index',$isi);
    }

    public function save_kembali() {    
        $id     = $this->input->post('id_peminjaman');
        $id_ken = $this->input->post('id_kendaraan');

        $this->db->query("update peminjaman set status_kembali='1' where id_peminjaman='$id'");
        $this->db->query("update kendaraan set status='0' where id_kendaraan='$id_ken'");        
        

        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE )
        {
            echo "<script>alert('pengembalian kendaraan gagal');</script>";
            echo "<script>window.location='".base_url('admin/berita')."'</script>";
        } else {
            $this->db->trans_commit();
            echo "<script>alert('pengembalian kendaraan berhasil');</script>";
            echo "<script>window.location='".base_url('admin/berita')."'</script>";
        }

        
    }
}
