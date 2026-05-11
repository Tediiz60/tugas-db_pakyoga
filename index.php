<?php
require_once 'config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM tb_absensi ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Absensi Terpadu</title>
    <style>
        :root { --bg: #f0f4f8; --primary: #5a92af; --text: #334e58; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); color: var(--text); padding: 40px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        h2 { text-align: center; font-weight: 300; margin-bottom: 30px; color: #7f8c8d; }
        .btn { padding: 10px 20px; text-decoration: none; border-radius: 8px; font-size: 14px; transition: 0.3s; display: inline-block; }
        .btn-tambah { background: var(--primary); color: white; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #eef2f7; padding: 15px; border-bottom: 2px solid #dce4ec; }
        td { padding: 15px; border-bottom: 1px solid #f0f0f0; text-align: center; }
        .status-badge { padding: 5px 12px; border-radius: 20px; color: white; font-size: 12px; background: #5a92af; }
        .btn-edit { color: #f1c40f; border: 1px solid #f1c40f; margin-right: 5px; }
        .btn-hapus { color: #e74c3c; border: 1px solid #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Absensi Siswa</h2>
        <a href="tambah.php" class="btn btn-tambah">+ Catat Kehadiran Baru</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; while($data = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td style="text-align:left"><?= $data['nama_siswa']; ?></td>
                    <td><?= $data['kelas']; ?></td>
                    <td><span class="status-badge"><?= $data['status']; ?></span></td>
                    <td><?= $data['tanggal']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-hapus" onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>