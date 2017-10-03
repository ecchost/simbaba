<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_irigasi extends CI_Model {
	public function getCount($id)
    {
        return $this->db->where('id_subbid_barang', $id)->get('irigasi');
    }
     public function allbar()
    {
        return $this->db->get('irigasi');
    }
     public function cekid($id)
    {
        return $this->db->where('id_irigasi', $id)->get('irigasi');
    }
}

/* End of file M_irigasi.php */
/* Location: ./application/models/M_irigasi.php */