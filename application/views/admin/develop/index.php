<style>
.img4{
  transition: all 0.5s;
  -o-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -webkit-transition: all 0.5s;
  }
  .img4:hover {
    transition: all 1.5s;
    -o-transition: all 1.5s;
    -moz-transition: all 1.5s;
    -webkit-transition: all 1.5s;
    transform: scale(4);
    -moz-transform: scale(4);
    -o-transform: scale(4);
    -webkit-transform: scale(4);
    box-shadow: 2px 2px 6px rgba(0,0,0,0.5);
  }
</style>
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
            <div class=" profile span12">
              <div class="span2">
                  <div class="profile-photo">
                       <center><img src="<?php echo base_url('assets/logo/akn.png'); ?>" alt=""></center>
                   </div>
                   <?php echo br(2); ?>
                   <a href="#" class="profile-features active">
                       <i class=" icon-user"></i>
                       <p class="info">Profil</p>
                       <br>
                   </a>
                   <a href="#myModal1" data-toggle="modal" class="profile-features ">
                       <i class=" icon-phone"></i>
                       <p class="info">Kontak</p>
                   </a>
               </div>
               <div class="profile-head">
                <center><h3><p>Sistem Informasi Ini Dibuat Oleh Ahmad Muhajirul Faqih Dan Muhammad Elfan Rodhian Putra Untuk Memenuhi Tugas Dalam PKL Tahun 2016</p></h3></center>
               </div>
               <div class="span10">
                   <div class="row-fluid">
                       <div class="span8 bio">
                           <center><h2>Tentang </h2></center>
                           <p>Pengembang adalah mahasiswa Diploma 2 (D2) Jurusan Manajemen Informastika dari Akademi Komunitas (Poltek) Negeri Bojonegoro PDD Politeknik Negeri Malang.</p>
                           <div class="space15"></div>
                           <center><h2>Biodata</h2></center>
                           <p><label>Nama Lengkap</label>: Ahmad Muhajirul Faqih <label></label>: Muhammad Elfan Rodhian Putra</p>
                           <p><label>Panggilan </label>: Faqih<label></label><label></label> : Elfan</p>
                           <p><label>Kota </label>: Tuban<label></label><label></label>: Bojonegoro</p>
                           <p><label>Tanggal Lahir </label>: 23 Maret 1997<label></label><?php echo nbs(13); ?>: 24 Maret 1996</p>
                           <p><label>Email </label>: <a href="#">muhajirulfaqih@gmail.com<?php echo nbs(21); ?>: <a href="#">elfanapoywali@gmail.com</a></p>
                           <p><label>Blog </label>: <a href="http://www.muhajirulfaqih.blogspot.co.id">http://www.muhajirulfaqih.blogspot.co.id</a><?php echo nbs(3); ?>: <a href="http://elfanrodhian.blogspot.co.id/">http://www.elfanrodhian.blogspot.co.id</a></p>
                           <div class="space15"></div>
                          <hr>
                          <div class="space15"></div>
                          <div class="space20"></div>

                       </div>
                       <div class="span4">
                          <div class="profile-side-box green">
                               <center><h1>Pengembang</h1></center>
                               <div class="row-fluid">
                                 <div class="span6">
                                    <div class="text-center">
                                        <a href="#"><img src="<?php echo base_url('assets/img/avatar1.jpg'); ?>" class="img4" alt=""></a>
                                        <p><strong><a href="#">Faqih</a></strong></p>
                                    </div>
                                 </div>
                                 <div class="span6">
                                     <div class="text-center">
                                         <a href="#"><img src="<?php echo base_url('assets/img/avatar2.JPG');?>" alt="" class="img4"></a>
                                         <p><strong><a href="#">Elfan</a></strong></p>
                                     </div>
                                 </div>
                             </div>
                           </div>
                          <!--  <div class="profile-side-box red">
                               <h1>Di Rekomendasikan Oleh</h1>
                               <div class="desk">
                                   <div class="row-fluid">
                                       <div class="span6">
                                           <div class="text-center">
                                               <a href="#"><img src="img/avatar2.jpg" alt=""></a>
                                               <p><strong><a href="#">Scatel Filip</a></strong></p>
                                           </div>
                                       </div>
                                       <div class="span6">
                                          <div class="text-center">
                                              <a href="#"><img src="img/avatar1.jpg" alt=""></a>
                                              <p><strong><a href="#">Teguh Pribadi S.Pd</a></strong></p>
                                          </div>
                                       </div>
                                   </div>
                               </div>
                           </div> -->
                       </div>
                   </div>
               </div>
           </div>      
        </div>
      </div>
  </div>
</div>
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Kontak</h4>
    </div>
    <div class="modal-body">
    <div class="row-fluid">
      <div class="span6">
          <h2>Faqih</h2>
           <strong>
               Handphone
           </strong><br>
           085731843693
           <br><br>
           <strong>
               Email
           </strong>
           <br>
           muhajirulfaqih@gmail.com
           <br>
           <br>
      </div>
      <div class="span6">
          <h2>Elfan</h2>
           <strong>
               Handphone
           </strong><br>
           085730185250
           <br><br>
           <strong>
               Email
           </strong>
           <br>
           elfanapoywali@gmail.com
           <br>
           <br>
      </div>
    </div>
    </div>
</div>