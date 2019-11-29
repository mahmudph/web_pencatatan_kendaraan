<?php 
class Admin_model extends CI_Model{
 
	public function __construct(){
		parent::__construct();	
	}
 
	public function check_user($username, $password) {
		$query = $this->db->query("select * from tbl_user where username='$username' AND password='$password' limit 1");
		return $query;
	}

	public function getprofile() {
		$id 	= $this->session->userdata('id_user');
		$this->db->select('*')->from('users');
		$this->db->where('id_user', $id);
		$this->db->join('jabatan', 'users.id_jabatan=jabatan.id_jabatan');
		return $this->db->get();
	}

	public function peminjamCount() {
		$this->db->from('publick_users');
		return $this->db->count_all_results();
	}
	public function peminjamaanCount() {
		$this->db->from('peminjaman');
		return $this->db->count_all_results();
	}
	public function pemeliharaanCount() {
		$this->db->from('pemeliharaan');
		return $this->db->count_all_results();
	}
	public function kendaraanCount() {
		$this->db->from('kendaraan');
		return $this->db->count_all_results();
	}

	public function getUsers() {
		return $this->db->get('users')->result();
	}


	public function peminjaman_aktif() {

        
        $this->db->select('*')->from('peminjaman PJ')
;		$this->db->join('kendaraan KD', 'KD.id_kendaraan=PJ.id_kendaraan');
		$this->db->join('publick_users Usr', 'Usr.id_users_public=PJ.id_users_public');
        $this->db->where('PJ.status_kembali', 0);
    
        $data = $this->db->get()->num_rows();
        return $data;

	}

	public function static_peminjaman_count() {
		$this->db->select('COUNT(id_peminjaman) as total,tgl_pemakaian, MONTH(tgl_pemakaian) as bulan');
		$this->db->from('peminjaman');
		$this->db->where(
			'YEAR(tgl_pemakaian)', 'YEAR(CURRENT_TIMESTAMP)', FALSE
		);
		$this->db->group_by(array('bulan'));
		return $this->db->get()->result();
	}

	public function static_perbaikan_count() {
		/*  
			count all pmeinjaman dengan menggunakan kendaraan ini 
			menghitung jumlah  peminjaman dengan month 
			jumlah peminjaman dalam satu bulan 
		*/

		$this->db->select('id_pemeliharaan,tanggal_perbaikan, COUNT(id_pemeliharaan) as total,MONTH(tanggal_perbaikan) as bulan');
		$this->db->from('pemeliharaan');
		$this->db->group_by(array('bulan'));
		$this->db->where(
			'YEAR(tanggal_perbaikan)', 'YEAR(CURRENT_TIMESTAMP)', FALSE
		);
		return $this->db->get()->result();
	}

	public function get_count_meminjam() {
		$this->db->select('publick_users.nama_user as nama_user, count(peminjaman.id_users_public) as total, MONTH(peminjaman.tgl_pemakaian) AS bulan, YEAR(peminjaman.tgl_pemakaian) AS year');
		$this->db->from('peminjaman');
		$this->db->group_by('peminjaman.id_users_public', 'bulan');
		$this->db->join('publick_users', 'publick_users.id_users_public=peminjaman.id_users_public');
		$this->db->where(
			'YEAR(peminjaman.tgl_pemakaian)', 'YEAR(CURRENT_TIMESTAMP)', FALSE
		);
		$this->db->order_by('bulan', 'ACS');
		$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function bridge_info() {
		$this->db->select('*')->from('peminjaman PJ');
		$this->db->join('kendaraan KD', 'KD.id_kendaraan=PJ.id_kendaraan');
		$this->db->join('publick_users Usr', 'Usr.id_users_public=PJ.id_users_public');
         $this->db->where('PJ.status_kembali', 1);
		return $this->db->get()->num_rows();
	}
}