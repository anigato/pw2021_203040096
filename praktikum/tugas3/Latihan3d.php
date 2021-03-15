<?php
$player = [
    ["Mohammad salah", "Liverpool", 90, 103, 8],
    ["Cristiano Ronaldo", "Juventus", 100, 76, 30],
    ["Lionel Messi", "Barcelona", 120, 80, 12],
    ["Zlatan Ibrahimovic", "AC Milan", 100, 10, 12],
    ["Neymay Jr", "Paris Saint Germain", 109, 56, 15],
    ["Luca Modric", "Real Madrid", 87, 12, 48],
    ["Sadio Mane", "Liverpool", 63, 30, 70]
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

    <table border="1">
        <tr>
            <th>NAMA</th>
            <th>CLUB</th>
            <th>MAIN</th>
            <th>GOL</th>
            <th>ASSIST</th>
        </tr>
        <?php for ($row = 0; $row <= 6; $row++) : ?>
            <tr>
                <?php for ($col = 0; $col <= 4; $col++) : ?>
                    <td><?= $player[$row][$col] ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>