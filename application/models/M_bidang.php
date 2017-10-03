<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bidang extends CI_Model {

	public function getId()
	{
	    $q = $this->db->query("select MAX(id_bidang) as kd_max from bidang");
	    $kd = "";
	    if($q->num_rows()>0)
	    {
	        foreach($q->result() as $k)
	        {
	            $tmp = ((int)$k->kd_max)+1;
	            $kd = sprintf("%02s", $tmp);
	        }
	    }
	    else
	    {
	        $kd = "01";
	    }
	    return $kd;
	}
	public function getIdSub()
	{
	    $q = $this->db->query("select MAX(id_subbid) as kd_max from subbid");
	    $kd = "";
	    if($q->num_rows()>0)
	    {
	        foreach($q->result() as $k)
	        {
	            $tmp = ((int)$k->kd_max)+1;
	            $kd = sprintf("%02s", $tmp);
	        }
	    }
	    else
	    {
	        $kd = "01";
	    }
	    return $kd;
	}
	public function all()
	{
		return $this->db->get('bidang')->result();
	}
	public function countSub($id)
	{
	   return $this->db->where('id_bidang',$id)->get('subbid');
	}
	public function getNama($id)
	{
	   return $this->db->where('id_bidang',$id)->get('bidang');
	}
	public function getLokasi($id){
		return $this->db->query("select * from lokasi_subbid,lokasi 
						where lokasi.id_lokasi=lokasi_subbid.id_lokasi
						and lokasi_subbid.id_subbid='$id'");
	}
}

/* End of file M_bidang.php */
/* Location: ./application/models/M_bidang.php */