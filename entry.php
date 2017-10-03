<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class entry extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mod_entry','mod_all','mod_sheet','mod_sheetkk'));
		$this->load->library(array('auth','session','pagination','breadcrumb','form_validation','upload','excel_reader','cart'));
		$this->load->helper(array('url','apps','query','date','file','html','form'));
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider">></span>';
		$this->breadcrumb->initialize($config);
		$this->auth->restrict(fmodule('login'));
	}	
	
	public function index($offset=0)
	{
		$this->listkab_id('35');
		//redirect(fmodule('entry/prov_id/35'));
	}
	
	public function listkab_id($kd=0)
	{
		//$this->auth->akses(4);
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Provinsi'] = $Get_Kd_Provinsi = Get_Kd_Provinsi($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Provinsi,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Provinsi,'Nm_Negara');
		$d['Kd_Provinsi'] = array_print($Get_Kd_Provinsi,'Kd_Provinsi');
		$d['Nm_Provinsi'] = $Nm_Provinsi = array_print($Get_Kd_Provinsi,'Nm_Provinsi');
		$d['title'] = $title = 'DATA KABUPATEN DI PROVINSI '.$Nm_Provinsi;
		
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		
		$d['data'] = $data = $this->mod_entry->data_kabupaten($kd);
		$d['dcount'] = $data->num_rows();
		$d['tot'] = $tot = $this->mod_entry->data_kabupaten($kd)->num_rows();
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_kab/entry_listkab_id',$d);
		// exit('a');
		
	}
	
	public function kab($kd=0,$offset=0)
	{
		$this->auth->akses(4);
		
		if($this->input->post('submit')){
			$reg = 3;
			insert_form_input('kab_item_1',$reg);
			insert_form_input('kab_item_3',$reg);
			insert_form_input('kab_item_4',$reg);
			insert_form_input('kab_item_5',$reg);
			insert_form_input('kab_item_2',$reg);
			insert_form_input('kab_item_6',$reg);
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Kabupaten'] = $Get_Kd_Kabupaten = Get_Kd_Kabupaten($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Kabupaten,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Kabupaten,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Kabupaten,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_Kabupaten,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = array_print($Get_Kd_Kabupaten,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_Kabupaten,'Nm_Kabupaten');
		
		$d['title'] = $title = 'ENTRY DATA DETAIL: '.strtoupper(array_print($Get_Kd_Kabupaten,'Nm_Kabupaten'));
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_kab/entry_kab',$d);
		
	}
	
	public function listkec_id($kd=0)
	{
		//$this->auth->akses(5);
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Kabupaten'] = $Get_Kd_Kabupaten = Get_Kd_Kabupaten($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Kabupaten,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Kabupaten,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Kabupaten,'Kd_Provinsi');
		$d['Nm_Provinsi'] = $Nm_Provinsi = array_print($Get_Kd_Kabupaten,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = array_print($Get_Kd_Kabupaten,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = $Nm_Kabupaten = array_print($Get_Kd_Kabupaten,'Nm_Kabupaten');
		$d['title'] = $title = 'DATA KECAMATAN DI '.$Nm_Kabupaten;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		
		$d['data'] = $data = $this->mod_entry->data_kecamatan($kd);
		$d['dcount'] = $data->num_rows();
		$d['tot'] = $tot = $this->mod_entry->data_kecamatan($kd)->num_rows();
	
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('KABUPATEN', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_kec/entry_listkec_id',$d);
		
	}
	
	public function kec($kd=0)
	{
		$this->auth->akses(5);
		
		if($this->input->post('submit')){
			$reg = 4;
			insert_form_input('kec_item_1',$reg);
			insert_form_input('kec_item_3',$reg);
			insert_form_input('kec_item_4',$reg);
			insert_form_input('kec_item_5',$reg);
			insert_form_input('kec_item_2',$reg);
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Kecamatan'] = $Get_Kd_Kecamatan = Get_Kd_Kecamatan($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Kecamatan,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Kecamatan,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Kecamatan,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_Kecamatan,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_Kecamatan,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_Kecamatan,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_Kecamatan,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_Kecamatan,'Nm_Kecamatan');
		
		$d['title'] = $title = strtoupper('ENTRY DATA KECAMATAN '.$Nm_Kecamatan);
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
	
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_kec/entry_kec',$d);
		
	}
	
	public function listdesa_id($kd=0,$offset=0)
	{
		//$this->auth->akses(5);
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Kecamatan'] = $Get_Kd_Kecamatan = Get_Kd_Kecamatan($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Kecamatan,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Kecamatan,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Kecamatan,'Kd_Provinsi');
		$d['Nm_Provinsi'] = $Nm_Provinsi = array_print($Get_Kd_Kecamatan,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_Kecamatan,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = $Nm_Kabupaten = array_print($Get_Kd_Kecamatan,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = array_print($Get_Kd_Kecamatan,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_Kecamatan,'Nm_Kecamatan');
		$d['title'] = $title = 'DATA DESA DI KECAMATAN '.$Nm_Kecamatan;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		
		$d['data'] = $data = $this->mod_entry->data_desa($kd);
		$d['dcount'] = $data->num_rows();
		$d['tot'] = $tot = $this->mod_entry->data_desa($kd)->num_rows();
	
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('KABUPATEN', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('KECAMATAN', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_desa/entry_listdesa_id',$d);
		
	}
	
	public function desa($kd=0)
	{
		$this->auth->akses(6);
		if($this->input->post('submit')){
			$reg = 5;
			insert_form_input('desa_item_1',$reg);
			insert_form_input('desa_item_3',$reg);
			insert_form_input('desa_item_4',$reg);
			insert_form_input('desa_item_5',$reg);
			insert_form_input('desa_item_2',$reg);
			if(akses_modul(29)){
				insert_form_input('desa_item_6',$reg);
				insert_form_input('desa_item_7',$reg);
			}
			set_alert('success','Data berhasil disimpan');
			redirect(current_url());
		}
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Desa'] = $Get_Kd_Desa = Get_Kd_Desa($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Desa,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Desa,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Desa,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_Desa,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_Desa,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_Desa,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_Desa,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_Desa,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_Desa,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_Desa,'Nm_Desa');
		
		$d['title'] = $title = 'ENTRY DATA DESA '.$Nm_Desa.', KECAMATAN '.$Nm_Kecamatan;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_desa/entry_desa',$d);
		
	}
	
	public function listkk_id($kd=0,$offset=0)
	{
		//$this->auth->akses(10);
		
		$d = $this->mod_all->load();
		$d['Get_Kd_Desa'] = $Get_Kd_Desa = Get_Kd_Desa($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_Desa,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_Desa,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Desa,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_Desa,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_Desa,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_Desa,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_Desa,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_Desa,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_Desa,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_Desa,'Nm_Desa');
		
		$d['title'] = $title = 'DATA KELUARGA';
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		
		$limit = 100;
		// $d['data'] = $data = $this->mod_entry->data_kk($kd);


		// $anggota = $this->db->where('kd_desa',$kd)->get('anggota_keluarga')->result_array();
		$anggota = $this->mod_sheetkk->datakepalakeluarga($kd)->result_array();
		$d['anggota'] = $anggota;


		// var_dump($d);
		/*$d['dcount'] = $data->num_rows();
		$d['tot'] = $tot = $this->mod_entry->data_kk($kd)->num_rows();
		$config['base_url'] = site_url(fmodule('entry/listkk_id/'.$kd));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagination pagination-mini"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$d['pagination'] = $this->pagination->create_links();*/
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_kk/entry_listkk_id',$d);
		
	}
	
	public function kk($no_kk=0)
	{
		$this->auth->akses(10);
		if($this->input->post('submit')){
			$reg = 9;
			insert_form_input('kk_item_1',$reg);
			insert_form_input('kk_item_3',$reg);
			insert_form_input('kk_item_4',$reg);
			insert_form_input('kk_item_2',$reg,TRUE);
			insert_form_input('kk_item_7',$reg);
			if(akses_modul(29)){
				insert_form_input('kk_item_5',$reg);
				if($this->input->post('kk_item_5') == 1){
					insert_form_input('kk_item_6',$reg);
				}
				else{
					insert_form_input('kk_item_6',$reg,FALSE,'0');
				}
			}
			if(akses_modul(30)){
				insert_form_input('kk_item_8',$reg);
				insert_form_input('kk_item_9',$reg);
				insert_form_input('kk_item_10',$reg);
				insert_form_input('kk_item_11',$reg);
				insert_form_input('kk_item_12',$reg);
				insert_form_input('kk_item_13',$reg);
			}
			//insert_form_input('individu_item_6',10);
			$this->mod_entry->update_data_kk();
			
		}
		
		$d = $this->mod_all->load();
		$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($no_kk);
		$d['Kd_Negara'] = array_print($Get_Kd_KK,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
		$d['Kd_Dusun'] = array_print($Get_Kd_KK,'Kd_Dusun');
		$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
		$d['RW'] = array_print($Get_Kd_KK,'RW');
		$d['RT'] = array_print($Get_Kd_KK,'RT');
		$d['No_KK'] = array_print($Get_Kd_KK,'No_KK');
		
		$d['title'] = $title = 'ENTRY DATA KK: '.$no_kk;
		$d['no_kk'] = $no_kk;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		$d['jml_individu'] = $this->mod_entry->jumlah_individu($no_kk);
		$d['op_individu'] = $this->mod_entry->op_individu($no_kk);
		$d['slc_op_individu'] = $this->mod_entry->get_kepala_kk($no_kk);
		$d['alamat'] = $this->mod_entry->get_alamat_kk($no_kk);
		

		$uri = $this->uri->segment_array();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));

		// $this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
		$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listindividu_id/'.$uri[count($uri)])));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_kk/entry_kk',$d);
		
	}

	public function hapuskk($no_kk,$loopback){
			// $this->mod_entry->delete_data_kk($no_kk);
			// $this->db->where('kd_desa', $loopback);
			// $this->db->where('no_kk', $no_kk);
			$this->db->where('id', $no_kk);
  			$this->db->delete('anggota_keluarga');
			set_alert('success','Data berhasil dihapus');
			redirect(fmodule('entry/listkk_id/'.$loopback));

			echo $no_kk.' '.$loopback;
	}

	public function addkk($kd=0)
	{
		$this->auth->akses(10);


		$this->form_validation->set_rules('No_KK', 'No_KK', 'required|numeric');
        $this->form_validation->set_rules('kk_item_2', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('kk_item_4', 'RT', 'required');
        $this->form_validation->set_rules('kk_item_3', 'RW', 'required');
        $this->form_validation->set_rules('kk_item_6', 'Nomor Dawis', 'required|numeric');
        $this->form_validation->set_rules('kk_item_7', 'Nama Dawis', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
        // $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]|min_length[6]|max_length[12]');
        $this->form_validation->set_error_delimiters('<span style="color:red;"><strong>', '</strong></span><br />');

        if ($this->form_validation->run() == TRUE) {
            if($this->input->post('submit')){
				$reg = 9;
				$NoKK = $this->input->post('No_KK');
				$this->mod_entry->insert_data_kk();
				//insert_form_input('kk_item_1',$reg);
				insert_form_input('kk_item_3',$reg);
				insert_form_input('kk_item_4',$reg);
				insert_form_input('kk_item_2',$reg,TRUE);
				$this->mod_entry->update_field();
				set_alert('success','Data berhasil disimpan');
				redirect(fmodule('entry/addindividu/'.$NoKK));
			}
        } else // If validation incorrect
        {
	        // $this->auth();
			
			$d = $this->mod_all->load();
			$d['Get_Kd_Desa'] = $Get_Kd_Desa = Get_Kd_Desa($kd);
			$d['Kd_Negara'] = array_print($Get_Kd_Desa,'Kd_Negara');
			$d['Nm_Negara'] = array_print($Get_Kd_Desa,'Nm_Negara');
			$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Desa,'Kd_Provinsi');
			$d['Nm_Provinsi'] = array_print($Get_Kd_Desa,'Nm_Provinsi');
			$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_Desa,'Kd_Kabupaten');
			$d['Nm_Kabupaten'] = array_print($Get_Kd_Desa,'Nm_Kabupaten');
			$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_Desa,'Kd_Kecamatan');
			$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_Desa,'Nm_Kecamatan');
			$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_Desa,'Kd_Desa');
			$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_Desa,'Nm_Desa');
			
			$d['title'] = $title = 'TAMBAH DATA KELUARGA';
			$d['no_kk'] = 0;
			$d['site_title'] = site_title($title);
			$d['menuactive'] = 'entry';
			/*$d['jml_individu'] = $this->mod_entry->jumlah_individu($no_kk);
			$d['op_individu'] = $this->mod_entry->op_individu($no_kk);
			$d['slc_op_individu'] = $this->mod_entry->get_kepala_kk($no_kk);
			$d['alamat'] = $this->mod_entry->get_alamat_kk($no_kk);*/
			
			
			$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
			$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
			$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
			$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
			$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
			$this->breadcrumb->append_crumb($title, '/');
			$this->load->view('entry_kk/entry_kk_add',$d);
        }



	
		
	}


	public function editkk($no_kk,$kd=0){
		

		$this->auth->akses(10);



		$this->form_validation->set_rules('No_KK', 'No_KK', 'required|numeric');
        $this->form_validation->set_rules('kk_item_2', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('kk_item_4', 'RT', 'required');
        $this->form_validation->set_rules('kk_item_4', 'RW', 'required');
        $this->form_validation->set_rules('kk_item_6', 'Nomor Dawis', 'required|numeric');
        $this->form_validation->set_rules('kk_item_7', 'Nama Dawis', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
        // $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]|min_length[6]|max_length[12]');
        $this->form_validation->set_error_delimiters('<span style="color:red;"><strong>', '</strong></span><br />');


        if ($this->form_validation->run() == TRUE) {
            if($this->input->post('submit')){
				$reg = 9;
				// $NoKK = $this->input->post('No_KK');
				$this->mod_entry->edit_data_kk($no_kk);
				//insert_form_input('kk_item_1',$reg);
				// insert_form_input('kk_item_3',$reg);
				// insert_form_input('kk_item_4',$reg);
				// insert_form_input('kk_item_2',$reg,TRUE);
				// $this->mod_entry->update_field();
				set_alert('success','Data berhasil diupdate');
				redirect(fmodule('entry/listkk_id/'.$kd));
			}
        } else // If validation incorrect
        {
			$d = $this->mod_all->load();
			$d['data'] = $this->mod_entry->get_data_kk($no_kk);
			$d['Get_Kd_Desa'] = $Get_Kd_Desa = Get_Kd_Desa($kd);
			$d['Kd_Negara'] = array_print($Get_Kd_Desa,'Kd_Negara');
			$d['Nm_Negara'] = array_print($Get_Kd_Desa,'Nm_Negara');
			$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_Desa,'Kd_Provinsi');
			$d['Nm_Provinsi'] = array_print($Get_Kd_Desa,'Nm_Provinsi');
			$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_Desa,'Kd_Kabupaten');
			$d['Nm_Kabupaten'] = array_print($Get_Kd_Desa,'Nm_Kabupaten');
			$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_Desa,'Kd_Kecamatan');
			$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_Desa,'Nm_Kecamatan');
			$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_Desa,'Kd_Desa');
			$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_Desa,'Nm_Desa');
			
			$d['title'] = $title = 'EDIT DATA KELUARGA';
			$d['no_kk'] = 0;
			$d['site_title'] = site_title($title);
			$d['menuactive'] = 'entry';
			/*$d['jml_individu'] = $this->mod_entry->jumlah_individu($no_kk);
			$d['op_individu'] = $this->mod_entry->op_individu($no_kk);
			$d['slc_op_individu'] = $this->mod_entry->get_kepala_kk($no_kk);
			$d['alamat'] = $this->mod_entry->get_alamat_kk($no_kk);*/
			
			
			$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
			$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
			$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
			$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
			$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
			$this->breadcrumb->append_crumb($title, '/');
			$this->load->view('entry_kk/entry_kk_edit',$d);
        }
	}
	
	public function listindividu_id($kd=0)
	{
		//$this->auth->akses(11);
		$d = $this->mod_all->load();
		$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($kd);
		$d['Kd_Negara'] = array_print($Get_Kd_KK,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
		$d['Kd_Dusun'] = array_print($Get_Kd_KK,'Kd_Dusun');
		$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
		$d['RW'] = array_print($Get_Kd_KK,'RW');
		$d['RT'] = array_print($Get_Kd_KK,'RT');
		$d['No_KK'] = $no_kk = array_print($Get_Kd_KK,'No_KK');
		
		$d['title'] = $title = 'DAFTAR INDIVIDU NO KK: '.$kd;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		$d['slc_kk'] = $this->mod_entry->get_kepala_kk($no_kk);
		
		$d['data'] = $data = $this->mod_entry->data_individu($kd);
		$d['dcount'] = $data->num_rows();
		$d['tot'] = $tot = $this->mod_entry->data_individu($kd)->num_rows();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_individu/entry_listindividu_id',$d);
		
	}
	
	public function individu($NIK=0,$offset=0)
	{
		$this->auth->akses(11);
		
		if($this->input->post('submit')){
			$reg = 10;
			insert_form_input('individu_item_1',$reg);
			insert_form_input('individu_item_2',$reg);
			insert_form_input('individu_item_3',$reg);
			insert_form_input('individu_item_4',$reg);
			insert_form_input('individu_item_5',$reg);
			insert_form_input('individu_item_6',$reg);
			if(akses_modul(17)){
				insert_form_input('individu_item_7',$reg);
				insert_form_input('individu_item_8',$reg);
				insert_form_input('individu_item_9',$reg,TRUE);
				insert_form_input('individu_item_10',$reg,TRUE);
				insert_form_input('individu_item_11',$reg,TRUE);
				insert_form_input('individu_item_12',$reg,TRUE);
				insert_form_input('individu_item_21',$reg);
			}
			if(akses_modul(18)){
				insert_form_input('individu_item_13',$reg);
				insert_form_input('individu_item_14',$reg);
				insert_form_input('individu_item_15',$reg);
				insert_form_input('individu_item_16',$reg);
			}
			if(akses_modul(19)){
				insert_form_input('individu_item_17',$reg);
			}
			insert_form_input('individu_item_18',$reg,TRUE);
			insert_form_input('individu_item_19',$reg);
			insert_form_input('individu_item_20',$reg);
			//oke
			$this->mod_entry->deletedindividu();
			$this->mod_entry->insert_individu();
			$this->mod_entry->savedindividu();
			$this->mod_entry->savedkerja();
			$this->mod_entry->savedpemasaran();
			$this->mod_entry->savedpkk();
			$this->mod_entry->savedperiksapos();
			$this->mod_entry->savedmedis();
			$this->mod_entry->savedhormonal();
			$this->mod_entry->savedtidakkb();
			$this->mod_entry->savedketrampilan();
			$this->mod_entry->savedmakanan();
			$this->mod_entry->savedkkhome();
			$this->mod_entry->savedptpsayuran();
			$this->mod_entry->savedptpbuah();
			$this->mod_entry->savedptpumbi();
			$this->mod_entry->savedptptoga();
			$this->mod_entry->savedptpternak();
			$this->mod_entry->savedptpikan();
			$this->mod_entry->savedjamkes();
			set_alert('success','Data berhasil disimpan');
			$No_KK=$this->input->post('No_KK');
			redirect(fmodule('entry/listindividu_id/'.$No_KK));
		}
		
		$no_kk = $this->mod_entry->get_no_kk($NIK);
		$d = $this->mod_all->load();
		$d['no_kk'] = $no_kk;
		$d['NIK'] = $NIK;
		$d['Kd_Dawis'] = Get_Kd_Dawis( $no_kk);
		$d['Nm_Dawis'] = Get_Nm_Dawis( $no_kk);
		$d['Nm_Lengkap'] = $Nm_Lengkap = $this->mod_entry->get_name_individu($NIK);
		$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($no_kk);
		$d['Kd_Negara'] = $Kd_Negara = array_print($Get_Kd_KK,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
		$d['Kd_Dusun'] = $Kd_Dusun = array_print($Get_Kd_KK,'Kd_Dusun');
		$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
		$d['RW'] = $RW = array_print($Get_Kd_KK,'RW');
		$d['RT'] = $RT = array_print($Get_Kd_KK,'RT');
		$d['pkk'] = $this->mod_entry->pkk()->result();
		$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
		$d['No_KK'] = $No_KK = array_print($Get_Kd_KK,'No_KK');
		$d['Alamat_KK'] = array_print($Get_Kd_KK,'Alamat');
		$d['title'] = $title = 'ENTRY DATA INDIVIDU : '.$Nm_Lengkap;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		//tambahan baru
		$d['ftable_pendidikan'] = $this->mod_entry->ftable_pendidikan($NIK);
		$d['ftable_abk'] = $this->mod_entry->ftable_abk($NIK);
		$d['ftable_butaaksara'] = $this->mod_entry->ftable_butaaksara($NIK);
		$d['op_gender'] = $this->mod_entry->op_gender();
		$d['op_agama'] = $this->mod_entry->op_agama();
		$d['op_pekerjaan'] = $this->mod_entry->op_pekerjaan();
		$d['op_status_pendidikan'] = $this->mod_entry->op_status_pendidikan();
		$d['op_lokasi_sekolah'] = $this->mod_entry->op_lokasi_sekolah();
		$d['slc_lokasi_sekolah'] = $id_lokasi_sekolah = 0;
		$d['op_list_sekolah'] = $this->mod_entry->op_list_sekolah($id_lokasi_sekolah,0);
		$d['sayur'] = $this->mod_entry->sayur()->result();
		$d['buah'] = $this->mod_entry->buah()->result();
		$d['umbi'] = $this->mod_entry->umbi()->result();
		$d['pkk'] = $this->mod_entry->pkk()->result();
		$d['toga'] = $this->mod_entry->toga()->result();
		$d['ternak'] = $this->mod_entry->ternak()->result();
		$d['ikan'] = $this->mod_entry->ikan()->result();
		$d['makanan'] = $this->mod_entry->makanan()->result();
		$d['lansia'] = $this->mod_entry->lansia();
		$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
		$d['lantai'] = $this->mod_entry->lantai();
		$d['kawin'] = $this->mod_entry->kawin();
		$d['jamban'] = $this->mod_entry->jamban();
		$d['sampah'] = $this->mod_entry->sampah();
		$d['surat_rumah'] = $this->mod_entry->surat_rumah();
		$d['sumber'] = $this->mod_entry->sumber();
		$d['jamkes'] = $this->mod_entry->jamkes();
		$d['umur'] = $this->mod_entry->umur();
		$d['skor'] = $this->mod_entry->skor();
		$d['slc_list_sekolah'] = 0;
		$d['data'] = $this->mod_entry->get_data_individu($NIK);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
		$this->breadcrumb->append_crumb('No KK: '.$no_kk, site_url(fmodule('entry/listindividu_id/'.$no_kk)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_individu/entry_individu',$d);
		
	}
	public function hapusindividu($NIK=0,$offset=0)
	{
		$this->auth->akses(11);
		
		if($this->input->post('submit')){
			$KK=$this->input->post('No_KK');
			$this->mod_entry->hapusindividu();
			set_alert('success','Data berhasil dihapus');
			redirect(fmodule('entry/listindividu_id/'.$KK));
		}
		
		$no_kk = $this->mod_entry->get_no_kk($NIK);
		$d = $this->mod_all->load();
		$d['no_kk'] = $no_kk;
		$d['NIK'] = $NIK;
		$d['Kd_Dawis'] = Get_Kd_Dawis($no_kk);
		$d['Nm_Dawis'] = Get_Nm_Dawis($no_kk);
		$d['Nm_Lengkap'] = $Nm_Lengkap = $this->mod_entry->get_name_individu($NIK);
		$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($no_kk);
		$d['Kd_Negara'] = $Kd_Negara = array_print($Get_Kd_KK,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
		$d['Kd_Dusun'] = $Kd_Dusun = array_print($Get_Kd_KK,'Kd_Dusun');
		$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
		$d['RW'] = $RW = array_print($Get_Kd_KK,'RW');
		$d['RT'] = $RT = array_print($Get_Kd_KK,'RT');
		$d['pkk'] = $this->mod_entry->pkk()->result();
		$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
		$d['No_KK'] = $No_KK = array_print($Get_Kd_KK,'No_KK');
		$d['Alamat_KK'] = array_print($Get_Kd_KK,'Alamat');
		$d['title'] = $title = 'HAPUS DATA INDIVIDU : '.$Nm_Lengkap;
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		//tambahan baru
		$d['ftable_pendidikan'] = $this->mod_entry->ftable_pendidikan($NIK);
		$d['ftable_abk'] = $this->mod_entry->ftable_abk($NIK);
		$d['ftable_butaaksara'] = $this->mod_entry->ftable_butaaksara($NIK);
		$d['op_gender'] = $this->mod_entry->op_gender();
		$d['op_agama'] = $this->mod_entry->op_agama();
		$d['op_pekerjaan'] = $this->mod_entry->op_pekerjaan();
		$d['op_status_pendidikan'] = $this->mod_entry->op_status_pendidikan();
		$d['op_lokasi_sekolah'] = $this->mod_entry->op_lokasi_sekolah();
		$d['slc_lokasi_sekolah'] = $id_lokasi_sekolah = 0;
		$d['op_list_sekolah'] = $this->mod_entry->op_list_sekolah($id_lokasi_sekolah,0);
		$d['sayur'] = $this->mod_entry->sayur()->result();
		$d['buah'] = $this->mod_entry->buah()->result();
		$d['umbi'] = $this->mod_entry->umbi()->result();
		$d['pkk'] = $this->mod_entry->pkk()->result();
		$d['toga'] = $this->mod_entry->toga()->result();
		$d['ternak'] = $this->mod_entry->ternak()->result();
		$d['ikan'] = $this->mod_entry->ikan()->result();
		$d['makanan'] = $this->mod_entry->makanan()->result();
		$d['lansia'] = $this->mod_entry->lansia();
		$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
		$d['lantai'] = $this->mod_entry->lantai();
		$d['kawin'] = $this->mod_entry->kawin();
		$d['jamban'] = $this->mod_entry->jamban();
		$d['sampah'] = $this->mod_entry->sampah();
		$d['surat_rumah'] = $this->mod_entry->surat_rumah();
		$d['sumber'] = $this->mod_entry->sumber();
		$d['jamkes'] = $this->mod_entry->jamkes();
		$d['umur'] = $this->mod_entry->umur();
		$d['skor'] = $this->mod_entry->skor();
		$d['slc_list_sekolah'] = 0;
		$d['data'] = $this->mod_entry->get_data_individu($NIK);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
		$this->breadcrumb->append_crumb('No KK: '.$no_kk, site_url(fmodule('entry/listindividu_id/'.$no_kk)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_individu/hapusindividu',$d);
		
	}
	
	public function addindividu($No_KK=0,$offset=0)
	{
		$this->auth->akses(11);
		if($this->input->post('submit')){

		$this->form_validation->set_rules('NIK', 'NIK', 'required|numeric');
        $this->form_validation->set_error_delimiters('<span style="color:red;"><strong>', '</strong></span>');
        

	        if ($this->form_validation->run() == TRUE) {
	            if ($this->input->post()) {
	                $reg = 10;
					insert_form_input('individu_item_1',$reg);
					insert_form_input('individu_item_2',$reg);
					insert_form_input('individu_item_3',$reg);
					insert_form_input('individu_item_4',$reg);
					insert_form_input('individu_item_5',$reg);
					insert_form_input('individu_item_6',$reg);
					if(akses_modul(17)){
						insert_form_input('individu_item_7',$reg);
						insert_form_input('individu_item_8',$reg);
						insert_form_input('individu_item_9',$reg,TRUE);
						insert_form_input('individu_item_10',$reg,TRUE);
						insert_form_input('individu_item_11',$reg,TRUE);
						insert_form_input('individu_item_12',$reg,TRUE);
						insert_form_input('individu_item_21',$reg);
					}
					if(akses_modul(18)){
						insert_form_input('individu_item_13',$reg);
						insert_form_input('individu_item_14',$reg);
						insert_form_input('individu_item_15',$reg);
						insert_form_input('individu_item_16',$reg);
					}
					if(akses_modul(19)){
						insert_form_input('individu_item_17',$reg);
					}
					insert_form_input('individu_item_18',$reg,TRUE);
					//insert_form_input('individu_item_19',$reg);
					insert_form_input('individu_item_20',$reg);
					//oke
					$this->mod_entry->deletedindividu();
					$this->mod_entry->insert_individu();
					$this->mod_entry->savedindividu();
					$this->mod_entry->savedkerja();
					$this->mod_entry->savedpemasaran();
					$this->mod_entry->savedpkk();
					$this->mod_entry->savedperiksapos();
					$this->mod_entry->savedmedis();
					$this->mod_entry->savedhormonal();
					$this->mod_entry->savedtidakkb();
					$this->mod_entry->savedketrampilan();
					$this->mod_entry->savedmakanan();
					$this->mod_entry->savedkkhome();
					$this->mod_entry->savedptpsayuran();
					$this->mod_entry->savedptpbuah();
					$this->mod_entry->savedptpumbi();
					$this->mod_entry->savedptptoga();
					$this->mod_entry->savedptpternak();
					$this->mod_entry->savedptpikan();
					$this->mod_entry->savedjamkes();
					set_alert('success','Data berhasil disimpan');
					redirect(fmodule('entry/listindividu_id/'.$No_KK));

	            }
	        } else // If validation incorrect
	        {
	            // $this->addindividu($No_KK);
	            //$no_kk = $this->mod_entry->get_no_kk($NIK);
			$d = $this->mod_all->load();
			//$d['no_kk'] = $no_kk;
			$d['NIK'] = $NIK = 0;
			//$d['Nm_Lengkap'] = $Nm_Lengkap = $this->mod_entry->get_name_individu($NIK);
			$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($No_KK);
			$d['Kd_Negara'] = array_print($Get_Kd_KK,'Kd_Negara');
			$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
			$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
			$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
			$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
			$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
			$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
			$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
			$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
			$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
			$d['Kd_Dusun'] = array_print($Get_Kd_KK,'Kd_Dusun');
			$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
			$d['RW'] = array_print($Get_Kd_KK,'RW');
			$d['RT'] = array_print($Get_Kd_KK,'RT');
			$d['Kd_Dawis'] = Get_Kd_Dawis( $No_KK);
			$d['Nm_Dawis'] = Get_Nm_Dawis( $No_KK);
			$d['No_KK'] = array_print($Get_Kd_KK,'No_KK');
			$d['Alamat_KK'] = array_print($Get_Kd_KK,'Alamat');
			
			$d['title'] = $title = 'TAMBAH DATA INDIVIDU';
			$d['site_title'] = site_title($title);
			$d['menuactive'] = 'entry';
			//$d['kategori_item'] = $this->mod_entry->kategori_item();
			$d['ftable_pendidikan'] = $this->mod_entry->ftable_pendidikan($NIK);
			$d['ftable_abk'] = $this->mod_entry->ftable_abk($NIK);
			$d['ftable_butaaksara'] = $this->mod_entry->ftable_butaaksara($NIK);
			$d['op_gender'] = $this->mod_entry->op_gender();
			$d['op_agama'] = $this->mod_entry->op_agama();
			$d['op_pekerjaan'] = $this->mod_entry->op_pekerjaan();
			$d['op_status_pendidikan'] = $this->mod_entry->op_status_pendidikan();
			$d['op_lokasi_sekolah'] = $this->mod_entry->op_lokasi_sekolah();
			$d['slc_lokasi_sekolah'] = $id_lokasi_sekolah = 0;
			$d['op_list_sekolah'] = $this->mod_entry->op_list_sekolah($id_lokasi_sekolah,0);
			$d['sayur'] = $this->mod_entry->sayur()->result();
			$d['buah'] = $this->mod_entry->buah()->result();
			$d['umbi'] = $this->mod_entry->umbi()->result();
			$d['pkk'] = $this->mod_entry->pkk()->result();
			$d['toga'] = $this->mod_entry->toga()->result();
			$d['ternak'] = $this->mod_entry->ternak()->result();
			$d['ikan'] = $this->mod_entry->ikan()->result();
			$d['makanan'] = $this->mod_entry->makanan()->result();
			$d['lansia'] = $this->mod_entry->lansia();
			$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
			$d['lantai'] = $this->mod_entry->lantai();
			$d['kawin'] = $this->mod_entry->kawin();
			$d['jamban'] = $this->mod_entry->jamban();
			$d['sampah'] = $this->mod_entry->sampah();
			$d['surat_rumah'] = $this->mod_entry->surat_rumah();
			$d['sumber'] = $this->mod_entry->sumber();
			$d['jamkes'] = $this->mod_entry->jamkes();
			$d['umur'] = $this->mod_entry->umur();
			$d['skor'] = $this->mod_entry->skor();
			$d['slc_list_sekolah'] = 0;
			//$d['data'] = $this->mod_entry->get_data_individu($NIK);
			$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
			$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
			$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
			$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
			$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
			$this->breadcrumb->append_crumb('No KK: '.$No_KK, site_url(fmodule('entry/listindividu_id/'.$No_KK)));
			$this->breadcrumb->append_crumb($title, '/');
			$this->load->view('entry_individu/entry_individu_add',$d);
	        }
			
		}
		else
		{

			//$no_kk = $this->mod_entry->get_no_kk($NIK);
			$d = $this->mod_all->load();
			//$d['no_kk'] = $no_kk;
			$d['NIK'] = $NIK = 0;
			//$d['Nm_Lengkap'] = $Nm_Lengkap = $this->mod_entry->get_name_individu($NIK);
			$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($No_KK);
			$d['Kd_Negara'] = array_print($Get_Kd_KK,'Kd_Negara');
			$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
			$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
			$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
			$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
			$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
			$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
			$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
			$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
			$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
			$d['Kd_Dusun'] = array_print($Get_Kd_KK,'Kd_Dusun');
			$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
			$d['RW'] = array_print($Get_Kd_KK,'RW');
			$d['RT'] = array_print($Get_Kd_KK,'RT');
			$d['Kd_Dawis'] = Get_Kd_Dawis( $No_KK);
			$d['Nm_Dawis'] = Get_Nm_Dawis( $No_KK);
			$d['No_KK'] = array_print($Get_Kd_KK,'No_KK');
			$d['Alamat_KK'] = array_print($Get_Kd_KK,'Alamat');
			
			$d['title'] = $title = 'TAMBAH DATA INDIVIDU';
			$d['site_title'] = site_title($title);
			$d['menuactive'] = 'entry';
			//$d['kategori_item'] = $this->mod_entry->kategori_item();
			$d['ftable_pendidikan'] = $this->mod_entry->ftable_pendidikan($NIK);
			$d['ftable_abk'] = $this->mod_entry->ftable_abk($NIK);
			$d['ftable_butaaksara'] = $this->mod_entry->ftable_butaaksara($NIK);
			$d['op_gender'] = $this->mod_entry->op_gender();
			$d['op_agama'] = $this->mod_entry->op_agama();
			$d['op_pekerjaan'] = $this->mod_entry->op_pekerjaan();
			$d['op_status_pendidikan'] = $this->mod_entry->op_status_pendidikan();
			$d['op_lokasi_sekolah'] = $this->mod_entry->op_lokasi_sekolah();
			$d['slc_lokasi_sekolah'] = $id_lokasi_sekolah = 0;
			$d['op_list_sekolah'] = $this->mod_entry->op_list_sekolah($id_lokasi_sekolah,0);
			$d['sayur'] = $this->mod_entry->sayur()->result();
			$d['buah'] = $this->mod_entry->buah()->result();
			$d['umbi'] = $this->mod_entry->umbi()->result();
			$d['pkk'] = $this->mod_entry->pkk()->result();
			$d['toga'] = $this->mod_entry->toga()->result();
			$d['ternak'] = $this->mod_entry->ternak()->result();
			$d['ikan'] = $this->mod_entry->ikan()->result();
			$d['makanan'] = $this->mod_entry->makanan()->result();
			$d['lansia'] = $this->mod_entry->lansia();
			$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
			$d['lantai'] = $this->mod_entry->lantai();
			$d['kawin'] = $this->mod_entry->kawin();
			$d['jamban'] = $this->mod_entry->jamban();
			$d['sampah'] = $this->mod_entry->sampah();
			$d['surat_rumah'] = $this->mod_entry->surat_rumah();
			$d['sumber'] = $this->mod_entry->sumber();
			$d['jamkes'] = $this->mod_entry->jamkes();
			$d['umur'] = $this->mod_entry->umur();
			$d['skor'] = $this->mod_entry->skor();
			$d['slc_list_sekolah'] = 0;
			//$d['data'] = $this->mod_entry->get_data_individu($NIK);
			$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
			$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
			$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
			$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
			$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
			$this->breadcrumb->append_crumb('No KK: '.$No_KK, site_url(fmodule('entry/listindividu_id/'.$No_KK)));
			$this->breadcrumb->append_crumb($title, '/');
			$this->load->view('entry_individu/entry_individu_add',$d);
		}
		
	}
	public function srcindtocopy($no_kk=0,$offset=0){
		$this->session->keep_flashdata('keyword');
		
		if($this->input->post('submit')){
			$this->session->set_flashdata('keyword',$this->input->post('keyword'));
			redirect(current_url());
		}
		$d = $this->mod_all->load();
		$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($no_kk);
		$d['Kd_Negara'] = array_print($Get_Kd_KK,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
		$d['Kd_Dusun'] = array_print($Get_Kd_KK,'Kd_Dusun');
		$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
		$d['RW'] = array_print($Get_Kd_KK,'RW');
		$d['RT'] = array_print($Get_Kd_KK,'RT');
		$d['No_KK'] = $no_kk;
		
		$d['title'] = $title = 'Cari Data Individu';
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		$d['keyword'] = $this->session->flashdata('keyword');
		//$d['slc_kk'] = $this->mod_entry->get_kepala_kk($no_kk);
		
		$limit = 50;
		$d['data'] = $data = $this->mod_entry->srcindtocopy($no_kk,$limit,$offset);
		$d['dcount'] = $data->num_rows();
		$d['tot'] = $tot = $this->mod_entry->srcindtocopy($no_kk)->num_rows();
		$config['base_url'] = site_url(fmodule('entry/srcindtocopy/'.$no_kk));
		$config['total_rows'] = $tot;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagination pagination-mini"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$d['pagination'] = $this->pagination->create_links();
		
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
		$this->breadcrumb->append_crumb('No KK: '.$no_kk, site_url(fmodule('entry/listindividu_id/'.$no_kk)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_individu/entry_srcindtocopy',$d);
	}
	
	public function ambilindividu($no_kk_n=0,$NIK=0)
	{
		$No_KK=$this->uri->segment(4);
		$this->auth->akses(11);
		if($this->input->post('submit')){
			$reg = 10;
			insert_form_input('individu_item_1',$reg);
			insert_form_input('individu_item_2',$reg);
			insert_form_input('individu_item_3',$reg);
			insert_form_input('individu_item_4',$reg);
			insert_form_input('individu_item_5',$reg);
			insert_form_input('individu_item_6',$reg);
			if(akses_modul(17)){
				insert_form_input('individu_item_7',$reg);
				insert_form_input('individu_item_8',$reg);
				insert_form_input('individu_item_9',$reg,TRUE);
				insert_form_input('individu_item_10',$reg,TRUE);
				insert_form_input('individu_item_11',$reg,TRUE);
				insert_form_input('individu_item_12',$reg,TRUE);
				insert_form_input('individu_item_21',$reg);
			}
			if(akses_modul(18)){
				insert_form_input('individu_item_13',$reg);
				insert_form_input('individu_item_14',$reg);
				insert_form_input('individu_item_15',$reg);
				insert_form_input('individu_item_16',$reg);
			}
			if(akses_modul(19)){
				insert_form_input('individu_item_17',$reg);
			}
			insert_form_input('individu_item_18',$reg,TRUE);
			//insert_form_input('individu_item_19',$reg);
			insert_form_input('individu_item_20',$reg);
			//oke
			$this->mod_entry->deletedindividu();
			$this->mod_entry->insert_individu();
			$this->mod_entry->savedindividu();
			$this->mod_entry->savedkerja();
			$this->mod_entry->savedpemasaran();
			$this->mod_entry->savedpkk();
			$this->mod_entry->savedperiksapos();
			$this->mod_entry->savedmedis();
			$this->mod_entry->savedhormonal();
			$this->mod_entry->savedtidakkb();
			$this->mod_entry->savedketrampilan();
			$this->mod_entry->savedmakanan();
			$this->mod_entry->savedkkhome();
			$this->mod_entry->savedptpsayuran();
			$this->mod_entry->savedptpbuah();
			$this->mod_entry->savedptpumbi();
			$this->mod_entry->savedptptoga();
			$this->mod_entry->savedptpternak();
			$this->mod_entry->savedptpikan();
			$this->mod_entry->savedjamkes();
			set_alert('success','Data berhasil disimpan');
			redirect(fmodule('entry/listindividu_id/'.$No_KK));
		}
		
		//$no_kk = $this->mod_entry->get_no_kk($NIK);
		$d = $this->mod_all->load();
		//$d['no_kk'] = $no_kk;
		$d['NIK'] = $NIK = $this->uri->segment(5);
		//$d['Nm_Lengkap'] = $Nm_Lengkap = $this->mod_entry->get_name_individu($NIK);
		$d['Get_Kd_KK'] = $Get_Kd_KK = Get_Kd_KK($No_KK);
		$d['Kd_Negara'] = array_print($Get_Kd_KK,'Kd_Negara');
		$d['Nm_Negara'] = array_print($Get_Kd_KK,'Nm_Negara');
		$d['Kd_Provinsi'] = $Kd_Provinsi = array_print($Get_Kd_KK,'Kd_Provinsi');
		$d['Nm_Provinsi'] = array_print($Get_Kd_KK,'Nm_Provinsi');
		$d['Kd_Kabupaten'] = $Kd_Kabupaten = array_print($Get_Kd_KK,'Kd_Kabupaten');
		$d['Nm_Kabupaten'] = array_print($Get_Kd_KK,'Nm_Kabupaten');
		$d['Kd_Kecamatan'] = $Kd_Kecamatan = array_print($Get_Kd_KK,'Kd_Kecamatan');
		$d['Nm_Kecamatan'] = $Nm_Kecamatan = array_print($Get_Kd_KK,'Nm_Kecamatan');
		$d['Kd_Desa'] = $Kd_Desa = array_print($Get_Kd_KK,'Kd_Desa');
		$d['Nm_Desa'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Desa');
		$d['Kd_Dusun'] = array_print($Get_Kd_KK,'Kd_Dusun');
		$d['Nm_Dusun'] = $Nm_Desa = array_print($Get_Kd_KK,'Nm_Dusun');
		$d['RW'] = array_print($Get_Kd_KK,'RW');
		$d['RT'] = array_print($Get_Kd_KK,'RT');
		$d['Kd_Dawis'] = Get_Kd_Dawis( $No_KK);
		$d['Nm_Dawis'] = Get_Nm_Dawis( $No_KK);
		$d['No_KK'] = array_print($Get_Kd_KK,'No_KK');
		$d['Alamat_KK'] = array_print($Get_Kd_KK,'Alamat');
		
		$d['title'] = $title = 'TAMBAH DATA INDIVIDU';
		$d['site_title'] = site_title($title);
		$d['menuactive'] = 'entry';
		//$d['kategori_item'] = $this->mod_entry->kategori_item();
		$d['dataambil']=$this->mod_entry->dataimpor($NIK)->row_array();
		$d['op_gender'] = $this->mod_entry->op_gender();
		$d['op_agama'] = $this->mod_entry->op_agama();
		$d['op_pekerjaan'] = $this->mod_entry->op_pekerjaan();
		$d['op_status_pendidikan'] = $this->mod_entry->op_status_pendidikan();
		$d['op_lokasi_sekolah'] = $this->mod_entry->op_lokasi_sekolah();
		$d['slc_lokasi_sekolah'] = $id_lokasi_sekolah = 0;
		$d['op_list_sekolah'] = $this->mod_entry->op_list_sekolah($id_lokasi_sekolah,0);
		$d['sayur'] = $this->mod_entry->sayur()->result();
		$d['buah'] = $this->mod_entry->buah()->result();
		$d['umbi'] = $this->mod_entry->umbi()->result();
		$d['pkk'] = $this->mod_entry->pkk()->result();
		$d['toga'] = $this->mod_entry->toga()->result();
		$d['ternak'] = $this->mod_entry->ternak()->result();
		$d['ikan'] = $this->mod_entry->ikan()->result();
		$d['makanan'] = $this->mod_entry->makanan()->result();
		$d['lansia'] = $this->mod_entry->lansia();
		$d['ketrampilan'] = $this->mod_entry->ketrampilan()->result();
		$d['lantai'] = $this->mod_entry->lantai();
		$d['kawin'] = $this->mod_entry->kawin();
		$d['jamban'] = $this->mod_entry->jamban();
		$d['sampah'] = $this->mod_entry->sampah();
		$d['surat_rumah'] = $this->mod_entry->surat_rumah();
		$d['sumber'] = $this->mod_entry->sumber();
		$d['jamkes'] = $this->mod_entry->jamkes();
		$d['umur'] = $this->mod_entry->umur();
		$d['skor'] = $this->mod_entry->skor();
		$d['slc_list_sekolah'] = 0;
		//$d['data'] = $this->mod_entry->get_data_individu($NIK);
		$this->breadcrumb->append_crumb('Dashboard', site_url(fmodule()));
		$this->breadcrumb->append_crumb('Kabupaten', site_url(fmodule('entry/listkab_id/'.$Kd_Provinsi)));
		$this->breadcrumb->append_crumb('Kecamatan', site_url(fmodule('entry/listkec_id/'.$Kd_Kabupaten)));
		$this->breadcrumb->append_crumb('Desa', site_url(fmodule('entry/listdesa_id/'.$Kd_Kecamatan)));
		$this->breadcrumb->append_crumb('Data Keluarga', site_url(fmodule('entry/listkk_id/'.$Kd_Desa)));
		$this->breadcrumb->append_crumb('No KK: '.$No_KK, site_url(fmodule('entry/listindividu_id/'.$No_KK)));
		$this->breadcrumb->append_crumb($title, '/');
		$this->load->view('entry_individu/entry_ambilindividu',$d);
		
	}
	
	public function slc_kk($no_kk=0,$nik=0){
		if($no_kk !=0 && $nik != 0){
			$this->mod_entry->slc_kk($no_kk,$nik);
		}
	}
	
	public function js_lokasi_sekolah(){
		$d['Kd_Tingkat'] = $this->input->post('Kd_Tingkat');
		$d['op_lokasi_sekolah'] = $data = $this->mod_entry->op_lokasi_sekolah();
		$this->load->view('js_lokasi_sekolah',$d);
	}
	
	public function js_list_sekolah(){
		$Kd_Kab = $this->input->post('Kd_Kab');
		$Kd_Tingkat = $this->input->post('Kd_Tingkat');
		$d['op_list_sekolah'] = $data = $this->mod_entry->op_list_sekolah($Kd_Kab,$Kd_Tingkat);
		$this->load->view('js_list_sekolah',$d);
	}

}
