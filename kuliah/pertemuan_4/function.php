<?php
function salam($waktu = "Datang",$nama = "Admin"){
    return "Selamat $waktu, $nama!";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan FUnction</title>
</head>
<body>
    <!-- <h1><?= salam(); ?></h1> -->
    <h1><?= salam("Sore"); ?></h1>
    <!-- <h1><?= salam("Sore","ANIGATO"); ?></h1> -->
</body>
</html>