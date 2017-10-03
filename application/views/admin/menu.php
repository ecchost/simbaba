<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">
      <div class="navbar-inverse">
          <form class="navbar-search visible-phone">
             <input type="text" class="search-query" placeholder="Search" />
          </form>
       </div>
       <!-- END RESPONSIVE QUICK SEARCH FORM -->
       <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu <?php if($aktifmenu=='dashboard'){echo 'active';}?>">
                <a class="" href="<?php echo site_url('welcome'); ?>">
                    <i class="icon-dashboard"></i>
                    <span style="font-size:13px;">Dashboard</span>
                </a>
            </li>
            <li class="sub-menu <?php if($aktifmenu=='master'){echo 'active';}?>">
                <a href="javascript:;" class="">
                    <i class="icon-th"></i>
                    <span style="font-size:13px;">Master Data</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($aktifsubmenu=='pegawai'){echo 'active';}?>"><a href="<?php echo site_url('Pegawai') ?>" style="font-size:13px;"><i class="icon-user"></i>Pegawai</a></li>
                    <li class="<?php if($aktifsubmenu=='bidang'){echo 'active';}?>"><a href="<?php echo site_url('Bidang') ?>" style="font-size:13px;"><i class="icon-book"></i>Bidang/Bagian</a></li>
                    <li class="<?php if($aktifsubmenu=='bidang_barang'){echo 'active';}?>"><a href="<?php echo site_url('Bidang_barang') ?>" style="font-size:13px;"><i class="icon-tasks"></i>Bidang Barang</a></li>
                    <li class="<?php if($aktifsubmenu=='lokasi'){echo 'active';}?>"><a href="<?php echo site_url('Lokasi') ?>" style="font-size:13px;"><i class="icon-map-marker"></i>Lokasi</a></li>
                    <!-- <li class="<?php if($aktifsubmenu=='merk'){echo 'active';}?>"><a href="<?php echo site_url('Merk') ?>" style="font-size:13px;"><i class="icon-ticket"></i>Merk</a></li> -->
                </ul>
            </li>
             <li class="sub-menu <?php if($aktifmenu=='input'){echo 'active';}?>">
                <a class="" style="font-size:13px;" href="<?php echo site_url('input'); ?>">
                    <i class="icon-plus"></i>
                    <span>Input Barang</span>
                </a>
            </li>
            <li class="sub-menu <?php if($aktifmenu=='output'){echo 'active';}?>">
                <a class="" style="font-size:13px;" href="<?php echo site_url('output'); ?>">
                    <i class="icon-eye-open"></i>
                    <span>Output Barang</span>
                </a>
            </li>
            <li class="sub-menu <?php if($aktifmenu=='laporan'){echo 'active';}?>">
                <a href="javascript:;" class="">
                    <i class="icon-print"></i>
                    <span style="font-size:13px;">Laporan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($aktifsubmenu=='kib'){echo 'active';}?>"><a href="<?php echo site_url('Kib') ?>" style="font-size:13px;"><i class="icon-book"></i> Kib</a></li>
                    <li class="<?php if($aktifsubmenu=='kir'){echo 'active';}?>"><a href="<?php echo site_url('Kir') ?>" style="font-size:13px;"><i class="icon-tablet"></i> Kir</a></li>
                </ul>
            </li>
            <li class="sub-menu <?php if($aktifmenu=='admin'){echo 'active';}?>">
                <a class="" style="font-size:13px;" href="<?php echo site_url('admin'); ?>">
                    <i class="icon-lock"></i>
                    <span>Admin</span>
                </a>
            </li>
             <li class="sub-menu <?php if($aktifmenu=='profil'){echo 'active';}?>">
                <a href="javascript:;" class="">
                    <i class="icon-location-arrow"></i>
                    <span style="font-size:13px;">Profil</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($aktifsubmenu=='instansi'){echo 'active';}?>"><a href="<?php echo site_url('Instansi') ?>" style="font-size:13px;"><i class="icon-bookmark-empty"></i> Instansi</a></li>
                    <li class="<?php if($aktifsubmenu=='dev'){echo 'active';}?>"><a href="<?php echo site_url('Dev') ?>" style="font-size:13px;"><i class="icon-male"></i> Pengembang</a></li>
                </ul>
            </li>
            <li class="sub-menu <?php if($aktifmenu=='utility'){echo 'active';}?>">
                <a class="" style="font-size:13px;" href="<?php echo site_url('utility'); ?>">
                    <i class="icon-retweet"></i>
                    <span>Utility</span>
                </a>
            </li>
        </ul>
        <?php echo br(20); ?>
       <!-- END SIDEBAR MENU -->
    </div>
</div>  