<?php

include "connect.php";

if (isset($_GET['submit'])) {
    $nama = $_GET['nama'];
    $skorMTK = $_GET['SkorMTK'];
    $skorFisika = $_GET['SkorFisika'];
    $skorInggris = $_GET['SkorInggris'];
    $gajiOrtu = $_GET['gajiOrtu'];
    $minatMhs = $_GET['MinatMhs'];
    $skorFisik = $_GET['SkorFisik'];

    // Tentukan nilai linguistik untuk Skor Tes Matematika (C1)
    if ($skorMTK < 50) {
        $nilaiC1 = 0.25;
    } elseif ($skorMTK >= 50 && $skorMTK <= 70) {
        $nilaiC1 = 0.5;
    } elseif ($skorMTK > 70 && $skorMTK <= 85) {
        $nilaiC1 = 0.75;
    } elseif ($skorMTK > 85) {
        $nilaiC1 = 1;
    } else {
        // Default jika nilai tidak masuk ke dalam rentang yang ditentukan
        $nilaiC1 = 0; // Atur nilai default di sini sesuai kebutuhan
    }

    // Tentukan nilai linguistik untuk Skor Tes Fisika (C2)
    if ($skorFisika < 50) {
        $nilaiC2 = 0.25;
    } elseif ($skorFisika >= 50 && $skorFisika <= 70) {
        $nilaiC2 = 0.5;
    } elseif ($skorFisika > 70 && $skorFisika <= 85) {
        $nilaiC2 = 0.75;
    } elseif ($skorFisika > 85) {
        $nilaiC2 = 1;
    } else {
        $nilaiC2 = 0; // Atur nilai default di sini sesuai kebutuhan
    }

    // Tentukan nilai linguistik untuk Skor Tes Bahasa Inggris (C3)
    if ($skorInggris < 50) {
        $nilaiC3 = 0.25;
    } elseif ($skorInggris >= 50 && $skorInggris <= 70) {
        $nilaiC3 = 0.5;
    } elseif ($skorInggris > 70 && $skorInggris <= 85) {
        $nilaiC3 = 0.75;
    } elseif ($skorInggris > 85) {
        $nilaiC3 = 1;
    } else {
        $nilaiC3 = 0; // Atur nilai default di sini sesuai kebutuhan
    }

    // Tentukan nilai linguistik untuk Penghasilan Orang Tua (C4)
    if ($gajiOrtu < 2000000) {
        $nilaiC4 = 0.25;
    } elseif ($gajiOrtu >= 2000000 && $gajiOrtu <= 5000000) {
        $nilaiC4 = 0.5;
    } elseif ($gajiOrtu > 5000000 && $gajiOrtu <= 10000000) {
        $nilaiC4 = 0.75;
    } elseif ($gajiOrtu > 10000000) {
        $nilaiC4 = 1;
    } else {
        $nilaiC4 = 0; // Atur nilai default di sini sesuai kebutuhan
    }

    // Tentukan nilai linguistik untuk Skor Tes Fisik (C6)
    if ($skorFisik < 2) {
        $nilaiC6 = 0.25;
    } elseif ($skorFisik >= 2 && $skorFisik <= 3) {
        $nilaiC6 = 0.5;
    } elseif ($skorFisik >= 4 && $skorFisik <= 6) {
        $nilaiC6 = 0.75;
    } elseif ($skorFisik > 6) {
        $nilaiC6 = 1;
    } else {
        $nilaiC6 = 0; // Atur nilai default di sini sesuai kebutuhan
    }

    // Tentukan nilai linguistik untuk Minat Peserta (C5)
    if ($minatMhs < 18) {
        $nilaiC5 = 0.3;
    } elseif ($minatMhs >= 18 && $minatMhs <= 24) {
        $nilaiC5 = 0.6;
    } elseif ($minatMhs > 24) {
        $nilaiC5 = 0.9;
    } else {
        $nilaiC5 = 0; // Atur nilai default di sini sesuai kebutuhan
    }

    // Query SQL untuk INSERT ke database
    $sql = "INSERT INTO matriks (alt, mtk, fsk, bing, gajiortu, minat, fisik)
            VALUES ('$nama', $nilaiC1, $nilaiC2, $nilaiC3, $nilaiC4, $nilaiC5, $nilaiC6)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);

    // Redirect kembali ke halaman index.php
    header("location: index.php");
    exit(); // Pastikan exit digunakan setelah header redirect
}

