<?php

class Admin extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_admin');
		$this->load->model('M_pegawai');
		no_access();
	}
	public function index()
	{
		$session=$this->session->userdata('username');
		$data=array(
			"id"=>$this->M_admin->getId(),
			"title"=>'Admin||SIMBABA',
			"menu"=>"menu.php",
			"content"=>"admin/index.php",
			"aktifmenu"=>"admin",
			"aktifsubmenu"=>"admin",
			"all"=>$this->M_admin->all()->result(),
			"pegawai"=>$this->M_pegawai->all()->result()
		);
		$this->breadcrumb->append_crumb('Admin', site_url('admin'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$username=$this->input->post('username', TRUE);
		$password=$this->input->post('password', TRUE);
		$cekusername=$this->M_admin->checkUser($username)->num_rows();
		if($cekusername>0){
			$this->session->set_flashdata('error','Data Sudah Ada');
			redirect('admin');
		}else{
		$data=array(
			"id_admin"=>$this->input->post('id_admin', TRUE),
			"username"=>$username,
			"password"=>md5($password),
			"id_pegawai"=>$this->input->post('id_pegawai', TRUE),
			"status"=>1
		);
		$this->db->insert('admin',$data);
		$this->session->set_flashdata('sukses','Data Berhasil Di Inputkan');
		}
		redirect('admin');
	}
	public function update_proses($id)
    {
    	$pass=$this->input->post('password', TRUE);
    	$user=$this->input->post('userlama', TRUE);
    	$username=$this->input->post('username', TRUE);
    	if($username!=$user){
	    	$cek=$this->db->query("select * from admin where username='$username'")->num_rows();
	    	if($cek>0){
				$this->session->set_flashdata('error','Username Sudah Digunakan');
	    	}else{
		    	if($pass==$this->input->post('passlama', TRUE)){
		    		$password=$pass;
		    	}else{
		    		$password=md5($this->input->post('password', TRUE));
		    	}
		        $info=array(
					"username"=>$username,
					"password"=>$password
		        );
		        $this->session->unset_userdata('username');
		        $this->session->set_userdata('username',$username);
		        $this->M_admin->update_proses($info,$id);
	        	$this->session->set_flashdata('sukses','Data Berhasil Di Edit');
	    	}
	    }else{
	    	if($pass==$this->input->post('passlama', TRUE)){
	    		$password=$pass;
	    	}else{
	    		$password=md5($this->input->post('password', TRUE));
	    	}
	        $info=array(
				"username"=>$username,
				"password"=>$password
	        );
	        $this->M_admin->update_proses($info,$id);
        	$this->session->set_flashdata('sukses','Data Berhasil Di Edit');
	    }
        redirect('admin');
    }
    function hapus($id)
    {
         $info=array(
         	"status"=>0
        );
        $this->M_admin->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil Di Dinonaktifkan');
        redirect('admin');
    }
    function aktifkan($id)
    {
         $info=array(
         	"status"=>1
        );
        $this->M_admin->update_proses($info,$id);
        $this->session->set_flashdata('sukses','Data Berhasil Di Aktifkan');
        redirect('admin');
    }
}
