<?php

class Output extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model( array('M_input'));
		date_default_timezone_set('Asia/Jakarta');
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Output Barang||SIMBABA',
			"all"=>$this->M_input->getAll()->result(),
			"menu"=>"menu.php",
			"content"=>"output/index.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"output",
		);
		$this->breadcrumb->append_crumb('Output', site_url('input'));
		$this->load->view('admin/template',$data);
	}
}