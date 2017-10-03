<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dev extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Develop||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"develop/index.php",
			"aktifmenu"=>"profil",
			"aktifsubmenu"=>"dev",
		);
		$this->breadcrumb->append_crumb('Pengembang', site_url(''));
		$this->load->view('admin/template',$data);
	}

}

/* End of file Dev.php */
/* Location: ./application/controllers/Dev.php */