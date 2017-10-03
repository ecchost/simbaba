<style type="text/css" media="screen">
  .img4{
     width:50px;
     height:50px;
    transition: all 0.5s;
    -o-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    }
    .img4:hover {
      transition: all 0.5s;
      -o-transition: all 0.5s;
      -moz-transition: all 0.5s;
      -webkit-transition: all 0.5s;
      transform: scale(10);
      -moz-transform: scale(10);
      -o-transform: scale(10);
      -webkit-transform: scale(10);
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
                        <h4><i class="icon-briefcase"></i> Asset Tetap Lainnya</h4>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th rowspan="2" width="10">No</th>
                                <th rowspan="2"><center>Jenis Barang/<br>Nama Barang</center></th>
                                <th rowspan="2"><center>Kode Barang</center></th>
                                <th rowspan="2"><center>Register</center> </th>
                                <?php 
                                  if($id=='0517'){
                                    echo '<th colspan="2"><center>Buku/Perpustakaan</center></th>';
                                  }elseif($id=='0518'){
                                    echo '<th colspan="3"><center>Barang Bercorak<br>Kesenian/Kebudayaan</center></th>';
                                  }else{
                                    echo '<th colspan="2"><center>Hewan/Ternak<br>dan Tumbuhan</center></th>';
                                  }
                                 ?>
                                <th rowspan="2"><center>Jumlah</center> </th>
                                <th rowspan="2"><center>Tahun <br>Cetak<br>Pembelian </center></th>
                                <th rowspan="2"><center>Asal Usul<br>Cara Pembelian</center></th>
                                <th rowspan="2"><center>Harga</center></th>
                                <th rowspan="2"><center>Ket</center></th>
                                <th rowspan="2"><center>Foto</center></th>
                                <th rowspan="2"><center>Status</center></th>
                                <th rowspan="2" align="center"><center>Opsi</center></th>
                            </tr>
                            <tr>
                                <?php 
                                  if($id=='0517'){
                                    echo '<th ><center>Judul/<br>Pencipta</center></th>
                                          <th ><center>Spesifikasi</center></th>';
                                  }elseif($id=='0518'){
                                    echo '<th><center>Asal<br>Daerah</center></th>';
                                    echo '<th><center>Pencipta</center></th>';
                                    echo '<th><center>Bahan</center></th>';
                                  }else{
                                    echo '<th><center>Jenis</center></th>';
                                    echo '<th><center>Ukuran</center></th>';
                                  }
                                 ?>
                            </tr>
                            </thead>
                            <tbody>
                              <?php $no=0; foreach($allbar as $row): $no++;?>
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->nama_barang; ?></td>
                                <td><?php echo $row->kode_barang; ?></td>
                                <td><?php echo $row->no_reg; ?></td>
                                <?php 
                                  if($id=='0517'){
                                    echo '<td ><center>'.$row->judul.'</center></td>';
                                    echo '<td ><center>'.$row->spesifikasi.'</center></td>';
                                  }elseif($id=='0518'){
                                    echo '<td ><center>'.$row->asal.'</center></td>';
                                    echo '<td ><center>'.$row->pencipta.'</center></td>';
                                    echo '<td ><center>'.$row->bahan.'</center></td>';
                                  }else{
                                    echo '<td ><center>'.$row->jenis.'</center></td>';
                                    echo '<td ><center>'.$row->ukuran.'</center></td>';
                                  }
                                ?>
                                <td><?php echo $row->jumlah; ?></td>
                                <td><?php echo $row->tahun; ?></td>
                                <td><?php echo $row->asal_usul; ?></td>
                                <td><?php echo uang($row->harga); ?></td>
                                <td><?php echo $row->keterangan; ?></td>
                                <td>
                                 <center><img src="<?php echo base_url('uploads/'.$row->foto); ?>" width="50px" class="img4" alt="Belum Di Update"></center>
                                </td>
                                <td>
                                  <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                    }
                                   ?>
                                    <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('Aset/hapus/'.$this->uri->segment(3).'/'.$row->id_aset);
                                      $class="btn-mini btn-danger";
                                      $icon="remove-sign";
                                      $teks="Nonaktifkan";
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site=site_url('Aset/aktifkan/'.$this->uri->segment(3).'/'.$row->id_aset);
                                      $class="btn-mini btn-info";
                                      $icon="ok-sign";
                                      $teks="Aktifkan"; 
                                    }
                                   ?>
                                   <?php echo $status; ?>
                                </td>
                                <td>
                                      <center>
                                        <a href="<?php echo site_url('Aset/edit/'.$this->uri->segment(3).'/'.$row->id_aset);?>" title="Edit Data" data-toggle="modal" class="btn btn-mini btn-warning tooltips"><i class="icon-edit"></i></a>
                                        <a href="<?php echo  $site;?>"  title="<?php echo $teks; ?> Data" onclick="return confirm('Apakah Anda Yakin Merubah Status Data Tersebut');" class="btn <?php echo $class;?> tooltips"><i class="icon-<?php echo $icon;?>"></i></a>
                                      </center>
                                    </td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <!-- END PAGE CONTAINER-->