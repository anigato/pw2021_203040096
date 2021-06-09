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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
    </link>

    <title>Document</title>
</head>

<body>
    <div class="m-3">
        <div class="add">
            <a href="tambah.php" class="btn btn-sm btn-success">Add New</a>
        </div>
        <div class="container-fluid">
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

                                    case "SSHD":
                                        echo "<span class='badge badge-warning'>" . $row["category"] . "</span>";
                                        break;

                                    case "HDD":
                                        echo "<span class='badge badge-primary'>" . $row["category"] . "</span>";
                                        break;
                                } ?>
                            </td>
                            <td rowspan="2" class="row">
                                <a href="" class="btn btn-sm btn-info col-md-6 update-link">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger col-md-6 delete-link">Delete</a>

                                <!-- <button class="btn btn-sm btn-danger col-md-6" onclick="delete_product()">Delete</button> -->
                            </td>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qunit/2.15.0/qunit.min.js" integrity="sha512-x2d/z0bigQdjls4oMv3vfvZBylHgJrsHMdTfn3E8bJdFQJFKl46e2BTftUMnLSTXL7tFIZTXv1MDL0aQ00LL4A==" crossorigin="anonymous"></script> -->

    <script>
        jQuery(document).ready(function($) {
            $('.delete-link').on('click', function() {
                var getLink = $(this).attr('href');

                Swal.fire({
                    title: 'Warning!',
                    text: 'Are you sure you want to delete it? data will be lost',
                    type: 'warning',
                    // html:true,
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, Delete It!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'One Product has been deleted',
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = getLink;
                            }
                        })
                    }
                });
                return false;
            });
        });

    </script>
</body>

</html>