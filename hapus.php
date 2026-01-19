<?php
$conn = new mysqli("localhost", "root", "", "db_kholid");
$id = $_GET['id'];
$conn->query("DELETE FROM mahasiswa WHERE id=$id");
header("Location: tampil.php");
