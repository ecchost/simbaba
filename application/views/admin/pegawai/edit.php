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
                <div class="span8">
                <?php echo br(1); ?>
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
                    <form action="<?php echo site_url('Pegawai/update_proses/'.$getId['id_pegawai'])?>" method="post">
                    <div class="widget-body">
                        <div class="control-group">
                            <div class="row">
                                 <label class="span1"></label>
                                 <label class="span3">NIP/ID Pegawai</label>
                                <div class="span8">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $getId['nip']?>" required class="span12" name="nip">
                                    </div>  
                                </div>
                            </div>
                             <div class="row">
                                 <label class="span1"></label>
                                 <label class="span3">Nama Pegawai</label>
                                <div class="span8">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $getId['nama']?>"required class="span12" name="name">
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                 <label class="span1"></label>
                                 <label class="span3">Pangkat</label>
                                <div class="span8">
                                    <div class="controls">
                                        <select required class="chzn-select" name="pangkat" style="width:495px;" data-placeholder="Pilih Pangkat" tabindex="1">
                                            <option <?php if($getId['pangkat']=='Juru Muda'){ echo 'selected';}?> value="Juru Muda">Juru Muda</option>
                                            <option <?php if($getId['pangkat']=='Juru Muda Tk.I'){ echo 'selected';}?> value="Juru Muda Tk.I">Juru Muda Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Juru'){ echo 'selected';}?> value="Juru">Juru</option>
                                            <option <?php if($getId['pangkat']=='Juru Tk.I'){ echo 'selected';}?> value="Juru Tk.I">Juru Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Pengatur Muda'){ echo 'selected';}?> value="Pengatur Muda">Pengatur Muda</option>
                                            <option <?php if($getId['pangkat']=='Pengatur Muda Tk.I'){ echo 'selected';}?> value="Pengatur Muda Tk.I">Pengatur Muda Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Pengatur'){ echo 'selected';}?> value="Pengatur">Pengatur</option>
                                            <option <?php if($getId['pangkat']=='Pengatur Tk.I'){ echo 'selected';}?> value="Pengatur Tk.I">Pengatur Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Penata Muda'){ echo 'selected';}?> value="Penata Muda">Penata Muda</option>
                                            <option <?php if($getId['pangkat']=='Penata Muda Tk.I'){ echo 'selected';}?> value="Penata Muda Tk.I">Penata Muda Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Penata'){ echo 'selected';}?> value="Penata">Penata</option>
                                            <option <?php if($getId['pangkat']=='Penata Tk.I'){ echo 'selected';}?> value="Penata Tk.I">Penata Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Pembina'){ echo 'selected';}?> value="Pembina">Pembina</option>
                                            <option <?php if($getId['pangkat']=='Pembina Tk.I'){ echo 'selected';}?> value="Pembina Tk.I">Pembina Tk.I</option>
                                            <option <?php if($getId['pangkat']=='Pembina Utama Muda'){ echo 'selected';}?> value="Pembina Utama Muda">Pembina Utama Muda</option>
                                            <option <?php if($getId['pangkat']=='Pembina Utama Madya'){ echo 'selected';}?> value="Pembina Utama Madya">Pembina Utama Madya</option>
                                            <option <?php if($getId['pangkat']=='Pembina Utama'){ echo 'selected';}?> value="Pembina Utama">Pembina Utama</option>
                                            <option <?php if($getId['pangkat']=='PTT'){ echo 'selected';}?> value="PTT">PTT</option>
                                        </select>
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                 <label class="span1"></label>
                                 <label class="span3">Jabatan</label>
                                <div class="span8">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $getId['jabatan']?>"required class="span12" name="jabatan">
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <center><button class="btn btn-warning"><i class="icon-edit"></i> Edit</button></center>
                    </div>
                </div>
                </form>
            </div>
        </div>
     </div>
     <!-- END PAGE CONTAINER-->
</div>