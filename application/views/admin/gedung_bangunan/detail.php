<div id="main-content2">
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
                        <h4><i class="icon-home"></i> Gedung dan Bangunan</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th rowspan="2" width="10">No</th>
                                <th rowspan="2"><center>Jenis Barang/<br>Nama Barang</center></th>
                                <th rowspan="2"><center>Kode Barang</center></th>
                                <th rowspan="2"><center>Register</center> </th>
                                <th rowspan="2"><center>Kondisi<br>Bangunan<br>(B,KB,RB)</center> </th>
                                <th colspan="2"><center>Konstruksi Bangunan</center> </th>
                                <th rowspan="2"><center>Luas Lantai(M2)</center></th>
                                <th rowspan="2"><center>Letak Lokasi/<br>Alamat</center></th>
                                <th colspan="2"><center>Dokumen Gedung</center></th>
                                <th rowspan="2"><center>Luas(M2)</center></th>
                                <th rowspan="2"><center>Status<br>Tanah</center></th>
                                <th rowspan="2"><center>Nomor<br>Kode Tanah</center></th>
                                <th rowspan="2"><center>Asal<br>Asal Usul</center></th>
                                <th rowspan="2"><center>Harga</center></th>
                                <th rowspan="2"><center>Keterangan</center></th>
                                <th rowspan="2"><center>Foto</center></th>
                                <th rowspan="2"><center>Status</center></th>
                                <th rowspan="2" width="50" align="center"><center>Opsi</center></th>
                            </tr>
                            <tr>
                                <th ><center>Tingkat/Tidak</center></th>
                                <th ><center>Beton/Tidak</center></th>
                                <th ><center>Tanggal</center></th>
                                <th ><center>Nomor</center></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php $no=0; foreach($allbar as $row): $no++;?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->nama_barang; ?></td>
                                <td><?php echo $row->kode_barang; ?></td>
                                <td><?php echo $row->no_reg; ?></td>
                                <td><?php echo $row->kondisi; ?></td>
                                <td><?php if($row->tingkat==1){echo "Ya";}elseif($row->tingkat==0){echo "Tidak";} ?></td>
                                <td><?php if($row->beton==1){echo "Ya";}elseif($row->beton==0){echo "Tidak";} ?></td>
                                <td><?php echo $row->luas_lantai; ?></td>
                                <td><?php echo $row->letak; ?></td>
                                <td><?php echo $row->tanggal_dokumen; ?></td>
                                <td><?php echo $row->nomor_dokumen; ?></td>
                                <td><?php echo $row->luas; ?></td>
                                <td><?php echo $row->status_tanah; ?></td>
                                <td><?php echo $row->nomor_kode_tanah; ?></td>
                                <td><?php echo $row->asal; ?></td>
                                <td><?php echo uang($row->harga); ?></td>
                                <td><?php echo $row->keterangan; ?></td>
                                <td>
                                 <center><img src="<?php echo base_url('uploads/'.$row->foto); ?>" width="50px" class="img4" alt="Belum Di Update"></center>
                                </td>
                                <td>
                                  <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                    }
                                   ?>
                                    <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('Gedung_bangunan/hapus/'.$this->uri->segment(3).'/'.$row->id_bangunan);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('Gedung_bangunan/aktifkan/'.$this->uri->segment(3).'/'.$row->id_bangunan);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="Aktifkan"; 
                                    }
                                   ?>
                                   <?php echo $status; ?>
                                </td>
                                <td>
                                      <center>
                                        <a href="<?php echo site_url('Gedung_bangunan/edit/'.$this->uri->segment(3).'/'.$row->id_bangunan);?>" title="Edit Data" data-toggle="modal" class="btn btn-mini btn-warning tooltips"><i class="icon-edit"></i></a>
                                        <a href="<?php echo  $site;?>"  title="<?php echo $teks; ?> Data" onclick="return confirm('Apakah Anda Yakin Merubah Status Data Tersebut');" class="btn btn-mini <?php echo $class;?> tooltips"><i class="icon-<?php echo $icon;?>"></i></a>
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