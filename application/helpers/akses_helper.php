<?php 
	function in_access()
	{
		$ci=& get_instance();
		if($ci->session->userdata('username')){
			redirect('welcome');
		}
	}
	function no_access()
	{
		$ci=& get_instance();
		if(!$ci->session->userdata('username')){
			redirect('login');
		}
	}
	function select_tahun($tahun)
	{
		date_default_timezone_set('Asia/Jakarta');
		$ci=& get_instance();
		if($tahun==date('Y')){
			return "selected";
		}else{
			return "";
		}
	}
	function select_bulan($bulan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$ci=& get_instance();
		if($bulan==date('m')){
			return "selected";
		}else{
			return "";
		}
	}
	function getCount($id,$tabel)
	{
		$ci=& get_instance();
		return $ci->db->query("select * from ".$tabel." where LEFT(id_subbid_barang,2)='$id'")->num_rows();
	}
	function getCountK()
	{
		$ci=& get_instance();
		return $ci->db->query("select * from konstruksi")->num_rows();
	}
	function getCountKUang()
	{
		$ci=& get_instance();
		$r=$ci->db->query("select sum(kontrak) as harg from konstruksi")->row_array();
		return $r['harg'];
	}
	function getCountUang($id,$tabel)
	{
		$ci=& get_instance();
		$r=$ci->db->query("select sum(harga) as harg from ".$tabel." where LEFT(id_subbid_barang,2)='$id'")->row_array();
		return $r['harg'];
	}
	function getPegawai()
	{
		$ci=& get_instance();
		$q=$ci->db->query("select count(id_pegawai) as jm from pegawai")->row_array();
		return $q['jm'];
	}
	function getBidang()
	{
		$ci=& get_instance();
		$q=$ci->db->query("select count(id_bidang) as jm from bidang")->row_array();
		return $q['jm'];
	}
	function getSubBidang()
	{
		$ci=& get_instance();
		$q=$ci->db->query("select count(id_subbid) as jm from subbid")->row_array();
		return $q['jm'];
	}
	function getLokasi()
	{
		$ci=& get_instance();
		$q=$ci->db->query("select count(id_lokasi) as jm from lokasi")->row_array();
		return $q['jm'];
	}
	function getjabat($r)
	{
		$ci=& get_instance();
		$q=$ci->db->query("select * from jabatan")->row_array();
		return getnama($q[$r]);
	}
	function getidjab($r)
	{
		$ci=& get_instance();
		$q=$ci->db->query("select * from jabatan")->row_array();
		return $q[$r];
	}
	function getNama($r)
	{
		$ci=& get_instance();
		$q=$ci->db->query("select * from pegawai where id_pegawai='$r'")->row_array();
		return $q['nama'];
	}
	function getPangkat($r)
	{
		$ci=& get_instance();
		$q=$ci->db->query("select * from pegawai where id_pegawai='$r'")->row_array();
		return $q['pangkat'];
	}
	function getNIP($r)
	{
		$ci=& get_instance();
		$q=$ci->db->query("select * from pegawai where id_pegawai='$r'")->row_array();
		return $q['nip'];
	}
	function uang($number)

    {
    	return number_format($number,2,',','.');
	}
	function ongko($number)

    {
    	return number_format($number,2,'','');
	}
?>