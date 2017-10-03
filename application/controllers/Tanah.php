<?php

class Tanah extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_tanah');
		no_access();
	}
	function embed($id){
		$this->load->view('admin/tanah/embed.php');
	}
	public function index()
	{
		$id="01";
		$data=array(
			"title"=>'Tanah||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"tanah/index.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"tanah",
			"all"=>$this->M_tanah->allsub($id)->result(),
			"id"=>$id
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Tanah', site_url('tanah'));
		$this->load->view('admin/template',$data);
	}
	public function detail($id)
	{
		$data=array(
			"title"=>'Detail||Tanah||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"tanah/detail.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"tanah",
			"allbar"=>$this->M_tanah->getJumlahBarang($id)->result(),
			"id"=>$id
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Tanah', site_url('tanah'));
		$this->breadcrumb->append_crumb('Detail Tanah', site_url(''));
		$this->load->view('admin/template_full',$data);
	}
	public function edit($subbid,$id)
	{
		$id_bidang='01';
		$data=array(
			"title"=>'Edit||Detail||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"tanah/edit.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"tanah",
			"id"=>$id,
			"subbid"=>$subbid,
			"getrow"=>$this->M_tanah->getBaris($id)->row_array(),
			"bidrang"=>$this->M_tanah->getSubBidang($id_bidang)->result(),
			"barang"=>$this->M_tanah->getBarang($subbid)->result(),
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Tanah', site_url('tanah'));
		$this->breadcrumb->append_crumb('Detail Tanah', site_url('tanah/detail/'.$subbid));
		$this->breadcrumb->append_crumb('Edit Data', site_url('tanah/detail/'.$subbid));
		$this->load->view('admin/template_full',$data);
	}
    function hapus($kode,$id)
    {
         $info=array(
         	"status"=>0
        );
        $this->db->where('id_tanah',$id);
        $this->db->update('tanah',$info);
        $this->session->set_flashdata('sukses','Data Berhasil Di Nonaktifkan');
        redirect('tanah/detail/'.$kode);
    }
    function aktifkan($kode,$id)
    {
         $info=array(
         	"status"=>1
        );
        $this->db->where('id_tanah',$id);
        $this->db->update('tanah',$info);
        $this->session->set_flashdata('sukses','Data Berhasil Di Aktifkan');
        redirect('tanah/detail/'.$kode);
    }
    public function update()
    {
    	$gambar_baru=$_FILES['gambar']['name'];
		if($gambar_baru==null){
			$ga=$this->input->post('scan_lama');
		}else{
			$dir="uploads/"; //tempat upload foto
			$dirs="uploads/"; //tempat upload foto
			$file='gambar'; //name pada input type file
			$source_url2=$dirs.$this->input->post('scan_lama');
			unlink($source_url2);
			$foto=$_FILES['gambar']['name'];
			$new_name='updatetanah'.date('YmdHis').$this->input->post('kode1').'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dir.$file_name);
			$source_url=$dir.$file_name;
			rename($dirs.$foto,$dirs.$new_name);
			$ga=$new_name;
		}
		$data=array(
			"kode_barang"=>$this->input->post('kode1', TRUE),
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"register"=>$this->input->post('register', TRUE),
			"luas"=>$this->input->post('luas', TRUE),
			"tahun_pengadaan"=>$this->input->post('tahun_pengadaan', TRUE),
			"letak"=>$this->input->post('letak', TRUE),
			"hak"=>$this->input->post('hak', TRUE),
			"tanggal_sertifikat"=>$this->input->post('tanggal_sertifikat', TRUE),
			"nomor_sertifikat"=>$this->input->post('nomor_sertifikat', TRUE),
			"penggunaan"=>$this->input->post('penggunaan', TRUE),
			"asal"=>$this->input->post('asal', TRUE),
			"harga"=>$this->input->post('harga', TRUE),
			"keterangan"=>$this->input->post('keterangan', TRUE),
			"scan_sertifikat"=>$ga,
			"status"=>1,
			"id_subbid_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"tanggal"=>$this->input->post('tanggal_aset')
		);
		$this->db->where('id_tanah',$this->input->post('id_tanah'));
		$this->db->update('tanah',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Edit');
		redirect('tanah/edit/'.$this->input->post('id_bidang_barang').'/'.$this->input->post('id_tanah'));
	}
}
