<?php

class Kib extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model(array('M_admin','M_kib','M_input','M_pegawai','M_merk','M_lokasi'));
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Kib||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"kib/index.php",
			"aktifmenu"=>"laporan",
			"aktifsubmenu"=>"kib",
			"all"=>$this->M_input->getAll()->result(),
		);
		$this->breadcrumb->append_crumb('Laporan KIB', site_url('Kib'));
		$this->load->view('admin/template',$data);
	}
	public function select2()
	{
		$bidang=$this->input->post('p', TRUE);
		$data=array(
			"allsub"=>$this->M_input->getbidrang($bidang)->result(),
		);
		$this->load->view('admin/kib/ajax_sub.php', $data);
	}
	public function select3()
	{
		$sub=$this->input->post('g', TRUE);
		$data=array(
			"all"=>$this->db->where('id_subbid_barang',$sub)->get('barang')->result(),
		);
		$this->load->view('admin/kib/ajax_barang.php', $data);
	}
	public function ekspor()
	{
		$data['all']=$this->M_kib->ekspor();
		$data['tanggal']=$_POST['tanggal'];
		$bidang_barang=$this->input->post('bidang_barang', TRUE);
		$sub=$this->input->post('sub_bidang_barang', TRUE);
		if($bidang_barang=='01'){
			$tabel='tanah.php';
		}elseif($bidang_barang=='02'){
			if($sub=="0202"){
				$tabel='kendaraan.php';
			}elseif($sub=="0203"){
				$tabel="kendaraan.php";
			}elseif($sub==""){
				$tabel="kendaraan.php";
			}else{
				$tabel="peralatan.php";
			}
		}elseif($bidang_barang=='03'){
			$tabel='bangunan.php';
		}elseif($bidang_barang=='04'){
			$tabel='jalan_irigasi.php';
		}elseif($bidang_barang=='05'){
			$tabel='aset_lainnya.php';
		}elseif($bidang_barang=='06'){
			$tabel='konstruksi.php';
		}else{
			$tabel="";
		}
		if($tabel!=""){
			$this->load->view('admin/kib/'.$tabel, $data);
		}else{
			$this->session->set_flashdata('error','Terjadi Kesalahan Ekspor');
			redirect('kib');
		}
	}
}
