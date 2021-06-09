<?php
session_start();
require 'function.php';
// cek user jika login lanjutkan jika ya redirect ke halaman admin
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit;
}

//login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_user = mysqli_query(koneksi(), "select*from user_admin where username ='$username'");

    // validasi username dan passord
    if (mysqli_num_rows($check_user) > 0) {
        $row = mysqli_fetch_assoc($check_user);
        if ($password == $row['password']) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
        }
        if ($row['id'] == $_SESSION['hash']) {
            header("Location: admin.php");
            die;
        }
        header("Location: ../index.php");
        die;
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_style.css" type="text/css">
    <!-- <link rel="stylesheet" href="../css/login_style.scss"> -->
    <title>Admin Panel - Login</title>
</head>

<body>
    <!-- <div class="container">
        <form action="" method="post">
            <?php if (isset($error)) : ?>
                <p>Username or Password Wrong</p>
            <?php endif; ?>
            <label for="username">Username : </label>
            <input type="text" name="username">
            <label for="password">password : </label>
            <input type="text" name="password">
            <div class="remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div> -->


    <div class="container">
        <section id="formHolder">


            <div class="row">

                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <a href="#" class="logo">MR <span>.</span></a>

                    <div class="heading">
                        <h2>Marina</h2>
                        <p>Your Right Choice</p>
                    </div>

                    <div class="success-msg">
                        <p>Great! You are one of our members now</p>
                        <a href="#" class="profile">Your Profile</a>
                    </div>
                </div>


                <!-- Form Box -->
                <div class="col-sm-6 form">

                    <!-- Login Form -->
                    <div class="login form-peice switched">
                        <form class="login-form" action="#" method="post">
                            <div class="form-group">
                                <label for="loginemail">Email Adderss</label>
                                <input type="email" name="loginemail" id="loginemail" required>
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="loginPassword" id="loginPassword" required>
                            </div>

                            <div class="CTA">
                                <input type="submit" value="Login">
                                <a href="#" class="switch">I'm New</a>
                            </div>
                        </form>
                    </div><!-- End Login Form -->


                    <!-- Signup Form -->
                    <div class="signup form-peice">
                        <form class="signup-form" action="#" method="post">

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="username" id="name" class="name">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Adderss</label>
                                <input type="email" name="emailAdress" id="email" class="email">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number - <small>Optional</small></label>
                                <input type="text" name="phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="pass">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="passwordCon">Confirm Password</label>
                                <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                                <span class="error"></span>
                            </div>

                            <div class="CTA">
                                <input type="submit" value="Signup Now" id="submit">
                                <a href="#" class="switch">I have an account</a>
                            </div>
                        </form>
                    </div><!-- End Signup Form -->
                </div>
            </div>

        </section>


        <footer>
            <p>
                Form made by: <a href="http://mohmdhasan.tk" target="_blank">Mohmdhasan.tk</a>
            </p>
        </footer>

    </div>

    <script src="../js/login.js"></script>
</body>

</html>