<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_aset extends CI_Model {
	public function getCount($id)
    {
        return $this->db->where('id_subbid_barang', $id)->get('aset');
    }
     public function cekid($id)
    {
        return $this->db->where('id_aset', $id)->get('aset');
    }
}

/* End of file M_aset.php */
/* Location: ./application/models/M_aset.php */