<?php
// Sambungkan ke database (sesuaikan dengan pengaturan koneksi Anda)
include "connect.php";

// Hapus semua data dari tabel ranking
$sql1 = "DELETE FROM ranking";

// Hapus semua data dari tabel matriks_normalisasi
$sql2 = "DELETE FROM matriks_normalisasi";

// Eksekusi query
if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    header("location: index.php");
} else {
    echo "Error: " . $conn->error;
}

?>
