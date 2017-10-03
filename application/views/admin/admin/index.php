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
                        <h4><i class="icon-lock"></i> Admin</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th width="10">No</th>
                                <th>ID Admin</th>
                                <th >Nama Lengkap</th>
                                <th >Status</th>
                                <th width="200" align="center">Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++;?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->id_admin;?></td>
                                    <td><?php $pega=$this->M_admin->getpeg($row->id_pegawai)->row_array();
                                    echo $pega['nama'];?></td>
                                   <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('Admin/hapus/'.$row->id_admin);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('Admin/aktifkan/'.$row->id_admin);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="&nbsp;&nbsp;&nbsp;Aktifkan&nbsp;&nbsp;&nbsp;"; 
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                    <td>
                                      <center>
                                        <a href="#myModal1<?php echo $row->id_admin;?>" data-toggle="modal" class="btn btn-warning"><i class="icon-edit"></i> Edit</a>
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
        <h4 id="myModalLabel1">Tambah Admin</h4>
    </div>
    <form action="<?php echo site_url('Admin/add');?>" method="post">
    <div class="modal-body">
        <div class="control-group">
            <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Nama Admin</label>
            <div class="span8">
                    <div class="controls">
                        <select required class="span6 chzn-select" name="id_pegawai" style="width:470px;" data-placeholder="Pilih User" tabindex="1">
                            <?php $nom=0; foreach($pegawai as $roww): $nom++; ?>
                            <option value="<?php echo $roww->id_pegawai; ?>"><?php echo $roww->nama; ?></option>
                          <?php endforeach;?>
                        </select>
                    </div>  
                </div>
              </div>
            <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Username</label>
                <div class="span8">
                    <div class="controls">
                        <input type="text" required autocomplete="off" class="span12" name="username">
                        <input type="hidden" required class="span12" value="<?php echo $id?>" name="id_admin">
                    </div>  
                </div>
            </div>
             <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Password</label>
                <div class="span8">
                    <div class="controls">
                        <input type="password" autocomplete="off" required class="span12" name="password">
                    </div>  
                </div>
            </div>
            <?php echo br(5); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign"></i> Close</button>
        <button class="btn btn-primary"><i class="icon-ok-sign"></i> Simpan</button>
    </div>
    </form>
</div>
<?php $no=0; foreach($all as $r): $no++; ?>
<div id="myModal1<?php echo $r->id_admin;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Edit Admin <strong>{<?php $pegawai=$this->M_admin->getpeg($row->id_pegawai)->row_array();
                                    echo $pegawai['nama'];?>}</strong></h4>
    </div>
    <form action="<?php echo site_url('Admin/update_proses/'.$r->id_admin); ?>" method="post">
      <div class="modal-body">
          <div class="control-group">
              <input type="hidden" name="passlama" value="<?php echo $r->password; ?>">
              <input type="hidden" name="userlama" value="<?php echo $r->username; ?>">
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Nama Admin</label>
                  <div class="span8">
                      <div class="controls">
                          <input type="text" value="<?php $pegawai=$this->M_admin->getpeg($row->id_pegawai)->row_array();
                                    echo $pegawai['nama'];?>" readonly required class="span12" name="nama">
                      </div>  
                  </div>
              </div>
               <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Username</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="text" value="<?php echo $r->username; ?>" autocomplete="off" required class="span12" name="username">
                      </div>  
                  </div>
              </div>
              <div class="row">
                   <label class="span1"></label>
                   <label class="span3">Password</label>
                  <div class="span8">
                      <div class="controls">
                          <input  autofocus type="password" value="<?php echo $r->password; ?>" autocomplete="off" required class="span12" name="password">
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