<?php
require_once 'config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE id='$id'"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    $tgl = $_POST['tanggal'];

    $u = "UPDATE tb_absensi SET nama_siswa='$nama', kelas='$kelas', status='$status', tanggal='$tgl' WHERE id='$id'";
    if (mysqli_query($koneksi, $u)) { header("Location: index.php"); }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi</title>
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); height: 100vh; display: flex; justify-content: center; align-items: center; margin: 0; }
        .card { background: white; width: 380px; padding: 40px; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        h3 { text-align: center; color: #2d3436; margin-bottom: 30px; }
        label { display: block; font-size: 12px; color: #636e72; margin: 10px 0 5px 5px; text-transform: uppercase; }
        input, select { width: 100%; padding: 12px; border-radius: 12px; border: 1px solid #dfe6e9; box-sizing: border-box; }
        .btn-update { width: 100%; padding: 15px; margin-top: 20px; border: none; border-radius: 12px; background: #667eea; color: white; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="card">
        <h3>Edit Data</h3>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_siswa" value="<?= $data['nama_siswa']; ?>" required>
            
            <label>Kelas</label>
            <input type="text" name="kelas" value="<?= $data['kelas']; ?>" required>
            
            <label>Status</label>
            <select name="status">
                <option value="Hadir" <?= ($data['status']=='Hadir')?'selected':''; ?>>Hadir</option>
                <option value="Izin" <?= ($data['status']=='Izin')?'selected':''; ?>>Izin</option>
                <option value="Sakit" <?= ($data['status']=='Sakit')?'selected':''; ?>>Sakit</option>
            </select>
            
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>
            
            <button type="submit" name="update" class="btn-update">Simpan Perubahan</button>
        </form>
        <a href="index.php" style="display:block; text-align:center; margin-top:15px; color:#aaa; text-decoration:none; font-size:13px;">← Batal</a>
    </div>
</body>
</html>