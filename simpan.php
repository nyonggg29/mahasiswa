<?php
$conn = new mysqli("localhost", "root", "", "db_kholid");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$foto = "";
if (!empty($_FILES['foto']['name'])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) mkdir($targetDir);
    $foto = time() . "_" . $_FILES["foto"]["name"];
    move_uploaded_file($_FILES["foto"]["tmp_name"], $targetDir . $foto);
}

$sql = "INSERT INTO mahasiswa 
(nim, nama_lengkap, nama_panggilan, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, email, no_hp, alamat_Rumah, kota, provinsi, kode_Pos, negara, jurusan, angkatan, semester, ipk, status_mahasiswa, foto)
VALUES (
'$_POST[nim]',
'$_POST[nama_lengkap]',
'$_POST[nama_panggilan]',
'$_POST[tempat_lahir]',
'$_POST[tanggal_lahir]',
'$_POST[jenis_Kelamin]',
'$_POST[agama]',
'$_POST[email]',
'$_POST[no_HP]',
'$_POST[alamat_rumah]',
'$_POST[kota]',
'$_POST[provinsi]',
'$_POST[kodePos]',
'$_POST[negara]',
'$_POST[jurusan]',
'$_POST[angkatan]',
'$_POST[semester]',
'$_POST[ipk]',
'$_POST[status_mahasiswa]',
'$foto'
)";

if ($conn->query($sql) === TRUE) {
    echo "Sukses simpan data";
} else {
    echo "Error: " . $conn->error;
}
?>
