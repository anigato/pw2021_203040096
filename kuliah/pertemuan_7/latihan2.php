<?php 
// cek apakah tidak ada data di $_GET

if (!isset($_GET["name"]) || 
    !isset($_GET["description"] ) ||
    !isset($_GET["price"] ) ||
    !isset($_GET["category"] )
    ) {
    header("Location: latihan1.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            <img src="$_GET['name'];?>" alt="" width="100">
        </li>
        <li><?= $_GET["name"];?></li>
        <li><?= $_GET["description"];?></li>
        <li><?= $_GET["price"];?></li>
        <li><?= $_GET["category"];?></li>
    </ul>
    <a href="latihan1.php">Kembali</a>
</body>
</html>