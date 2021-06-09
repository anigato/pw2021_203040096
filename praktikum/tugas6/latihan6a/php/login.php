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
            $_SESSION['hash'] = $row['id'];
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
    <title>Admin Panel - Login</title>
</head>

<body>
    <div class="container">
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
    </div>
</body>

</html>