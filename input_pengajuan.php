<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Input Pengajuan Kredit</title>
</head>
<body>
<div class="container">
    <h1>Form Pengajuan Kredit</h1>
    <form action="" method="POST">
        <!-- Data Konsumen -->
        <h2>Data Konsumen</h2>
        <label>Nama:</label>
        <input type="text" name="nama" required>
        
        <label>NIK:</label>
        <input type="text" name="nik" required>
        
        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required>
        
        <label>Status Perkawinan:</label>
        <input type="text" name="status_perkawinan">
        
        <label>Data Pasangan:</label>
        <input type="text" name="data_pasangan">
        
        <!-- Data Kendaraan -->
        <h2>Data Kendaraan</h2>
        <label>Dealer:</label>
        <input type="text" name="dealer" required>
        
        <label>Merk Kendaraan:</label>
        <input type="text" name="merk_kendaraan" required>
        
        <label>Model Kendaraan:</label>
        <input type="text" name="model_kendaraan" required>
        
        <label>Tipe Kendaraan:</label>
        <input type="text" name="tipe_kendaraan" required>
        
        <label>Warna:</label>
        <input type="text" name="warna">
        
        <label>Harga:</label>
        <input type="number" name="harga" required>
        
        <!-- Data Kredit -->
        <h2>Data Kredit</h2>
        <label>Down Payment:</label>
        <input type="number" name="down_payment" required>
        
        <label>Lama Kredit (bulan):</label>
        <input type="number" name="lama_kredit" required>
        
        <label>Angsuran per Bulan:</label>
        <input type="number" name="angsuran" required>
        
        <button type="submit" name="submit" class="btn btn-save">Simpan Pengajuan</button>
    </form>

    <!-- Tombol Kembali -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" class="btn btn-back">Kembali ke Halaman Utama</a>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Simpan data konsumen
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $status_perkawinan = $_POST['status_perkawinan'];
        $data_pasangan = $_POST['data_pasangan'];
        
        $conn->query("INSERT INTO konsumen (nama, nik, tanggal_lahir, status_perkawinan, data_pasangan) 
                      VALUES ('$nama', '$nik', '$tanggal_lahir', '$status_perkawinan', '$data_pasangan')");
        $id_konsumen = $conn->insert_id;

        // Simpan data kendaraan
        $dealer = $_POST['dealer'];
        $merk_kendaraan = $_POST['merk_kendaraan'];
        $model_kendaraan = $_POST['model_kendaraan'];
        $tipe_kendaraan = $_POST['tipe_kendaraan'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        
        $conn->query("INSERT INTO kendaraan (dealer, merk_kendaraan, model_kendaraan, tipe_kendaraan, warna, harga) 
                      VALUES ('$dealer', '$merk_kendaraan', '$model_kendaraan', '$tipe_kendaraan', '$warna', '$harga')");
        $id_kendaraan = $conn->insert_id;

        // Simpan data pengajuan
        $down_payment = $_POST['down_payment'];
        $lama_kredit = $_POST['lama_kredit'];
        $angsuran = $_POST['angsuran'];
        
        $conn->query("INSERT INTO pengajuan (id_konsumen, id_kendaraan, down_payment, lama_kredit, angsuran) 
                      VALUES ('$id_konsumen', '$id_kendaraan', '$down_payment', '$lama_kredit', '$angsuran')");

        echo "<p style='color: green; text-align: center;'>Pengajuan berhasil disimpan!</p>";
    }
    ?>
</div>
</body>
</html>
