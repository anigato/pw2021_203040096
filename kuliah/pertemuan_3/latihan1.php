<?php 
// pengulangan

// for
// for ($i=0; $i < 10; $i++) { 
//     echo "Balalala <br>";
// }

// while
// $i = 0;
// while ($i < 10) {
//     echo "Balalala <br>";
//     $i++;
// }

// do. while
// $i = 0;
// do {
//     echo "Balalala <br>";
//     $i++;
// } while ($i < 10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
    <style>
        .warna-ganjil {
            background-color: silver;
        }
        .warna-genap {
            background-color: pink;
        }
    </style>
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10">
        <!-- <?php
            for ($i=0; $i < 5; $i++) { 
                echo "<tr>";
                for ($j=0; $j < 6; $j++) { 
                    echo "<td>$i, $j</td>";
                }
                echo "</tr>";
            }
        ?> -->


        <!-- <?php for ($i=0; $i < 5; $i++) {  ?>
            <tr>
                <?php for ($j=0; $j < 5; $j++) { ?>
                    <td><?php echo "$i, $j"?></td>
                <?php }?>
            </tr>
        <?php }?> -->
        

        <?php for ($i=1; $i <= 5; $i++) :  ?>
            <?php if ($i % 2 == 1) : ?>
            <tr class="warna-ganjil">
            <?php else :?>
            <tr class="warna-genap">
            <?php endif; ?>
                <?php for ($j=1; $j <= 5; $j++) : ?>
                    <td><?= "$i, $j"?></td>
                <?php endfor;?>
            </tr>
                
        <?php endfor;?>

    </table>
</body>
</html>