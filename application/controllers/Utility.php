<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		no_access();
	}

	public function index()
	{
		$data=array(
			"title"=>'Utility||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"utility/index.php",
			"aktifmenu"=>"output",
			"aktifsubmenu"=>"utility",
		);
		$this->breadcrumb->append_crumb('Utility', site_url('Aset'));
		$this->load->view('admin/template',$data);
	}
	function backup(){
		$this->load->helper('download');
		$this->load->dbutil();
		$nama_file	= 'simbaba';
		$prefs = array(
				'format'      => 'zip',             // gzip, zip, txt
				'filename'    => $nama_file.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
				'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
				'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
				'newline'     => "\n"               // Newline character used in backup file
			);

		$this->dbutil->backup($prefs);
		$backup =& $this->dbutil->backup($prefs); 
		$nama_database = 'simbaba' .'.zip';
	    $simpan = '/upload -'.$nama_database;
	    $this->load->helper('file');
	    write_file($simpan);
		$this->load->helper('download');
	    force_download($nama_database, $backup);
	}
	function restore(){
		$this->db->query("DROP TABLE admin");
		$this->db->query("DROP TABLE aset");
		$this->db->query("DROP TABLE bangunan");
		$this->db->query("DROP TABLE barang");
		$this->db->query("DROP TABLE bidang");
		$this->db->query("DROP TABLE bidang_barang");
		$this->db->query("DROP TABLE irigasi");
		$this->db->query("DROP TABLE konstruksi");
		$this->db->query("DROP TABLE lokasi");
		$this->db->query("DROP TABLE lokasi_subbid");
		$this->db->query("DROP TABLE merk");
		$this->db->query("DROP TABLE mutasi");
		$this->db->query("DROP TABLE pegawai");
		$this->db->query("DROP TABLE peralatan_mesin");
		$this->db->query("DROP TABLE subbid");
		$this->db->query("DROP TABLE subbid_barang");
		$this->db->query("DROP TABLE tanah");
		$this->db->query("DROP TABLE jabatan");
		$up	 	= $_FILES['gambar']['name'];
		$file='gambar';
		$dir		= './upload/';
		$config['allowed_types'] 	= 'sql';
		$config['max_size']			= '8000';
		$config['max_width']  		= '10000';
		$config['max_height'] 		= '10000';

		$this->load->library('upload', $config);			
		$tmp_name=$_FILES[''.$file.'']["tmp_name"];
		move_uploaded_file($tmp_name, $dir.$up);
		$direktori		= './upload/'.$up;
		$isi_file		= file_get_contents($direktori);
		$_satustelu		= substr($isi_file, 0, 103);
		$string_query	= rtrim($isi_file, "\n;" );
		$array_query	= explode(";", $string_query);
		
		foreach ($array_query as $query){
			$this->db->query(trim($query));
		}
		$path			= './upload/';
		$this->load->helper("file"); // load the helper
		delete_files($path, true);
		$this->session->set_flashdata('sukses','Data Berhasil Di Restore');
		redirect('Utility','index');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */ ?>