if (isset($_GET['viewrank'])){
    // Query untuk mengambil data matriks dari tabel matriks
$query = "SELECT alt, mtk, fsk, bing, gajiortu, minat, fisik FROM matriks";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

// Inisialisasi array untuk menyimpan nilai matriks
$matriks = array();

// Ambil data matriks dari hasil query
while ($row = mysqli_fetch_assoc($result)) {
    $matriks[] = $row;
}

// Tentukan jumlah alternatif (baris) dan kriteria (kolom)
$jumlahAlternatif = count($matriks);
$jumlahKriteria = count($matriks[0]) - 1; // Karena kolom pertama adalah nama alternatif (alt)

// Array untuk menyimpan nilai maksimum setiap kolom
$max = array();

// Temukan nilai maksimum untuk setiap kolom (kriteria)
for ($j = 1; $j <= $jumlahKriteria; $j++) { // Dimulai dari 1 karena kolom pertama adalah nama alternatif (alt)
    $max[$j] = -INF; // Inisialisasi dengan nilai negatif tak hingga

    foreach ($matriks as $alternatif) {
        $nilai = $alternatif[array_keys($alternatif)[$j]]; // Ambil nilai kriteria ke-j untuk setiap alternatif

        if ($nilai > $max[$j]) {
            $max[$j] = $nilai; // Perbarui nilai maksimum jika nilai lebih besar
        }
    }
}

// Array untuk menyimpan matriks yang sudah dinormalisasi
$matriksNormalisasi = array();

// Lakukan normalisasi untuk setiap elemen matriks
foreach ($matriks as $alternatif) {
    $namaAlternatif = $alternatif['alt'];
    $nilaiNormalisasi = array('alt' => $namaAlternatif);

    for ($j = 1; $j <= $jumlahKriteria; $j++) { // Dimulai dari 1 karena kolom pertama adalah nama alternatif (alt)
        $nilai = $alternatif[array_keys($alternatif)[$j]]; // Ambil nilai kriteria ke-j untuk setiap alternatif

        // Hitung nilai normalisasi
        $nilaiNormalisasi[array_keys($alternatif)[$j]] = $nilai / $max[$j];
    }

    // Simpan nilai normalisasi ke dalam tabel matriks_normalisasi
    $alt = mysqli_real_escape_string($conn, $namaAlternatif);
    $mtk = $nilaiNormalisasi['mtk'];
    $fsk = $nilaiNormalisasi['fsk'];
    $bing = $nilaiNormalisasi['bing'];
    $gajiortu = $nilaiNormalisasi['gajiortu'];
    $minat = $nilaiNormalisasi['minat'];
    $fisik = $nilaiNormalisasi['fisik'];

    $sqlInsert = "INSERT INTO matriks_normalisasi (alt, mtk, fsk, bing, gajiortu, minat, fisik)
                  VALUES ('$alt', $mtk, $fsk, $bing, $gajiortu, $minat, $fisik)";

    if (!mysqli_query($conn, $sqlInsert)) {
        die("Insert error: " . mysqli_error($conn));
    }
}

// Query untuk mengambil data dari tabel matriks_normalisasi
$query = "SELECT alt, mtk, fsk, bing, gajiortu, minat, fisik FROM matriks_normalisasi";
$result = mysqli_query($conn, $query);

// Array untuk menyimpan hasil perhitungan Vi
$hasilVi = array();

// Bobot untuk setiap kriteria (misalnya berdasarkan data yang diberikan sebelumnya)
$bobot = array(
    'mtk' => 0.17,
    'fsk' => 0.10,
    'bing' => 0.13,
    'gajiortu' => 0.30,
    'minat' => 0.25,
    'fisik' => 0.05
);

// Lakukan perhitungan Vi untuk setiap alternatif
while ($row = mysqli_fetch_assoc($result)) {
    $alt = $row['alt'];
    $vi = 0;

    // Hitung nilai Vi berdasarkan rumus
    foreach ($bobot as $kriteria => $nilaiBobot) {
        $rij = $row[$kriteria]; // Ambil nilai r_ij dari matriks normalisasi
        $vi += $nilaiBobot * $rij;
    }

    // Tambahkan nilai Vi ke dalam array hasilVi
    $hasilVi[$alt] = $vi;

    // Masukkan nilai Vi ke dalam tabel ranking
    $sqlInsert = "INSERT INTO ranking (alt, skor) VALUES ('$alt', $vi)";
    $resultInsert = mysqli_query($conn, $sqlInsert);

    if (!$resultInsert) {
        die("Insert error: " . mysqli_error($conn));
    }
}


    header("location: ranking.php");
    exit();
}

if (isset($_GET['reset'])){
// Hapus semua data
$sql1 = "DELETE FROM matriks";
$sql2 = "DELETE FROM matriks_normalisasi";
$sql3 = "DELETE FROM ranking";
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);

header("location: index.php");
exit();
}

?>