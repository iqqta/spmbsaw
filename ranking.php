<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Alternatif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ranking Alternatif</h2>

        <a href="javascript:void(0);" onclick="deleteData()" class="btn">Beranda</a>

        <table>
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Nama</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Sambungkan ke database (sesuaikan dengan pengaturan koneksi Anda)
                include "connect.php"; // File koneksi database

                $sql = "SELECT * FROM ranking ORDER BY skor DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . $row['alt'] . "</td>";
                        echo "<td>" . $row['skor'] . "</td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                }

                // Tutup koneksi database
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteData() {
                window.location.href = "delete.php"; // Ganti dengan file yang akan menghapus data
        }
    </script>
</body>
</html>
