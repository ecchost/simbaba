<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputKir.xls");
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
    <td colspan="13"><center style="font-size:16px;">KARTU INVENTARIS RUANGAN</center></td>
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
        <th rowspan="2"><center>Kode Barang</center></th>
        <th rowspan="2"><center>Jenis Barang</center></th>
        <th rowspan="2"><center>Merk</center></th>
        <th rowspan="2"><center>Nomor Seri<br>Pabrik</center></th>
        <th rowspan="2"><center>Ukuran</center></th>
        <th rowspan="2"><center>Bahan</center></th>
        <th rowspan="2"><center>Thn<br>Perolehan</center></th>
        <th rowspan="2"><center>Jml<br>Brg</center></th>
        <th rowspan="2"><center>Nilai<br> Per Barang</center></th>
        <th colspan="3"><center>Kondisi</center></th>
        <th rowspan="2"><center>Keterangan</center></th>
    </tr>
    <tr>
        <th><center>Baik</center></th>
        <th><center>Rsk Rgn</center></th>
        <th><center>Rsk Brt</center></th>
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
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center><?php echo $no; ?></center></td>
        <td><?php echo $row->kode_barang; ?></td>
        <td><?php echo $row->nama_barang; ?></td>
        <td><?php echo $row->merk; ?></td>
        <td><?php echo $row->no_pabrik; ?></td>
        <td><?php echo $row->ukuran; ?></td>
        <td><?php echo $row->bahan; ?></td>
        <td><?php echo $row->tahun_pembelian; ?></td>
        <td><?php echo $row->jumlah; ?></td>
        <td><?php echo $row->harga; ?></td>
        <td><?php 
            if($row->kondisi=="BAIK"){
              echo $row->jumlah;
            }else{
              echo "0";
            }
        ;?></td>
        <td><?php 
            if($row->kondisi=="RUSAK RINGAN"){
              echo $row->jumlah;
            }else{
              echo "0";
            }
        ;?></td>
        <td><?php 
            if($row->kondisi=="RUSAK BERAT"){
              echo $row->jumlah;
            }else{
              echo "0";
            }
        ;?></td>
        <td><?php echo $row->keterangan; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>