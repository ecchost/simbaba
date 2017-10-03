<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
     <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->   
        <div class="row-fluid">
           <div class="span12">
              <br>
              <?php echo $this->breadcrumb->output(); ?>
           </div>
        </div>
            
          <div class="row-fluid">
                <div class="span12">
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
                                <th width="10">No</th>
                                <th>Kode Subbid Barang</th>
                                <th >Nama Sub Bidang</th>
                                <th >Satuan</th>
                                <th >Jumlah Barang</th>
                                <th >Status</th>
                                <th width="200" align="center"><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++;?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->kode_subbid_barang;?></td>
                                    <td><?php echo $row->nama_subbid_barang;?></td>
                                    <td><?php echo $row->satuan;?></td>
                                    <td><?php echo $this->M_tanah->getJumlahBarang($row->id_subbid_barang)->num_rows();?> Barang</td>
                                   <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('tanah/hapus/'.$row->id_subbid_barang);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('tanah/aktifkan/'.$row->id_subbid_barang);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="&nbsp;&nbsp;&nbsp;Aktifkan&nbsp;&nbsp;&nbsp;"; 
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                    <td>
                                      <center>
                                        <a href="<?php echo site_url('Tanah/detail/'.$row->id_subbid_barang);?>" class="btn btn-success"><i class="icon-zoom-in"></i> Detail</a>
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