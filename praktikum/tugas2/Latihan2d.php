<?php
function hitungDeterminan($a,$b,$c,$d){
    // menghitung matriks
    $determinan = (($a*$d)-($b*$c));
    // menampilkan matriks
    echo "
        <table style='border-left:1px solid black;border-right:1px solid black;' cellspacing='5' cellpadding='5'>
            <tr>
                <td>$a</td>
                <td>$b</td>
            </tr>
            <tr>
                <td>$c</td>
                <td>$d</td>
            </tr>
        </table>
    ";
    // menampilkan hasil
    echo "<h4>Determinan dari matriks tersebut adalah ".$determinan."</h4>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kotak {
            border: 1px solid black;
            padding: 2px 10px;
        }
    </style>
</head>
<body>
    <div class="kotak">
        <?php hitungDeterminan(4,7,2,5);?>
    </div>
</body>
</html>