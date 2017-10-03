<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/logo.png');?>">
   <link href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('assets/assets/bootstrap/css/bootstrap-fileupload.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('assets/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />
   <link href="<?php echo base_url('assets/css/style-default.css'); ?>" rel="stylesheet" id="style_color"/>
   <link href="<?php echo base_url('assets/assets/chosen-bootstrap/chosen/chosen.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
   <link rel="stylesheet" type="text/css" href="<?php  echo base_url('assets/assets/bootstrap-datepicker/css/datepicker.css'); ?>" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
<div width="50" style="background-color:#385da4;"><marquee><h3><strong><i style="color:white;">SIMBABA(Sistem Informasi Barang Bakorwil Bojonegoro)</i></strong></h3></marquee></div>
    <div class="lock-header">
    </div>
        
        <div class="row-fluid">
            <div class="span4">
                <center><img src="<?php echo base_url('assets/logo/jatim.png'); ?>" width="200px" height="300px" alt=""></center>
            </div>
             <div class="span4">
                 <!-- BEGIN VALIDATION STATES-->
                 <div class="widget red">
                     <div class="widget-title">
                         <h4><i class="icon-key"></i> LOGIN APLIKASI </h4>
                     </div>
                     <?php if($this->session->flashdata('error')!=""){
                      echo '<div class="alert alert-block alert-danger fade in">
                            <p>
                            <strong>Gagal!</strong> Username dan Password tidak cocok
                            </p>
                            </div>'
                      ;}?>
                     <div class="widget-body">
                         <!-- BEGIN FORM-->
                         <form action="<?php echo site_url('Login/signin'); ?>" method="post">
                             <div class="control-group">
                                 <div class="controls">
                                     <input type="text" autofocus autocomplete="off" class="span12" name="username" placeholder="Masukkan Username" />
                                 </div>
                             </div>
                             <div class="control-group">
                                 <div class="controls">
                                     <input type="password" class="span12" name="password" placeholder="Masukkan Password" >
                                 </div>
                             </div>
                             <br>
                             <div class="form-actions">
                             <center>
                                 <button type="submit" class="btn btn-success"><i class="icon-forward"></i> Login</button>
                                 <button type="reset" class="btn btn-info"><i class="icon-refresh"></i> Reset</button>
                             </center>
                             </div>
                         </form>
                         <!-- END FORM-->
                     </div>
                 </div>
                 <!-- END VALIDATION STATES-->
             </div>
             <div class="span4">
                <center><img src="<?php echo base_url('assets/logo/akn.png'); ?>" width="250px" height="300px" alt=""></center>
            </div>
            <div id="footer">
                 2016 &copy; Bakorwil Bojonegoro.
             </div>
       </div>
</body>
<!-- END BODY -->
</html>