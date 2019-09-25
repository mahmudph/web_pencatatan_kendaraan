<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		
		$this->load->model('Users', 'user');
		$this->check_sesion(
			$this->session->userdata('username'),
			$this->session->userdata('level_user')
		);
	}
 	

 	
	public function index(){
		$this->load->view('login');


	}
 
	# login process here 
	public function login_process(){
		$username 		= $this->input->post('username');
		$password 		= md5($this->input->post('password'));

		$result = $this->user->check_user($username, $password); 

		if($result){

			$newdata = array(
		        'id_user'  		=> $result->id_user,
		        'username' 		=> $result->username,
		        'level_user'	=> $result->type_user,
		        'logged_in' 	=> TRUE
			);
			
			$this->session->set_userdata($newdata);
			$this->check_sesion( $this->session->userdata('username'), $this->session->userdata('level_user'));

		}else {
			?>
			<script type="text/javascript">alert("Maaf nama atau password anda salah."); window.location.href="<?php echo base_url();?>login"</script> <?php
		}
	}

	# validation user session
	function check_sesion($user_name_session,$level_user) {
		if($user_name_session) {
			switch ($level_user) {
				case '1':
					redirect('admin/');
					break;
				case '2':
					redirect('pemimpin/');
					break;
			}
		}
	}
}
