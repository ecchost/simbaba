<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tanah extends CI_Model {

	public function getId()
    {
        $q = $this->db->query("select MAX(id_tanah) as kd_max from tanah");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd;
    }
	public function all()
    {
        return $this->db->get('tanah');

    }
    public function allsub($id)
    {
        return $this->db->where('id_bidang_barang',$id)->get('subbid_barang');
    }
    public function allbar()
	{
		return $this->db->get('tanah');
	}
    public function getJumlahBarang($id)
    {
        return $this->db->where('id_subbid_barang',$id)->get('tanah');
    }
    public function cekid($id)
    {
        return $this->db->where('id_tanah', $id)->get('tanah');
    }
    public function getBaris($id)
    {
        return $this->db->where('id_tanah', $id)->get('tanah');
    }
    public function getSubBidang($id)
    {
        return $this->db->where('id_bidang_barang', $id)->get('subbid_barang');
    }
    public function getBarang($id)
    {
        return $this->db->where('id_subbid_barang', $id)->get('barang');
    }
    public function getpeg($id)
    {
        return $this->db->where('id_pegawai', $id)->get('pegawai');
    }
}

/* End of file M_tanah.php */
/* Location: ./application/models/M_tanah.php */