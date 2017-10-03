<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function getId()
    {
        $q = $this->db->query("select MAX(id_pegawai) as kd_max from pegawai");
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
            $kd = "00001";
        }
        return $kd;
    }
	public function all()
    {
        return $this->db->get('pegawai');

    }
    public function allak()
	{
		return $this->db->where('status',1)->get('pegawai');

	}
    public function cekid($id)
    {
        return $this->db->where('id_pegawai', $id)->get('pegawai');
    }
    public function update_proses($info,$id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $info);
    }
     public function loaddata($dataarray) {

        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_pegawai' => $this->getId(),
                'nip' => $dataarray[$i]['nip'],
                'nama' => $dataarray[$i]['nama'],
                'pangkat' => $dataarray[$i]['pangkat'],
                'jabatan' => $dataarray[$i]['jabatan'],
                'status' => 1
             );
            $this->db->insert('pegawai', $data);
        }
    }
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */