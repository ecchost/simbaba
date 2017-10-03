<?php

class Bidang extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model(array('M_bidang','M_lokasi'));
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Bidang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang/index.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"bidang",
			"all"=>$this->M_bidang->all(),
			"id"=>$this->M_bidang->getId(),
		);
		$this->breadcrumb->append_crumb('Bidang/Bagian', site_url('Bidang'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$object=array(
			"id_bidang"=>$this->input->post('id_bidang', TRUE),
			"nama_bidang"=>$this->input->post('nama_bidang', TRUE),
			"status"=>1,
		);
		$this->db->insert('bidang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Inputkan');
		redirect('bidang');
	}
	public function update()
	{
		$object=array(
			"id_bidang"=>$this->input->post('id_bidang', TRUE),
			"nama_bidang"=>$this->input->post('nama_bidang', TRUE),
		);
		$this->db->where('id_bidang', $this->input->post('id_bidang'));
		$this->db->update('bidang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
		redirect('bidang/edit/'.$this->input->post('id_bidang'));
	}
	public function addsub()
	{
		$object=array(
			"id_subbid"=>$this->input->post('id_subbidang', TRUE),
			"nama_subbid"=>$this->input->post('nama_subbidang', TRUE),
			"id_bidang"=>$this->input->post('bidang', TRUE),
			"status"=>1,
		);
		$lokasi=$this->input->post('lokasi');
		for($i=0; $i<count($lokasi); $i++){
			$object_lokasi=array(
				"id_subbid"=>$this->input->post('id_subbidang', TRUE),
				"id_lokasi"=>$lokasi[$i],
			);
			$this->db->insert('lokasi_subbid', $object_lokasi);
		}
		$this->db->insert('subbid', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Inputkan');
		redirect('bidang/detail/'.$this->input->post('bidang'));
	}
	public function detail($id)
	{
		$namabidang=$this->M_bidang->getNama($id)->row_array();
		$nama_bidang=$namabidang['nama_bidang'];
		$data=array(
			"title"=>'Detail||Bidang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang/detail.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"Bidang",
			"all"=>$this->M_bidang->all(),
			"lokasi"=>$this->M_lokasi->all()->result(),
			"namabidang"=>$namabidang,
			"id"=>$this->M_bidang->getIdSub(),
			"allsub"=>$this->M_bidang->countSub($id)->result(),
		);
		$this->breadcrumb->append_crumb('Bidang/Bagian', site_url('Bidang'));
		$this->breadcrumb->append_crumb('Detail Bidang/Bagian <i><strong>"'.$nama_bidang.'"</strong></i>', site_url('Detail'));
		$this->load->view('admin/template',$data);
	}
	public function edit($id)
	{
		$namabidang=$this->M_bidang->getNama($id)->row_array();
		$data=array(
			"title"=>'Edit||Bidang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang/edit.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"Bidang",
			"row"=>$this->M_bidang->getNama($id)->row_array(),
		);
		$this->breadcrumb->append_crumb('Bidang/Bagian', site_url('Bidang'));
		$this->breadcrumb->append_crumb('Edit Data '.$namabidang['nama_bidang'], site_url('Edit'));
		$this->load->view('admin/template',$data);
	}
	public function editsub()
	{
		$object=array(
			"id_subbid"=>$this->input->post('id_subbidang', TRUE),
			"nama_subbid"=>$this->input->post('nama_subbidang', TRUE),
			"id_bidang"=>$this->input->post('bidang', TRUE),
		);
		$this->db->where('id_subbid', $this->input->post('id_subbidang'));
		$this->db->delete('lokasi_subbid');
		$lokasi=$this->input->post('lokasi');
		for($i=0; $i<count($lokasi); $i++){
			$object_lokasi=array(
				"id_subbid"=>$this->input->post('id_subbidang', TRUE),
				"id_lokasi"=>$lokasi[$i],
			);
			$this->db->insert('lokasi_subbid', $object_lokasi);
		}
		$this->db->where('id_subbid', $this->input->post('id_subbidang'));
		$this->db->update('subbid', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
		redirect('bidang/detail/'.$this->input->post('bidang'));
	}
	public function hapussub($idsub,$id)
	{
		$object=array(
			"id_subbid"=>$idsub,
			"id_bidang"=>$id,
			"status"=>0
		);
		$this->db->where('id_subbid', $idsub);
		$this->db->update('subbid', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Nonaktifkan');
		redirect('bidang/detail/'.$id);
	}
	public function aktifkansub($idsub,$id)
	{
		$object=array(
			"id_subbid"=>$idsub,
			"id_bidang"=>$id,
			"status"=>1
		);
		$this->db->where('id_subbid', $idsub);
		$this->db->update('subbid', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Aktifkan');
		redirect('bidang/detail/'.$id);
	}
	public function hapus($id)
	{
		$object=array(
			"status"=>0
		);
		$this->db->where('id_bidang', $id);
		$this->db->update('bidang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Nonaktifkan');
		redirect('bidang');
	}
	public function aktifkan($id)
	{
		$object=array(
			"status"=>1
		);
		$this->db->where('id_bidang', $id);
		$this->db->update('bidang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Aktifkan');
		redirect('bidang');
	}
}
