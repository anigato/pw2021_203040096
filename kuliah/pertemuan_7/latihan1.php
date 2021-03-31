<?php 

// GET POST
    // $_GET["nama"] = "anam";
    // $_GET["npm"] = 203040096;
    //var_dump($_GET);// banyak elemen, tipe data dan panjang data ditampilkan
    echo "<br>";
    //print_r($_GET);// banyak elemen, tipe data dan panjang data tidak ditampilkan

    $storage = array(
        [
            "img" => "img/sandisk1.png",
            "name" => "SSD Sandisk 120GB SATA3",
            "description" => "SSd sandisk 120gb sata3, dengan kecepatan baca upto 500MB/s dan kecepatan tulis upto 400MB/s",
            "price" => 400000,
            "category" => "SSD",
            "capacity" => 120
        ],
        [
            "img" => "img/ssd-adata.png",
            "name" => "SSD adata 120GB SATA3",
            "description" => "SSd adata 120gb sata3",
            "price" => 300000,
            "category" => "SSD",
            "capacity" => 120
        ]
    )

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
            
    <?php foreach($storage as $stor) : ?>
        <li>
            <a href="latihan2.php?name=<?= $stor['name'];?>"><?=$stor["name"]?></a>
        </li>
    <?php endforeach?>
</ul>
</body>
</html>