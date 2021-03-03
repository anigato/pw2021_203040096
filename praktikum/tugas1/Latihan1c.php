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
            border-radius: 50%;;
            text-align: center;
            line-height: 3;
            background-color: salmon;
            margin: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php for ($i=1; $i <= 3; $i++) :?>
        <?php for ($y=1; $y <= 3; $y++) :?>
            <?php if($i >= $y):?>
                <div class="lingkaran"><?= $i?><?= $y?></div>
                <?php if($i == $y):?>
                    <br>
                <?php endif;?>
            <?php endif;?>
        <?php endfor;?>
    <?php endfor;?>
</body>
</html>