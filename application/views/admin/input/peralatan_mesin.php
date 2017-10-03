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
               <!--  <form role="form" action="<?php echo site_url('input/importper'); ?>" enctype="multipart/form-data" id="form1" method="post" class="validate">
                  <input type="file" name="import" />
                  <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-import"></i>Import</button>
                </form> -->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-plus"></i> Input Peralatan dan Mesin</h4>
                    </div>
                <form action="<?php echo site_url('Input/Tambah02');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                    <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Pilih Sub Bidang Barang</label>
                        <div class="span8">
                          <div class="controls">
                              <select  class="span6" id="p" name="id_bidang_barang" style="width:470px;" data-placeholder="Sub Bidang Barang" tabindex="1">
                                  <option value="Pilih Sub Barang">Pilih Sub Barang</option>
                                  <?php $nom=0; foreach($bidrang as $row): $nom++; ?>
                                  <option value="<?php echo $row->id_subbid_barang; ?>"><?php echo $row->id_subbid_barang; ?> ~ <?php echo $row->nama_subbid_barang; ?></option>
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
                           <label class="span3">Jumlah</label>
                          <div class="span8">
                              <div class="controls">
                              	<div class="input-append">
                              		<input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)'  style="width:425px" class="span10" name="jumlah"><span class="add-on">Buah</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Merk</label>
                      <div class="span8">
                        <div class="controls">
                            <div class="input-append">
                              <input type="text" autocomplete="off"  style="width:470px" class="span10" name="merk">
                            </div>
                        </div>
                        </div>  
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Ukuran</label>
                          <div class="span8">
                              <div class="controls">
                                <div class="input-append">
                                  <input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' style="width:440px" class="span10" name="ukuran"><span class="add-on">CC</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Bahan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off"  class="span8" style="width:470px" name="bahan">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tahun Pembelian</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" placeholder="yyyy" maxlength="4" autocomplete="off" onkeypress='return isNumberKeyTrue(event)'  style="width:470px" class="span8" name="tahun_pembelian">
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">No Pabrik</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" class="span8" style="width:470px" name="no_pabrik">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal Usul Cara Perolehan</label>
                          <div class="span8">
                              <div class="controls"> 
                                  <input type="text" autocomplete="off" class="span8" style="width:470px" name="asal">
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
                          <div class="span3">
                              <div class="controls">
                                  <input type="file" autocomplete="off" class="span8" style="width:470px" name="scan_foto">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Pemegang</label>
                      <div class="span8">
                        <div class="controls">
                            <select  class="span6 chzn-select" name="id_pemegang" style="width:470px;" data-placeholder="Pilih Pemegang" tabindex="1">
                                <option value=""></option>
                                <?php $nom=0; foreach($pegawai as $row): $nom++; ?>
                                <option value="<?php echo $row->id_pegawai; ?>"><?php echo $row->nama; ?></option>
                              <?php endforeach;?>
                            </select>
                        </div>  
                      </div>
                      </div>
                      
                      <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Kondisi</label>
                      <div class="span8">
                        <div class="controls">
                            <select  class="span6 chzn-select" name="kondisi" style="width:470px;" data-placeholder="Pilih Kondisi" tabindex="1">
                                <option value=""></option>
                                <option value="BAIK">BAIK</option>
                                <option value="RUSAK RINGAN">RUSAK RINGAN</option>
                                <option value="RUSAK SEDANG">RUSAK SEDANG</option>
                                <option value="RUSAK BERAT">RUSAK BERAT</option>
                            </select>
                            <input type="hidden" name="id_suubid_barang" value="<?php echo $id;?>">
                        </div>  
                      </div>
                      </div>
                      <div class="row">
                         <label class="span1"></label>
                         <label class="span3">Lokasi</label>
                         <div class="span8">
                          <div class="controls">
                              <select class="span6 chzn-select" name="lokasi" style="width:470px;" data-placeholder="Pilih Lokasi" tabindex="1">
                                  <option value=""></option>
                                  <?php $nom=0; foreach($lokasi as $row): $nom++; ?>
                                  <option value="<?php echo $row->id_lokasi; ?>"><?php echo $row->lokasi; ?></option>
                                <?php endforeach;?>
                              </select>
                          </div>
                          </div>  
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Aset</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text"  data-mask="99/99/9999" autocomplete="off"  class="span12 m-ctrl-medium" style="width:470px;" name="tanggal_aset">
                              </div>  
                          </div>
                      </div>
                      <div class="form-actions">
                      		<center><button class="btn btn-primary" onmouseover="fungukuran(); fungukuran2();"><i class="icon-ok-sign"></i> Simpan</button></center>
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
      $jn("#barang").change(function(){
          var barang = $jn("#barang").val();
          $jn.ajax({
              type: "POST",
              url : "<?php echo site_url('Input/select_barang'); ?>",
              data: "barang="+barang,
              cache:false,
              success: function(data){
                  $jn('#l').html(data);
              }
          });

      });
 })
</script>
<!-- <script>
//   var ukuran1 = 0;
//   var ukuran2 = 0;
//   var tipe1 = 0;
//   var tipe2 = 0;
//     $jn("#st").change(function(){
//       ukuran1= this.files[0].size/1024/1024;
//       tipe1 = this.files[0].type;
//     });
//   function fungukuran(){
    
//     if (eval(ukuran1)>0.800) { alert("Ukuran File Maksimal 800 KB"); }
//     if(tipe1!=0){if(tipe1!='application/pdf'){alert("Tipe File Yang Boleh Di Upload Hanya PDF");}}
//   }
//   $jn("#st2").change(function(){
//       ukuran2= this.files[0].size/1024/1024;
//       tipe2 = this.files[0].type;
//     });
//   function fungukuran2(){
    
//     if (eval(ukuran2)>0.800) { alert("Ukuran File Maksimal 800 KB"); }
//     if(tipe2!=0){if(tipe2!='application/pdf'){alert("Tipe File Yang Boleh Di Upload Hanya PDF");}}
//   }
// </script>-->