<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	function getBidang(){
		return $this->db->query("select * from bidang_barang")->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */