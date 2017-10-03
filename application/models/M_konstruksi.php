<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_konstruksi extends CI_Model {
	public function getCount()
    {
        return $this->db->get('konstruksi');
    }
     public function cekid($id)
    {
        return $this->db->where('id_konstruksi', $id)->get('konstruksi');
    }
}

/* End of file M_konstruksi.php */
/* Location: ./application/models/M_konstruksi.php */