<?php

class Welcome extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> / </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_dashboard');
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'SIMBABA||Dashboard',
			"menu"=>"menu.php",
			"aktifmenu"=>"dashboard",
			"aktifsubmenu"=>"dashboard",
			"content"=>"dashboard/index.php",
		);
		$this->breadcrumb->append_crumb('Dashboard', site_url('welcome'));
		$this->load->view('admin/template',$data);
	}
	function downloadfile(){
		$path = file_get_contents(base_url('uploads/'.$this->uri->segment(3)));
		$nama_pdf=$this->uri->segment(3);
 		$this->load->helper('file');
		$this->load->helper('download');
        force_download($nama_pdf, $path);
	}
	function embed($id){
		$this->load->view('admin/tanah/embed.php');
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('login');
	}
}
