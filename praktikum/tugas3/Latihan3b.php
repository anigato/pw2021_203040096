<?php 
    $player = ["Mohammad salah","Cristiano Ronaldo","Lionel Messi","Zlatan Ibrahimovic","Neymay Jr"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Daftar pemain bola terkenal</h3>
    <ol>
        <?php foreach($player as $p):?>
        <li><?= $p?></li>
        <?php endforeach?>
    </ol>
    <h3>Daftar pemain bola terkenal baru</h3>
    <ol>
        <?php
            array_push($player,"Luca Modric","Sadio Mane");
            sort($player);
        ?>
        <?php foreach($player as $p_b):?>
        <li><?= $p_b?></li>
        <?php endforeach?>
    </ol>
</body>
</html>