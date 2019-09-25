<?php 
class Peminjaman_model extends CI_Model{
 
	public function __construct(){
		parent::__construct();	
	}
 
	
	public function showallpeminjaman() {
		$this->db->select('*')->from('peminjaman');
        $this->db->join('kendaraan', 'kendaraan.id_kendaraan=peminjaman.id_kendaraan');
        $this->db->join('publick_users', 'peminjaman.id_users_public=publick_users.id_users_public');
        $this->db->where('peminjaman.status_kembali', 1); // logs seluruh kendaraan yang sudh dikembalikan 
		return $this->db->get();
	}

	public function get_karyawan_peminjam($id) {
		$this->db->select('*')->from('peminjaman PJ');
		$this->db->join('kendaraan KD', 'KD.id_kendaraan=PJ.id_kendaraan');
		$this->db->join('publick_users Usr', 'Usr.id_users_public=PJ.id_users_public');
		$this->db->where(array('PJ.id_peminjaman' => $id));
		return $this->db->get()->row();
	}
	public function kendaraan_kembali($id) {
		$this->db->select('*')->from('peminjaman');
		$this->db->join('kendaraan', 'peminjaman.id_kendaraan=kendaraan.id_kendaraan');
		$this->db->join('publick_users user', 'user.id_users_public=peminjaman.id_users_public');
		$this->db->where(
			array(
				'peminjaman.status_kembali' => 0,
				'peminjaman.id_peminjaman' => $id
			)
		);
		return $this->db->get()->result();
	}


}