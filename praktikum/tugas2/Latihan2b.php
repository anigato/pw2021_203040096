<?php

$jawabanIsset = "Isset adalah = Fungsi yang digunakan untuk memeriksa variabel apakah sudah diatur atau belum, akan menghasilkan true jika sudah diatur dan false jika belum diatur.<br><br>";
$jawabanEmpty = "Empty adalah = Fungsi untuk mengecek variabel sudah memiliki nilai atau belum";

$GLOBALS["jawabIsset"] = $jawabanIsset;
$GLOBALS["jawabEmpty"] = $jawabanEmpty;

function soal($style){
    echo "<div class='$style'>
            <p>".$GLOBALS['jawabIsset']."</p>
            <p>".$GLOBALS['jawabIsset']."</p>
        </div>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .css {
            border: 1px solid black;
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <?php soal("css"); ?>
</body>
</html>