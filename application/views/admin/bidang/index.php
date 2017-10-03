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
                <div class="span10">
                <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus"></i> Tambah</a>
                <?php echo br(2); ?>
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
                        <h4><i class="icon-book"></i> Bidang</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th >Id Bidang/Bagian</th>
                                <th >Nama Bidang/Bagian</th>
                                <th >Jumlah Subid/Subag</th>
                                <th >Status</th>
                                <th ><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++; ?>
                                <tr>
                                    <td><?php echo $row->id_bidang; ?></td>
                                    <td><?php echo $row->nama_bidang; ?></td>
                                    <td><?php echo $this->M_bidang->countSub($row->id_bidang)->num_rows(); ?> Sub Bidang</td>
                                   <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('bidang/hapus/'.$row->id_bidang);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('bidang/aktifkan/'.$row->id_bidang);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="&nbsp;&nbsp;&nbsp;Aktifkan&nbsp;&nbsp;&nbsp;"; 
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                    <td>
                                      <center>
                                        <a href="<?php echo site_url('bidang/detail/'.$row->id_bidang); ?>" class="btn btn-success"><i class="icon-zoom-in"></i> Detail</a>
                                        <a href="<?php echo site_url('bidang/edit/'.$row->id_bidang); ?>" class="btn btn-warning"><i class="icon-edit"></i> Edit</a>
                                        <a href="<?php echo  $site;?>"  onclick="return confirm('Apakah Anda Yakin Merubah Status Data Tersebut');" class="btn <?php echo $class;?>"><i class="icon-<?php echo $icon;?>"></i> <?php echo $teks; ?></a>
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
</div>
  <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Tambah Bidang/Bagian</h4>
    </div>
    <form action="<?php echo site_url('bidang/add'); ?>" method="post">
      <div class="modal-body">
          <div class="control-group">
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">ID Bidang/Bagian</label>
                  <div class="span8">
                      <div class="controls">
                          <input type="text" value="<?php echo $id; ?>" readonly required class="span12" name="id_bidang">
                      </div>  
                  </div>
              </div>
               <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Nama Bidang/Bagian</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" autocomplete="off" required class="span12" name="nama_bidang">
                      </div>  
                  </div>
              </div>
              <?php echo br(5); ?>
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="icon-ok-sign"></i> Simpan</button>
      </div>
    </form>
</div>