<?php
require 'functions.php';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id"];



$product = query("SELECT * FROM products WHERE id = $id")[0];




?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel - Edit Produk</title>

    <?php require_once 'parts/link-style.php' ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>

</head>

<body>

    <?php require_once 'parts/navbar.php' ?>
    <div class="container">
        <div class="card">
            <h1 class="text-bold text-danger text-center mt-2">Edit Product</h1>
            <form class="needs-validation p-3" novalidate method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $product['id']; ?>">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required value="<?= $product['name']; ?>">
                        <div class="invalid-feedback">
                            Please provide a valid Product Name.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category">Category</label>
                        <select class="custom-select" name="category" required>
                            <?php $cat = $product['category']; ?>

                            <option value="" disabled>Open list catct Category</option>
                            <option <?= ($cat == 'HDD') ? "selected" : "" ?> value="HDD">HDD</option>
                            <option <?= ($cat == 'SSHD') ? "selected" : "" ?> value="SSHD">SSHD</option>
                            <option <?= ($cat == 'SSD') ? "selected" : "" ?> value="SSD">SSD</option>
                            <option <?= ($cat == 'SSD NVME') ? "selected" : "" ?> value="SSD NVME">SSD NVME</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid Product Category.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="capacity">Capacity</label>
                        <select class="custom-select" name="capacity" required>
                            <?php $cap = $product['capacity']; ?>
                            <option value="">Open list Product Capacity</option>
                            <option <?= ($cap == '120') ? "selected" : "" ?> value="120">120 GB</option>
                            <option <?= ($cap == '128') ? "selected" : "" ?> value="128">128 GB</option>
                            <option <?= ($cap == '240') ? "selected" : "" ?> value="240">240 GB</option>
                            <option <?= ($cap == '256') ? "selected" : "" ?> value="256">256 GB</option>
                            <option <?= ($cap == '480') ? "selected" : "" ?> value="480">480 GB</option>
                            <option <?= ($cap == '512') ? "selected" : "" ?> value="512">512 GB</option>
                            <option <?= ($cap == '1') ? "selected" : "" ?> value="1">1 TB</option>
                            <option <?= ($cap == '2') ? "selected" : "" ?> value="2">2 TB</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid Product Capacity.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required onkeypress="return onlyNumber(event)" minlength="5" maxlength="8" value="<?= $product['price']; ?>">
                        <div class="invalid-feedback">
                            Minimum Product Price of Rp. 10,000 and a maximum of Rp. 99,999,999
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description" value="<?= $product['description']; ?>">
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <div class="custom-file mb-2">
                        <input type="file" name="img" id="img" class="img custom-file-input form-control" onchange="previewImage()">
                        <input type="hidden" name="old_img" value="<?= $product['img']; ?>">
                        <label class="custom-file-label" for="img">Choose an image</label>
                        <div class="invalid-feedback">
                            Please provide a valid Product Image.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto d-block">
                            <p class="text-center">New Image</p>
                            <img class="rounded img-preview" src="#" alt=""  style="width: 100%;">
                        </div>

                        <div class="col-md-4 mx-auto d-block">
                            <p class="text-center">Old Image</p>
                            <img class="rounded" src="img/<?= $product['img']; ?>" alt="" style="width: 100%;">
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit" name="ubah">Edit Produk</button>
                <a class="btn btn-danger" href="admin.php">Cancel</a>
            </form>
        </div>
    </div>
    <?php require_once 'parts/script.php' ?>
    <script>
        function onlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {
                return true;
            }
        }
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <?php
    if (isset($_POST['ubah'])) {
        if (ubah($_POST) > 0) {
            echo "
            <script type='text/javascript'>
            
            Swal.fire({
                title:'Success!',
                text:'New Product added Successfully',
                icon:'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                  document.location.href='admin.php';
                }
            })
            </script>
        ";
        } else {
            echo "
            <script type='text/javascript'>
            Swal.fire({
                title:'Error!',
                text:'Please check the form again',
                icon:'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                  document.location.href='admin.php';
                }
            })
            </script>
        ";
        }
    }

    ?>
</body>

</html>