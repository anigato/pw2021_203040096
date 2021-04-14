<?php
require 'function.php';
$produk = query("select*from products")
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

    <div class="container-fluid my-3">
        <div class="table-responsive">
            <table class="table table-hover table-sm" cellspacing="0">
                <caption>List of Storage</caption>
                <thead class="table-info">
                    <tr class="text-center">
                        <th>NO</th>
                        <th>IMG</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>CAPACITY</th>
                        <th>CATEGORY</th>
                        <th colspan="2">ACTION</th>
                        <th></th>
                    </tr>
                </thead>
                <?php $i = 1; ?>

                <?php foreach ($produk as $row) : ?>
                    <tr class="text-center">
                        <td><?= $i++; ?></td>
                        <td><img src="../assets/img/<?= $row["img"]; ?>" alt="" class="img-tumbnail rounded" width="100px"></td>
                        <td><?= strtoupper($row["name"]); ?></td>

                        <td><?= rupiah($row["price"]); ?></td>
                        <td>
                            <?php
                            $cate = $row["category"];
                            $capa = $row["capacity"];
                            if (preg_match("/SSD/i", $cate)) {
                                echo $capa, strlen($capa) == 1 ? "TB" : "GB";
                            } else {
                                echo $capa, "GB";
                            }
                            ?>
                        </td>
                        <td><?php
                            $cate = $row["category"];
                            switch ($cate) {
                                case "SSD":
                                    echo "<span class='badge badge-info'>" . $row["category"] . "</span>";
                                    break;

                                case "SSD NVME":
                                    echo "<span class='badge badge-success'>" . $row["category"] . "</span>";
                                    break;

                                case "RAM":
                                    echo "<span class='badge badge-warning'>" . $row["category"] . "</span>";
                                    break;
                            } ?>
                        </td>
                        <td rowspan="2" class="row">
                            <a href="" class="btn btn-sm btn-info col-md-6">Edit</a>
                            <a href="" class="btn btn-sm btn-danger col-md-6">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>