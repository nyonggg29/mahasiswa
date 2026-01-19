<?php
$host = "sql206.infinityfree.com";
$user = "if0_40937683";
$pass = "Khalid290619";
$db   = "if0_40937683_mahasiswa";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
