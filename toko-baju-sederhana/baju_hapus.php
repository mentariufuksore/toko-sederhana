<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./
// mengirimkan id_baju ke function hapus_baju()
$id_baju = $_GET["id_baju"];
  if(hapus_baju($id_baju) > 0) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=baju_tampil'>";
  }else{
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=baju_tampil'>";
  }
?>