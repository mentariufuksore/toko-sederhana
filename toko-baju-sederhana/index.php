<?php
//menggunakan session
session_start();
/*jika session login belum dibuat
maka akan diarahkan ke login.php*/
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Toko Baju Sederhana</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="sidebar bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><a href="index.php"><center><small>Toko Baju Sederhana</a></div></small></center>
      <div class="list-group list-group-flush-secondary">
      <center><a href="logout.php" class="btn btn-danger btn-sm"><b>Keluar</b></a></center> <br>
        <a href="?halaman=beranda" class="list-group-item list-group-item-action bg-light">Beranda</a>
        <a href="?halaman=baju_tampil" class="list-group-item list-group-item-action bg-light">Data Baju</a>
        <a href="?halaman=pembelian_tampil" class="list-group-item list-group-item-action bg-light">Data Pembelian</a>
        <a href="?halaman=laporan_cetak" class="list-group-item list-group-item-action bg-light">Laporan Pembelian</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container">
      <div id="page-content-wrapper">
        <nav class="navbar-lg navbar-light bg-light border-bottom mt-2">
          <button class="btnmenu btn btn-secondary mb-2" id="menu-toggle">= Menu =</button>
        </nav>
          <?php
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch ($hal) {
              case 'beranda': // jika memanggil halaman=beranda maka..
                include "toko_beranda.php"; // menampilkan halaman file beranda.php
              break;
              case 'baju_tampil':
                include "baju_tampil.php";
              break;
              case 'baju_tambah':
                include "baju_tambah.php";
              break;
              case 'baju_ubah':
                include "baju_ubah.php";
              break;
              case 'baju_hapus':
                include "baju_hapus.php";
              break;
              case 'pembelian_tampil':
                include "pembelian_tampil.php";
              break;
              case 'pembelian_tambah':
                include "pembelian_tambah.php";
              break;
              case 'pembelian_cetak':
                include "pembelian_cetak.php";
              break;
              case 'pembelian_hapus':
                include "pembelian_hapus.php";
              break;
              case 'laporan_cetak':
                include "laporan_cetak.php";
              break;
              default:
              echo "<center><h3> ERROR ! </h3></center>";
              break;
            }
          }else{ //jika tidak memanggil halaman apapun maka
            include "toko_beranda.php";
          }
          
          ?>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ./ -->

  <!-- Date Picker jQuery UI -->
  <link rel="stylesheet" href="vendor/jquery/jquery-ui.css">
  <script src="vendor/jquery/jquery-1.12.4.js"></script>
  <script src="vendor/jquery/jquery-ui.js"></script>
  <!-- ./ -->

  <script>
  // Menu Toggle Script
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  // ./

// isian otomastis nama baju, harga setelah nama baju dipilih
    $("#baju").on("change", function(){
    // ambil nilai
      var nama = $("#baju option:selected").attr("nama");
      var harga = $("#baju option:selected").attr("harga");

      //pindahkan nilai ke input
      $("#nama_baju").val(nama);
      $("#harga_baju").val(harga);
    });
// ./

  $( function() {
    $( "#tanggal" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );
  
// uang kembalian
    $("#bayar").keyup(function(){
        var harga = $("#harga_baju").val();
        var bayar = $("#bayar").val();

        $("#kembalian").val(bayar - harga);
    });
// ./
  </script>
</body>
</html>
