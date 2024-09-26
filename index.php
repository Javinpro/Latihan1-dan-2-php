<?php
$max = 10;
$min = 1;
$number = $min; // Default value untuk $number

// Jika form dikirimkan, periksa dan validasi input
if (isset($_POST['submit'])) {
    $number = isset($_POST['totalnumber']) ? intval($_POST['totalnumber']) : $min;

    // Validasi batas minimal dan maksimal number
    if ($number < $min) $number = $min;
    if ($number > $max) $number = $max;
}

// Fungsi untuk membuat palindrome
function makePalindrome($jumlah) {
    $result = "";
    for ($i = 1; $i <= $jumlah; $i++) {
        // Buat deretan number palindrome
        $deret = str_repeat("1", $i);

        // Cetak result dalam bentuk perkalian
        $result .= "<p class='result'>";
        $result .= $deret . " x " . $deret . " = " . ($deret * $deret);
        $result .= "</p>";
    }
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1 | Javin E. C.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #007bff;
        }
        form {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="number"] {
            width: 150px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            text-align: center;
            margin: 10px 0;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Latihan 1 | Javin E. C.</h1>
    <!-- Form input jumlah number -->
    <form action="" method="POST">
        <input type="number" name="totalnumber" 
            value="<?= htmlentities($number) ?>" required placeholder="Total number (<?= $min . ' - ' . $max; ?>)"
            min="<?= $min; ?>" max="<?= $max; ?>">

        <input type="submit" name="submit" value="Generate">
    </form>
    <br>

    <a href="index2.php">Go to Latihan 2</a><br>

    <!-- Tampilkan result jika number telah diatur -->
    <?php
        if (isset($_POST['submit'])) {
            echo makePalindrome($number);
        }
    ?>
</body>
</html>
