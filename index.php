<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Berbaris dari Atas ke Bawah</title>
    <style>
        /* Reset styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="bobot.php" method="GET">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama">

        <label for="SkorMTK">Skor Tes Matematika</label>
        <input type="text" id="SkorMTK" name="SkorMTK">

        <label for="SkorFisika">Skor Tes Fisika</label>
        <input type="text" id="SkorFisika" name="SkorFisika">

        <label for="SkorInggris">Skor Tes Bahasa Inggris</label>
        <input type="text" id="SkorInggris" name="SkorInggris">

        <label for="gajiOrtu">Penghasilan orang tua</label>
        <input type="text" id="gajiOrtu" name="gajiOrtu">

        <label for="MinatMhs">Minat Peserta</label>
        <input type="text" id="MinatMhs" name="MinatMhs">

        <label for="SkorFisik">Skor Tes Fisik</label>
        <input type="text" id="SkorFisik" name="SkorFisik">

        <input type="submit" name="submit" value="Submit Alternatif">
        <input type="submit" name="viewrank" value="Lihat Ranking">
        <input type="submit" name="reset" value="Reset Alternatif">
    </form>
</body>
</html>
