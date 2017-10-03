<link href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap-fileupload.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('assets/css/style-default.css'); ?>" rel="stylesheet" id="style_color"/>
<link href="<?php echo base_url('assets/assets/chosen-bootstrap/chosen/chosen.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php  echo base_url('assets/assets/bootstrap-datepicker/css/datepicker.css'); ?>" />
<div class="row">
   <label class="span1"></label>
   <label class="span3">Jenis Barang</label>
  <div class="span8">
      <div class="controls">
      <select required class="span6 chzn-select" id="barang" name="kode1" style="width:470px;" tabindex="1">
          <option>Pilih Kode/Jenis Barang</option>
          <?php $nom=0; foreach($barang as $row): $nom++; ?>
          <option value="<?php echo $row->kode_barang; ?>"><?php echo $row->kode_barang; ?> ~ <?php echo $row->nama_barang; ?></option>
        <?php endforeach;?>
      </select>
  </div> 
  </div>
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Scan BPKB</label>
  <div class="span3">
      <div class="controls">
          <input type="file" autocomplete="off" id="st" class="span8" style="width:470px" name="scan_bpkb">
      </div>  
  </div>
  <!-- <label class="span4"><i style="color:red;"><strong>*)Maksimal 800kb & Tipe PDF </strong></i></label> -->
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Scan STNK</label>
  <div class="span3">
      <div class="controls">
          <input type="file" autocomplete="off" id="st2" class="span8" style="width:470px" name="scan_stnk">
      </div>  
  </div>
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Nomor Rangka</label>
  <div class="span8">
      <div class="controls">
          <input type="text" autocomplete="off" class="span8" style="width:470px" name="no_rangka">
      </div>  
  </div>
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Nomor Mesin</label>
  <div class="span8">
      <div class="controls">
          <input type="text" autocomplete="off" class="span8" style="width:470px" name="no_mesin">
      </div>  
  </div>
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Nomor Polisi</label>
  <div class="span8">
      <div class="controls">
          <input type="text" autocomplete="off" class="span8" style="width:470px" name="no_polisi">
      </div>  
  </div>
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Nomor BPKB</label>
  <div class="span8">
      <div class="controls">
          <input type="text" autocomplete="off" class="span8" style="width:470px" name="no_bpkb">
      </div>  
  </div>
</div>
<div class="row">
   <label class="span1"></label>
   <label class="span3">Tanggal Pajak</label>
  <div class="span8">
      <div class="controls">
          <input type="text" id="dp1" placeholder="dd/mm/yyyy" maxlength="10" autocomplete="off"  style="width:470px" class="span8 m-ctrl-medium" name="tanggal_pajak">
      </div>  
  </div>
</div>

<script type='text/javascript'>
	var $jn = jQuery.noConflict();
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
</script>
<!--<script>
  var ukuran1 = 0;
  var ukuran2 = 0;
  var tipe1 = 0;
  var tipe2 = 0;
    $jn("#st").change(function(){
      ukuran1= this.files[0].size/1024/1024;
      tipe1 = this.files[0].type;
    });
  function fungukuran(){
    
    if (eval(ukuran1)>0.800) { alert("Ukuran File Maksimal 800 KB"); }
    if(tipe1!=0){if(tipe1!='application/pdf'){alert("Tipe File Yang Boleh Di Upload Hanya PDF");}}
  }
  $jn("#st2").change(function(){
      ukuran2= this.files[0].size/1024/1024;
      tipe2 = this.files[0].type;
    });
  function fungukuran2(){
    
    if (eval(ukuran2)>0.800) { alert("Ukuran File Maksimal 800 KB"); }
    if(tipe2!=0){if(tipe2!='application/pdf'){alert("Tipe File Yang Boleh Di Upload Hanya PDF");}}
  }
</script>-->
 <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/fullcalendar/fullcalendar/fullcalendar.min.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/chart-master/Chart.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/js/common-scripts.js'); ?>" type="text/javascript"></script>   <script src="<?php echo base_url('assets/assets/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/data-tables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/assets/data-tables/DT_bootstrap.js'); ?>" type="text/javascript"></script>
 <script src="<?php echo base_url('assets/js/dynamic-table.js'); ?>" type="text/javascript"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js');?>"></script>
 <script src="<?php echo base_url('assets/assets/fancybox/source/jquery.fancybox.pack.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js/form-component.js'); ?>"></script>
 <script src="<?php echo base_url('js/jquery-1.8.2.min.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/uniform/jquery.uniform.min.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/clockface/js/clockface.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/jquery-tags-input/jquery.tagsinput.min.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-daterangepicker/date.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js');?>"></script>
 <script src="<?php echo base_url('assets/js/form-component.js'); ?>"></script>