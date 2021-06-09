<?php
session_start();
require 'function.php';
// cek user jika login lanjutkan jika ya redirect ke halaman admin
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- sweetalert -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
    </link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="../css/login.css">
    <title>Admin Panel - Login</title>
</head>

<body>
    <?php
    if (isset($error)) {
        echo "
            <script type='text/javascript'>
                Swal.fire({
                    title:'Error!',
                    text:'Username or Password Error',
                    type:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                })
            </script>
        ";
    }

    //login
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check_user = mysqli_query(koneksi(), "select*from user_admin where username = '$username'");
    
        if (mysqli_num_rows($check_user) > 0) {
            $row = mysqli_fetch_assoc($check_user);
            if (password_verify($password, $row["password"])) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['hash'] = hash('sha256', $row['id'], false);
    
                if (hash('sha256', $row['id']) == $_SESSION['hash']) {
                    echo "
                        <script type='text/javascript'>
                            Swal.fire({
                                title:'Success!',
                                text:'Youre log in',
                                type:'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                document.location.href='admin.php';
                                }
                            })
                        </script>
                    ";
                    die;
                }
                // echo "<script>alert('hash salah');</script>";
                header("Location: ../index.php");
                die;
            }
            echo "<script>alert('pass beda');</script>";
            die;
        }
        $error = true;
    }

    //registrasi
    if (isset($_POST['register'])) {
        // cek username sudah ada atu belum
        $username = $_POST['username'];
        $res = mysqli_query(koneksi(), "select*from user_admin where username ='$username'");
        if (mysqli_fetch_assoc($res)) {
            echo "
                <script type='text/javascript'>
                    Swal.fire({
                        title:'Error!',
                        text:'Username has been used. if you already have an account, please login',
                        type:'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                </script>
            ";

        } else {

            if (registrasi($_POST) > 0) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $result = mysqli_query(koneksi(), "select*from user_admin where username ='$username'");
                // validasi username dan passord
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['hash'] = hash('sha256', $row['id'], false);
                    
                        if (hash('sha256', $row['id']) == $_SESSION['hash']) {
                            echo "
                                <script type='text/javascript'>
                                    Swal.fire({
                                        title:'Success!',
                                        text:'Now you are a part of us',
                                        type:'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.value) {
                                        document.location.href='admin.php';
                                        }
                                    })
                                </script>
                            ";
                            die;
                        }
                        header("Location: ../index.php");
                        die;
                    }
                }
                
            } else {
                echo "
                    <script type='text/javascript'>
                        Swal.fire({
                            title:'Error!',
                            text:'Please check the form again',
                            type:'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        })
                    </script>
                ";
            }
        }
    }

    ?>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Have an account?</h2>
            <p>Click button Login below to go to Login Form</p>
            <label id="label-register" for="log-reg-show">Login</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>

        <div class="register-info-box">
            <h2>Don't have an account?</h2>
            <p>Register now at the button Register Below</p>
            <label id="label-login" for="log-login-show">Register</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>

        <div class="white-panel">
            <div class="login-show">
                <h2>LOGIN</h2>
                <form action="" method="post">
                    <input type="text" placeholder="username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <div class="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <button type="submit" name="login" class="submit">Login</button>
                    <a href="">Forgot password?</a>
                </form>
            </div>
            <div class="register-show">
                <h2>REGISTER</h2>
                <form action="" method="post">
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <!-- <input type="password" placeholder="Confirm Password" name="confirm_password"> -->
                    <button type="submit" name="register" class="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>