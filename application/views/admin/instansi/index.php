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
              <center><img src="<?php echo base_url('assets/logo/ins.jpg'); ?>" width="100%"></center>
              <hr>
          </div>      
      </div>
      <div class="row-fluid">
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
        <div class="span6">
          <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-edit"></i> Update</a>
          <center>JABATAN</center>
          <hr>
          <table class="table table-bordered">
            <tr>
              <th width="200">PEJABAT PENATA USAHAAN BARANG</th>
              <td><?php echo getjabat('satu'); ?></td>
            </tr>
             <tr>
              <th>PENGURUS BARANG</th>
              <td><?php echo getjabat('dua'); ?></td>
            </tr>
          </table>
        </div>
      </div>
      <hr>
      <div class="row-fluid">
        <div class="span6">
            <center><h2><strong>Visi</strong></h2></center>
            <hr>
            <h4><i>Terwujudnya koordinasi penyelenggaraan<br>
            Pemerintah dan Pembangunan di Wilayah Kerja<br>
            Badan Koordinasi Wilayah Pemerintah dan Pembangunan<br>
            Di Bojonegoro yang Sinergis</i></h4>
          </div>
          <div class="span6">
            <center><h2><strong>Misi</strong></h2></center>
            <hr>
            <h4><i>Meningkatkan hasil penyelenggaraan Pemerintahan<br> 
            dan Pembangunan di Wilayah Kerja Badan Koordinasi Wilayah<br>
            Pemerintah dan Pembangunan Di Bojonegoro</i></h4>
          </div>
          <hr>
      </div>
      <div class="row-fluid">
        <div class="span6">
            <center><h2><strong>Kedudukan Bakorwil</strong></h2></center>
            <hr>
            <h4><i>Bakorwil merupakan unsur penunjang kepala daerah,<br>
            dipimpin oleh seorang kepala, yang berada dibawah<br>
            dan bertanggung jawab kepada Gubernur melalui Sekretaris Daerah</i></h4>
          </div>
          <div class="span6">
            <center><h2><strong>Tugas Pokok Bakorwil</strong></h2></center>
            <hr>
            <h4><i>Bakorwil mempunyai tugas pokok<br> 
            melaksanakan mengkoordinasikan<br>
            pelaksanaan pembangunan di Jawa Timur</i></h4>
          </div>
          <hr>
      </div>
    </div>
</div>
<?php $get=$this->db->get('jabatan')->row_array(); ?>
<div class="row">
    <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel1">Update Jabatan</h4>
    </div>
    <form action="<?php echo site_url('Instansi/add');?>" method="post">
    <div class="modal-body">
        <div class="control-group">
            <div class="row">
             <label class="span1"></label>
             <label class="span3">PEJABAT PENATA USAHAAN BARANG</label>
            <div class="span5">
              <select required class="span6 chzn-select" name="satu" style="width:470px;" data-placeholder="Pilih User" tabindex="1">
                  <?php $nom=0; foreach($pegawai as $roww): $nom++; ?>
                  <option <?php if($get['satu']==$roww->id_pegawai){echo "selected";} ?> value="<?php echo $roww->id_pegawai; ?>"><?php echo $roww->nama; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
        <div class="control-group">
            <div class="row">
             <label class="span1"></label>
             <label class="span3">PENGURUS BARANG</label>
            <div class="span5">
              <select required class="span6 chzn-select" name="dua" style="width:470px;" data-placeholder="Pilih User" tabindex="1">
                  <?php $nom=0; foreach($pegawai as $roww): $nom++; ?>
                  <option <?php if($get['dua']==$roww->id_pegawai){echo "selected";} ?> value="<?php echo $roww->id_pegawai; ?>"><?php echo $roww->nama; ?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
        </div>
        <?php echo br(5); ?>
    </div>
    <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign"></i> Close</button>
        <button class="btn btn-primary"><i class="icon-ok-sign"></i> Simpan</button>
    </div>
    </form>
</div>

</div>