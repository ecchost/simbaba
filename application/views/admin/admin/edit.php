<div id="main-content">
     <div class="container-fluid">
        <div class="row-fluid">
           <div class="span12">
              <br>
              <?php echo $this->breadcrumb->output(); ?>
           </div>
        </div>
        <div class="row-fluid">
            <div class="span8">
                <?php echo br(1); ?>
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
                        <h4><i class="icon-user"></i> Admin</h4>
                    </div>
                    <form action="<?php echo site_url('Admin/update_proses/'.$getId['id_admin'])?>" method="post">
                    <div class="widget-body">
                        <div class="control-group">
                            <div class="row">
                                 <label class="span1"></label>
                                 <label class="span3">ID Admin</label>
                                <div class="span8">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $getId['nip']?>" required class="span12" name="nip">
                                    </div>  
                                </div>
                            </div>
                             <div class="row">
                                 <label class="span1"></label>
                                 <label class="span3">Nama Admin</label>
  
                                <div class="span8">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $getId['nama']?>"required class="span12" name="name">
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <center><button class="btn btn-warning"><i class="icon-edit"></i> Edit</button></center>
                    </div>
                </div>
                </form>
            </div>
        </div>
     </div>
</div>