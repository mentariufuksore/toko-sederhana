<?php
require 'functions.php';

// ambil data di dengan id_baju
$id_baju = $_GET['id_baju'];
// query data berdasarkan id data yang dipilih
$baju = query("SELECT * FROM tb_baju WHERE id_baju = $id_baju")[0];
// jika tombol ubah ada maka jalankan dibawahnya
if(isset($_POST["UBAH"])) {
// mengirimkan data ke function ubah_baju()
  if(ubah_baju($_POST) > 0)
  {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=baju_tampil'>";
  }else{
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=baju_tampil'>";
  }
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <center><h2>UBAH DATA BAJU</h2></center>
<!-- id baju untuk GET dengan type hidden agar tidak ditampilkan bagi pengguna -->
  <input type="hidden" name="id_baju" value="<?=$baju["id_baju"];?>">
<!-- / -->
<!-- value mengambil dari data tb_baju berdasarkan id_baju -->
    <div class="form-group">
      <label for="nama">Nama Baju :</label>
      <input type="text" class="form-control" value="<?=$baju["nama"];?>" name="nama" id="nama" required="">
    </div>
    <div class="form-group">
      <label for="harga">Harga :</label>
      <input type="number" class="form-control" value="<?=$baju["harga"];?>" name="harga" id="harga" required="">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="UBAH">UBAH</button>
      <a href="?halaman=baju_tampil" class="btn btn-dark btn-sm">BATAL</a>
    </div>
<!-- ./ -->
</form>