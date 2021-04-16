<?php
require 'function.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
    </link>


    <title>Document</title>

</head>

<body>


    <div class="card">
            <h1 class="text-bold text-success text-center mt-2">Add New Product</h1>
            <form class="needs-validation p-3" novalidate method="post" action="">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        <div class="invalid-feedback">
                            Please provide a valid Product Name.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control" name="brand" id="brand" placeholder="Brand" required>
                        <div class="invalid-feedback">
                            Please provide a valid Product Brand.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="category">Category</label>
                        <select class="custom-select" name="category" required>
                            <option value="">Open list Product Category</option>
                            <option value="HDD">HDD</option>
                            <option value="RAM">RAM</option>
                            <option value="SSD">SSD</option>
                            <option value="SSD NVME">SSD NVME</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid Product Category.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="capacity">Capacity</label>
                        <select class="custom-select" name="capacity" required>
                            <option value="">Open list Product Capacity</option>
                            <option value="120">120 GB</option>
                            <option value="128">128 GB</option>
                            <option value="240">240 GB</option>
                            <option value="256">256 GB</option>
                            <option value="480">480 GB</option>
                            <option value="512">512 GB</option>
                            <option value="1">1 TB</option>
                            <option value="2">2 TB</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid Product Capacity.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="stok">Stock</label>
                        <input type="text" class="form-control" name="stok" id="stok" placeholder="Stock" required onkeypress="return onlyNumber(event)" minlength="2" maxlength="2">
                        <div class="invalid-feedback">
                            Minimum Product Stock of 10 pcs and a maximum of 99 pcs
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight in gram" required onkeypress="return onlyNumber(event)" minlength="3" maxlength="4">
                        <div class="invalid-feedback">
                            Minimum Product Weight of 100gr and a maximum of 9.999gr
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" required>
                        <div class="invalid-feedback">
                            Please provide a valid the Product SKU.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required onkeypress="return onlyNumber(event)" minlength="5" maxlength="8">
                        <div class="invalid-feedback">
                            Minimum Product Price of Rp. 10,000 and a maximum of Rp. 99,999,999
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="form-group mb-3">
                    <label>Image</label>
                    <div class="custom-file mb-2">
                        <input type="file" class="custom-file-input form-control" name="img" id="img" onchange="showImage(this);" required>
                        <label class="custom-file-label" for="img">Choose an image</label>
                        <div class="invalid-feedback">
                            Please provide a valid Product Image.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mx-auto d-block">
                            <img class="rounded" src="#" alt="" id="show-image" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" name="tambah">Submit form</button>

            </form>
        </div>
    </div>



</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<?php 
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script type='text/javascript'>
            swal({
                title:'Success!',
                text:'New Product added Successfully',
                type:'success',
            }); 
            document.location.href='admin.php';
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
            swal({
                title:'Error!',
                text:'Please check the form again',
                type:'error',
            }); 
            document.location.href='admin.php';
            </script>
        ";
    }
}

?>

<script>
    // validasi form
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
    // menampilkan gambar ketika dipilih
    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show-image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    // input form khusus nomor
    function onlyNumber(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }

</script>

</html>