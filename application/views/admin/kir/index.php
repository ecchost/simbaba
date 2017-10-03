<script  src="<?php echo base_url('assets/jquery.js');?>"></script>
<div id="main-content">
     <div class="container-fluid">
        <div class="row-fluid">
           <div class="span12">
              <br>
              <?php echo $this->breadcrumb->output(); ?>
           </div>
        </div>
            
          <div class="row-fluid">
                <div class="span12">
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
                        <h4><i class="icon-book"></i> Laporan KIR</h4>
                    </div>
                    <div class="widget-body">
                      <form action="<?php echo site_url('kir/ekspor'); ?>" method="post">
                        <div class="row">
                          <label class="span1"></label>
                          <label class="span4">Pilih Lokasi</label>
                          <div class="span6">
                            <div class="controls">
                                <select class="span6" required name="lokasi" style="width:260px;" tabindex="1">
                                    <option value="">Pilih Lokasi</option>
                                    <?php $nom=0; foreach($all as $row): $nom++; ?>
                                    <option value="<?php echo $row->id_lokasi; ?>"><?php echo $row->lokasi; ?></option>
                                  <?php endforeach;?>
                                </select>
                            </div>  
                          </div>
                        </div>
                          <div class="row">
                            <label class="span1"></label>
                            <label class="span4">Pilih Bulan</label>
                            <div class="span6">
                              <div class="controls">
                                  <select class="span6" name="bulan" style="width:100px;" data-placeholder="Pilih Bulan" tabindex="1">
                                      <option value="">Bulan</option>
                                      <?php for ($i=1; $i<=9 ; $i++) { 
                                        echo "<option value='0".$i."' >0".$i."</option>";
                                      } ?>
                                       <?php for ($i=10; $i<=12 ; $i++) { 
                                        echo "<option value='".$i."'>".$i."</option>";
                                      } ?>
                                  </select>
                              </div>  
                            </div>
                          </div>
                          <div class="row">
                            <label class="span1"></label>
                            <label class="span4">Pilih Tahun</label>
                            <div class="span6">
                              <div class="controls">
                                  <select class="span6" name="tahun" style="width:100px;" data-placeholder="Pilih Tahun" tabindex="1">
                                      <option value="">Tahun</option>
                                      <?php for ($i=date('Y')-20; $i<=date('Y')+10 ; $i++) { 
                                        echo "<option value='".$i."'>".$i."</option>";
                                      } ?>
                                  </select>
                              </div>  
                            </div>
                          </div>
                          <div class="form-actions">
                            <center>
                              <button class='btn btn-success'><i class="icon-upload"></i> Export</button>
                            </center>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>