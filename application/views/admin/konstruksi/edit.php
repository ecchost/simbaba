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
                        <h4><i class="icon-pause"></i> Konstruksi Dalam Pengerjaan</h4>
                    </div>
                <form action="<?php echo site_url('Konstruksi/update');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                    <input type="hidden" name="id_barang" value="<?php echo $getrow['id_konstruksi'] ?>">
                    <input type="hidden" name="foto_lama" value="<?php echo $getrow['foto'] ?>">
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nama Barang</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['nama_barang']; ?>"  class="span8" style="width:470px" name="nama_barang">
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Bangunan</label>
                          <div class="span8">
                            <div class="controls">
                                <select  class="span6 chzn-select" name="bangunan" style="width:470px;" data-placeholder="Pilih Kondisi" tabindex="1">
                                    <option value="Permanen" <?php if($getrow['bangunan']=='Permanen'){echo "selected";}?>>Permanen</option>
                                    <option value="Semi Permanen" <?php if($getrow['bangunan']=='Semi Permanen'){echo "selected";}?>>Semi Permanen</option>
                                    <option value="Darurat" <?php if($getrow['bangunan']=='Darurat'){echo "selected";}?>>Darurat</option>
                                </select>
                            </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Bertingkat</label>
                          <div class="span1">
                              <div class="controls">
                                 <input type="radio" <?php if($getrow['tingkat']=='1'){echo "checked";}?> name="tingkat" value="1"> Ya
                              </div>  
                          </div>
                          <div class="span2">
                              <div class="controls">
                                 <input type="radio" name="tingkat" <?php if($getrow['tingkat']=='0'){echo "checked";}?> value="0"> Tidak
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Beton</label>
                          <div class="span1">
                              <div class="controls">
                                 <input type="radio" name="beton" <?php if($getrow['beton']=='1'){echo "checked";}?> value="1"> Ya
                              </div>  
                          </div>
                          <div class="span2">
                              <div class="controls">
                                 <input type="radio" <?php if($getrow['tingkat']=='0'){echo "checked";}?> name="beton" value="0"> Tidak
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Luas</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['luas']; ?>" onkeypress='return isNumberKeyTrue(event)' style="width:440px" class="span10" name="luas"><span class="add-on">M2</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Letak/Lokasi/Alamat</label>
                          <div class="span8">
                              <div class="controls">
                                  <textarea autocomplete="off" class="span8" style="width:470px" name="letak"><?php echo $getrow['letak']; ?></textarea>
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Dokumen</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" value="<?php echo $getrow['tanggal_dokumen']; ?>" autocomplete="off" data-mask="99/99/9999" autocomplete="off" style="width:470px" class="span8" name="tanggal_dokumen">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Dokumen</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" value="<?php echo $getrow['no_dokumen']; ?>" onkeypress='return isNumberKeyTrue(event)' autocomplete="off" class="span8" style="width:470px" name="no_dokumen">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Mulai</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" value="<?php echo $getrow['tanggal_mulai']; ?>" autocomplete="off" data-mask="99/99/9999" autocomplete="off" style="width:470px" class="span8" name="tanggal_mulai">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Status Tanah</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" value="<?php echo $getrow['status_tanah']; ?>" autocomplete="off" class="span8" style="width:470px" name="status_tanah">
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Kode Tanah</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" value="<?php echo $getrow['nomor_kode_tanah']; ?>" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' class="span8" style="width:470px" name="no_kode_tanah">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal Usul Pembayaran</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" value="<?php echo $getrow['asal']; ?>" autocomplete="off"  class="span8" style="width:470px" name="asal">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nilai Kontrak</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <span class="add-on">Rp.</span><input type="text" value="<?php echo $getrow['kontrak']; ?>" style="width:408px" autocomplete="off" onkeypress='return isNumberKeyTrue(event)'  class="span10" name="kontrak"><span class="add-on">.00</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Keterangan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" class="span8" value="<?php echo $getrow['keterangan']; ?>" style="width:470px" name="keterangan">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Foto(Baru)</label>
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
                                  <input type="text"  data-mask="99/99/9999" value="<?php echo $getrow['tanggal']; ?>" autocomplete="off" required class="span12 m-ctrl-medium" style="width:470px;" name="tanggal_aset">
                              </div>  
                          </div>
                      </div>
                      <div class="form-actions">
                      		<center><button class="btn btn-warning"><i class="icon-edit"></i> Edit</button></center>
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