<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_peralatan_mesin extends CI_Model {

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
	 public function allsub($id)
    {
        return $this->db->where('id_bidang_barang',$id)->get('subbid_barang');
    }
    public function getJumlahBarang($id_sub)
    {
        return $this->db->query("select * from peralatan_mesin where id_subbid_barang='$id_sub' ORDER BY id_peralatan_mesin ASC");
    }
    public function getBaris($id)
    {
        return $this->db->where('id_peralatan_mesin',$id)->get('peralatan_mesin');
    }
}

/* End of file M_tanah.php */
/* Location: ./application/models/M_tanah.php */