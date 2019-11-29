<?php 
class Pemeliharaan_model extends CI_Model{
 
	public function __construct(){
		parent::__construct();	
	}
 
	
	public function listAllData() {
		$this->db->select('*')->from('pemeliharaan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan=pemeliharaan.id_kendaraan');
		$this->db->join('publick_users', 'publick_users.id_users_public=pemeliharaan.id_users_public');
		$this->db->join('type_kendaraan', 'type_kendaraan.id_type=kendaraan.id_type_kendaraan');
		$this->db->join('kondisi_kendaraan', 'kondisi_kendaraan.id_kondisi=kendaraan.id_kondisi');
		return $this->db->get();
	}

	public function get_pemeliharaan_by_id($id) {
		$this->db->select('*')->from('pemeliharaan');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan=pemeliharaan.id_kendaraan');
		$this->db->join('publick_users', 'publick_users.id_users_public=pemeliharaan.id_users_public');
		$this->db->join('kondisi_kendaraan', 'kondisi_kendaraan.id_kondisi=kendaraan.id_kondisi');

		$this->db->join('kebersihan_kendaraan', 'kebersihan_kendaraan.id=pemeliharaan.id_kebersihan_ken');
		$this->db->join('keliling_bawah_kendaraan', 'keliling_bawah_kendaraan.id=pemeliharaan.id_keliling_bawah');
		$this->db->join('tbl_peralatan_tools', 'tbl_peralatan_tools.id=pemeliharaan.id_peralana_tools');
		$this->db->join('tbl_dalam_kabin', 'tbl_dalam_kabin.id=pemeliharaan.id_dalam_kabin');
		$this->db->join('tbl_kend_jalan', 'tbl_kend_jalan.id=pemeliharaan.id_kend_jalan');
		$this->db->where('id_pemeliharaan', $id);
		return $this->db->get()->row();
	}
	
}