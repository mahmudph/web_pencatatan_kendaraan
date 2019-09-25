<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Theme {

	protected $CI;
	
	// We'll use a constructor, as you can't directly call a function
	// from a property definition.
	public function __construct()
	{
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
	}

	public function content($content, $data)
	{
		$data['content']=$content;
		$this->CI->load->view('base/content.php', $data);
	}

	public function admin($content, $data)
	{
		$data['content']=$content;
		$this->CI->load->view('base/content_admin.php', $data);
	}

}