<?php

class Input extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model( array('M_input','M_pegawai','M_merk','M_lokasi'));
		$this->load->library('Excel_reader');
		date_default_timezone_set('Asia/Jakarta');
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Input Barang||SIMBABA',
			"all"=>$this->M_input->getAll()->result(),
			"menu"=>"menu.php",
			"content"=>"input/index.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->load->view('admin/template',$data);
	}
	public function select()
	{
		$value=$this->input->post('p');
		$data=array(
			'barang'=>$this->M_input->getBarang($value)->result()
			);
		$this->load->view('admin/input/ajaxform.php', $data);
	}
	public function select_barang()
	{
		$barang=$this->input->post('barang');
		$data=array(
			'id'=>$barang
		);
		$this->load->view('admin/input/ajaxid.php', $data);
	}
	public function select2()
	{
		$value=$this->input->post('p');
		$a=$this->M_input->getsub($value)->row_array();
		$kode=$a['kode_subbid_barang'];
		$data=array(
			'id'=>$kode,
			'barang'=>$this->M_input->getBarang($value)->result()
			);
		if ($kode=='0203') {
			$this->load->view('admin/input/ajaxform2.php', $data);
		}else{
			$this->load->view('admin/input/ajaxform.php', $data);
		}
	}
	public function Barang01()
	{
		$id_bidang=01;
		$data=array(
			"title"=>'Input Tanah||Input Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"input/tanah.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
			"id"=>"0101",
			"bidrang"=>$this->M_input->getbidrang($id_bidang)->result(),
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->breadcrumb->append_crumb('Input Tanah', site_url());
		$this->load->view('admin/template',$data);
	}
	public function tambah01()
	{
		$kode1=$this->input->post('kode1', TRUE);
		$foto=$_FILES['gambar']['name'];
		if($foto!=""){	
			$dir="upload/"; //tempat upload foto
			$dirs="uploads/"; //tempat upload foto
			$file='gambar'; //name pada input type file
			$new_name='upload'.date('YmdHis').$this->M_input->getId('tanah','id_tanah').'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dirs.$file_name);
			rename($dirs.$foto,$dirs.$new_name);
		}else{
			$new_name="";
		}
		$data=array(
			"id_tanah"=>$this->M_input->getId('tanah','id_tanah'),
			"kode_barang"=>$kode1,
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
			"scan_sertifikat"=>$new_name,
			"status"=>1,
			"id_subbid_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"tanggal"=>$this->input->post('tanggal_aset',TRUE)
		);
		$this->db->insert('tanah',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('input');
	}
	public function Barang02()
	{
		$id_bidang="02";
		$data=array(
			"title"=>'Input Peralatan dan Mesin||Input Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"input/peralatan_mesin.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
			"id"=>"0202",
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"lokasi"=>$this->M_lokasi->all()->result(),
			"bidrang"=>$this->M_input->getbidrang($id_bidang)->result(),
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->breadcrumb->append_crumb('Peralatan dan Mesin', site_url());
		$this->load->view('admin/template',$data);
	}
	public function Barang03()
	{
		$id_bidang="03";
		$data=array(
			"title"=>'Input Gedung Dan Bangunan||Input Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"input/gedung_bangunan.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"bidrang"=>$this->M_input->getbidrang($id_bidang)->result(),
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->breadcrumb->append_crumb('Gedung Dan Bangunan', site_url());
		$this->load->view('admin/template',$data);
	}
	public function Barang04()
	{
		$id_bidang="04";
		$data=array(
			"title"=>'Input Jalan, Irigasi Dan Jaringan||Input Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"input/irigasi.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"bidrang"=>$this->M_input->getbidrang($id_bidang)->result(),
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->breadcrumb->append_crumb('Jalan, Irigasi Dan Jaringan', site_url());
		$this->load->view('admin/template',$data);
	}
	public function Barang05()
	{
		$id_bidang="05";
		$data=array(
			"title"=>'Input Aset Tetap Lainnya||Input Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"input/aset.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"bidrang"=>$this->M_input->getbidrang($id_bidang)->result(),
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->breadcrumb->append_crumb('Aset Tetap Lainnya', site_url());
		$this->load->view('admin/template',$data);
	}
	public function Barang06()
	{
		$id_bidang="06";
		$data=array(
			"title"=>'Input Konstruksi Dalam Pengerjaan||Input Barang||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"input/konstruksi.php",
			"aktifmenu"=>"input",
			"aktifsubmenu"=>"input",
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"bidrang"=>$this->M_input->getbidrang($id_bidang)->result(),
		);
		$this->breadcrumb->append_crumb('Input', site_url('input'));
		$this->breadcrumb->append_crumb('Konstruksi Dalam Pengerjaan', site_url());
		$this->load->view('admin/template',$data);
	}
	public function tambah02()
	{
		$kode1=$this->input->post('kode1');
		//upload foto
		$foto=$_FILES['scan_foto']['name'];
		$dir		= "upload/";
		$dir1		= "uploads/";
		if($_FILES['scan_foto']['name']!=""){
			$file='scan_foto'; //name pada input type file
			$filename 	= $_FILES['scan_foto']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			$file		= 'scan_foto';
			$new_name='uploadfoto'.date('YmdHis').$this->M_input->getId('peralatan_mesin','id_peralatan_mesin'); //name pada input type file
			$tipe 		= $_FILES['scan_foto']['type'];
			$ukuran 	= $_FILES['scan_foto']['size'];
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
			}else{
				$quality=10;
			}
			$gambar = imagecreatefromjpeg($source_url);
			$ext='.jpeg';
			if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
				unlink($source_url);
			}else{
				unlink($source_url);
			}
		}else{
			$new_name="";
			$ext="";
		}
		if($_FILES['scan_bpkb']['name']!=""){
			$bpkb=$_FILES['scan_bpkb']['name'];
			$file2='scan_bpkb'; //name pada input type file
			$new_name2='uploadbpkb'.date('YmdHis').$this->M_input->getId('peralatan_mesin','id_peralatan_mesin').'.pdf'; //name pada input type file
			$vdir_upload2 = $dir;
			$file_name2=$_FILES[''.$file2.'']["name"];
			$vfile_upload2 = $vdir_upload2 . $file2;
			$tmp_name2=$_FILES[''.$file2.'']["tmp_name"];
			move_uploaded_file($tmp_name2, $dirs.$file_name2);
			$source_url2=$dir.$file_name2;
			rename($dirs.$file_name2,$dirs.$new_name2);
			//unlink($source_url2);
		}else{
			$new_name2="";
		}
		// //upload scan stnk
		if($_FILES['scan_stnk']['name']!=""){
			$stnk=$_FILES['scan_stnk']['name'];
			$dir="upload/"; //tempat upload foto
			$dirs="uploads/"; //tempat upload foto
			$file='scan_stnk'; //name pada input type file
			$new_name3='uploadstnk'.date('YmdHis').$this->M_input->getId('peralatan_mesin','id_peralatan_mesin').'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dirs.$file_name);
			$source_url3=$dir.$file_name;
			rename($dirs.$file_name,$dirs.$new_name3);
		}else{
			$new_name3="";
		}
		$data=array(
			"id_peralatan_mesin"=>$this->M_input->getId('peralatan_mesin','id_peralatan_mesin'),
			"kode_barang"=>$kode1,
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"no_reg"=>$this->input->post('no_reg', TRUE),
			"jumlah"=>$this->input->post('jumlah', TRUE),
			"merk"=>$this->input->post('merk', TRUE),
			"ukuran"=>$this->input->post('ukuran', TRUE),
			"bahan"=>$this->input->post('bahan', TRUE),
			"tahun_pembelian"=>$this->input->post('tahun_pembelian', TRUE),
			"no_pabrik"=>$this->input->post('no_pabrik', TRUE),
			"no_rangka"=>$this->input->post('no_rangka', TRUE),
			"no_mesin"=>$this->input->post('no_mesin', TRUE),
			"no_polisi"=>$this->input->post('no_polisi', TRUE),
			"no_bpkb"=>$this->input->post('no_bpkb', TRUE),
			"asal"=>$this->input->post('asal', TRUE),
			"harga"=>$this->input->post('harga', TRUE),
			"keterangan"=>$this->input->post('keterangan', TRUE),
			"scan_bpkb"=>$new_name2,
			"scan_stnk"=>$new_name3,
			"scan_foto"=>$new_name.$ext,
			"id_pemegang"=>$this->input->post('id_pemegang', TRUE),
			"tanggal_pajak"=>$this->input->post('tanggal_pajak', TRUE),
			"kondisi"=>$this->input->post('kondisi', TRUE),
			"status"=>1,
			"id_subbid_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"id_lokasi"=>$this->input->post('lokasi', TRUE),
			"tanggal"=>$this->input->post('tanggal_aset',TRUE)
		);
		$this->db->insert('peralatan_mesin',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('input');
	}
	public function tambah03()
	{
		$kode1=$this->input->post('kode1', TRUE);
		$foto=$_FILES['gambar']['name'];
		$dir="upload/"; //tempat upload foto
		$file='gambar'; //name pada input type file
		$filename 	= $_FILES['gambar']['name'];
		if($foto!=""){	
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'gambar';
			$new_name	='updatebangunan'.date('YmdHis').$this->M_input->getId('bangunan','id_bangunan'); //name pada input type file
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
			$new_name="";
			$ext="";
		}
		$data=array(
			"id_bangunan"=>$this->M_input->getId('bangunan','id_bangunan'),
			"kode_barang"=>$kode1,
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"no_reg"=>$this->input->post('no_reg', TRUE),
			"kondisi"=>$this->input->post('kondisi', TRUE),
			"tingkat"=>$this->input->post('tingkat', TRUE),
			"beton"=>$this->input->post('beton', TRUE),
			"luas_lantai"=>$this->input->post('luas', TRUE),
			"letak"=>$this->input->post('letak', TRUE),
			"tanggal_dokumen"=>$this->input->post('tanggal_dokumen', TRUE),
			"nomor_dokumen"=>$this->input->post('no_dokumen', TRUE),
			"luas"=>$this->input->post('luas_tanah', TRUE),
			"status_tanah"=>$this->input->post('status_tanah', TRUE),
			"nomor_kode_tanah"=>$this->input->post('no_kode_tanah', TRUE),
			"asal"=>$this->input->post('asal', TRUE),
			"harga"=>$this->input->post('harga', TRUE),
			"keterangan"=>$this->input->post('keterangan', TRUE),
			"foto"=>$new_name.$ext,
			"status"=>1,
			"id_subbid_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"tanggal"=>$this->input->post('tanggal_aset',TRUE)
		);
		$this->db->insert('bangunan',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('input');
	}
	public function tambah04()
	{
		$kode1=$this->input->post('kode1', TRUE);
		$foto=$_FILES['gambar']['name'];
		$dir="upload/"; //tempat upload foto
		$file='gambar'; //name pada input type file
		$filename 	= $_FILES['gambar']['name'];
		if($foto!=""){	
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'gambar';
			$new_name	='uploadirigasi'.date('YmdHis').$this->M_input->getId('irigasi','id_irigasi'); //name pada input type file
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
			$new_name="";
			$ext="";
		}
		$data=array(
			"id_irigasi"=>$this->M_input->getId('irigasi','id_irigasi'),
			"kode_barang"=>$kode1,
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"konstruksi"=>$this->input->post('konstruksi', TRUE),
			"no_reg"=>$this->input->post('no_reg', TRUE),
			"panjang"=>$this->input->post('panjang', TRUE),
			"lebar"=>$this->input->post('lebar', TRUE),
			"luas"=>$this->input->post('luas', TRUE),
			"letak"=>$this->input->post('letak', TRUE),
			"tanggal_dokumen"=>$this->input->post('tanggal_dokumen', TRUE),
			"nomor_dokumen"=>$this->input->post('no_dokumen', TRUE),
			"status_tanah"=>$this->input->post('status_tanah', TRUE),
			"nomor_kode_tanah"=>$this->input->post('no_kode_tanah', TRUE),
			"asal"=>$this->input->post('asal', TRUE),
			"harga"=>$this->input->post('harga', TRUE),
			"kondisi"=>$this->input->post('kondisi', TRUE),
			"keterangan"=>$this->input->post('keterangan', TRUE),
			"foto"=>$new_name.$ext,
			"status"=>1,
			"id_subbid_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"tanggal"=>$this->input->post('tanggal_aset',TRUE)
		);
		$this->db->insert('irigasi',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('input');
	}
	public function tambah05()
	{
		$kode1=$this->input->post('kode1', TRUE);
		$foto=$_FILES['gambar']['name'];
		$dir="upload/"; //tempat upload foto
		$file='gambar'; //name pada input type file
		$filename 	= $_FILES['gambar']['name'];
		if($foto!=""){	
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'gambar';
			$new_name	='uploadaset'.date('YmdHis').$this->M_input->getId('aset','id_aset'); //name pada input type file
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
			$new_name="";
			$ext="";
		}
		$data=array(
			"id_aset"=>$this->M_input->getId('aset','id_aset'),
			"kode_barang"=>$kode1,
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"no_reg"=>$this->input->post('no_reg', TRUE),
			"judul"=>$this->input->post('judul', TRUE),
			"spesifikasi"=>$this->input->post('spesifikasi', TRUE),
			"asal"=>$this->input->post('asal', TRUE),
			"pencipta"=>$this->input->post('pencipta', TRUE),
			"bahan"=>$this->input->post('bahan', TRUE),
			"jenis"=>$this->input->post('jenis', TRUE),
			"ukuran"=>$this->input->post('ukuran', TRUE),
			"jumlah"=>$this->input->post('jumlah', TRUE),
			"tahun"=>$this->input->post('tahun', TRUE),
			"asal_usul"=>$this->input->post('asal_usul', TRUE),
			"harga"=>$this->input->post('harga', TRUE),
			"keterangan"=>$this->input->post('keterangan', TRUE),
			"foto"=>$new_name.$ext,
			"status"=>1,
			"id_subbid_barang"=>$this->input->post('id_bidang_barang', TRUE),
			"tanggal"=>$this->input->post('tanggal_aset',TRUE)
		);
		$this->db->insert('aset',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('input');
	}
	public function tambah06()
	{
		$foto=$_FILES['gambar']['name'];
		$dir="upload/"; //tempat upload foto
		$file='gambar'; //name pada input type file
		$filename 	= $_FILES['gambar']['name'];
		if($foto!=""){	
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'gambar';
			$new_name	='uploadkonstruksi'.date('YmdHis').$this->M_input->getId('konstruksi','id_konstruksi'); //name pada input type file
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
			$new_name="";
			$ext="";
		}
		$data=array(
			"id_konstruksi"=>$this->M_input->getId('konstruksi','id_konstruksi'),
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
		$this->db->insert('konstruksi',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		redirect('input');
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
			redirect('input');
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
				   	$dataexcel[$i - 2]['kode_barang']=$data['cells'][$i][2];
					$dataexcel[$i - 2]['nama_barang']=$data['cells'][$i][3];
					$dataexcel[$i - 2]['no_reg']=$data['cells'][$i][4];
					$dataexcel[$i - 2]['jumlah']=$data['cells'][$i][5];
					$dataexcel[$i - 2]['merk']=$data['cells'][$i][6];
					$dataexcel[$i - 2]['ukuran']=$data['cells'][$i][7];
					$dataexcel[$i - 2]['bahan']=$data['cells'][$i][8];
					$dataexcel[$i - 2]['tahun_pembelian']=$data['cells'][$i][9];
					$dataexcel[$i - 2]['no_pabrik']=$data['cells'][$i][10];
					$dataexcel[$i - 2]['no_rangka']=$data['cells'][$i][11];
					$dataexcel[$i - 2]['no_mesin']=$data['cells'][$i][12];
					$dataexcel[$i - 2]['no_polisi']=$data['cells'][$i][13];
					$dataexcel[$i - 2]['no_bpkb']=$data['cells'][$i][14];
					$dataexcel[$i - 2]['asal']=$data['cells'][$i][15];
					$dataexcel[$i - 2]['harga']=$data['cells'][$i][16];
					$dataexcel[$i - 2]['keterangan']=$data['cells'][$i][18];
					$dataexcel[$i - 2]['scan_bpkb']=null;
					$dataexcel[$i - 2]['scan_stnk']=null;
					$dataexcel[$i - 2]['scan_foto']=null;
					$dataexcel[$i - 2]['id_pemegang']=null;
					$dataexcel[$i - 2]['tanggal_pajak']=null;
					$dataexcel[$i - 2]['kondisi']=null;
					$dataexcel[$i - 2]['status']=1;
					$dataexcel[$i - 2]['subid']=$data['cells'][$i][17];
					$dataexcel[$i - 2]['id_lokasi']=null;
					$dataexcel[$i - 2]['tanggal']=date('Y-m-d');
		  }
		  $files = $upload_data['file_name'];
		  $path = 'assets/file/'.$fileNames;
		  unlink($path);
		  $this->M_input->loaddataken($dataexcel);
		}
		$this->session->set_flashdata('sukses','Data Berhasil Di Impor');
		redirect('input');
	}
}
