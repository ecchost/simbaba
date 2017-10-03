<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
           <center><h3 class="page-title">
             SISTEM INFORMASI BARANG BAKORWIL BOJONEGORO
           </h3></center>
       </div>
    </div>
    <div class="row-fluid">
       <div class="metro-nav">
          <div class="metro-nav-block nav-block-green double">
              <a data-original-title="" href="#">
                  <i class="icon-eye-open"></i>
                  <div class="info"><?php echo getCount('01','tanah')+getCount('02','peralatan_mesin')+getCount('03','bangunan')+getCount('04','irigasi')+getCount('05','aset')+getCountK(); ?></div>
                  <div class="status">Barang</div>
              </a>
          </div>
          <div class="metro-nav-block nav-block-orange">
              <a data-original-title="" href="#">
                  <i class="icon-user"></i>
                  <div class="info"><?php echo getPegawai(); ?></div>
                  <div class="status">Pegawai</div>
              </a>
          </div>
          <div class="metro-nav-block nav-olive">
              <a data-original-title="" href="#">
                  <i class="icon-book"></i>
                  <div class="info"><?php echo getBidang(); ?></div>
                  <div class="status">Bidang/Bagian</div>
              </a>
          </div>
          <div class="metro-nav-block nav-block-yellow">
              <a data-original-title="" href="#">
                  <i class="icon-th"></i>
                  <div class="info"><?php echo getSubBidang(); ?></div>
                  <div class="status">Sub Bidang/Bagian</div>
              </a>
          </div>
          <div class="metro-nav-block nav-block-red">
              <a data-original-title="" href="#">
                  <i class="icon-map-marker"></i>
                  <div class="info"><?php echo getLokasi(); ?></div>
                  <div class="status">Lokasi</div>
              </a>
          </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
         <div class="span6">
              <!-- BEGIN CHART PORTLET-->
              <div class="widget blue">
                  <div class="widget-title">
                      <h4><i class="icon-bar-chart"></i> Grafik Jumlah Barang</h4>
                  </div>
                  <div class="widget-body">
                      <div class="text-center">
                          <center><canvas id="barw" height="300" width="550"></canvas></center>
                      </div>
                  </div>
              </div>
          </div>
           <div class="span6">
              <!-- BEGIN CHART PORTLET-->
              <div class="widget orange">
                  <div class="widget-title">
                      <h4><i class="icon-th-large"></i> Jumlah Barang</h4>
                  </div>
                  <div class="widget-body">
                      <div class="text-center">
                          <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><center style="font-size:20px;">Pembidangan Barang</center></th>
                                    <th><center style="font-size:20px;">Jumlah Barang</center></th>
                                    <th><center style="font-size:20px;">Total Harga(Rp)</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><center><strong>Tanah</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCount('01','tanah') ?> Bidang</strong></span></center></td>
                                    <td><center><strong><?php echo uang(getCountUang('01','tanah')); ?></strong></center></td>
                                </tr>
                                <tr>
                                    <td><center><strong>Peralatan Dan Mesin</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCount('02','peralatan_mesin') ?> Buah/Set</strong></span></center></td>
                                    <td><center><strong><?php echo uang(getCountUang('02','peralatan_mesin')); ?></strong></center></td>
                                </tr>
                                <tr>
                                    <td><center><strong>Gedung Dan Bangunan</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCount('03','bangunan') ?> Buah</strong></span></center></td>
                                    <td><center><strong><?php echo uang(getCountUang('03','bangunan')); ?></strong></center></td>
                                </tr>
                                <tr>
                                    <td><center><strong>Jalan, Irigasi Dan Jaringan</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCount('04','irigasi') ?> Buah</strong></span></center></td>
                                    <td><center><strong><?php echo uang(getCountUang('04','irigasi')); ?></strong></center></td>
                                </tr>
                                <tr>
                                    <td><center><strong>Asset Tetap Lainnya</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCount('05','aset') ?> Buah/Set/Ekor</strong></span></center></td>
                                    <td><center><strong><?php echo uang(getCountUang('05','aset')); ?></strong></center></td>
                                </tr>
                                <tr>
                                    <td><center><strong>Konstruksi Dalam Pengerjaan</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCountK() ?></strong> Buah</span></center></td>
                                    <td><center><strong><?php echo uang(getCountKUang());?></strong></center></td>
                                </tr>
                                <tr>
                                    <td><center><strong>Total</strong></center></td>
                                    <td><center><span class="badge badge-info" style="font-size:14px;"><strong><?php echo getCount('01','tanah')+getCount('02','peralatan_mesin')+getCount('03','bangunan')+getCount('04','irigasi')+getCount('05','aset')+getCountK(); ?></strong> Buah</span></center></td>
                                    <td><center><strong><?php echo uang(getCountUang('01','tanah')+getCountUang('02','peralatan_mesin')+getCountUang('03','bangunan')+getCountUang('04','irigasi')+getCountUang('05','aset')+getCountKUang()); ?></strong></center></td>
                                </tr>
                            </tbody>
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
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/assets/chart-master/Chart.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/all-chartjs.js'); ?>"></script>
<script>
<?php $bidang=$this->M_dashboard->getBidang(); ?>
  var barChartData = {
        labels : ["Tanah",'Peralatan/Mesin','Gedung/Bangunan','Jalan/Irigasi','Asset Tetap','Konstruksi'],
        datasets : [
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                data : [<?php echo getCount('01','tanah');?>,<?php echo getCount('02','peralatan_mesin');?>,<?php echo getCount('03','bangunan');?>,<?php echo getCount('04','irigasi');?>,<?php echo getCount('05','aset');?>,<?php echo getCountK();?>]
            }
        ]

    };
    new Chart(document.getElementById("barw").getContext("2d")).Bar(barChartData);
</script>