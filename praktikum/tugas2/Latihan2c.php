<?php
function tumpukanBola($tumpukan)
{
    for ($i = 1; $i <= $tumpukan; $i++) {
        for ($y = 1; $y <= $tumpukan; $y++) {
            if ($i >= $y) {
                echo "<div class='lingkaran'>$y</div>";
                if ($i == $y) {
                    echo "<br>";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .lingkaran {
            border: 2px solid black;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            text-align: center;
            line-height: 3;
            background-color: salmon;
            margin: 10px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <?php tumpukanBola(5) ?>

</body>

</html>