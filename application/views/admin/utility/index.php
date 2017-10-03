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
          <div class="span12">
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
                      <h4><i class="icon-retweet"></i> Utility</h4>
                  </div>
                  <div class="widget-body">
                    <div class="row">
                        <label for="" class="span2"></label>
                        <table width="928" border="0">
                          <tr>
                            <td width="922"><legend>&nbsp;&nbsp;Backup Database</legend>
                             &nbsp;&nbsp;&nbsp;Klik pada tombol &quot;Backup&quot; Disamping Untuk Proses Back Up &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('utility/backup');?>" class="btn btn-success"><i class="icon-refresh"></i> Backup</a> <br />
                              </br>
                              </br>
                              <legend></legend>
                          </tr>
                          <tr>
                              <td height="200"><legend>&nbsp;&nbsp;Restore Database</legend>
                              <form action="<?php echo site_url('utility/restore');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <label style="width: 240px; float: left">&nbsp;&nbsp;&nbsp;Masukan Database My Sql</label>
                                <input type="file" name="gambar" required="required" />
                                &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" onclick="return confirm('Anda Yakin..? Hati-Hati, Semua Data Akan Direstore...!!!');"><i class="icon-download-alt"></i> Restore</button>
                                </br>
                              </form>
                            </td>
                          </tr>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
   </div>
   <!-- END PAGE CONTAINER-->
</div>