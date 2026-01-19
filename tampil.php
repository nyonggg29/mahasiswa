<?php
$conn = new mysqli("localhost", "root", "", "db_kholid");
$result = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.html">🎓 MahasiswaApp</a>
    <div>
      <a href="index.html" class="btn btn-outline-light me-2">➕ Input Data</a>
      <a href="tampil.php" class="btn btn-outline-info">📋 Data Mahasiswa</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📋 Data Mahasiswa</h4>
        </div>
        <div class="card-body">

            <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
                <div class="alert alert-success">
                    ✅ Data mahasiswa berhasil ditambahkan!
                </div>
            <?php endif; ?>

            <a href="index.html" class="btn btn-success mb-3">➕ Tambah Data</a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['nama_lengkap'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['jurusan'] ?></td>
                        <td>
                            <?php if($row['foto']): ?>
                                <img src="uploads/<?= $row['foto'] ?>" width="60" class="rounded">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data ini?')">🗑 Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
