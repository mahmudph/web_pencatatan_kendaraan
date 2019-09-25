<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model{
	public function check_user($user, $password) {

		$where = array('username' => $user, 'password' => $password);
		$this->db->select('*')->from('users')->where($where);
		return $this->db->get()->row();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */