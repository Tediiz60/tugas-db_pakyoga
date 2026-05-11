<?php
require_once 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_siswa'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $q = "INSERT INTO tb_absensi (nama_siswa, status, tanggal) VALUES ('$nama', '$status', '$tanggal')";
    if (mysqli_query($koneksi, $q)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi</title>
    <style>
        :root { --primary: #735aaf; --bg: #f0f4f8; --text: #334e58; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); color: var(--text); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; width: 350px; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        h3 { font-weight: 400; text-align: center; margin-bottom: 20px; }
        label { display: block; font-size: 12px; margin-bottom: 5px; color: #888; text-transform: uppercase; }
        input, select { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #e0e0e0; border-radius: 8px; background: #fafafa; box-sizing: border-box; }
        input:focus { border-color: var(--primary); outline: none; background: #fff; }
        .btn-simpan { width: 100%; padding: 12px; background: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; transition: 0.3s; }
        .btn-simpan:hover { background: #7700ff; }
        .back-link { display: block; text-align: center; margin-top: 15px; font-size: 13px; color: #aaa; text-decoration: none; }
    </style>
</head>
<body>
    <div class="card">
        <h3>Tambah Absensi</h3>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_siswa" placeholder="Masukkan nama siswa..." required>
            
            <label>Status Kehadiran</label>
            <select name="status">
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>
            </select>
            
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" required>
            
            <button type="submit" name="simpan" class="btn-simpan">Simpan Data</button>
        </form>
        <a href="index.php" class="back-link">← Kembali ke Daftar</a>
    </div>
</body>
</html>