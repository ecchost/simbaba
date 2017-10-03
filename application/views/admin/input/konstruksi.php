<script  src="<?php echo base_url('assets/jquery.js');?>"></script>
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
                        <h4><i class="icon-plus"></i> Input Konstruksi Dalam Pengerjaan</h4>
                    </div>
                <form action="<?php echo site_url('Input/Tambah06');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nama Barang</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off"  class="span8" style="width:470px" name="nama_barang">
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Bangunan</label>
                          <div class="span8">
                            <div class="controls">
                                <select  class="span6 chzn-select" name="bangunan" style="width:470px;" data-placeholder="Pilih Kondisi" tabindex="1">
                                    <option value="Permanen">Permanen</option>
                                    <option value="Semi Permanen">Semi Permanen</option>
                                    <option value="Darurat">Darurat</option>
                                </select>
                            </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Bertingkat</label>
                          <div class="span1">
                              <div class="controls">
                                 <input type="radio" name="tingkat" value="1"> Ya
                              </div>  
                          </div>
                          <div class="span2">
                              <div class="controls">
                                 <input type="radio" name="tingkat" value="0"> Tidak
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Beton</label>
                          <div class="span1">
                              <div class="controls">
                                 <input type="radio" name="beton" value="1"> Ya
                              </div>  
                          </div>
                          <div class="span2">
                              <div class="controls">
                                 <input type="radio" name="beton" value="0"> Tidak
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Luas</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' style="width:440px" class="span10" name="luas"><span class="add-on">M2</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Letak/Lokasi/Alamat</label>
                          <div class="span8">
                              <div class="controls">
                                  <textarea autocomplete="off" class="span8" style="width:470px" name="letak"></textarea>
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Dokumen</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" data-mask="99/99/9999" autocomplete="off" style="width:470px" class="span8" name="tanggal_dokumen">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Dokumen</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" onkeypress='return isNumberKeyTrue(event)' autocomplete="off" class="span8" style="width:470px" name="no_dokumen">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Mulai</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" data-mask="99/99/9999" autocomplete="off" style="width:470px" class="span8" name="tanggal_mulai">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Status Tanah</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" class="span8" style="width:470px" name="status_tanah">
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Kode Tanah</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' class="span8" style="width:470px" name="no_kode_tanah">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal Usul Pembayaran</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off"  class="span8" style="width:470px" name="asal">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nilai Kontrak</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <span class="add-on">Rp.</span><input type="text" style="width:408px" autocomplete="off" onkeypress='return isNumberKeyTrue(event)'  class="span10" name="kontrak"><span class="add-on">.00</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Keterangan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" class="span8" style="width:470px" name="keterangan">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Foto</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="file" autocomplete="off" class="span8" style="width:470px" name="gambar">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Aset</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text"  data-mask="99/99/9999" autocomplete="off" required class="span12 m-ctrl-medium" style="width:470px;" name="tanggal_aset">
                              </div>  
                          </div>
                      </div>
                      <div class="form-actions">
                      		<center><button class="btn btn-primary"><i class="icon-ok-sign"></i> Simpan</button></center>
                      </div>
                 </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <!-- END PAGE CONTAINER-->
</div>
<script type='text/javascript'>
var $jn = jQuery.noConflict();
  $jn(document).ready(function() {
      $jn("#p").change(function(){
          var p = $jn("#p").val();
          $jn.ajax({
              type: "POST",
              url : "<?php echo site_url('Input/select2'); ?>",
              data: "p="+p,
              cache:false,
              success: function(data){
                  $jn('#k').html(data);
              }
          });

      });
 })
</script>