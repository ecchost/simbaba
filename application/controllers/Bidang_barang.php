<?php

class Bidang_barang extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_bidang_barang');
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Bidang Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang_barang/index.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"bidang_barang",
			"all"=>$this->M_bidang_barang->all(),
			"id"=>$this->M_bidang_barang->getId(),
		);
		$this->breadcrumb->append_crumb('Bidang Barang', site_url('Bidang_barang'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$object=array(
			"id_bidang_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"kode_bidang_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"nama_bidang_barang"=>$this->input->post('nama_bidang_barang', TRUE),
			"status"=>1
		);
		$this->db->insert('Bidang_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Inputkan');
		redirect('Bidang_barang');
	}
	public function edit($id)
	{
		$namabidang_barang=$this->M_bidang_barang->getNama($id)->row_array();
		$data=array(
			"title"=>'Edit||Bidang Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang_barang/edit.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"bidang_barang",
			"row"=>$this->M_bidang_barang->getNama($id)->row_array(),
		);
		$this->breadcrumb->append_crumb('Bidang Barang', site_url('Bidang_barang'));
		$this->breadcrumb->append_crumb('Edit Data <i><strong>"'.$namabidang_barang['nama_bidang_barang'].'"</strong></i>', site_url('Edit'));
		$this->load->view('admin/template',$data);
	}
	public function update()
	{
		$object=array(
			"kode_bidang_barang"=>$this->input->post('kobid_barang', TRUE),
			"nama_bidang_barang"=>$this->input->post('nambid_barang', TRUE),
			"id_bidang_barang"=>$this->input->post('id_bidang_barang',TRUE)
		);
		$this->db->where('id_bidang_barang', $this->input->post('id_bidang_barang'));
		$this->db->update('Bidang_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
		redirect('Bidang_barang');
	}
	public function addsub()
	{
		$kode_bidang=$this->input->post('kode_bidang_barang',TRUE);
		$id_subbid_barang=$this->input->post('id_subbidang_barang', TRUE);
		$object=array(
			"id_subbid_barang"=>$kode_bidang.$id_subbid_barang,
			"kode_subbid_barang"=>$kode_bidang.$id_subbid_barang,
			"nama_subbid_barang"=>$this->input->post('nama_subbidang_barang', TRUE),
			"satuan"=>$this->input->post('satuan', TRUE),
			"id_bidang_barang"=>$this->input->post('bidang_barang', TRUE),
			"status"=>1,
		);
		$this->db->insert('subbid_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Inputkan');
		redirect('Bidang_barang/detail/'.$this->input->post('bidang_barang'));
	}
	public function detail($id)
	{
		$namabidang_barang=$this->M_bidang_barang->getNama($id)->row_array();
		$nama_bidang_barang=$namabidang_barang['nama_bidang_barang'];
		$data=array(
			"title"=>'Detail||Bidang Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang_barang/detail.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"bidang_barang",
			"all"=>$this->M_bidang_barang->all(),
			"namabidang_barang"=>$namabidang_barang,
			"id"=>$this->M_bidang_barang->getIdSub(),
			"allsub"=>$this->M_bidang_barang->countSub($id)->result(),
		);
		$this->breadcrumb->append_crumb('Bidang Barang', site_url('Bidang_barang'));
		$this->breadcrumb->append_crumb('<i><strong>'.$nama_bidang_barang.'</strong></i>', site_url('Detail'));
		$this->load->view('admin/template',$data);
	}
	public function editsub()
	{
		$object=array(
			"kode_subbid_barang"=>$this->input->post('id_subbidang_barang', TRUE),
			"nama_subbid_barang"=>$this->input->post('nama_subbidang_barang', TRUE),
			"satuan"=>$this->input->post('satuan', TRUE),
			"id_bidang_barang"=>$this->input->post('bidang_barang', TRUE),
		);
		$this->db->where('kode_subbid_barang', $this->input->post('id_subbidang_barang'));
		$this->db->update('subbid_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
		redirect('Bidang_barang/detail/'.$this->input->post('bidang_barang'));
	}
	public function hapussub($idsub,$id)
	{
		$object=array(
			"id_subbid_barang"=>$idsub,
			"id_bidang_barang"=>$id,
			"status"=>0
		);
		$this->db->where('id_subbid_barang', $idsub);
		$this->db->update('subbid_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Nonaktifkan');
		redirect('Bidang_barang/detail/'.$id);
	}
	public function aktifkansub($idsub,$id)
	{
		$object=array(
			"id_subbid_barang"=>$idsub,
			"id_bidang_barang"=>$id,
			"status"=>1
		);
		$this->db->where('id_subbid_barang', $idsub);
		$this->db->update('subbid_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Aktifkan');
		redirect('Bidang_barang/detail/'.$id);
	}
	public function hapus($id)
	{
		$object=array(
			"status"=>0
		);
		$this->db->where('id_bidang_barang', $id);
		$this->db->update('Bidang_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Nonaktifkan');
		redirect('Bidang_barang');
	}
	public function aktifkan($id)
	{
		$object=array(
			"status"=>1
		);
		$this->db->where('id_Bidang_barang', $id);
		$this->db->update('Bidang_barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Aktifkan');
		redirect('Bidang_barang');
	}
	public function detailsub($idbidang,$id_subbid_barang)
	{
		$namabidang_barang=$this->M_bidang_barang->getNama($idbidang)->row_array();
		$namasubbid_barang=$this->M_bidang_barang->getNamaSub($id_subbid_barang)->row_array();
		$nama_bidang_barang=$namabidang_barang['nama_bidang_barang'];
		$nama_subbid_barang=$namasubbid_barang['nama_subbid_barang'];
		$data=array(
			"title"=>'Detail Barang||Detail Subbid Barang||Bidang Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Bidang_barang/detailsub.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"bidang_barang",
			"allbarang"=>$this->M_bidang_barang->allBarang($id_subbid_barang)->result(),
			"bidang"=>$namabidang_barang,
			"subbid"=>$namasubbid_barang,
			"namabidang_barang"=>$nama_bidang_barang,
			"namasubbid_barang"=>$nama_subbid_barang,
			"id"=>$this->M_bidang_barang->getIdSub(),
			//"allsub"=>$this->M_bidang_barang->countSub($id)->result(),
		);
		$this->breadcrumb->append_crumb('Bidang Barang', site_url('Bidang_barang'));
		$this->breadcrumb->append_crumb('<i><strong>'.$nama_bidang_barang.'</strong></i>', site_url('Bidang_barang/Detail/'.$idbidang));
		$this->breadcrumb->append_crumb('<i><strong>'.$nama_subbid_barang.'</strong></i>', site_url('Bidang_barang/Detailsub/'.$idbidang.'/'.$id_subbid_barang));
		$this->load->view('admin/template',$data);
	}
	public function addbarang()
	{
		$kode_bidang=$this->input->post('bidang',TRUE);
		$id_subbid_barang=$this->input->post('subbid', TRUE);
		$barang=$this->input->post('barang', TRUE);
		$object=array(
			"id_barang"=>$this->M_bidang_barang->getIDBarang(),
			"kode_barang"=>$id_subbid_barang.$barang,
			"nama_barang"=>$this->input->post('name', TRUE),
			"id_subbid_barang"=>$this->input->post('subbid', TRUE),
			"id_bidang_barang"=>$this->input->post('bidang', TRUE),
			"status"=>1,
		);
		$this->db->insert('barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Inputkan');
		redirect('Bidang_barang/detailsub/'.$kode_bidang.'/'.$id_subbid_barang);
	}
	public function editbarang()
	{
		$kode_bidang=$this->input->post('bidang',TRUE);
		$id_subbid_barang=$this->input->post('subbid', TRUE);
		$kode_barang=$this->input->post('kode_barang', TRUE);
		$barang=$this->input->post('barang', TRUE);
		$object=array(
			"kode_barang"=>$kode_barang,
			"nama_barang"=>$this->input->post('name', TRUE),
		);
		$this->db->where('id_barang', $barang);
		$this->db->update('barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Edit');
		redirect('Bidang_barang/detailsub/'.$kode_bidang.'/'.$id_subbid_barang);
	}
	public function hapusbarang($barang,$subbid,$bidang)
	{
		$object=array(
			"status"=>0,
		);
		$this->db->where('id_barang', $barang);
		$this->db->update('barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Nonaktifkan');
		redirect('Bidang_barang/detailsub/'.$bidang.'/'.$subbid);
	}
	public function aktifkanbarang($barang,$subbid,$bidang)
	{
		$object=array(
			"status"=>1,
		);
		$this->db->where('id_barang', $barang);
		$this->db->update('barang', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Aktifkan');
		redirect('Bidang_barang/detailsub/'.$bidang.'/'.$subbid);
	}
	public function importper(){
		$fileNames = $_FILES['import']['name'];
		$config['upload_path'] = './assets/file/';
		$config['file_name'] = $fileNames;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']        = 10000;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('import')) {
			$this->session->set_flashdata('error','Data Gagal DiImpor');
			redirect('bidang_barang');
		} else {
		  $upload_data = $this->upload->data('import');
		  $this->load->library('Excel_reader');
		  $this->excel_reader->setOutputEncoding('230787');
		  $files = './assets/file/'.$fileNames;
		  $this->excel_reader->read($files);
		  error_reporting(E_ALL ^ E_NOTICE);
		  $data = $this->excel_reader->sheets[0];
		  $dataexcel = array();
		  for ($i = 2; $i <= $data['numRows']; $i++) {
			   if ($data['cells'][$i][2] == '') break;
				   	$dataexcel[$i - 2]['kode_barang']=$data['cells'][$i][1];
					$dataexcel[$i - 2]['nama_barang']=$data['cells'][$i][2];
					$dataexcel[$i - 2]['sub']=$data['cells'][$i][3];
					$dataexcel[$i - 2]['bidang']=$data['cells'][$i][4];
		  }
		  $files = $upload_data['file_name'];
		  $path = 'assets/file/'.$fileNames;
		  unlink($path);
		  $this->M_bidang_barang->loaddataken($dataexcel);
		}
		$this->session->set_flashdata('sukses','Data Berhasil Di Impor');
		redirect('bidang_barang');
	}
	public function editsubbid($id)
	{
		$id1=$this->uri->segment(3);
		$id2=$this->uri->segment(4);
		$id3=$this->uri->segment(5);
		$namabidang_barang=$this->M_bidang_barang->getNama($id3)->row_array();
		$namasubbid_barang=$this->M_bidang_barang->getNamaSub($id2)->row_array();
		$nama_bidang_barang=$namabidang_barang['nama_bidang_barang'];
		$nama_subbid_barang=$namasubbid_barang['nama_subbid_barang'];
		$subbid_barang=$this->M_bidang_barang->getBarang($id1,$id2,$id3)->row_array();
		$data=array(
			"title"=>'Edit||Sub Bidang Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"bidang_barang/editsub.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"bidang_barang",
			"allsub"=>$this->M_bidang_barang->getBarang($id1,$id2,$id3)->row_array(),
		);
		$this->breadcrumb->append_crumb('Bidang Barang', site_url('Bidang_barang'));
		$this->breadcrumb->append_crumb('<i><strong>'.$nama_bidang_barang.'</strong></i>', site_url('Bidang_barang/Detail/'.$id1));
		$this->breadcrumb->append_crumb('<i><strong>'.$nama_subbid_barang.'</strong></i>', site_url('Bidang_barang/Detailsub/'.$id1.'/'.$id2));
		$this->breadcrumb->append_crumb('Edit Data Barang', site_url());
		$this->load->view('admin/template',$data);
	}
}
