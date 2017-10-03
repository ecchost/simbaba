<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_gedung_bangunan extends CI_Model {
	public function all()
    {
        return $this->db->get('bangunan');

    }
    public function allsub($id)
    {
        return $this->db->where('id_bidang_barang',$id)->get('subbid_barang');
    }
    public function allbar()
    {
        return $this->db->get('bangunan');
    }
    public function allbarang($id)
	{
		return $this->db->where('id_bangunan',$id)->get('bangunan');
	}
    public function cekid($id)
    {
        return $this->db->where('id_bangunan', $id)->get('bangunan');
    }
    public function getCount($id)
    {
        return $this->db->where('id_subbid_barang', $id)->get('bangunan');
    }
    public function update_proses($info,$id)
    {
        $this->db->where('id_bangunan', $id);
        $this->db->update('bangunan', $info);
    }
    
    public function getbarang($id)
    {
        return $this->db->where('id_barang', $id)->get('barang');
    }
}

/* End of file M_gedung_bangunan.php */
/* Location: ./application/models/M_gedung_bangunan.php */