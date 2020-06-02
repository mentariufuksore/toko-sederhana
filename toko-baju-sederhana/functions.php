<?php
// koneksi ke database
$konek = mysqli_connect("localhost","root","","db_baju");
// ./

// function untuk menampilkan data
function query($query) {
  global $konek;
  $result = mysqli_query($konek, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
// ./

// functions untuk tambah data baju
function tambah_baju($data) {
  global $konek;
  $nama = $data['nama'];
  $harga = $data['harga'];

  $query = "INSERT INTO tb_baju
                VALUES
                ('', '$nama','$harga')
                ";
  mysqli_query($konek,$query);
// mengembalakikan nilai jika ada perubahan
  return mysqli_affected_rows($konek);
}
// ./

// function untuk hapus data baju
function hapus_baju($id_baju){
  global $konek;
  $query = "DELETE FROM tb_baju WHERE id_baju = $id_baju";
  mysqli_query($konek, $query);
// mengembalakikan nilai jika ada perubahan
  return mysqli_affected_rows($konek);
}
// ./

// function untuk ubah baju
function ubah_baju($data) {
  global $konek;
  $id_baju = $data["id_baju"];
  $nama = $data['nama'];
  $harga = $data['harga'];

  $query = "UPDATE tb_baju SET
                nama = '$nama',
                harga = '$harga'
            WHERE id_baju =$id_baju
                ";
  mysqli_query($konek,$query);
// mengembalakikan nilai jika ada perubahan
  return mysqli_affected_rows($konek);
}
// ./

// function tambah pembelian
function tambah_pembelian($data) {
  global $konek;
  $nama = $data['nama_baju'];
  $harga = $data['harga_baju'];
  $tanggal = $data['tanggal'];

  $query = "INSERT INTO tb_pembelian
                VALUES
                ('', '$nama','$harga', '$tanggal')
                ";
  mysqli_query($konek,$query);
// mengembalakikan nilai jika ada perubahan
  return mysqli_affected_rows($konek);
}
// ./

// function untuk hapus pembelian
function hapus_pembelian($id_pembelian){
  global $konek;
  $query = "DELETE FROM tb_pembelian WHERE id_pembelian = $id_pembelian";
  mysqli_query($konek, $query);
// mengembalakikan nilai jika ada perubahan
  return mysqli_affected_rows($konek);
}
// ./

// function untuk cari pada form pembelian
function cari_pembelian($keyword) {
  $query = "SELECT * FROM tb_pembelian
              WHERE
            nama LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            tanggal LIKE '%$keyword%'
          ";
          return query($query);
}
// ./

// function untuk menambahkan akses sistem(login)
function registrasi($data) {
  global $konek;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($konek, $data["password"]);
  $password2 = mysqli_real_escape_string($konek, $data["password2"]);
 
 // cek username sudah ada atau belum
 $result = mysqli_query($konek, "SELECT username FROM tb_user WHERE username = '$username'");
 if(mysqli_fetch_assoc($result)) {
     echo "<script>
     alert('username sudah terdaftar')
     </script>";
     return false;
 }
 
  // cek konfirmasi password
 if($password !== $password2) {
     echo "<script>
     alert('Konfirmasi password tidak sesuai')</script>";
     return false;
 }

 // enkripsi password
 $password = password_hash($password, PASSWORD_DEFAULT);

 // tambahkan userbaru ke database
 mysqli_query($konek, "INSERT INTO tb_user VALUES('', '$username', '$password')");
 return mysqli_affected_rows($konek);
}
// ./
?>