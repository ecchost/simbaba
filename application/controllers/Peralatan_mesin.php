<?php

class Peralatan_mesin extends CI_Controller {
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
		$this->load->model(array('M_peralatan_mesin','M_merk','M_pegawai','M_lokasi','M_bidang_barang','M_tanah'));
		no_access();
	}
	public function index()
	{
		$id="02";
		$data=array(
			"title"=>'Peralatan Dan Mesin||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"Peralatan_mesin/index.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"alat",
			"all"=>$this->M_peralatan_mesin->allsub($id)->result(),
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Peralatan Mesin', site_url('Peralatan_mesin'));
		$this->load->view('admin/template',$data);
	}
	public function detail($id)
	{
		if($id=='0202'){
			$body='Peralatan_mesin/detail_alat_besar.php';
		}elseif ($id=='0203') {
			$body='Peralatan_mesin/detail3.php';
		}else{
			$body='Peralatan_mesin/detail2.php';
		}
		$sub=$this->M_bidang_barang->getNamaSub($id)->row_array();
		$data=array(
			"title"=>'Detail||Peralatan Dan Mesin||SIMBABA',
			"menu"=>"menu.php",
			"content"=>$body,
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"alat",
			"allbar"=>$this->M_peralatan_mesin->getJumlahBarang($id)->result(),
			"id"=>$id
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Peralatan Dan Mesin', site_url('Peralatan_mesin'));
		$this->breadcrumb->append_crumb('Detail Barang Di <i><strong>'.$sub['nama_subbid_barang'].'</strong></i>', site_url('Peralatan_mesin'));
		$this->load->view('admin/template_full',$data);
	}
	 function hapus($kode,$id)
    {
         $info=array(
         	"status"=>0
        );
        $this->db->where('id_peralatan_mesin',$id);
        $this->db->update('peralatan_mesin',$info);
        $this->session->set_flashdata('sukses','Data Berhasil Di Nonaktifkan');
        redirect('peralatan_mesin/detail/'.$kode);
    }
    function aktifkan($kode,$id)
    {
         $info=array(
         	"status"=>1
        );
        $this->db->where('id_peralatan_mesin',$id);
        $this->db->update('peralatan_mesin',$info);
        $this->session->set_flashdata('sukses','Data Berhasil Di Diaktifkan');
        redirect('peralatan_mesin/detail/'.$kode);
    }
    public function edit_kendaraan($subbid,$id)
	{
		$id_bidang='02';
		$sub=$this->M_bidang_barang->getNamaSub($subbid)->row_array();
		$data=array(
			"title"=>'Edit||Detail||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"peralatan_mesin/edit_kendaraan.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"alat",
			"id"=>$id,
			"subbid"=>$subbid,
			"getrow"=>$this->M_peralatan_mesin->getBaris($id)->row_array(),
			"bidrang"=>$this->M_tanah->getSubBidang($id_bidang)->result(),
			"barang"=>$this->M_tanah->getBarang($subbid)->result(),
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"lokasi"=>$this->M_lokasi->all()->result(),
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Peralatan Dan Mesin', site_url('Peralatan_mesin'));
		$this->breadcrumb->append_crumb('Detail Barang Di <i><strong>'.$sub['nama_subbid_barang'].'</strong></i>', site_url('Peralatan_mesin/detail/'.$subbid));
		$this->breadcrumb->append_crumb('Edit Data', site_url('tanah/detail/'.$subbid));
		$this->load->view('admin/template_full',$data);
	}
	 public function edit_non($subbid,$id)
	{
		$id_bidang='02';
		$sub=$this->M_bidang_barang->getNamaSub($subbid)->row_array();
		$data=array(
			"title"=>'Edit||Detail||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"peralatan_mesin/edit_non.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"alat",
			"id"=>$id,
			"subbid"=>$subbid,
			"getrow"=>$this->M_peralatan_mesin->getBaris($id)->row_array(),
			"bidrang"=>$this->M_tanah->getSubBidang($id_bidang)->result(),
			"barang"=>$this->M_tanah->getBarang($subbid)->result(),
			"pegawai"=>$this->M_pegawai->allak()->result(),
			"merk"=>$this->M_merk->allak()->result(),
			"lokasi"=>$this->M_lokasi->all()->result(),
		);
		$this->breadcrumb->append_crumb('Output', site_url('output'));
		$this->breadcrumb->append_crumb('Peralatan Dan Mesin', site_url('Peralatan_mesin'));
		$this->breadcrumb->append_crumb('Detail Barang Di <i><strong>'.$sub['nama_subbid_barang'].'</strong></i>', site_url('Peralatan_mesin/detail/'.$subbid));
		$this->breadcrumb->append_crumb('Edit Data', site_url('tanah/detail/'.$subbid));
		$this->load->view('admin/template_full',$data);
	}
	public function update_kendaraan()
	{
		$kode1=$this->input->post('kode1');
		$foto=$_FILES['scan_foto']['name'];
		$dir		= "upload/";
		$dir1		= "uploads/";
		$dirs		= "uploads/";
		if($_FILES['scan_foto']['name']!=""){
			$file='scan_foto'; //name pada input type file
			$filename 	= $_FILES['scan_foto']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'scan_foto';
			$new_name='updatefoto'.date('YmdHis').$this->input->post('id_barang'); //name pada input type file
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
			}
			$gambar = imagecreatefromjpeg($source_url);
			$ext='.jpeg';
			if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
				unlink($source_url);
			}else{
				unlink($source_url);
			}
		}else{
			$new_name=$this->input->post('scan_foto_lama', TRUE);
			$ext="";
		}
		if($_FILES['scan_bpkb']['name']!=""){
			$bpkb=$_FILES['scan_bpkb']['name'];
			$file2='scan_bpkb'; //name pada input type file
			$new_name2='updatebpkb'.date('YmdHis').$this->input->post('id_barang').'.pdf'; //name pada input type file
			$vdir_upload2 = $dir;
			$file_name2=$_FILES[''.$file2.'']["name"];
			$vfile_upload2 = $vdir_upload2 . $file2;
			$tmp_name2=$_FILES[''.$file2.'']["tmp_name"];
			move_uploaded_file($tmp_name2, $dirs.$file_name2);
			$source_url2=$dir.$file_name2;
			rename($dirs.$file_name2,$dirs.$new_name2);
			//unlink($source_url2);
		}else{
			$new_name2=$this->input->post('bpkb_lama', TRUE);
		}
		// //upload scan stnk
		if($_FILES['scan_stnk']['name']!=""){
			$stnk=$_FILES['scan_stnk']['name'];
			$dir="upload/"; //tempat upload foto
			$dirs="uploads/"; //tempat upload foto
			$file='scan_stnk'; //name pada input type file
			$new_name3='updatestnk'.date('YmdHis').$this->input->post('id_barang').'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dirs.$file_name);
			$source_url3=$dir.$file_name;
			rename($dirs.$file_name,$dirs.$new_name3);
		}else{
			$new_name3=$this->input->post('stnk_lama', TRUE);
		}
		$data=array(
			"kode_barang"=>$kode1,
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"no_reg"=>$this->input->post('no_reg', TRUE),
			"jumlah"=>$this->input->post('jumlah', TRUE),
			"merk"=>$this->input->post('merk'),
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
			"tanggal"=>$this->input->post('tanggal_aset')
		);
		$this->db->where('id_peralatan_mesin',$this->input->post('id_barang'));
		$this->db->update('peralatan_mesin',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Edit');
		redirect('peralatan_mesin/edit_kendaraan/'.$this->input->post('id_bidang_barang').'/'.$this->input->post('id_barang'));
	}
	public function update_non()
	{
		$kode1=$this->input->post('kode1');
		$foto=$_FILES['scan_foto']['name'];
		if($_FILES['scan_foto']['name']!=""){
			$file='scan_foto'; //name pada input type file
			$filename 	= $_FILES['scan_foto']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			$dirs		= "uploads/";
			$file		= 'scan_foto';
			$new_name='updatefoto'.date('YmdHis').$this->input->post('id_barang'); //name pada input type file
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
			}
			$gambar = imagecreatefromjpeg($source_url);
			$ext='.jpeg';
			if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
				unlink($source_url);
			}else{
				unlink($source_url);
			}
		}else{
			$new_name=$this->input->post('scan_foto_lama', TRUE);
			$ext="";
		}
		if($_FILES['scan_bpkb']['name']!=""){
			$bpkb=$_FILES['scan_bpkb']['name'];
			$file2='scan_bpkb'; //name pada input type file
			$new_name2='updatebpkb'.date('YmdHis').$this->input->post('id_barang').'.pdf'; //name pada input type file
			$vdir_upload2 = $dir;
			$file_name2=$_FILES[''.$file2.'']["name"];
			$vfile_upload2 = $vdir_upload2 . $file2;
			$tmp_name2=$_FILES[''.$file2.'']["tmp_name"];
			move_uploaded_file($tmp_name2, $dirs.$file_name2);
			$source_url2=$dir.$file_name2;
			rename($dirs.$file_name2,$dirs.$new_name2);
			//unlink($source_url2);
		}else{
			$new_name2=$this->input->post('bpkb_lama', TRUE);
		}
		// //upload scan stnk
		if($_FILES['scan_stnk']['name']!=""){
			$stnk=$_FILES['scan_stnk']['name'];
			$dir="upload/"; //tempat upload foto
			$dirs="uploads/"; //tempat upload foto
			$file='scan_stnk'; //name pada input type file
			$new_name3='updatestnk'.date('YmdHis').$this->input->post('id_barang').'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dirs.$file_name);
			$source_url3=$dir.$file_name;
			rename($dirs.$file_name,$dirs.$new_name3);
		}else{
			$new_name3=$this->input->post('stnk_lama', TRUE);
		}
		$data=array(
			"kode_barang"=>$kode1,
			"nama_barang"=>$this->input->post('nama_barang', TRUE),
			"no_reg"=>$this->input->post('no_reg', TRUE),
			"jumlah"=>$this->input->post('jumlah', TRUE),
			"merk"=>$this->input->post('merk'),
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
			"tanggal"=>$this->input->post('tanggal_aset')
		);
		$this->db->where('id_peralatan_mesin',$this->input->post('id_barang'));
		$this->db->update('peralatan_mesin',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Edit');
		redirect('peralatan_mesin/edit_non/'.$this->input->post('id_bidang_barang').'/'.$this->input->post('id_barang'));
	}
}
