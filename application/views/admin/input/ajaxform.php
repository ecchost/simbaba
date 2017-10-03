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
 <label class="span3">Kode/Jenis Barang</label>
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