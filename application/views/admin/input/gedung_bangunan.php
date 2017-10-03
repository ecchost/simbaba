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
                        <h4><i class="icon-plus"></i> Input Gedung Dan Bangunan</h4>
                    </div>
                <form action="<?php echo site_url('Input/Tambah03');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                    <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Pilih Sub Bidang Barang</label>
                        <div class="span8">
                        <div class="controls">
                            <select  class="span6" id="p" name="id_bidang_barang" style="width:470px;" data-placeholder="Sub Bidang Barang" tabindex="1">
                                <option value="Pilih Sub Barang">Pilih Sub Barang</option>
                                <?php $nom=0; foreach($bidrang as $row): $nom++; ?>
                                <option value="<?php echo $row->id_subbid_barang; ?>"><?php echo $row->nama_subbid_barang; ?></option>
                              <?php endforeach;?>
                            </select>
                        </div>  
                      </div>
                      </div>
                      <div id="k">
                           <div class="row">
                               <label class="span1"></label>
                               <label class="span3">Kode/Jenis Barang</label>
                              <div class="span8">
                                  <div class="controls">
                                      <select  name="" disabled style="width:470px;" id="">
                                        <option value="">Pilih Kode/Jenis Barang</option>
                                      </select>
                                  </div>  
                              </div>
                          </div>
                      </div>
                      <div id="l"> 
                      </div>
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
                           <label class="span3">Nomor Register</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off"  class="span8" style="width:470px;" name="no_reg">
                              </div>
                          </div>
                      </div>
                       <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Kondisi</label>
                          <div class="span8">
                            <div class="controls">
                                <select  class="span6 chzn-select" name="kondisi" style="width:470px;" data-placeholder="Pilih Kondisi" tabindex="1">
                                    <option value="BAIK">BAIK</option>
                                    <option value="RUSAK RINGAN">RUSAK RINGAN</option>
                                    <option value="RUSAK SEDANG">RUSAK SEDANG</option>
                                    <option value="RUSAK BERAT">RUSAK BERAT</option>
                                </select>
                            </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tingkat</label>
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
                           <label class="span3">Luas Lantai</label>
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
                           <label class="span3">Tanggal Dokumen Gedung</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" data-mask="99/99/9999" autocomplete="off" style="width:470px" class="span8" name="tanggal_dokumen">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Dokumen Gedung</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" onkeypress='return isNumberKeyTrue(event)' autocomplete="off" class="span8" style="width:470px" name="no_dokumen">
                              </div>  
                          </div>
                      </div>
                        <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Luas</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' style="width:440px" class="span10" name="luas_tanah"><span class="add-on">M2</span>
                                </div>
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
                           <label class="span3">Asal Usul</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off"  class="span8" style="width:470px" name="asal">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Harga</label>
                          <div class="span8">
                              <div class="controls">
                              	<div class="input-append">
                              		<span class="add-on">Rp.</span><input type="text" style="width:408px" autocomplete="off" onkeypress='return isNumberKeyTrue(event)'  class="span10" name="harga"><span class="add-on">.00</span>
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