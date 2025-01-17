<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard Kredit Kendaraan</title>
</head>
<body>
<div class="container">
    <h1>Dashboard Kredit Kendaraan</h1>
    <a href="input_pengajuan.php" class="btn btn-add">Tambah Pengajuan</a>
    <a href="approval_pengajuan.php" class="btn btn-approve">Lihat Pengajuan</a>
    <h2>Daftar Pengajuan Kredit</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Konsumen</th>
                <th>Merk Kendaraan</th>
                <th>Angsuran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT p.id_pengajuan, k.nama, v.merk_kendaraan, p.angsuran, p.status_pengajuan 
                                    FROM pengajuan p 
                                    JOIN konsumen k ON p.id_konsumen = k.id_konsumen 
                                    JOIN kendaraan v ON p.id_kendaraan = v.id_kendaraan");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id_pengajuan']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['merk_kendaraan']}</td>
                        <td>Rp " . number_format($row['angsuran'], 0, ',', '.') . "</td>
                        <td>{$row['status_pengajuan']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Belum ada pengajuan kredit.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
