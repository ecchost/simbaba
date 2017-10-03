<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputTanah.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<title>SIMBABA-BAKORWIL BOJONEGORO</title>
<style>
td {
   vertical-align: middle;
}
</style>
<!-- <table border="0" style="font-size:15px;border:none;font-family:Arial;"> -->
  <tr>
    <td colspan="13"><center style="font-size:16px;">KARTU INVENTARIS BARANG(KIB) A<br>TANAH</center></td>
    <td colspan="13"></td>
  </tr> 
<!--</table>-->
  <tr>
    <td nowrap width="10"><strong>PROVINSI</strong></td><td width="50"></td><td ><?php echo nbs(12); ?> :JAWA TIMUR</td>
  </tr>
  <br>
  <tr>
    <td nowrap width="10"><strong>Unit Lokasi</strong></td><td width="50"></td><td ><?php echo nbs(10); ?>:13000302-Bakorwil Bojonegoro</td>
  </tr>
  <br>
  <tr>
    <td nowrap width="10"><strong>Kepemilikan</strong></td><td width="50"></td><td ><?php echo nbs(6) ?> :11 - PEMERINTAH-PROVINSI</td>
  </tr>
<br>
<br>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
    <thead>
    <tr>
        <th rowspan="3">No</th>
        <th rowspan="3" >Jenis Barang/<br>Nama Barang</th>
        <th colspan="2">Nomor</th>
        <th rowspan="3" >Luas (M2)</th>
        <th rowspan="3" >Tahun<br> Pengadaan</th>
        <th rowspan="3" width="80">Letak/Alamat</th>
        <th colspan="3" >Status Tanah</th>
        <th rowspan="3" >Peggunaan</th>
        <th rowspan="3" >Asal<br> Usul</th>
        <th rowspan="3" width="130">Harga</th>
        <th rowspan="3" >Keterangan</th>
    </tr>
    <tr>
        <th rowspan="2">Kode Barang</th>
        <th rowspan="2">Register</th>
        <th rowspan="2" >Hak</th>
        <th colspan="2" >Sertifikat</th>
    </tr>
    <tr>
        <th >Tanggal</th>
        <th >Nomor</th>
    </tr>
    <tr>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6</th>
      <th>7</th>
      <th>8</th>
      <th>9</th>
      <th>10</th>
      <th>11</th>
      <th>12</th>
      <th>13</th>
      <th>14</th>
    </tr>
    </thead>
    <tbody>
      <?php $r=array(); ?>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->nama_barang; ?></td>
        <td width="80">&nbsp;<?php echo $row->kode_barang; ?></td>
        <td>&nbsp;<?php echo $row->register; ?></td>
        <td>&nbsp;<?php echo $row->luas; ?></td>
        <td>&nbsp;<?php echo $row->tahun_pengadaan; ?></td>
        <td width="100">&nbsp;<?php echo $row->letak; ?></td>
        <td>&nbsp;<?php echo $row->hak; ?></td>
        <td>&nbsp;<?php echo $row->tanggal_sertifikat; ?></td>
        <td>&nbsp;<?php echo $row->nomor_sertifikat; ?></td>
        <td>&nbsp;<?php echo $row->penggunaan; ?></td>
        <td>&nbsp;<?php echo $row->asal; ?></td>
        <td>&nbsp;<?php echo uang($row->harga); ?></td>
        <td>&nbsp;<?php echo $row->keterangan; ?></td>
        <?php $r[]=$row->harga; ?>
      </tr>
    <?php endforeach; ?>
      <tr>
        <th colspan="12">Jumlah</th>
        <th ><?php echo uang(array_sum($r)); ?></th>
      </tr>
    </tbody>
</table>
<br>
<!-- <table style="font-size:13px;border:100px;font-family:Arial;">
  <tr>
    <td colspan="2"></td>
    <td nowrap colspan="2"><center>Mengetahui</center></td>
    <td colspan="8"></td>
    <td nowrap><center>Bojonegoro, <?php echo str_replace('/', '-', $tanggal); ?></center></td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td nowrap colspan="2"><center>PEJABAT PENATA USAHAAN BARANG</center></td>
    <td colspan="8"></td>
    <td nowrap><center>Pengurus Barang</center></td>
  </tr>
  <tr></tr><tr></tr><tr></tr>
  <tr>
    <td colspan="2"></td>
    <td nowrap colspan="2"><center><u><b><?php echo getjabat('satu'); ?></u></b></center></td>
    <td colspan="8"></td>
    <td nowrap><center><center><u><b><?php echo getjabat('dua'); ?></u></b></center></center></td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td nowrap colspan="2"><center><?php echo getPangkat(getidjab('satu')); ?></center></td>
    <td colspan="8"></td>
    <td nowrap><center><?php echo getPangkat(getidjab('dua')); ?></center></td>
  </tr>
  <tr>
    <td colspan="2"></td>
    <td nowrap colspan="2"><center>NIP. <?php echo getNIP(getidjab('satu')); ?></center></td>
    <td colspan="8"></td>
    <td nowrap><center>NIP. <?php echo getNIP(getidjab('dua')); ?></center></td>
  </tr>
</table> -->
<?php echo nbs(60); ?><span>Mengetahui</span><?php echo nbs(200) ?><span>Bojonegoro, <?php echo str_replace('/', '-', $tanggal); ?></span><br>
<?php echo nbs(33); ?><span>PEJABAT PENATA USAHAAN BARANG</span><?php echo nbs(183) ?><span>Pengurus Barang</span><br>
<?php echo br(4); ?>
<?php echo nbs(50); ?><span><?php echo getjabat('satu'); ?></span><?php echo nbs(215);?><span><?php echo getjabat('dua'); ?></span><br>
<?php echo nbs(55); ?><span><?php echo getPangkat(getidjab('satu')); ?></span><?php echo nbs(222);?><span><?php echo getPangkat(getidjab('dua')); ?></span><br>
<?php echo nbs(41); ?><span>NIP.<?php echo getNIP(getidjab('satu')); ?></span><?php echo nbs(192);?><span>NIP.<?php echo getNIP(getidjab('dua')); ?></span><br>