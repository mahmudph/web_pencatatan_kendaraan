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
		$this->db->where('id_pemeliharaan', $id);
		return $this->db->get()->row();
	}
	
}