<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lokasi extends CI_Model {

	public function getId()
    {
        $q = $this->db->query("select MAX(id_lokasi) as kd_max from lokasi");
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
            $kd = "00001";
        }
        return $kd;
    }
	public function all()
	{
		return $this->db->get('lokasi');

	}
    public function cekid($id)
    {
        return $this->db->where('id_lokasi', $id)->get('lokasi');
    }
    public function update_proses($info,$id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $info);
    }
}

/* End of file M_lokasi.php */
/* Location: ./application/models/M_lokasi.php */