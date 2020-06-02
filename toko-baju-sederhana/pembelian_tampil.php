<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./

// variabel $pembelian untuk menampung query
$pembelian = query("SELECT * FROM tb_pembelian");
// ./

// jika tombol cari ada maka jalankan dibawahnya
if(isset($_POST["cari"])) {
// $pembelian untuk menampung query untuk menjalankan function cari_pembelian();
  $pembelian = cari_pembelian($_POST["keyword"]);
}
?>
<center>
<h2>DATA PEMBELIAN</h2>
<!-- Perintah tambah data menuju file buku_tambah.php -->
<a href="?halaman=pembelian_tambah" class="btn btn-primary btn-sm">Tambah Data Pembelian</a>
</center>
<form class="form-inline my-2 my-lg-0 row-reverse" method="post">
  <div class="form-group mx-sm-3 mb-2" >
    <input type="text" class="form-control" id="cari" name="keyword" placeholder="Cari data pembelian" autofocus autocomplete="off">
  </div>
  <button type="submit" name="cari" class="btn bg-success text-white mb-2">Cari</button>
</form>
<br>
<table class="table table-hover">
  <thead>
    <tr>
    <th>NO</th>
    <th>NAMA BAJU</th>
    <th>HARGA BAJU</th>
    <th>TANGGAL</th>
    <th>AKSI</th>
    </tr>
  </thead>
<tbody>
  <tr>
<!-- perintah menampilkan isi data dari tabel tb_baju dengan perulangan foreach -->
  <?php $i = 1; ?>
  <?php foreach( $pembelian as $row) : ?>
  <td><?= $i; ?></td>
  <td><?=$row['nama'];?></td>
  <td>RP. <?='number_format'($row['harga']);?></td>
  <td><?=$row['tanggal'];?></td>
<!-- ./ -->
  <td>
<!-- dua tombol untuk cetak data ke file pembelian_cetak.php, dan untuk menghapus data ke file pembelian_hapus.php
dengan masing-masing mengririmkan id_baju -->
  <a href="?halaman=pembelian_cetak&id_pembelian=<?=$row['id_pembelian'];?>" class="btn btn-warning btn-sm">Cetak</a>
  <a href="?halaman=pembelian_hapus&id_pembelian=<?=$row['id_pembelian'];?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-sm">Hapus</a>
  </td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>

</tbody>
</table>