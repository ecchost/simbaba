<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_merk extends CI_Model {

	public function getId()
    {
        $q = $this->db->query("select MAX(id_merk) as kd_max from merk");
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
        return $this->db->get('merk');

    }
    public function allak()
	{
		return $this->db->where('status',1)->get('merk');

	}
    public function cekid($id)
    {
        return $this->db->where('id_merk', $id)->get('merk');
    }
    public function update_proses($info,$id)
    {
        $this->db->where('id_merk', $id);
        $this->db->update('merk', $info);
    }
}

/* End of file M_merk.php */
/* Location: ./application/models/M_merk.php */