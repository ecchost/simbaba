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
            <div class="span5">
              <table class="table table-striped table-bordered">
                <tr>
                  <th>ID Bidang</th>
                  <td><?php echo $namabidang_barang['kode_bidang_barang'];?></td>
                </tr>
                <tr>
                  <th>Nama Bidang</th>
                  <td><?php echo $namabidang_barang['nama_bidang_barang'];?></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row-fluid">
                <div class="span12">
                <!-- <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus"></i> Tambah Sub Bidang Barang</a> -->
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
                        <h4><i class="icon-tasks"></i> Detail Sub Bidang Barang Di <i><strong>"<?php echo $namabidang_barang['nama_bidang_barang']; ?>"</strong></i></h4>
                    </div>
                    <div class="widget-body">
                       <table class="table table-striped table-bordered" id="sample_1">
                          <thead>
                          <tr>
                              <th >Kode Sub Bidang</th>
                              <th >Nama Sub Bidang</th>
                              <th >Satuan</th>
                              <th >Jumlah Barang</th>
                              <th >Status</th>
                              <th ><center>Opsi</center></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no=0; foreach($allsub as $row): $no++; ?>
                              <tr>
                                  <td><?php echo $row->kode_subbid_barang; ?></td>
                                  <td><?php echo $row->nama_subbid_barang; ?></td>
                                  <td><?php echo $row->satuan; ?></td>
                                  <td><?php echo $this->M_bidang_barang->countBarang($row->id_subbid_barang); ?></td>
                                  <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('bidang_barang/hapussub/'.$row->id_subbid_barang.'/'.$namabidang_barang['id_bidang_barang']);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('bidang_barang/aktifkansub/'.$row->id_subbid_barang.'/'.$namabidang_barang['id_bidang_barang']);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="&nbsp;&nbsp;&nbsp;Aktifkan&nbsp;&nbsp;&nbsp;"; 
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                  <td>
                                    <center>
                                      <a href="<?php echo  site_url('Bidang_barang/detailsub/'.$row->id_bidang_barang.'/'.$row->id_subbid_barang);?>"  class="btn btn-success"><i class="icon-zoom-in"></i> Detail</a>
                                      <a href="#myModal1<?php echo $row->id_subbid_barang;?>" role="button" data-toggle="modal" class="btn btn-warning"><i class="icon-edit"></i> Edit</a>
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
        <h4 id="myModalLabel1">Tambah Sub Bidang Barang <i><strong>"<?php echo $namabidang_barang['nama_bidang_barang']; ?>"</strong></i></h4>
    </div>
    <form action="<?php echo site_url('Bidang_barang/addsub'); ?>" method="post">
      <div class="modal-body">
          <div class="control-group">
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Kode Sub Bidang Barang</label>
                  <div class="span1">
                      <div class="controls">
                          <input type="text" value="<?php echo $namabidang_barang['kode_bidang_barang']; ?>" readonly required class="span12" name="kode_bidang_barang">
                      </div>  
                  </div>
                  <div class="span7">
                      <div class="controls">
                          <input type="text" required class="span12" name="id_subbidang_barang">
                      </div>  
                  </div>
              </div>
               <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Nama Sub Bidang Barang</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" autocomplete="off" required class="span12" name="nama_subbidang_barang">
                      </div>  
                  </div>
              </div>
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Satuan</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" autocomplete="off" required class="span12" name="satuan">
                      </div>  
                  </div>
              </div>
              <input type="hidden" value="<?php echo $namabidang_barang['id_bidang_barang']; ?>" name="bidang_barang">
              <?php echo br(5); ?>
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="icon-ok-sign"></i> Simpan</button>
      </div>
    </form>
</div>
<?php $no=0; foreach($allsub as $rows): $no++; ?>
<div id="myModal1<?php echo $rows->id_subbid_barang;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Edit Sub Bidang Barang <strong>{<?php echo $row->nama_subbid_barang; ?>}</strong></i></h4>
    </div>
    <form action="<?php echo site_url('Bidang_barang/editsub'); ?>" method="post">
      <div class="modal-body">
          <div class="control-group">
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Kode Sub Bidang Barang</label>
                  <div class="span8">
                      <div class="controls">
                          <input type="text" value="<?php echo $row->kode_subbid_barang; ?>" readonly required class="span12" name="id_subbidang_barang">
                      </div>  
                  </div>
              </div>
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Nama Sub Bidang Barang</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" value="<?php echo $row->nama_subbid_barang; ?>" autocomplete="off" required class="span12" name="nama_subbidang_barang">
                      </div>  
                  </div>
              </div>
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Satuan</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" value="<?php echo $row->satuan; ?>" autocomplete="off" required class="span12" name="satuan">
                      </div>  
                  </div>
              </div>
              <input type="hidden" value="<?php echo $namabidang_barang['id_bidang_barang']; ?>" name="bidang_barang">
            <?php echo br(5); ?>
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign"></i> Close</button>
          <button type="submit" class="btn btn-warning"><i class="icon-edit"></i> Edit</button>
      </div>
    </form>
</div>
<?php endforeach; ?>