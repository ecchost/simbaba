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
                        <h4><i class="icon-plus"></i> Input Tanah</h4>
                    </div>
                <form action="<?php echo site_url('Input/Tambah01');?>" method="post" enctype="multipart/form-data">
                    <div class="widget-body">
                    	<div class="row">
                         <label class="span1"></label>
                         <label class="span3">Pilih Sub Bidang Barang</label>
                      	<div class="span8">
                          <div class="controls">
                              <select required class="span6" id="p" name="id_bidang_barang" style="width:470px;" data-placeholder="Sub Bidang Barang" tabindex="1">
                                  <option>Pilih Sub Barang</option>
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
                                      <select required name="" disabled style="width:470px;" id="">
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
                                  <input type="text" autocomplete="off" required style="width:470px;" class="span12" name="nama_barang">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Register</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" required style="width:470px;" class="span12" name="register">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Luas</label>
                          <div class="span8">
                              <div class="controls">
                              	<div class="input-append">
                              		<input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' required style="width:440px;" class="span10" name="luas"><span class="add-on">M2</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tahun Pengadaan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" maxlength="4" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' required style="width:470px;" class="span12" name="tahun_pengadaan">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Letak</label>
                          <div class="span8">
                              <div class="controls">
                                  <textarea autocomplete="off" class="span12" style="width:470px;" name="letak"></textarea>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Hak</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" required class="span12" style="width:470px;" name="hak">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Tanggal Sertifikat</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" data-mask="99/99/9999" autocomplete="off" required class="span12 m-ctrl-medium" style="width:470px;" name="tanggal_sertifikat">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Nomor Sertifikat</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" required class="span12" style="width:470px;" name="nomor_sertifikat">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Penggunaan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" required class="span12" style="width:470px;" name="penggunaan">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Asal</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" required class="span12" style="width:470px;" name="asal">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Harga</label>
                          <div class="span8">
                              <div class="controls">
                              	<div class="input-append">
                              		<span class="add-on">Rp.</span><input type="text" autocomplete="off" onkeypress='return isNumberKeyTrue(event)' required class="span10" style="width:408px;" name="harga"><span class="add-on">.00</span>
                                </div>
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Keterangan</label>
                          <div class="span8">
                              <div class="controls">
                                  <input type="text" autocomplete="off" required class="span12" style="width:470px;" name="keterangan">
                              </div>  
                          </div>
                      </div>
                      <div class="row">
                           <label class="span1"></label>
                           <label class="span3">Scan Sertifikat</label>
                          <div class="span3">
                              <div class="controls">
                                  <input type="file" id="st" autocomplete="off" class="span12 tooltips" style="width:470px;" name="gambar">
                                  <input type="hidden" name="id_subbid_barang" value="<?php echo $id;?>">
                              </div>  
                          </div>
                          <!-- <label class="span4"><i style="color:red;"><strong>*)Maksimal 500kb & Tipe PDF </strong></i></label> -->
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
                      		<center><button onmouseover="fungukuran();" class="btn btn-primary"><i class="icon-ok-sign"></i> Simpan</button></center>
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
              url : "<?php echo site_url('Input/select'); ?>",
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
<!--<script>
  var ukuran1 = 0;
  var tipe1 = 0;
    $jn("#st").change(function(){
      ukuran1= this.files[0].size/1024/1024;
      tipe1 = this.files[0].type;
    });
  function fungukuran(){
    
    if (eval(ukuran1)>0.800) { alert("Ukuran File Maksimal 800 KB"); }
    if(tipe1!=0){if(tipe1!='application/pdf'){alert("Tipe File Yang Boleh Di Upload Hanya PDF");}}
  }

</script>-->