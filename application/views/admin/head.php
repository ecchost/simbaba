<style type="text/css" media="screen">
    .top-menu2{
        padding:-2px;
    }
</style>
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
     <div class="navbar-inner">
         <div class="container-fluid">
             <div class="sidebar-toggle-box hidden-phone">
                 <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
             </div>
             <a class="brand" href="#">
                <i style="color:white;">SIMBABA (Sistem Informasi Barang Bakorwil Bojonegoro)</i>
             </a>
             <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="arrow"></span>
             </a>
             <div class="top-nav ">
                 <ul class="nav pull-right top-menu" >
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <span class="username" >Selamat Datang <strong><?php $user=$this->session->userdata('username');
                             $nama=$this->db->query("select * from admin, pegawai where admin.username='$user' and admin.id_pegawai=pegawai.id_pegawai")->row_array();
                             echo $nama['nama']?></strong></span>
                             <b class="caret"></b>
                         </a>
                         <ul class="dropdown-menu extended">
                             <li ><a href="<?php echo site_url('welcome/logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar');"><i class="icon-backward"></i> Log Out</a></li>
                         </ul>
                     </li>
                     <!-- END USER LOGIN DROPDOWN -->
                 </ul>
                 <!-- END TOP NAVIGATION MENU -->
             </div>
         </div>
     </div>
     <!-- END TOP NAVIGATION BAR -->
 </div>
 <!-- END HEADER -->
 <!-- BEGIN CONTAINER -->