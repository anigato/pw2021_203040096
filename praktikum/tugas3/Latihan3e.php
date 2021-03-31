<?php
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
    ],
    [
        "img" => "img/ssd-adata-xpg.png",
        "name" => "SSD adata xpg 512gb ",
        "description" => "SSd adata xpg 512gb nvme yang memiliki teknologi penyimpanan tercepat hingga saat ini, dengan kecepatan baca upto 3.5GB/s dan kecepatan tulis upto 3.2GB/s",
        "price" => 1500000,
        "category" => "SSD NVME",
        "capacity" => 512
    ],
    [
        "img" => "img/ssd-apacer.png",
        "name" => "SSD apacer 240gb SATA3",
        "description" => "SSd apacer 240gb sata3",
        "price" => 600000,
        "category" => "SSD",
        "capacity" => 240
    ],
    [
        "img" => "img/ssd-kingmax.png",
        "name" => "SSD kingmax 256gb SATA3",
        "description" => "SSd kingmax 256gb sata3",
        "price" => 650000,
        "category" => "SSD",
        "capacity" => 256
    ],
    [
        "img" => "img/ssd-pioneer.png",
        "name" => "SSD pioneer 120GB SATA3",
        "description" => "SSd pioneer 120gb sata3",
        "price" => 400000,
        "category" => "SSD",
        "capacity" => 120
    ],
    [
        "img" => "img/ssd-samsung.png",
        "name" => "SSD samsung 1tb SATA3",
        "description" => "SSd samsung 1tb sata3",
        "price" => 2300000,
        "category" => "SSD",
        "capacity" => 1
    ],
    [
        "img" => "img/ssd-vgen.png",
        "name" => "SSD vgen 240gb SATA3",
        "description" => "SSd vgen 240gb sata3",
        "price" => 600000,
        "category" => "SSD",
        "capacity" => 240
    ],
    [
        "img" => "img/ssd-vgen-nvme.png",
        "name" => "SSD vgen nvme 256gb SATA3",
        "description" => "SSd vgen nvme 256gb sata3",
        "price" => 870000,
        "category" => "SSD NVME",
        "capacity" => 256
    ],
    [
        "img" => "img/ssd-wd-green.png",
        "name" => "SSD wd green 120GB SATA3",
        "description" => "SSd wd green 120gb sata3",
        "price" => 350000,
        "category" => "SSD",
        "capacity" => 120
    ]
);


$i = 1;
asort($storage);

function rupiah($harga)
{
    $hasil_harga = "Rp. " . number_format($harga, 2, ',', '.');
    return $hasil_harga;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <caption>List of Storage</caption>
            <thead class="table-info">
                <tr class="text-center">
                    <th>NO</th>
                    <th>IMG</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>CAPACITY</th>
                    <th>CATEGORY</th>
                </tr>
            </thead>
            <?php foreach ($storage as $stor => $value) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><img src="<?= $value["img"]; ?>" alt="" class="img-tumbnail rounded" width="100px"></td>
                    <td><?= strtoupper($value["name"]); ?></td>
                    <td><?= $value["description"]; ?></td>
                    <td><?= rupiah($value["price"]); ?></td>
                    <td>
                        <?php
                        $cate = $value["category"];
                        $capa = $value["capacity"];
                        if(preg_match("/SSD/i", $cate)) {
                            echo $capa, strlen($capa) == 1 ? "TB" : "GB";
                        }
                        else {
                            echo $capa, "GB";
                        }
                        
                        
                        
                        
                        ?>
                    </td>
                    <td><?php
                        $cate = $value["category"];
                        switch ($cate) {
                            case "SSD":
                                echo "<span class='badge badge-info'>" . $value["category"] . "</span>";
                                break;

                            case "SSD NVME":
                                echo "<span class='badge badge-success'>" . $value["category"] . "</span>";
                                break;

                            case "RAM":
                                echo "<span class='badge badge-warning'>" . $value["category"] . "</span>";
                                break;
                        } ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>