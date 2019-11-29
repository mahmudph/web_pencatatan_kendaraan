<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Pemeliharaan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Pemeliharaan_model', 'pemeliharaan');    
        $this->load->model('Admin_model', 'admin');   
        $this->load->model('Kendaraan_model', 'kendaraan');  
        $this->load->helper('url');     

        if($this->session->userdata('level_user') != 1) {
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

        $isi['content']     = 'admin/pemeliharaan/index';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'Pemeliharaan'; 
        $isi['users']       = $this->db->get('publick_users')->result();
        $isi['kendaraan']   = $this->kendaraan->getAllKendaraan();   
        $isi['kondisi_kn']  = $this->kendaraan->getKondisi();
        $this->load->view('admin/index',$isi);
    }       

    public function index() {
       $isi['content']     = 'admin/pemeliharaan/content';
       $isi['judul']       = 'Dasboard';         
       $isi['sub_judul']   = 'Pemeliharaan'; 
       $isi['data']        = $this->pemeliharaan->listAllData()->result();
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

    private function checkCheckbox($data) {
        return $data == 'on' ? 1 : 0;
    }

    public function save_pemeliharaan() {

        $check1  = $this->checkCheckbox($this->input->post('checkbox1'));
        $check2  = $this->checkCheckbox($this->input->post('checkbox2'));
        $check3  = $this->checkCheckbox($this->input->post('checkbox3'));
        $lammpu_besar = $this->checkCheckbox($this->input->post('lampu_besar'));
        $check4  = $this->checkCheckbox($this->input->post('checkbox4'));
        $check5  = $this->checkCheckbox($this->input->post('checkbox5'));
        $check6  = $this->checkCheckbox($this->input->post('checkbox6'));
        $check7  = $this->checkCheckbox($this->input->post('checkbox7'));
        $check8  = $this->checkCheckbox($this->input->post('checkbox8'));
        $check9  = $this->checkCheckbox($this->input->post('checkbox9'));
        $check10 = $this->checkCheckbox($this->input->post('checkbox10'));
        $check11 = $this->checkCheckbox($this->input->post('checkbox11'));
        $check12 = $this->checkCheckbox($this->input->post('checkbox12'));
        $check13 = $this->checkCheckbox($this->input->post('checkbox13'));
        $check14 = $this->checkCheckbox($this->input->post('checkbox14'));
        $check15 = $this->checkCheckbox($this->input->post('checkbox15'));
        $check16 = $this->checkCheckbox($this->input->post('checkbox16'));

        $data = array(
            "kaca_depan" => $check1,
            "kaca_spion" => $check2,
            "kipas_kaca" => $check3,
            "lampu_besar_dim" => $lammpu_besar,
            "lampu_kecil_sen_mobil" => $check4,
            "baut_mur_roda" => $check5,
            "ban_kodisi_tekanan" => $check6,
            "per_baut_u_mur" => $check7,
            "tali_kipas" => $check8,
            "tanki_solar" => $check9,
            "kabel" => $check10,
            "permukaan_oli_mesin" => $check11,
           "permukaan_air_radiator" => $check12,
            "permukaan_oli_stir" => $check13,
            "permukaan_oli_transmisi" => $check14,
            "accu_air_kabel"  => $check15,
            "pembersi_saringan" => $check16
        );


        $this->db->insert('keliling_bawah_kendaraan', $data);
        $id_input_kel_bawah = $this->db->insert_id();


        /* end data pertama */


        $check17 = $this->checkCheckbox($this->input->post('checkbox17'));
        $check18 = $this->checkCheckbox($this->input->post('checkbox18'));
        $check19 = $this->checkCheckbox($this->input->post('checkbox19'));
        $check20 = $this->checkCheckbox($this->input->post('checkbox20'));
        $check21 = $this->checkCheckbox($this->input->post('checkbox21'));
        $check22 = $this->checkCheckbox($this->input->post('checkbox22'));
        $check23 = $this->checkCheckbox($this->input->post('checkbox23'));
        $check24 = $this->checkCheckbox($this->input->post('checkbox24'));
        $check25 = $this->checkCheckbox($this->input->post('checkbox25'));

        $data = array(
            "lampu_control_oli_mesin" => $check17,
            "control_lampu_besar" => $check18,
            "control_lampu_seri" => $check19,
            "solar_volume_tanki" => $check20,
            "hight_low_switch" => $check21,
            "pedal_gas" => $check22,
            "pedal_persneling" => $check23,
            "handle_persneling" => $check24,
            "seat_belt" => $check25
        );

        $this->db->insert('tbl_dalam_kabin', $data);
        $id_input_kabin = $this->db->insert_id();



        /* end data kedua */
        $check26 = $this->checkCheckbox($this->input->post('checkbox26'));
        $check27 = $this->checkCheckbox($this->input->post('checkbox27'));
        $check28 = $this->checkCheckbox($this->input->post('checkbox28'));
        $check29 = $this->checkCheckbox($this->input->post('checkbox29'));
        $check30 =$this->checkCheckbox($this->input->post('checkbox30'));
        $check31 = $this->checkCheckbox($this->input->post('checkbox31'));

        $data = array(
            "stir" => $check26,
            "rem_kaki" => $check27,
            "rem_emergency" => $check28,
            "spedometer" => $check29,
            "gigi_perseneling" => $check30,
            "r_p_m" => $check31
        );

        
        $this->db->insert('tbl_kend_jalan', $data);
        $id_input_kel = $this->db->insert_id();

        //* end of tbl kendaaan alan*/

        /* peralatan toolst */
        $check32 = $this->checkCheckbox($this->input->post('checkbox32'));
        $check33 = $this->checkCheckbox($this->input->post('checkbox33'));
        $check34 = $this->checkCheckbox($this->input->post('checkbox34'));
        $check35 = $this->checkCheckbox($this->input->post('checkbox35'));
        $check36 = $this->checkCheckbox($this->input->post('checkbox36'));
        $check37 = $this->checkCheckbox($this->input->post('checkbox37'));
        $check38 = $this->checkCheckbox($this->input->post('checkbox38'));

        $data = array(
                "dongkrak_kursi_roda" => $check32,
                "tringjar" => $check33,
                "chein" => $check34,
                "chain_bandle" => $check35,
                "pemadam_api" => $check36,
                "ban_sarep" => $check37,
                "p3k" => $check38
        );

        $this->db->insert('tbl_peralatan_tools', $data);
        $id_tbl_tools = $this->db->insert_id();



        $check39 = $this->checkCheckbox($this->input->post('checkbox39'));
        $check40 = $this->checkCheckbox($this->input->post('checkbox40'));
        $check41 = $this->checkCheckbox($this->input->post('checkbox41'));
        $check42 = $this->checkCheckbox($this->input->post('checkbox42'));
        $check43 = $this->checkCheckbox($this->input->post('checkbox43'));


        $data = array(
            "cuci_luar" => $check39,
            "cuci_dalam" => $check40,
            "cuci_bawah" => $check41,
            "cuci_keseluruhan" => $check42,
            "pemadam_api" => $check43,
        );

        $this->db->insert('kebersihan_kendaraan', $data);
        $id_tbl_kebersihan = $this->db->insert_id();




        $tgl_perbaikan    = strtotime($this->input->post('tgl_perbaikan'));
        $data = array(
            "id_kendaraan"      => $this->input->post('kendaraan'),
            "id_users_public"   => $this->input->post('id_user'),
            "tanggal_perbaikan" => date('Y-m-d', $tgl_perbaikan),
            "keterangan"        => $this->input->post('description'),
            "harga_pemeliharaan"=> $this->input->post('biaya'),
            "id_kebersihan_ken" => $id_tbl_kebersihan,
            "id_keliling_bawah" => $id_input_kel_bawah,
            "id_peralana_tools" => $id_tbl_tools,
            "id_dalam_kabin" => $id_input_kabin,
            "id_kend_jalan" => $id_input_kel
        );

        $this->db->insert('pemeliharaan', $data);
        echo "<script>alert('berhasil menambahkan perbaikan kendaraan'); window.location='".base_url()."admin/pemeliharaan'</script>";

    }


    public function update($id) {
        $isi['content']     = 'admin/pemeliharaan/update_form';
        $isi['judul']       = 'Dasboard';         
        $isi['sub_judul']   = 'update pemeliharaan'; 
        $isi['users']       = $this->db->get('publick_users')->result();
        $isi['kendaraan']   = $this->kendaraan->getAllKendaraan();   
        $isi['kondisi_kn']  = $this->kendaraan->getKondisi();
        $isi['data']        = $this->pemeliharaan->get_pemeliharaan_by_id($id);
        $this->load->view('admin/index',$isi);
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
