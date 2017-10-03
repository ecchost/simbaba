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
                <a href="#myModal2" role="button" class="btn btn-success" data-toggle="modal"><i class="icon-arrow-down"></i> Impor File Excel</a>
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
                        <h4><i class="icon-user"></i> Pegawai</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th>NIP/Id Pegawai</th>
                                <th >Nama Lengkap</th>
                                <th >Pangkat</th>
                                <th >Jabatan</th>
                                <th >Status</th>
                                <th width="200" align="center">Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++;?>
                                <tr>
                                    <td><?php echo $row->nip;?></td>
                                    <td><?php echo $row->nama;?></td>
                                    <td><?php echo $row->pangkat;?></td>
                                    <td><?php echo $row->jabatan;?></td>
                                   <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('Pegawai/hapus/'.$row->id_pegawai);
                                      $class="btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('Pegawai/aktifkan/'.$row->id_pegawai);
                                      $class="btn-info";
                                      $icon="ok-sign";
                                      $teks="&nbsp;&nbsp;&nbsp;Aktifkan&nbsp;&nbsp;&nbsp;"; 
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                    <td>
                                      <center>
                                        <a href="<?php echo site_url('Pegawai/update/'.$row->id_pegawai); ?>" class="btn btn-warning"><i class="icon-edit"></i> Edit</a>
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
        <h4 id="myModalLabel1">Tambah Pegawai</h4>
    </div>
    <form action="<?php echo site_url('Pegawai/add');?>" method="post">
    <div class="modal-body">
        <div class="control-group">
            <div class="row">
                 <label class="span1"></label>
                 <label class="span3">NIP/ID Pegawai</label>
                <div class="span8">
                    <div class="controls">
                        <input type="text" required autocomplete="off" class="span12" name="nip">
                        <input type="hidden" required class="span12" value="<?php echo $id?>" name="id">
                    </div>  
                </div>
            </div>
             <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Nama Pegawai</label>
                <div class="span8">
                    <div class="controls">
                        <input type="text" autocomplete="off" required class="span12" name="name">
                    </div>  
                </div>
            </div>
            <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Pangkat</label>
                <div class="span8">
                    <div class="controls">
                        <select required class="span6 chzn-select" name="pangkat" style="width:470px;" data-placeholder="Pilih Pangkat" tabindex="1">
                            <option value="PTT">PTT</option>
                            <option value="Juru Muda">Juru Muda</option>
                            <option value="Juru Muda Tk.I">Juru Muda Tk.I</option>
                            <option value="Juru">Juru</option>
                            <option value="Juru Tk.I">Juru Tk.I</option>
                            <option value="Pengatur Muda">Pengatur Muda</option>
                            <option value="Pengatur Muda Tk.I">Pengatur Muda Tk.I</option>
                            <option value="Pengatur">Pengatur</option>
                            <option value="Pengatur Tk.I">Pengatur Tk.I</option>
                            <option value="Penata Muda">Penata Muda</option>
                            <option value="Penata Muda Tk.I">Penata Muda Tk.I</option>
                            <option value="Penata">Penata</option>
                            <option value="Penata Tk.I">Penata Tk.I</option>
                            <option value="Pembina">Pembina</option>
                            <option value="Pembina Tk.I">Pembina Tk.I</option>
                            <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                            <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                            <option value="PTT">PTT</option>
                            <option value="Pembina Utama">Pembina Utama</option>
                        </select>
                    </div>  
                </div>
            </div>
            <div class="row">
                 <label class="span1"></label>
                 <label class="span3">Jabatan</label>
                <div class="span8">
                    <div class="controls">
                        <input type="text" autocomplete="off" required class="span12" name="jabatan">
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
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Impor File Excel</h4>
    </div>
    <form action="<?php echo site_url('Pegawai/import');?>" enctype="multipart/form-data" id="form1" method="post" class="validate">
    <div class="modal-body">
        <div class="control-group">
            <div class="row">
                 <label class="span1"></label>
                 <label class="span3"></label>
                <div class="span10">
                    <div class="controls">
                        <input type="file" required class="span12" name="import">
                    </div>  
                </div>
            </div>
            <?php echo br(5); ?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign"></i> Close</button>
        <button class="btn btn-primary"><i class="icon-ok-sign"></i> Import</button>
    </div>
    </form>
</div>