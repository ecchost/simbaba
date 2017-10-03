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
                        <h4><i class="icon-briefcase"></i> Asset Tetap Lainnya</h4>
                    </div>
                <form action="<?php echo site_url('Aset/update');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                    <input type="hidden" name="id_barang" value="<?php echo $getrow['id_aset']; ?>">
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
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Kode Barang</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" readonly value="<?php echo $getrow['kode_barang']; ?>" autocomplete="off" class="span8" style="width:470px" name="kode1">
                              </div>  
                          </div>
                      </div>
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
                       <center><b><i>Buku Perpustakaan</i></b></center>
                      <hr></hr>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Judul/Pencipta</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['judul']; ?>" class="span8" style="width:470px;" name="judul">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Spesifikasi</label>
                          <div class="span8">
                              <div class="controls">
                                <input type="text" autocomplete="off" value="<?php echo $getrow['spesifikasi']; ?>" class="span8" style="width:470px;" name="spesifikasi">
                              </div>  
                          </div>
                      </div>
                      <center><b><i>Barang Bercorak Kesenian/Kebudayaan</i></b></center>
                      <hr></hr>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal Daerah</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['asal']; ?>" class="span8" style="width:470px;" name="asal">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Pencipta</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['pencipta']; ?>" class="span8" style="width:470px;" name="pencipta">
                              </div>
                          </div>
                      </div>
                       <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Bahan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['bahan']; ?>" class="span8" style="width:470px;" name="bahan">
                              </div>
                          </div>
                      </div>
                      <center><b><i>Hewan/Ternak dan Tumbuhan</i></b></center>
                      <hr></hr>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Jenis</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['jenis']; ?>" class="span8" style="width:470px;" name="jenis">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <label class="span1"></label>
                          <label class="span3">Ukuran</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['ukuran']; ?>" class="span8" style="width:470px;" name="ukuran">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <label class="span1"></label>
                          <label class="span3">Jumlah</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off"  class="span8" onkeypress='return isNumberKeyTrue(event)' style="width:470px;" name="jumlah">
                              </div>
                          </div>
                      </div>
                      <hr></hr>
                      <div class="row">
                          <label class="span1"></label>
                          <label class="span3">Tahun Pembelian/Cetak</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['tahun']; ?>" class="span8" onkeypress='return isNumberKeyTrue(event)' maxlength="4" style="width:470px;" name="tahun">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal Usul</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" value="<?php echo $getrow['asal_usul']; ?>" class="span8" style="width:470px" name="asal_usul">
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
                                  <input type="text" value="<?php echo $getrow['keterangan']; ?>" autocomplete="off" class="span8" style="width:470px" name="keterangan">
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
                                  <input type="text" value="<?php echo $getrow['tanggal']; ?>"  data-mask="99/99/9999" autocomplete="off" required class="span12 m-ctrl-medium" style="width:470px;" name="tanggal_aset">
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