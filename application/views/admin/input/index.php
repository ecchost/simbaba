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
                        <h4><i class="icon-plus"></i> Input Barang</h4>
                    </div>
                    <div class="widget-body">
                       <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th >No</th>
                                <th >Kode Bidang</th>
                                <th >Pembidangan Barang</th>
                                <th >Status</th>
                                <th width="200" align="center"><center>Opsi</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0; foreach($all as $row): $no++;?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row->kode_bidang_barang;?></td>
                                    <td><?php echo $row->nama_bidang_barang;?></td>
                                   <?php 
                                    if($row->status==1){
                                      $status= "<label class='label label-success'>Aktif</label>";
                                      $site=site_url('input/Barang'.$row->kode_bidang_barang);
                                    }else{
                                      $status= "<label class='label label-important'>Nonaktif</label>";
                                      $site='#';
                                    }
                                   ?>
                                  <td><?php echo $status; ?></td>
                                    <td>
                                      <center>
                                        <a href="<?php echo $site; ?>" class="btn btn-success"><i class="icon-plus"></i> Input</a>
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
</div>