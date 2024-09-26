<?php
// Inisialisasi variabel
$max = 10; // Menetapkan nilai maksimum untuk validasi
$min = 0; // Menetapkan nilai minimum untuk validasi
$regex = "/^\[(([0-9]+)(,[0-9]+)*)?\]$/"; // Regex untuk memvalidasi format input
$isError = true; // Untuk menandakan adanya kesalahan
$execute = false; // Menandakan apakah harus mengeksekusi fungsi

// Memeriksa apakah form disubmit
if (isset($_POST['submit'])) {
    // Memeriksa semua input yang diperlukan
    if (isset($_POST['nums1'], $_POST['nums2'], $_POST['m'], $_POST['n'])) {
        $nums1 = $_POST['nums1'];
        $nums2 = $_POST['nums2'];
        $m = intval($_POST['m']);
        $n = intval($_POST['n']);
        
        // Memvalidasi format input menggunakan regex
        if (preg_match($regex, $nums1) && preg_match($regex, $nums2)) {
            $isError = false; // Tidak ada kesalahan dalam input
            $nums1 = explode(",", substr($nums1, 1, -1)); // Mengubah input menjadi array
            $nums2 = explode(",", substr($nums2, 1, -1));
            
            // Validasi jumlah elemen
            $m = max($min, min($m, count($nums1)));
            $n = max($min, min($n, count($nums2)));
            $execute = true; // Menandakan bahwa input valid untuk dieksekusi
        }
    }
    if ($isError) echo "<p style='color:red;'>Something went wrong, please recheck everything!</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2 | Javin E. C.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #2929cc;
            color: white;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #2929cc;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #2196F3;
        }
        a {
            text-decoration: none;
            color: #2929cc;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label>Nums1:</label></td>
                <td>
                    <input type="text" name="nums1" value="<?= isset($nums1) ? '[' . implode(",", $nums1) . ']' : ''; ?>" 
                           pattern="<?= substr($regex, 1, -2); ?>" placeholder="Format: [0,1,2,..]" required>
                </td>
            </tr>
            <tr>
                <td><label>Nums2:</label></td>
                <td>
                    <input type="text" name="nums2" value="<?= isset($nums2) ? '[' . implode(",", $nums2) . ']' : ''; ?>" 
                           pattern="<?= substr($regex, 1, -2); ?>" placeholder="Format: [0,1,2,..]" required>
                </td>
            </tr>
            <tr>
                <td><label>m:</label></td>
                <td>
                    <input type="number" name="m" value="<?= isset($m) ? $m : ''; ?>" placeholder="Index for Nums1" 
                           required min="<?= $min; ?>" max="<?= $max; ?>">
                </td>
            </tr>
            <tr>
                <td><label>n:</label></td>
                <td>
                    <input type="number" name="n" value="<?= isset($n) ? $n : ''; ?>" placeholder="Index for Nums2" 
                           required min="<?= $min; ?>" max="<?= $max; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Calculate!"></td>
            </tr>
        </table>
    </form>
    <br>

    <a href="index.php">Back to Latihan 1</a><br>

    <?php
    // Fungsi untuk menggabungkan dan mengurutkan dua array
    function execute($nums1, $nums2, $m, $n) {
        // Gabungkan dua array
        $combined = array_merge(array_slice($nums1, 0, $m), array_slice($nums2, 0, $n));
        sort($combined); // Urutkan hasil gabungan
        echo '<div class="result">Hasil: ' . implode(', ', $combined) . '</div>'; // Tampilkan hasil
    }

    // Jika validasi sukses, jalankan fungsi execute
    if ($execute) {
        execute($nums1, $nums2, $m, $n);
    }
    ?>
</body>
</html>
