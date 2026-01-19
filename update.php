<?php
$conn = new mysqli("localhost", "root", "", "db_kholid");

$id = $_POST['id'];
$nama = $_POST['nama_lengkap'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];

if (!empty($_FILES['foto']['name'])) {
    $foto = time() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
    $sql = "UPDATE mahasiswa SET 
        nama_lengkap='$nama', email='$email', jurusan='$jurusan', foto='$foto'
        WHERE id=$id";
} else {
    $sql = "UPDATE mahasiswa SET 
        nama_lengkap='$nama', email='$email', jurusan='$jurusan'
        WHERE id=$id";
}

$conn->query($sql);
header("Location: tampil.php");
