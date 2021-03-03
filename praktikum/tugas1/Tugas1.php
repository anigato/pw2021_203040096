<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .blue {
            background-color: lightblue;
        }
        .salmon {
            background-color: salmon;
        }
    </style>
</head>
<body>
    <table border="1" cellspacing="5" cellpadding="10">
        <?php for ($i=1; $i <= 6; $i++) :?> 
            
            <tr>
                <?php for ($x=1; $x <= 6; $x++) :?> 
                    
                    <?php   $ii = $i % 2 == 0;
                            $xx = $x % 2 == 0;
                    ?>
                    <?php if($i % 2 == 1 && $x % 2 == 1 || $i == $x || $ii == $xx):?>
                        <td class="blue"></td>
                    <?php else :?>
                        <td class="salmon"></td>
                    <?php endif;?>
                <?php endfor;?>
            </tr>
                
        <?php endfor;?>   

        
        
    </table>
</body>
</html>