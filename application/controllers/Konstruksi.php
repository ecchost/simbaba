<?php

class Konstruksi extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model(array('M_peralatan_mesin','M_input','M_merk','M_pegawai','M_lokasi','M_bidang_barang','M_tanah','M_gedung_bangunan','M_konstruksi'));
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Detail||Konstruksi Dalam Pengerjaan||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"konstruksi/index.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"konstruksi",
			"allbar"=>$this->M_konstruksi->getCount()->result(),
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Konstruksi Dalam Pengerjaan', site_url('konstruksi'));
		$this->breadcrumb->append_crumb('Detail Barang', site_url(''));
		$this->load->view('admin/template_full',$data);
	}
    function hapus($id_barang)
    {
         $data=array(
         	"status"=>0
        );
        $this->db->where('id_konstruksi', $id_barang);
        $this->db->update('konstruksi', $data);
        $this->session->set_flashdata('sukses','Data Berhasil Di Nonaktifkan');
        redirect('Konstruksi');
    }
    function aktifkan($id_barang)
    {
         $data=array(
         	"status"=>1
        );
        $this->db->where('id_konstruksi', $id_barang);
        $this->db->update('konstruksi', $data);
        $this->session->set_flashdata('sukses','Data Berhasil Di Aktifkan');
        redirect('Konstruksi');
    }
   public function edit($id)
	{
		$data=array(
			"title"=>'Edit||Detail||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"konstruksi/edit.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"konstruksi",
			"id"=>$id,
			"getrow"=>$this->M_konstruksi->cekid($id)->row_array(),
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Konstruksi Dalam Pengerjaan', site_url('konstruksi'));
		$this->breadcrumb->append_crumb('Edit Data', site_url('konstruksi/detail/'));
		$this->load->view('admin/template',$data);
	}
	public function update()
	{
		if($_FILES['gambar']['name']!=""){
			$file='gambar'; //name pada input type file
			$filename 	= $_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'gambar';
			$new_name	='updatekonstruksi'.date('YmdHis').$this->input->post('id_barang'); //name pada input type file
			$tipe 		= $_FILES['gambar']['type'];
			$ukuran 	= $_FILES['gambar']['size'];
			$vdir_upload	= $dir;
			$file_name		= $_FILES[''.$file.'']["name"];
			$vfile_upload	= $vdir_upload.$file;
			$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file ($tmp_file, $dir.$file_name);
			date_default_timezone_get('Asia/Jakarta');
			$source_url=$dir.$file_name;
			$info=getimagesize($source_url);
			if ($ukuran < 300000 and $ukuran > 10000) {	
				$quality=100;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			elseif ($ukuran < 1000000 and $ukuran > 300000) {	
				$quality=70;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			elseif ($ukuran < 1500000 and $ukuran > 1000000) {	
				$quality=50;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			elseif ($ukuran < 2000000 and $ukuran > 1000000) {	
				$quality=40;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			elseif ($ukuran < 2500000 and $ukuran > 2000000) {	
				$quality=30;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			elseif ($ukuran < 3000000 and $ukuran > 2500000) {	
				$quality=20;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			elseif ($ukuran > 3000000) {	
				$quality=10;// anda bisa menysesuaikan dengan mengganti valuenya
			}
			$gambar = imagecreatefromjpeg($source_url);
			$ext='.jpeg';
			if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
				unlink($source_url);
			}else{
				unlink($source_url);
			}
		}else{
			$new_name=$this->input->post('foto_lama', TRUE);
			$ext="";
		}
		$data=array(
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"bangunan"=>$this->input->post('bangunan', TRUE),
			"tingkat"=>$this->input->post('tingkat', TRUE),
			"beton"=>$this->input->post('beton', TRUE),
			"luas"=>$this->input->post('luas', TRUE),
			"letak"=>$this->input->post('letak', TRUE),
			"tanggal_dokumen"=>$this->input->post('tanggal_dokumen', TRUE),
			"no_dokumen"=>$this->input->post('no_dokumen', TRUE),
			"tanggal_mulai"=>$this->input->post('tanggal_mulai', TRUE),
			"status_tanah"=>$this->input->post('status_tanah', TRUE),
			"nomor_kode_tanah"=>$this->input->post('no_kode_tanah', TRUE),
			"asal"=>$this->input->post('asal', TRUE),
			"kontrak"=>$this->input->post('kontrak', TRUE),
			"keterangan"=>$this->input->post('keterangan', TRUE),
			"foto"=>$new_name.$ext,
			"status"=>1,
			"tanggal"=>$this->input->post('tanggal_aset',TRUE)
		);
		$this->db->where('id_konstruksi',$this->input->post('id_barang'));
		$this->db->update('konstruksi',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Edit');
		redirect('konstruksi/edit/'.$this->input->post('id_barang'));
	}
}
