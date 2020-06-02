
<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./

// jika tombol simpan ada maka jalankan dibawahnya
if(isset($_POST["simpan"])) {
// mengirimkan data ke function tambah_baju()
  if(tambah_baju($_POST) > 0)
  {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=baju_tampil'>";
  }else{
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=baju_tampil'>";
  }
}
?>
<form action="" method="post" enctype="multipart/form-data">
  <center><h2>TAMBAH DATA BAJU</h2></center>
  <form>
    <div class="form-group">
      <label for="nama">Nama Baju :</label>
      <input type="text" class="form-control" placeholder="Masukkan nama baju" name="nama" id="nama" required="">
    </div>
    <div class="form-group">
      <label for="harga">Harga Baju :</label>
      <input type="number" class="form-control" placeholder="Masukkan harga baju" name="harga" id="harga" required="">
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="simpan">SIMPAN</button>
      <a href="?halaman=baju_tampil" class="btn btn-dark btn-sm">BATAL</a>
    </div>
</form>