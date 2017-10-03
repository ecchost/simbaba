<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instansi extends CI_Controller {

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
		$this->load->model('M_pegawai');
	}
	public function index()
	{
		$data=array(
			"title"=>'Instansi||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"instansi/index.php",
			"aktifmenu"=>"profil",
			"aktifsubmenu"=>"instansi",
			"pegawai"=>$this->M_pegawai->all()->result()
		);
		$this->breadcrumb->append_crumb('Instansi', site_url(''));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$data=array(
			"satu"=>$_POST['satu'],
			"dua"=>$_POST['dua'],
		);
		$this->db->query("delete from jabatan where 1=1");
		$this->db->insert('jabatan',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Update');
		redirect('instansi');
		
	}

}

/* End of file Dev.php */
/* Location: ./application/controllers/Dev.php */