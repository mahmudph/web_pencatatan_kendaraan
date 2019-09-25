<?php 
class Peminjam_model extends CI_Model{
 
	public function __construct(){
		parent::__construct();	
	}
 
	
	public function showlistPeminjam() {
		$this->db->select('*')->from('publick_users');
        $this->db->join('gender', 'gender.id_gender=publick_users.id_gender');
		return $this->db->get();
	}

	public function getUserKaryawan() {
		/* menampilkan karyawan atau pegawai yang akan menggunakan mobil kantor */
		return $this->db->get('publick_users')->result();
	}

	
}