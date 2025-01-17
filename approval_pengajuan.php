<?php include 'db.php'; 

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id_pengajuan = $_GET['id'];
    $action = $_GET['action'];

    // Tentukan status berdasarkan aksi (approve/reject)
    $status = ($action === 'approve') ? 'Approved' : 'Rejected';

    // Update status_pengajuan di database
    $query = "UPDATE pengajuan SET status_pengajuan = '$status' WHERE id_pengajuan = $id_pengajuan";
    if ($conn->query($query) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Pengajuan berhasil $status!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Terjadi kesalahan: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Approval Pengajuan Kredit</title>
</head>
<body>
<div class="container">
    <h1>Approval Pengajuan Kredit</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Konsumen</th>
                <th>Merk Kendaraan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT p.id_pengajuan, k.nama, v.merk_kendaraan, p.status_pengajuan 
                                    FROM pengajuan p 
                                    JOIN konsumen k ON p.id_konsumen = k.id_konsumen 
                                    JOIN kendaraan v ON p.id_kendaraan = v.id_kendaraan");
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id_pengajuan']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['merk_kendaraan']; ?></td>
                    <td><?php echo $row['status_pengajuan']; ?></td>
                    <td>
                        <a href="approval_pengajuan.php?id=<?php echo $row['id_pengajuan']; ?>&action=approve" 
                           class="btn btn-approve" 
                           onclick="return confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')">Approve</a>
                        <a href="approval_pengajuan.php?id=<?php echo $row['id_pengajuan']; ?>&action=reject" 
                           class="btn btn-reject" 
                           onclick="return confirm('Apakah Anda yakin ingin menolak pengajuan ini?')">Reject</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <!-- Tombol Kembali -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" class="btn btn-back">Kembali ke Halaman Utama</a>
    </div>
</div>
</body>
</html>
