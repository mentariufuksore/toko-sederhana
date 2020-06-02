<?php
// memasukkan / me riquire file functions.php
require 'functions.php';
// ./

// jika tombol simpan ada maka jalankan dibawahnya
if(isset($_POST["PEMBELIAN"])) {
// mengirimkan data ke function tambah_pembelian()
  if(tambah_pembelian($_POST) > 0)
  {
    echo "<script>alert('Pembelian Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembelian_tampil'>";
  }else{
    echo "<script>alert('Pembelian Gagal Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=beranda'>";
  }
}
?>

<center><h2>TAMBAH DATA PEMBELIAN</h2></center>
<form action="" method="post" enctype="multipart/form-data">
    <div class="pembelian">
      <div class="form-group">
        <label for="baju" class="control-label">Pilih</label>
        <select class="form-control" id="baju" name="baju" required>
          <option value="" disable>=== pilih baju ===</option>
          <?php 
          $baju = mysqli_query($konek, "SELECT * FROM tb_baju");
          while($data = mysqli_fetch_array($baju)){
            echo '<option nama ="'.$data['nama'].'"
            harga ="'.$data['harga'].'">
            '.$data['nama'].'
            </option>';
          }
          ?>
        </select>
      </div>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nama_baju">Nama</label>
        <input type="text" class="form-control" name="nama_baju" id="nama_baju" required="" readonly="">
      </div>
      <div class="form-group col-md-6">
        <label for="harga_baju">Harga</label>
        <input type="number" class="form-control" name="harga_baju" id="harga_baju" required="" readonly="">
      </div>
    </div>

    <div class="form-group">
      <label for="tanggal">Tanggal Pembelian</label>
      <input class="form-control" name="tanggal" id="tanggal" required="">
    </div>

    <!-- Bayar -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="bayar">Uang Bayar</label>
        <input type="number" class="form-control" name="bayar" id="bayar" required="" placeholder="Masukkan uang pelanggan">
      </div>
      <div class="form-group col-md-6">
        <label for="kembalian">Uang Kembalian</label>
        <input type="number" class="form-control" name="kembalian" id="kembalian" required="" readonly="">
      </div>
    </div>
</form>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="PEMBELIAN">BELI</button>
      <a href="?halaman=beranda" class="btn btn-dark btn-sm">BATAL</a>
    </div>