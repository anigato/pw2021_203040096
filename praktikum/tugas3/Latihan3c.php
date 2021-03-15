<?php
$player = [
    "Liverpool" => "Mohammad salah",
    "Juventus" => "Cristiano Ronaldo",
    "Barcelona" => "Lionel Messi",
    "AC Milan" => "Zlatan Ibrahimovic",
    "Paris Saint Germain" => "Neymay Jr",
    "Real Madrid" => "Luca Modric",
    "Liverpool" => "Sadio Mane"
];
asort($player);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="border: 1px solid black; padding: 10px; width:500px">
        <table>
            <h3 style="margin:0;">Daftar pemain bola terkenal dan clubnya</h3>
            <br>
            <?php foreach ($player as $club => $player) : ?>
                <tr>
                    <td style="font-weight: bold;"><?= $player ?></td>
                    <td>: <?= $club ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>