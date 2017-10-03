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
                        <h4><i class="icon-book"></i> Laporan KIB</h4>
                    </div>
                    <div class="widget-body">
                      <form action="<?php echo site_url('kib/ekspor'); ?>" method="post">
                        <div class="row">
                          <label class="span1"></label>
                          <label class="span4">Pilih Bidang Barang</label>
                          <div class="span6">
                            <div class="controls">
                                <select class="span6" required name="bidang_barang" id="p" style="width:260px;" tabindex="1">
                                    <option value="">Pilih Bidang Barang</option>
                                    <?php $nom=0; foreach($all as $row): $nom++; ?>
                                    <option value="<?php echo $row->id_bidang_barang; ?>"><?php echo $row->nama_bidang_barang; ?></option>
                                  <?php endforeach;?>
                                </select>
                            </div>  
                          </div>
                        </div>
                        <div id="l">
                          <div class="row">
                              <label class="span1"></label>
                              <label class="span4">Pilih Sub Bidang Barang</label>
                              <div class="span6">
                                <div class="controls">
                                    <select class="span6" name="sub_bidang_barang" style="width:260px;" id="sub" data-placeholder="Sub Bidang Barang" tabindex="1">
                                        <option value="">Pilih Sub Bidang Barang</option>
                                    </select>
                                </div>  
                              </div>
                            </div>
                        </div>
                         <div id="bar">
                          <div class="row">
                              <label class="span1"></label>
                              <label class="span4">Pilih Barang</label>
                              <div class="span6">
                                <div class="controls">
                                    <select class="span6 chzn-select" name="barang" style="width:260px;" data-placeholder="Sub Bidang Barang" tabindex="1">
                                        <option value="">Pilih Barang</option>
                                    </select>
                                </div>  
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
                                        echo "<option value='".$i."' >".$i."</option>";
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
                          <div class="row">
                            <label class="span1"></label>
                            <label class="span4">Tanggal Cetak</label>
                            <div class="span6">
                              <div class="controls">
                                  <input type="text"  data-mask="99/99/9999" style="width:260px;" autocomplete="off"  class="span6 m-ctrl-medium" value="<?php echo date('d/m/Y') ?>" style="width:470px;" name="tanggal">
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
<script type='text/javascript'>
var $jn = jQuery.noConflict();
  $jn(document).ready(function() {
      $jn("#p").change(function(){
          var p = $jn("#p").val();
          $jn.ajax({
              type: "POST",
              url : "<?php echo site_url('Kib/select2'); ?>",
              data: "p="+p,
              cache:false,
              success: function(data){
                  $jn('#l').html(data);
              }
          });

      });
       $jn("#sub").change(function(){
          var g = $jn("#sub").val();
          $jn.ajax({
              type: "POST",
              url : "<?php echo site_url('Kib/select3'); ?>",
              data: "g="+g,
              cache:false,
              success: function(data){
                  $jn('#bar').html(data);
              }
          });

      });
 })
</script>