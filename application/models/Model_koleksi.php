<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_koleksi extends CI_Model{
	function tampil_data(){
		return $this->db->get('a_tbljenis');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}

	function edit_data($where){		
		// return $this->db->get_where($table,$where);
		$id = $where['idbarang'];
		$query = "SELECT A.*, B.nmjenis,C.nmmerk FROM b_tblbarang A INNER JOIN a_tbljenis B ON A.idjenis=B.idjenis INNER JOIN a_tblmerk C ON A.idmerk=C.idmerk WHERE A.idbarang=$id"; 
		$data = $this->db->query($query) or die($query);
		return $data;
		// print($query);
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function get_ktgori(){
		$query = "SELECT A.*, B.nmjenis,C.nmmerk FROM b_tblbarang A INNER JOIN a_tbljenis B ON A.idjenis=B.idjenis INNER JOIN a_tblmerk C ON A.idmerk=C.idmerk" ;
		return $this->db->query($query);

		}	
	function get_ktgori1(){
		return $this->db->get('a_tblkategori');
		}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */