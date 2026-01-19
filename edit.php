<?php
$conn = new mysqli("localhost", "root", "", "db_kholid");
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM mahasiswa WHERE id=$id")->fetch_assoc();
?>

<form action="update.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $data['id'] ?>">

Nama: <input name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>"><br>
Email: <input name="email" value="<?= $data['email'] ?>"><br>
Jurusan: <input name="jurusan" value="<?= $data['jurusan'] ?>"><br>
Foto Baru: <input type="file" name="foto"><br>

<button type="submit">Update</button>
</form>
