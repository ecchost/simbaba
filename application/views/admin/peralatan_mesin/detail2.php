<style>
  #main-content3 {
      width: 150%;
      margin-left: 148px;
      min-height: 1000px;
      background: #fff;
      margin-bottom: 40px !important;
  }
</style>
<div id="main-content3">
         <!-- BEGIN PAGE CONTAINER-->
     <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->   
        <div class="fullrow">
           <div class="spanfull">
              <br>
              <?php echo $this->breadcrumb->output(); ?>
           </div>
        </div>
            
          <div class="fullrow">
                <div class="spanfull">
                <?php
                $data=$this->session->flashdata('sukses');
                if ($data!=null){?>
                    <div class="alert alert-block alert-success fade in">
                      <p>
                          <strong>Sukses!</strong>  <?php echo $data; ?>
                      </p>
                    </div>
                <?php
                }       
                $data2=$this->session->flashdata('error');
                if ($data2!=null){?>
                     <div class="alert alert-block alert-danger fade in">
                      <p>
                          <strong>Error!</strong> <?php echo $data2; ?>
                      </p>
                    </div>
                <?php
                }       
                ?>
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-wrench"></i> Peralatan Dan Mesin</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th  width="10">No</th>
                                <th ><center>Kode Barang</center></th>
                                <th ><center>Jenis Barang/<br>Nama Barang</center></th>
                                <th ><center>No.Reg</center> </th>
                                <th ><center>Jumlah<br>Barang</center></th>
                                <th ><center>Merk/<br>Tipe</center></th>
                                <th ><center>Ukuran/<br>CC</center></th>
                                <th ><center>Bahan</center></th>
                                <th ><center>Tahun<br>Pembelian</center></th>
                                <th ><center>Nomor Pabrik</center></th>
                                <th ><center>Asal Usul<br>Cara Perolehan</center></th>
                                <th ><center>Harga</center></th>
                                <th ><center>Keterangan</center></th>
                                <th ><center>Pemegang</center></th>
                                <th ><center>Kondisi</center></th>
                                <th ><center>Foto</center></th>
                                <th ><center>Lokasi</center></th>
                                <th ><center>Status</center></th>
                                <th  width="80" align="center"><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($allbar as $row): $no++; ?>
                              <tr>
                                <td><?php echo  $no;?></td>
                                <td><?php echo  $row->kode_barang;?></td>
                                <td><?php echo  $row->nama_barang;?></td>
                                <td><?php echo  $row->no_reg;?></td>
                                <td><?php echo  $row->jumlah;?></td>
                                <td><?php echo  $row->merk;?></td>
                                <td><?php echo  $row->ukuran;?></td>
                                <td><?php echo  $row->bahan;?></td>
                                <td><?php echo  $row->tahun_pembelian;?></td>
                                <td><?php echo  $row->no_pabrik;?></td>
                                <td><?php echo  $row->asal;?></td>
                                <td><?php echo  uang($row->harga);?></td>
                                <td><?php echo  $row->keterangan;?></td>
                                <td><?php $pegawai=$this->M_pegawai->cekid($row->id_pemegang)->row_array(); echo $pegawai['nama'];?></td>
                                <td><?php echo  $row->kondisi;?></td>
                                 <td>
                                  <center><img src="<?php echo base_url('uploads/'.$row->scan_foto); ?>" width="50px" class="img4" alt="Belum Di Update"></center>
                                </td>
                                <td><?php $lokasi=$this->M_lokasi->cekid($row->id_lokasi)->row_array(); echo $lokasi['lokasi'];?></td>
                                <td>
                                  <?php 
                                   if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('peralatan_mesin/hapus/'.$row->id_subbid_barang.'/'.$row->id_peralatan_mesin);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('peralatan_mesin/aktifkan/'.$row->id_subbid_barang.'/'.$row->id_peralatan_mesin);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="Aktifkan"; 
                                    }
                                   ?>
                                   <?php echo $status; ?>
                                </td>
                                <td>
                                  <center>
                                      <a href="<?php echo  site_url('peralatan_mesin/edit_non/'.$row->id_subbid_barang.'/'.$row->id_peralatan_mesin);?>" title="Edit Data" class="btn btn-mini btn-warning tooltips"><i class="icon-edit"></i></a>
                                      <a href="<?php echo  $site;?>" title="<?php echo $teks; ?> Data"  onclick="return confirm('Apakah Anda Yakin Merubah Status Data Tersebut');" class="btn btn-mini <?php echo $class;?> tooltips"><i class="icon-<?php echo $icon;?>"></i></a>
                                    </center>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <!-- END PAGE CONTAINER-->