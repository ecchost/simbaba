<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kib extends CI_Model {

	function ekspor(){
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');
		$bidang_barang=$this->input->post('bidang_barang');
		$sub_bidang_barang=$this->input->post('sub_bidang_barang');
		$barang=$this->input->post('barang');
		if($bulan!=""){
			$and="AND MID(tanggal,4,2)='$bulan'";
		}else{
			$and="";
		}
		if($tahun!=""){
			$and1="AND RIGHT(tanggal,4)='$tahun'";
		}else{
			$and1="";
		}
		if($bidang_barang!=""){
			$and2="AND LEFT(id_subbid_barang,2)='$bidang_barang'";
		}else{
			$and2="";
		}
		if($sub_bidang_barang!=""){
			$and3="AND id_subbid_barang='$sub_bidang_barang'";
		}else{
			$and3="";
		}
		if($barang!=""){
			$and4="AND kode_barang='$barang'";
		}else{
			$and4="";
		}
		if($bidang_barang=='01'){
			$tabel='tanah';
		}elseif($bidang_barang=='02'){
			$tabel='peralatan_mesin';
		}elseif($bidang_barang=='03'){
			$tabel='bangunan';
		}elseif($bidang_barang=='04'){
			$tabel='irigasi';
		}elseif($bidang_barang=='05'){
			$tabel='aset';
		}elseif($bidang_barang=='06'){
			$tabel='konstruksi';
		}else{
			$tabel="";
		}
		if($tabel=='konstruksi'){
			$q=$this->db->query("select * from ".$tabel." where status='1'")->result();
		}else{
			$q=$this->db->query("select * from ".$tabel." where status='1' ".$and." ".$and1." ".$and2." ".$and3." ".$and4."")->result();
		}
		return $q;

	}
}

/* End of file M_kib.php */
/* Location: ./application/models/M_kib.php */