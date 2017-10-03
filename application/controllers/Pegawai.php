<?php

class Pegawai extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_pegawai');
		$this->load->library('Excel_reader');
		no_access();
	}
	public function index()
	{
		$data=array(
			"id"=>$this->M_pegawai->getId(),
			"title"=>'Pegawai||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"pegawai/index.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"pegawai",
			"all"=>$this->M_pegawai->all()->result()
		);
		$this->breadcrumb->append_crumb('Pegawai', site_url('Pegawai'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$data=array(
			"id_pegawai"=>$this->input->post('id', TRUE),
			"nip"=>$this->input->post('nip', TRUE),
			"nama"=>$this->input->post('name', TRUE),
			"pangkat"=>$this->input->post('pangkat', TRUE),
			"jabatan"=>$this->input->post('jabatan', TRUE),
			"status"=>1
		);
		$this->db->insert('pegawai',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('Pegawai');
	}
	public function update($id)
	{
		$id=$this->uri->segment(3);
		$data=array(
			"title"=>'Edit||Pegawai||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"pegawai/edit.php",
			"aktifmenu"=>"master",
			"aktifsubmenu"=>"pegawai",
			"getId"=>$this->M_pegawai->cekId($id)->row_array()
		);
		$this->breadcrumb->append_crumb('Pegawai', site_url('Pegawai'));
		$this->breadcrumb->append_crumb('Edit Data', site_url('Pegawai/update'));
		$this->load->view('admin/template',$data);
	}
	public function update_proses($id)
    {
        $info=array(
			"nip"=>$this->input->post('nip', TRUE),
			"nama"=>$this->input->post('name', TRUE),
			"pangkat"=>$this->input->post('pangkat', TRUE),
			"jabatan"=>$this->input->post('jabatan', TRUE)
        );
        $this->M_pegawai->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berasil di Edit');
        redirect('Pegawai');
    }
    function hapus($id)
    {
         $info=array(
         	"status"=>0
        );
        $this->M_pegawai->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil di Dinonaktifkan');
        redirect('Pegawai');
    }
    function aktifkan($id)
    {
         $info=array(
         	"status"=>1
        );
        $this->M_pegawai->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil di Aktifkan');
        redirect('Pegawai');
    }
    public function import(){
		$fileNames = $_FILES['import']['name'];
		$config['upload_path'] = './assets/file/';
		$config['file_name'] = $fileNames;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']        = 10000;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('import')) {
			$this->session->set_flashdata('error','Data Gagal Diimport');
			redirect('pegawai');
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
			   $dataexcel[$i - 2]['nip'] = ($data['cells'][$i][1]);
			   $dataexcel[$i - 2]['nama'] = ($data['cells'][$i][2]);
			   $dataexcel[$i - 2]['pangkat'] = ($data['cells'][$i][3]);
			   $dataexcel[$i - 2]['jabatan'] = ($data['cells'][$i][4]);
		  }
		  $files = $upload_data['file_name'];
		  $path = 'assets/file/'.$fileNames;
		  unlink($path);
		  $this->M_pegawai->loaddata($dataexcel);
		}
		$this->session->set_flashdata('sukses','Data Berhasil Diimport');
		redirect('pegawai');
	}
}
