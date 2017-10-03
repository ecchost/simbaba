<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bidang_barang extends CI_Model {

	public function getId()
	{
	    $q = $this->db->query("select MAX(id_bidang_barang) as kd_max from bidang_barang");
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
	public function getIDBarang()
	{
	    $q = $this->db->query("select MAX(id_barang) as kd_max from barang");
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
		return $this->db->get('bidang_barang')->result();
	}
	public function countSub($id)
	{
	   return $this->db->where('id_bidang_barang',$id)->get('subbid_barang');
	}
	public function countBarang($id)
	{
	   return $this->db->where('id_subbid_barang',$id)->get('barang')->num_rows();
	}
	public function getNama($id)
	{
	   return $this->db->where('id_bidang_barang',$id)->get('bidang_barang');
	}
	public function getNamaSub($id)
	{
	   return $this->db->where('id_subbid_barang',$id)->get('subbid_barang');
	}
	public function allBarang($id)
	{
	   return $this->db->where('id_subbid_barang',$id)->get('barang');
	}
	 public function loaddataken($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
				 "id_barang"=>$this->M_bidang_barang->getIDBarang(),
				"kode_barang"=>'0'.$dataarray[$i]['kode_barang'],
				"nama_barang"=>$dataarray[$i]['nama_barang'],
				"id_subbid_barang"=>'0'.$dataarray[$i]['sub'],
				"id_bidang_barang"=>'0'.$dataarray[$i]['bidang'],
				"status"=>1,
             );
            $this->db->insert('barang', $data);
        }
    }
    public function getBarang($id1,$id2,$id3)
	{
	   return $this->db->query("select * from barang where id_bidang_barang='$id1' and id_subbid_barang='$id2' and id_barang='$id3'");
	}
}

/* End of file M_bidang.php */
/* Location: ./application/models/M_bidang.php */