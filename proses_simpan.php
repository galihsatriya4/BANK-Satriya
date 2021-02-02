<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_telp = $_POST['no_telp'];

// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO siswa(id, name, address, tempat_lahir, tanggal_lahir, no_telp) VALUES(:id,:name,:address,:tempat_lahir,:tanggal_lahir,:no_telp)");
$sql->bindParam(':id', $id);
$sql->bindParam(':name', $name);
$sql->bindParam(':address', $address);
$sql->bindParam(':tempat_lahir', $tempat_lahir);
$sql->bindParam(':tanggal_lahir', $tanggal_lahir);
$sql->bindParam(':no_telp', $no_telp);
$sql->execute(); // Eksekusi query insert
if($sql){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: index.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>