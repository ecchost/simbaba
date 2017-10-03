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
                  <th>ID Bidang/Bagian</th>
                  <td><?php echo $namabidang['id_bidang'];?></td>
                </tr>
                <tr>
                  <th>Nama Bidang/Bagian</th>
                  <td><?php echo $namabidang['nama_bidang'];?></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row-fluid">
                <div class="span8">
                <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus"></i> Tambah Sub Bidang</a>
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
                        <h4><i class="icon-book"></i> Detail Subbid/Subbag Di Bidang/Bagian <i><strong>"<?php echo $namabidang['nama_bidang']; ?>"</strong></i></h4>
                    </div>
                    <div class="widget-body">
                       <table class="table table-striped table-bordered" id="sample_1">
                          <thead>
                          <tr>
                              <th >Id Subid/Subag</th>
                              <th >Nama Subid/Subag</th>
                              <th >Lokasi</th>
                              <th >Status</th>
                              <th ><center>Opsi</center></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no=0; foreach($allsub as $row): $no++; ?>
                              <tr>
                                  <td><?php echo $row->id_subbid; ?></td>
                                  <td><?php echo $row->nama_subbid; ?></td>
                                  <td><?php $lokasi2=$this->M_bidang->getLokasi($row->id_subbid)->result(); ?>
                                    <?php if(count($lokasi2)==1){
                                        foreach ($lokasi2 as $key) {
                                          echo $key->lokasi;
                                        }
                                      }else{
                                        foreach ($lokasi2 as $key) {
                                          echo "» ".$key->lokasi."</br>";
                                        }
                                      }
                                    ?>
                                  </td>
                                  <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('bidang/hapussub/'.$row->id_subbid.'/'.$namabidang['id_bidang']);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('bidang/aktifkansub/'.$row->id_subbid.'/'.$namabidang['id_bidang']);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="&nbsp;&nbsp;&nbsp;Aktifkan&nbsp;&nbsp;&nbsp;"; 
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                  <td>
                                    <center>
                                      <a href="#myModal1<?php echo $row->id_subbid;?>" role="button" data-toggle="modal" class="btn btn-warning"><i class="icon-edit"></i> Edit</a>
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
        <h4 id="myModalLabel1">Tambah Subid/Subag Pada Bidang/Bagian<i><strong>"<?php echo $namabidang['nama_bidang']; ?>"</strong></i></h4>
    </div>
    <form action="<?php echo site_url('bidang/addsub'); ?>" method="post">
      <div class="modal-body">
          <div class="control-group">
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">ID Subid/Subag</label>
                  <div class="span8">
                      <div class="controls">
                          <input type="text" value="<?php echo $id; ?>" readonly required class="span12" name="id_subbidang">
                      </div>  
                  </div>
              </div>
               <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Nama Subid/Subag</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" autocomplete="off" required class="span12" name="nama_subbidang">
                      </div>  
                  </div>
              </div>
              <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Lokasi</label>
                <div class="span8">
                    <div class="controls">
                        <select required class="span6 chzn-select" multiple name="lokasi[]" style="width:481px;" data-placeholder="Pilih Lokasi" tabindex="1">
                            <?php $no=0; foreach($lokasi as $row): $no++;?>
                            <option value="<?php echo $row->id_lokasi; ?>"><?php echo $row->lokasi; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>  
                </div>
            </div>
              <input type="hidden" value="<?php echo $namabidang['id_bidang']; ?>" name="bidang">
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
<div id="myModal1<?php echo $rows->id_subbid;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Edit Subid/Subag <strong>{<?php echo $rows->nama_subbid; ?>}</strong> Bidang/Bagian <i><strong>"<?php echo $namabidang['nama_bidang']; ?>"</strong></i></h4>
    </div>
    <form action="<?php echo site_url('bidang/editsub'); ?>" method="post">
      <div class="modal-body">
          <div class="control-group">
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">ID Subid/Subag</label>
                  <div class="span8">
                      <div class="controls">
                          <input type="text" value="<?php echo $rows->id_subbid; ?>" readonly required class="span12" name="id_subbidang">
                      </div>  
                  </div>
              </div>
               <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Nama Subid/Subag</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" value="<?php echo $rows->nama_subbid; ?>" autocomplete="off" required class="span12" name="nama_subbidang">
                      </div>  
                  </div>
              </div>
               <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Bidang/Bagian</label>
                <div class="span8">
                    <div class="controls">
                        <select required class="span6 chzn-select" name="bidang" style="width:481px;" data-placeholder="Pilih Pangkat" tabindex="1">
                            <?php $nom=0; foreach($all as $r): $nom++; ?>
                            <option value="<?php echo $r->id_bidang; ?>" <?php if($r->id_bidang==$namabidang['id_bidang']){echo "selected";} ?>><?php echo $r->nama_bidang; ?></option>
                          <?php endforeach;?>
                        </select>
                    </div>  
                </div>
              </div>
               <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Lokasi</label>
                <div class="span8">
                    <div class="controls">
                        <select required class="span6 chzn-select" multiple name="lokasi[]" style="width:481px;" data-placeholder="Pilih Lokasi" tabindex="1">
                              <?php $no=0; foreach($lokasi as $raw): $no++;?>
                              <option value="<?php echo $raw->id_lokasi; ?>"
                                <?php 
                                  $lokasi3=$this->M_bidang->getLokasi($rows->id_subbid)->result();
                                  $m=0; foreach($lokasi3 as $rw): $m++;
                                  if($rw->id_lokasi==$raw->id_lokasi){
                                    echo "selected";
                                  }
                                  endforeach
                                 ?>
                              ><?php echo $raw->lokasi; ?></option>
                              <?php endforeach;?>
                        </select>
                    </div>  
                </div>
            </div>
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