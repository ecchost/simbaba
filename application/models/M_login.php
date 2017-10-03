<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function check($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		return $this->db->get('admin');

	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */