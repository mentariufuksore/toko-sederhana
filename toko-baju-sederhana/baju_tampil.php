<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./

// variabel $baju untuk menampung query
$baju = query("SELECT * FROM tb_baju");
// ./
?>

<center>
<h2>DATA BAJU</h2>
<!-- Perintah tambah data menuju file baju_tambah.php -->
<a href="?halaman=baju_tambah" class="btn btn-primary btn-sm">Tambah Data Baju</a>
</center>
<br>
<table class="table table-hover">
  <thead>
    <tr>
    <th>NO</th>
    <th>NAMA BAJU</th>
    <th>HARGA BAJU</th>
    <th>AKSI</th>
    </tr>
  </thead>
<tbody>
  <tr>
<!-- perintah menampilkan isi data dari tabel tb_baju dengan perulangan foreach -->
  <?php $i = 1; ?>
  <?php foreach( $baju as $row) : ?>
  <td><?= $i; ?></td>
  <td><?=$row['nama'];?></td>
  <td>RP. <?='number_format'($row['harga']);?></td>
<!-- ./ -->
  <td>
<!-- dua tombol untuk ubah data ke file baju_ubah.php, dan untuk menghapus data ke file baju_hapus.php
dengan masing-masing mengririmkan id_baju -->
  <a href="?halaman=baju_ubah&id_baju=<?=$row['id_baju'];?>" class="btn btn-warning btn-sm">Ubah</a>
  <a href="?halaman=baju_hapus&id_baju=<?=$row['id_baju'];?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-sm">Hapus</a>
  </td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
</tbody>
</table>