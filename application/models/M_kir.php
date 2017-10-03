<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kir extends CI_Model {
	function getAll(){
		return $this->db->get('lokasi');
	}

	function ekspor(){
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$lokasi=$this->input->post('lokasi');
		if($bulan!=""){
			$and="AND MID(peralatan_mesin.tanggal,4,2)='$bulan'";
		}else{
			$and="";
		}
		if($tahun!=""){
			$and1="AND RIGHT(peralatan_mesin.tanggal,4)='$tahun'";
		}else{
			$and1="";
		}
		if($lokasi!=""){
			$and2="AND id_lokasi='$lokasi'";
		}else{
			$and2="";
		}
		return $this->db->query("select * from peralatan_mesin
								where peralatan_mesin.status='1' ".$and." ".$and1." ".$and2."")->result();
		
	}
	
}

/* End of file M_kir.php */
/* Location: ./application/models/M_kir.php */