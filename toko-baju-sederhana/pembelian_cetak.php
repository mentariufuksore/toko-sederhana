<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./
// id yang dikirimkan ditangkap
$id_pembelian = $_GET['id_pembelian'];
// ./
// variabel $pembelian untuk menampung query
$pembelian = mysqli_query($konek,"SELECT * FROM tb_pembelian WHERE id_pembelian='$id_pembelian'");
// ./
?>
<style>
@media print {
  .btnmenu {
    display: none;
  }
  .sidebar {
    display: none;
  }
}
</style>
<table class="table table-hover">
  <thead>
    <tr>
    <th>NO</th>
    <th>NAMA BAJU</th>
    <th>HARGA BAJU</th>
    <th>TANGGAL BELI</th>
    </tr>
  </thead>
<tbody>
  <tr>
  <!-- perintah menampilkan data sesuai nama field jumlah td sesuai dengan th diatas -->
  <?php $i = 1; ?>
  <?php foreach( $pembelian as $row) : ?>
    <td class="no"><?= $i; ?></td>
    <td><?=$row['nama'];?></td>
    <td>RP. <?='number_format'($row['harga']);?></td>
    <td><?=$row['tanggal'];?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
</tbody>
</table>
<center>-------------------- LUNAS ------------------- </center>
<br><br><br>
<u>Toko baju sederhana</u>
<br>
<small class="tanggal">dicetak pada tanggal <?=date("d M Y");?></small>
<script>
window.print();
</script>