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
                        <h4><i class="icon-road"></i> Edit Jalan, Irigasi Dan Jaringan</h4>
                    </div>
                <form action="<?php echo site_url('Irigasi/update');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                    <input type="hidden" name="id_barang" value="<?php echo $getrow['id_irigasi']; ?>">
                    <input type="hidden" name="foto_lama" value="<?php echo $getrow['foto']; ?>">
                    <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Pilih Sub Bidang Barang</label>
                        <div class="span8">
                        <div class="controls">
                            <select  class="span6" id="p" name="id_bidang_barang" style="width:470px;" data-placeholder="Sub Bidang Barang" tabindex="1">
                                <option value="Pilih Sub Barang">Pilih Sub Barang</option>
                                <?php $nom=0; foreach($bidrang as $row): $nom++; ?>
                                <option value="<?php echo $row->id_subbid_barang; ?>" <?php if($row->id_subbid_barang==$getrow['id_subbid_barang']){echo "selected";} ?>><?php echo $row->nama_subbid_barang; ?></option>
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
                                      <select  class="span6 chzn-select" id="barang" name="kode1" style="width:470px;" tabindex="1">
                                          <option>Pilih Kode/Jenis Barang</option>
                                          <?php $nom=0; foreach($barang as $row): $nom++; ?>
                                          <option value="<?php echo $row->kode_barang; ?>" <?php if($row->kode_barang==$getrow['kode_barang']){echo "selected";} ?>><?php echo $row->kode_barang; ?> ~ <?php echo $row->nama_barang; ?></option>
                                        <?php endforeach;?>
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
                                  <input type="text" value="<?php echo $getrow['nama_barang']; ?>" autocomplete="off"  class="span8" style="width:470px" name="nama_barang">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Register</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['no_reg']; ?>" class="span8" style="width:470px;" name="no_reg">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Konstruksi</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" value="<?php echo $getrow['konstruksi']; ?>" autocomplete="off"  class="span8" style="width:470px;" name="konstruksi">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Panjang</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['panjang']; ?>" onkeypress='return isNumberKeyTrue(event)' style="width:440px" class="span10" name="panjang"><span class="add-on">Km</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Lebar</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['lebar']; ?>" onkeypress='return isNumberKeyTrue(event)' style="width:440px" class="span10" name="lebar"><span class="add-on">M</span>
                                </div>
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
                           <label class="span3">Tanggal Dokumen Gedung</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['tanggal_dokumen']; ?>" data-mask="99/99/9999" autocomplete="off" style="width:470px" class="span8" name="tanggal_dokumen">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Dokumen Gedung</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" onkeypress='return isNumberKeyTrue(event)' value="<?php echo $getrow['nomor_dokumen']; ?>" autocomplete="off" class="span8" style="width:470px" name="no_dokumen">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Status Tanah</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['status_tanah']; ?>" class="span8" style="width:470px" name="status_tanah">
                              </div>  
                          </div>
                      </div>
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Kode Tanah</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['nomor_kode_tanah']; ?>" onkeypress='return isNumberKeyTrue(event)' class="span8" style="width:470px" name="no_kode_tanah">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal Usul</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['asal']; ?>" class="span8" style="width:470px" name="asal">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Harga</label>
                          <div class="span8">
                              <div class="controls">
                              	<div class="input-append">
                              		<span class="add-on">Rp.</span><input type="text" value="<?php echo $getrow['harga']; ?>" style="width:408px" autocomplete="off" onkeypress='return isNumberKeyTrue(event)'  class="span10" name="harga"><span class="add-on">.00</span>
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
                         <label class="span3">Kondisi</label>
                          <div class="span8">
                            <div class="controls">
                                <select  class="span6 chzn-select" name="kondisi" style="width:470px;" data-placeholder="Pilih Kondisi" tabindex="1">
                                    <option value="BAIK" <?php if('BAIK'==$getrow['kondisi']){echo "selected";} ?>>BAIK</option>
                                    <option value="RUSAK RINGAN" <?php if('RUSAK RINGAN'==$getrow['kondisi']){echo "selected";} ?>>RUSAK RINGAN</option>
                                    <option value="RUSAK SEDANG" <?php if('RUSAK SEDANG'==$getrow['kondisi']){echo "selected";} ?>>RUSAK SEDANG</option>
                                    <option value="RUSAK BERAT" <?php if('RUSAK BERAT'==$getrow['kondisi']){echo "selected";} ?>>RUSAK BERAT</option>
                                </select>
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
                                  <input type="text" value="<?php echo $getrow['tanggal']; ?>" id="dp1" autocomplete="off" required class="span12 m-ctrl-medium" style="width:470px;" name="tanggal_aset">
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