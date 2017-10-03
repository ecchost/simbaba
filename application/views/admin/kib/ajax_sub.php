<div class="row">
   <label class="span1"></label>
   <label class="span4">Pilih Sub Bidang Barang</label>
	<div class="span6">
    <div class="controls">
        <select class="span6" id="sub" name="sub_bidang_barang" style="width:260px;" data-placeholder="Sub Bidang Barang" tabindex="1">
            <option value="">Pilih Sub Bidang Barang</option>
            <?php $nom=0; foreach($allsub as $row): $nom++; ?>
            <option value="<?php echo $row->id_subbid_barang; ?>"><?php echo $row->id_subbid_barang; ?>~<?php echo $row->nama_subbid_barang; ?></option>
          <?php endforeach;?>
        </select>
    </div>
  </div>
</div>
<script type='text/javascript'>
var $jn = jQuery.noConflict();
   $jn("#sub").change(function(){
        var g = $jn("#sub").val();
        $jn.ajax({
            type: "POST",
            url : "<?php echo site_url('Kib/select3'); ?>",
            data: "g="+g,
            cache:false,
            success: function(data){
                $jn('#bar').html(data);
            }
        });

    });
</script>