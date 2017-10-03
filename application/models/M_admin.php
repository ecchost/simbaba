<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function getId()
    {
        $q = $this->db->query("select MAX(id_admin) as kd_max from admin");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd;
    }
	public function all()
	{
		return $this->db->get('admin');

	}
    public function cekid($id)
    {
        return $this->db->where('id_admin', $id)->get('admin');
    }
    public function update_proses($info,$id)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', $info);
    }
    public function checkUser($username)
    {
        return $this->db->where('username', $username)->get('admin');
    }
    public function getpeg($id)
    {
        return $this->db->where('id_pegawai', $id)->get('pegawai');
    }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */