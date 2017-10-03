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
   <label class="span4">Pilih Barang</label>
	<div class="span6">
    <div class="controls">
        <select class="span6 chzn-select" id="sub" name="barang" style="width:260px;" data-placeholder="Barang" tabindex="1">
            <option value="">Pilih Barang</option>
            <?php $nom=0; foreach($all as $row): $nom++; ?>
            <option value="<?php echo $row->kode_barang; ?>"><?php echo $row->kode_barang; ?>~<?php echo $row->nama_barang; ?></option>
          <?php endforeach;?>
        </select>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/assets/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.sparkline.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>" type="text/javascript"></script>  
<script src="<?php echo base_url('assets/assets/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/assets/fancybox/source/jquery.fancybox.pack.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/form-component.js'); ?>"></script>
<script src="<?php echo base_url('js/jquery-1.8.2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/assets/uniform/jquery.uniform.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/assets/clockface/js/clockface.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/assets/jquery-tags-input/jquery.tagsinput.min.js');?>"></script>
