<?php
$player = array(
    [
        "nama" => "Mohammad salah",
        "club" => "Liverpool",
        "main" => 90,
        "gol" => 103,
        "assist" => 8
    ],
    [
        "nama" => "Cristiano Ronaldo",
        "club" => "Juventus",
        "main" => 100,
        "gol" => 76,
        "assist" => 30
    ],
    [
        "nama" => "Lionel Messi",
        "club" => "Barcelona",
        "main" => 120,
        "gol" => 80,
        "assist" => 12
    ],
    [
        "nama" => "Zlatan Ibrahimovic",
        "club" => "AC Milan",
        "main" => 100,
        "gol" => 10,
        "assist" => 12
    ],
    [
        "nama" => "Neymay Jr",
        "club" => "Paris Saint Germain",
        "main" => 109,
        "gol" => 56,
        "assist" => 15
    ],
    [
        "nama" => "Luca Modric",
        "club" => "Real Madrid",
        "main" => 87,
        "gol" => 12,
        "assist" => 48
    ],
    [
        "nama" => "Sadio Mane",
        "club" => "Liverpool",
        "main" => 63,
        "gol" => 30,
        "assist" => 70
    ]
);
$i = 1;
asort($player);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        tr,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>CLUB</th>
            <th>MAIN</th>
            <th>GOL</th>
            <th>ASSIST</th>
        </tr>
        <?php foreach ($player as $p => $value) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $value["nama"]; ?></td>
                <td><?= $value["club"]; ?></td>
                <td><?= $value["main"]; ?></td>
                <td><?= $value["gol"]; ?></td>
                <td><?= $value["assist"]; ?></td>
            </tr>
        <?php endforeach;

        $t_main = 0;
        $t_gol = 0;
        $t_assist = 0;

        foreach ($player as $player => $value) {
            $t_main += $value["main"];
            $t_gol += $value["gol"];
            $t_assist += $value["assist"];
        }
        ?>
        <tr>
            <td>#</td>
            <td colspan="2" style="text-align: center; font-weight:bold">Jumlah</td>
            <td><?= $t_main ?></td>
            <td><?= $t_gol ?></td>
            <td><?= $t_assist ?></td>
        </tr>
    </table>
</body>

</html>