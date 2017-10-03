<?php

class Lokasi extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_lokasi');
		no_access();
	}
	public function index()
	{
		$data=array(
			"id"=>$this->M_lokasi->getId(),
			"title"=>'Lokasi||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"lokasi/index.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"lokasi",
			"all"=>$this->M_lokasi->all()->result()
		);
		$this->breadcrumb->append_crumb('Lokasi', site_url('lokasi'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$data=array(
			"id_lokasi"=>$this->input->post('id_lokasi', TRUE),
			"kode_lokasi"=>$this->input->post('kode_lokasi', TRUE),
			"lokasi"=>$this->input->post('nama_lokasi', TRUE),
			"status"=>1
		);
		$this->db->insert('lokasi',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('lokasi');
	}
	public function update($id)
	{
		$id=$this->uri->segment(3);
		$data=array(
			"title"=>'Edit||Lokasi||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"lokasi/edit.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"lokasi",
			"getId"=>$this->M_lokasi->cekId($id)->row_array()
		);
		$this->breadcrumb->append_crumb('Lokasi', site_url('lokasi'));
		$this->breadcrumb->append_crumb('Edit Data', site_url('lokasi/update'));
		$this->load->view('admin/template',$data);
	}
	public function update_proses($id)
    {
        $info=array(
			"id_lokasi"=>$this->input->post('id_lokasi', TRUE),
			"kode_lokasi"=>$this->input->post('kode_lokasi', TRUE),
			"lokasi"=>$this->input->post('nama_lokasi', TRUE),
        );
        $this->M_lokasi->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berasil di Edit');
        redirect('lokasi');
    }
    function hapus($id)
    {
         $info=array(
         	"status"=>0
        );
        $this->M_lokasi->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil di Dinonaktifkan');
        redirect('lokasi');
    }
    function aktifkan($id)
    {
         $info=array(
         	"status"=>1
        );
        $this->M_lokasi->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil di Aktifkan');
        redirect('lokasi');
    }
}
