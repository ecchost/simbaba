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
                        <h4><i class="icon-globe"></i> Tanah</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th rowspan="3" width="10">No</th>
                                <th rowspan="3"><center>Jenis Barang/<br>Nama Barang</center></th>
                                <th rowspan="3"><center>Kode Barang</center></th>
                                <th rowspan="3"><center>Register</center> </th>
                                <th rowspan="3"><center>Luas (M2)</center></th>
                                <th rowspan="3"><center>Tahun<br> Pengadaan</center></th>
                                <th rowspan="3"><center>Letak/Alamat</center></th>
                                <th colspan="3"><center>Status Tanah</center></th>
                                <th rowspan="3"><center>Peggunaan</center></th>
                                <th rowspan="3"><center>Asal<br> Usul</center></th>
                                <th rowspan="3"><center>Harga</center></th>
                                <th rowspan="3"><center>Keterangan</center></th>
                                <th rowspan="3" width="80"><center>Scan Sertifikat</center></th>
                                <th rowspan="3"><center>Status</center></th>
                                <th rowspan="3" width="100" align="center"><center>Opsi</center></th>
                            </tr>
                            <tr>
                                <th rowspan="2"><center>Hak</center></th>
                                <th colspan="2"><center>Sertifikat</center></th>
                            </tr>
                            <tr>
                                <th><center>Tanggal</center></th>
                                <th><center>Nomor</center></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php $no=0; foreach($allbar as $row): $no++;?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->nama_barang; ?></td>
                                <td><?php echo $row->kode_barang; ?></td>
                                <td><?php echo $row->register; ?></td>
                                <td><?php echo $row->luas; ?></td>
                                <td><?php echo $row->tahun_pengadaan; ?></td>
                                <td><?php echo $row->letak; ?></td>
                                <td><?php echo $row->hak; ?></td>
                                <td><?php echo $row->tanggal_sertifikat; ?></td>
                                <td><?php echo $row->nomor_sertifikat; ?></td>
                                <td><?php echo $row->penggunaan; ?></td>
                                <td><?php echo $row->asal; ?></td>
                                <td><?php echo uang($row->harga); ?></td>
                                <td><?php echo $row->keterangan; ?></td>
                                <td>
                                <?php if(isset($row->scan_sertifikat)){
                                  if($row->scan_sertifikat!=""){?>
                                    <center><button onclick='open("<?php echo site_url('Welcome/embed/'.$row->scan_sertifikat);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355"); ' class="btn btn-mini btn-primary tooltips" title="Lihat Scan"><i class="icon-eye-open"></i></button>
                                    <a href="<?php echo site_url('Welcome/downloadfile/'.$row->scan_sertifikat);?>" class="btn btn-primary btn-mini tooltips" title="Download Scan"><i class="icon-download-alt"></i></a></center>
                                <?php}else{?>
                                    <center></center>
                                 <?php }
                                } ?>
                                <?php if($row->scan_sertifikat==""){echo "<b><i>Belum Di Update</i></b>";} ?>
                                </td>
                                <td>
                                  <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('tanah/hapus/'.$row->id_subbid_barang.'/'.$row->id_tanah);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('tanah/aktifkan/'.$row->id_subbid_barang.'/'.$row->id_tanah);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="Aktifkan"; 
                                    }
                                   ?>
                                   <?php echo$status; ?>
                                </td>
                                <td>
                                    <center>
                                      <a href="<?php echo site_url('tanah/edit/'.$row->id_subbid_barang.'/'.$row->id_tanah); ?>" role="button" class="btn btn-warning tooltips" title="Edit Data"><i class="icon-edit"></i></a>
                                      <a href="<?php echo  $site;?>" title="<?php echo $teks; ?> Data" onclick="return confirm('Apakah Anda Yakin Merubah Status Data Tersebut');" class="btn <?php echo $class;?> tooltips"><i class="icon-<?php echo $icon;?>"></i> </a>
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