<?php

class Merk extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_merk');
		no_access();
	}
	public function index()
	{
		$data=array(
			"id"=>$this->M_merk->getId(),
			"title"=>'Merk||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Merk/index.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"merk",
			"all"=>$this->M_merk->all()->result()
		);
		$this->breadcrumb->append_crumb('Merk', site_url('Merk'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$data=array(
			"id_merk"=>$this->input->post('id', TRUE),
			"kode_merk"=>$this->input->post('kode', TRUE),
			"merk"=>$this->input->post('name', TRUE),
			"status"=>1
		);
		$this->db->insert('merk',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('Merk');
	}
	public function update($id)
	{
		$id=$this->uri->segment(3);
		$data=array(
			"title"=>'Edit||Merk||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Merk/edit.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"merk",
			"getId"=>$this->M_merk->cekId($id)->row_array()
		);
		$this->breadcrumb->append_crumb('Merk', site_url('Merk'));
		$this->breadcrumb->append_crumb('Edit Data', site_url('Merk/update'));
		$this->load->view('admin/template',$data);
	}
	public function update_proses($id)
    {
        $info=array(
			"kode_merk"=>$this->input->post('kode', TRUE),
			"merk"=>$this->input->post('name', TRUE),
        );
        $this->M_merk->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berasil di Edit');
        redirect('Merk');
    }
    function hapus($id)
    {
         $info=array(
         	"status"=>0
        );
        $this->M_merk->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil di Dinonaktifkan');
        redirect('Merk');
    }
    function aktifkan($id)
    {
         $info=array(
         	"status"=>1
        );
        $this->M_merk->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil di Aktifkan');
        redirect('Merk');
    }
}
