<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputPeralatanMesin.xls");
?>
<title>SIMBABA-BAKORWIL BOJONEGORO</title>
<style>
td {
   vertical-align: middle;
}
</style>
<!-- <table border="0" style="font-size:15px;border:none;font-family:Arial;"> -->
  <tr>
    <td colspan="13"><center style="font-size:16px;">KARTU INVENTARIS BARANG(KIB) B<br>PERALATAN DAN MESIN</center></td>
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
        <th width="50" >No</th>
        <th ><center>Kode Barang</center></th>
        <th width="100"><center>Jenis Barang/<br>Nama Barang</center></th>
        <th ><center>No.Reg</center> </th>
        <th ><center>Jumlah<br>Barang</center></th>
        <th width="80"><center>Merk/<br>Tipe</center></th>
        <th ><center>Ukuran/<br>CC</center></th>
        <th ><center>Bahan</center></th>
        <th ><center>Tahun<br>Pembelian</center></th>
        <th ><center>Nomor Pabrik</center></th>
        <th width="100"><center>Asal Usul<br>Cara Perolehan</center></th>
        <th width="130" ><center>Harga</center></th>
        <th ><center>Keterangan</center></th>
        <th ><center>Kondisi</center></th>
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
    </tr>
    </thead>
    <tbody>
    <?php $r=array();
    $g=array(); ?>
    <?php $no=0; foreach($all as $row): $no++; ?>
      <tr>
        <td><center>&nbsp;<?php echo  $no;?></center></td>
        <td>&nbsp;<?php echo  $row->kode_barang;?></td>
        <td>&nbsp;<?php echo  $row->nama_barang;?></td>
        <td>&nbsp;<?php echo  $row->no_reg;?></td>
        <td>&nbsp;<?php echo  $row->jumlah;?></td>
        <td>&nbsp;<?php echo  $row->merk;?></td>
        <td>&nbsp;<?php echo  $row->ukuran;?></td>
        <td>&nbsp;<?php echo  $row->bahan;?></td>
        <td>&nbsp;<?php echo  $row->tahun_pembelian;?></td>
        <td>&nbsp;<?php echo  $row->no_pabrik;?></td>
        <td>&nbsp;<?php echo  $row->asal;?></td>
        <td>&nbsp;<?php echo  uang($row->harga);?></td>
        <td>&nbsp;<?php echo  $row->keterangan;?></td>
        <td>&nbsp;<?php echo  $row->kondisi;?></td>
        <?php $r[]=$row->jumlah;
        $g[]=$row->harga; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
    <tr>
        <th colspan="4">Jumlah</th>
        <th><?php echo array_sum($r); ?></th>
        <th colspan="6"></th>
        <th><?php echo uang(array_sum($g)); ?></th>
        <th colspan="2"></th>
    </tr>
</table>
<?php echo nbs(60); ?><span>Mengetahui</span><?php echo nbs(200) ?><span>Bojonegoro, <?php echo str_replace('/', '-', $tanggal); ?></span><br>
<?php echo nbs(33); ?><span>PEJABAT PENATA USAHAAN BARANG</span><?php echo nbs(183) ?><span>Pengurus Barang</span><br>
<?php echo br(4); ?>
<?php echo nbs(50); ?><span><?php echo getjabat('satu'); ?></span><?php echo nbs(215);?><span><?php echo getjabat('dua'); ?></span><br>
<?php echo nbs(55); ?><span><?php echo getPangkat(getidjab('satu')); ?></span><?php echo nbs(222);?><span><?php echo getPangkat(getidjab('dua')); ?></span><br>
<?php echo nbs(41); ?><span>NIP.<?php echo getNIP(getidjab('satu')); ?></span><?php echo nbs(192);?><span>NIP.<?php echo getNIP(getidjab('dua')); ?></span><br>
                   