<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_input extends CI_Model {

public function getId($tabel,$id)
    {
        $q = $this->db->query("select MAX($id) as kd_max from $tabel");
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
    public function getIdmutasi()
    {
        $q = $this->db->query("select MAX(id_mutasi) as kd_max from mutasi");
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
	public function getAll()
		{
			return $this->db->get('bidang_barang');
		}
	public function getbidrang($id)
		{
			return $this->db->where('id_bidang_barang',$id)->get('subbid_barang');
		}
	public function getsub($id)
		{
			return $this->db->where('id_subbid_barang',$id)->get('subbid_barang');
		}

	public function getjumlah($id)
        {
            return $this->db->query("select * from mutasi where id_subbid_barang='$id'");
        }
    public function getBarang($id)
		{
			return $this->db->query("select * from barang where id_subbid_barang='$id'");
		}
    public function loaddataken($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                "id_peralatan_mesin"=>$this->M_input->getId('peralatan_mesin','id_peralatan_mesin'),
                "kode_barang"=>$dataarray[$i]['kode_barang'],
                "nama_barang"=>$dataarray[$i]['nama_barang'],
                "no_reg"=>$dataarray[$i]['no_reg'],
                "jumlah"=>$dataarray[$i]['jumlah'],
                "merk"=>$dataarray[$i]['merk'],
                "ukuran"=>$dataarray[$i]['ukuran'],
                "bahan"=>$dataarray[$i]['bahan'],
                "tahun_pembelian"=>$dataarray[$i]['tahun_pembelian'],
                "no_pabrik"=>$dataarray[$i]['no_pabrik'],
                "no_rangka"=>$dataarray[$i]['no_rangka'],
                "no_mesin"=>$dataarray[$i]['no_mesin'],
                "no_polisi"=>$dataarray[$i]['no_polisi'],
                "no_bpkb"=>$dataarray[$i]['no_bpkb'],
                "asal"=>$dataarray[$i]['asal'],
                "harga"=>$dataarray[$i]['harga'],
                "keterangan"=>$dataarray[$i]['keterangan'],
                "scan_bpkb"=>$dataarray[$i]['scan_bpkb'],
                "scan_stnk"=>$dataarray[$i]['scan_stnk'],
                "scan_foto"=>$dataarray[$i]['scan_foto'],
                "id_pemegang"=>$dataarray[$i]['id_pemegang'],
                "tanggal_pajak"=>$dataarray[$i]['tanggal_pajak'],
                "kondisi"=>$dataarray[$i]['kondisi'],
                "status"=>$dataarray[$i]['status'],
                "id_subbid_barang"=>'0'.$dataarray[$i]['subid'],
                "id_lokasi"=>$dataarray[$i]['id_lokasi'],
                "tanggal"=>$dataarray[$i]['tanggal'],
             );
            $this->db->insert('peralatan_mesin', $data);
        }
    }
}

/* End of file M_input.php */
/* Location: ./application/models/M_input.php */