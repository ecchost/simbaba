<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputJalanIrigasi.xls");
?>
<title>SIMBABA-BAKORWIL BOJONEGORO</title>
<style>
td {
   vertical-align: middle;
}
th {
   vertical-align: middle;
}
</style>
<!-- <table border="0" style="font-size:15px;border:none;font-family:Arial;"> -->
  <tr>
    <td colspan="13"><center style="font-size:16px;">KARTU INVENTARIS BARANG(KIB) D<br>JALAN, IRIGASI DAN JARINGAN</center></td>
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
        <th rowspan="2" width="30" style="background-color:grey;">No</th>
        <th rowspan="2" ><center>Jenis Barang/<br>Nama Barang</center></th>
        <th rowspan="2" ><center>Kode Barang</center></th>
        <th rowspan="2" ><center>Register</center></th>
        <th rowspan="2" ><center>Konstruksi</center></th>
        <th rowspan="2"><center>Panjang(Km)</center></th>
        <th rowspan="2"><center>Lebar(M)</center></th>
        <th rowspan="2"><center>Luas(M2)</center></th>
        <th rowspan="2"><center>Letak/Lokasi</center></th>
        <th colspan="2"><center>Dokumen</center></th>
        <th rowspan="2"><center>Status<br>Tanah</center></th>
        <th rowspan="2"><center>Nomor<br>Kode Tanah</center></th>
        <th rowspan="2"><center>Asal<br>Usul</center></th>
        <th rowspan="2"><center>Harga</center></th>
        <th rowspan="2" ><center>Kondisi</center></th>
        <th rowspan="2" ><center>Keterangan</center></th>
    </tr>
    <tr>
        <th><center>Tanggal</center></th>
        <th><center>Nomor</center></th>
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
      <th>15</th>
      <th>16</th>
    </tr>
    </thead>
    <tbody>
    <?php $r=array(); ?>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center><?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->nama_barang; ?></td>
        <td>&nbsp;<?php echo $row->kode_barang; ?></td>
        <td>&nbsp;<?php echo $row->no_reg; ?></td>
        <td>&nbsp;<?php echo $row->konstruksi; ?></td>
        <td>&nbsp;<?php echo $row->panjang; ?></td>
        <td>&nbsp;<?php echo $row->lebar; ?></td>
        <td>&nbsp;<?php echo $row->luas; ?></td>
        <td>&nbsp;<?php echo $row->letak; ?></td>
        <td>&nbsp;<?php echo $row->tanggal_dokumen; ?></td>
        <td>&nbsp;<?php echo $row->nomor_dokumen; ?></td>
        <td>&nbsp;<?php echo $row->status_tanah; ?></td>
        <td>&nbsp;<?php echo $row->nomor_kode_tanah; ?></td>
        <td>&nbsp;<?php echo $row->nomor_kode_tanah; ?></td>
        <td>&nbsp;<?php echo $row->asal; ?></td>
        <td>&nbsp;<?php echo uang($row->harga); ?></td>
        <td>&nbsp;<?php echo $row->kondisi; ?></td>
        <td>&nbsp;<?php echo $row->keterangan; ?></td>
      </tr>
       <?php $r[]=$row->harga; ?>
    <?php endforeach; ?>
      <tr>
          <th colspan="14">Jumlah</th>
          <th ><?php echo uang(array_sum($r)); ?></th>
          <th colspan="2"></th>
      </tr>
    </tbody>
</table>
<!-- <table style="font-size:13px;border:100px;font-family:Arial;">
  <tr>
    <td colspan="3"></td>
    <td nowrap colspan="2"><center>Mengetahui</center></td>
    <td colspan="10"></td>
    <td nowrap><center>Bojonegoro, <?php echo str_replace('/', '-', $tanggal); ?></center></td>
  </tr>
  <tr>
    <td colspan="3"></td>
    <td nowrap colspan="2"><center>PEJABAT PENATA USAHAAN BARANG</center></td>
    <td colspan="10"></td>
    <td nowrap><center>Pengurus Barang</center></td>
  </tr>
  <tr></tr><tr></tr><tr></tr>
  <tr>
    <td colspan="3"></td>
    <td nowrap colspan="2"><center><u><b><?php echo getjabat('satu'); ?></u></b></center></td>
    <td colspan="10"></td>
    <td nowrap><center><center><u><b><?php echo getjabat('dua'); ?></u></b></center></center></td>
  </tr>
  <tr>
    <td colspan="3"></td>
    <td nowrap colspan="2"><center><?php echo getPangkat(getidjab('satu')); ?></center></td>
    <td colspan="10"></td>
    <td nowrap><center><?php echo getPangkat(getidjab('dua')); ?></center></td>
  </tr>
  <tr>
    <td colspan="3"></td>
    <td nowrap colspan="2"><center>NIP. <?php echo getNIP(getidjab('satu')); ?></center></td>
    <td colspan="10"></td>
    <td nowrap><center>NIP. <?php echo getNIP(getidjab('dua')); ?></center></td>
  </tr>
</table> -->
<?php echo nbs(60); ?><span>Mengetahui</span><?php echo nbs(200) ?><span>Bojonegoro <?php echo date('d-m-Y'); ?></span><br>
<?php echo nbs(33); ?><span>PEJABAT PENATA USAHAAN BARANG</span><?php echo nbs(183) ?><span>Pengurus Barang</span><br>
<?php echo br(4); ?>
<?php echo nbs(50); ?><span><?php echo getjabat('satu'); ?></span><?php echo nbs(215);?><span><?php echo getjabat('dua'); ?></span><br>
<?php echo nbs(55); ?><span><?php echo getPangkat(getidjab('satu')); ?></span><?php echo nbs(222);?><span><?php echo getPangkat(getidjab('dua')); ?></span><br>
<?php echo nbs(41); ?><span>NIP.<?php echo getNIP(getidjab('satu')); ?></span><?php echo nbs(192);?><span>NIP.<?php echo getNIP(getidjab('dua')); ?></span><br>