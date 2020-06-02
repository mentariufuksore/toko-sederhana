<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./
// mengirimkan id_pembelian ke function hapus_pembelian()
$id_pembelian = $_GET["id_pembelian"];
  if(hapus_pembelian($id_pembelian) > 0) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembelian_tampil'>";
  }else{
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembelian_tampil'>";
  }
?>