<?php

class Kir extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model(array('M_admin','M_Kir','M_input','M_pegawai','M_merk','M_lokasi','M_kir'));
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Kir||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Kir/index.php",
			"aktifmenu"=>"laporan",
			"aktifsubmenu"=>"Kir",
			"all"=>$this->M_kir->getAll()->result(),
		);
		$this->breadcrumb->append_crumb('Laporan Kir', site_url('Kir'));
		$this->load->view('admin/template',$data);
	}
	public function ekspor()
	{
		$data['all']=$this->M_Kir->ekspor();
		$lokasi=$this->input->post('lokasi', TRUE);
		if($lokasi=!""){
			$tabel='kir.php';
		}else{
			$tabel="";
		}
		if($tabel!=""){
			$this->load->view('admin/Kir/'.$tabel, $data);
		}else{
			$this->session->set_flashdata('error','Terjadi Kesalahan Ekspor');
			redirect('Kir');
		}
	}
}
