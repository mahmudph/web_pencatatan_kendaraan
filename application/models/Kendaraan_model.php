<?php 
class Kendaraan_model extends CI_Model{
 
	public function __construct(){
		parent::__construct();	
	}
	
	public function getAllKendaraan() {
		return $this->db->get('kendaraan')->result();
	}
	
	public function getKondisi() {
		return $this->db->get('kondisi_kendaraan')->result();
	}

	public function showlist() {
		$this->db->select('*')->from('kendaraan');
        $this->db->join('type_kendaraan', 'type_kendaraan.id_type=kendaraan.id_type_kendaraan');
        $this->db->join('kondisi_kendaraan', 'kondisi_kendaraan.id_kondisi=kendaraan.id_kondisi');
		return $this->db->get();
	}

	public function typekendaraan() {
		return $this->db->get('type_kendaraan')->result();
	}


	public function kondisikendaraan() {
		return $this->db->get('kondisi_kendaraan')->result();
	}

	public function simpandata($data) {
		return $this->db->insert('kendaraan', $data);
	}

	public function hapus($id) {
		return $this->db->delete('kendaraan', array('id_kendaraan' => $id));
	}

	public function edit_save($id, $data) {
		$this->db->where('id_kendaraan', $id);
		$data = $this->db->update('kendaraan', $data);
		return $data;
	}

	public function get_where($id) {
		return $this->db->get_where('kendaraan', array('id_kendaraan' => $id))->row();
	}

	public function history_pinjam($id) {
		$this->db->select('*')->from('peminjaman');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan=peminjaman.id_kendaraan');
		$this->db->join('publick_users', 'publick_users.id_users_public=peminjaman.id_users_public');
		$this->db->where(array('kendaraan.id_kendaraan' =>$id ));
		return $this->db->get();
	}


	public function get_kendaraan_free() {
		/*  status 1 sama dengan digunakan
			status 0 sama dengan tidak dipakai atau tidak digunakan
		*/
		return $this->db->get_where('kendaraan', array('status' => 0));
	}


	public function count_pinjam($id) {
		/*  
			count all pmeinjaman dengan menggunakan kendaraan ini 
			menghitung jumlah  peminjaman dengan month 
			jumlah peminjaman dalam satu bulan 
		*/

		$this->db->select('id_kendaraan, COUNT(id_kendaraan) as total,MONTH(tgl_pemakaian) as bulan');
		$this->db->from('peminjaman');
		$this->db->where('id_kendaraan', $id);
		$this->db->where(
			'YEAR(tgl_pemakaian)', 'YEAR(CURRENT_TIMESTAMP)', FALSE
		);
		$this->db->group_by(array('id_kendaraan','bulan'));
		return $this->db->get()->result();
	}

	public function count_perbaikan($id) {
		$this->db->select('COUNT(id_kendaraan) as total, MONTH(tanggal_perbaikan) as bulan');
		$this->db->from('pemeliharaan');
		$this->db->where('id_kendaraan', $id);
		$this->db->where(
			'YEAR(tanggal_perbaikan)', 'YEAR(CURRENT_TIMESTAMP)', FALSE
		);
		$this->db->group_by(array('bulan','id_kendaraan'));
		return $this->db->get()->result();
	}
}