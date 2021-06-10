<?php
session_start();
require 'functions.php';
// cek user jika login lanjutkan jika ya redirect ke halaman admin
if (isset($_SESSION['login'])) {
	header("Location: admin.php");
	exit;
}

// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
	$username = $_COOKIE['username'];
	$hash = $_COOKIE['hash'];

	//ambil username berdasarkan id
	$res = mysqli_query(koneksi(), "select*from user where username = '$username'");
	$row = mysqli_fetch_assoc($res);

	//cehk cookie dan username
	if ($hash === hash('sha256', $row['id'], false)) {
		$_SESSION["login"] = true;
		$_SESSION['username'] = $row['username'];
		header("Location: admin.php");
		exit;
	}
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
	<link rel="stylesheet" href="css/login.css">
	<title>Admin Panel - Login</title>
</head>

<body>
	<?php
	if (isset($error)) {
		echo "
            <script type='text/javascript'>
                Swal.fire({
                    title:'Error!',
                    text:'Username or Password Wrong',
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
		$check_user = mysqli_query(koneksi(), "select*from user where username = '$username'");

		if (mysqli_num_rows($check_user) > 0) {
			$row = mysqli_fetch_assoc($check_user);
			if (password_verify($password, $row["password"])) {
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['hash'] = hash('sha256', $row['id'], false);

				// jika rememberme dicentang
				if (isset($_POST['remember'])) {
					setcookie('username', $row['username'], time() + 60 * 60 * 60 * 24);
					$hash = hash('sha256', $row['id']);
					setcookie('hash', $hash, time() + 60 * 60 * 60 * 24);
				}

				if (hash('sha256', $row['id']) == $_SESSION['hash']) {

					$_SESSION["login"] = true;
					echo "
                        <script type='text/javascript'>
                            Swal.fire({
                                title:'Success!',
                                text:'Kamu berhasil login',
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
				header("Location: index.php");
				die;
			}
			echo "
                <script type='text/javascript'>
                    Swal.fire({
                        title:'Error!',
                        text:'Password salah',
                        type:'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                        document.location.href='login.php';
                        }
                    })
                </script>
            ";
			die;
		}
		$error = true;
		echo "
			<script type='text/javascript'>
				Swal.fire({
					title:'Opps!',
					text:'Kamu belum terdaftar, silahkan daftar terlebih dahulu',
					type:'warning',
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

	//registrasi
	if (isset($_POST['register'])) {
		// cek username sudah ada atu belum
		$username = $_POST['username'];
		$res = mysqli_query(koneksi(), "select*from user where username ='$username'");
		if (mysqli_fetch_assoc($res)) {
			echo "
                <script type='text/javascript'>
                    Swal.fire({
                        title:'Oops!',
                        text:'Username sudah digunakan, coba cari username lain atau coba untuk login',
                        type:'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                </script>
            ";
		} else {
			$registrasi = register($_POST);
			if ($registrasi == 'ok') {
				$username = $_POST['username'];
				$password = $_POST['password'];

				$result = mysqli_query(koneksi(), "select*from user where username ='$username'");
				// validasi username dan passord
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					if (password_verify($password, $row['password'])) {
						$_SESSION['username'] = $_POST['username'];
						$_SESSION['hash'] = hash('sha256', $row['id'], false);

						if (hash('sha256', $row['id']) == $_SESSION['hash']) {

							$_SESSION["login"] = true;
							echo "
                                <script type='text/javascript'>
                                    Swal.fire({
                                        title:'Berhasil!',
                                        text:'Sekarang kamu seorang admin',
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
						header("Location: index.php");
						die;
					}
				}
			} else if ($registrasi == 'passsword_not_same') {
				echo "
                    <script type='text/javascript'>
                        Swal.fire({
                            title:'Error!',
                            text:'Password tidak sesuai',
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
			<h2>Punya Akun?</h2>
			<p>Klik tombol dibawah untuk menuju form masuk</p>
			<label id="label-register" for="log-reg-show">Masuk</label>
			<input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
		</div>

		<div class="register-info-box">
			<h2>Tidak punya akun?</h2>
			<p>Daftar sekarang dengan klik tombol dibawah</p>
			<label id="label-login" for="log-login-show">Daftar</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>

		<div class="white-panel">
			<div class="login-show">
				<h2>MASUK</h2>
				<form action="" method="post">
					<input type="text" placeholder="Username" name="username">
					<input type="password" placeholder="Password" name="password">
					<div class="remember">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Ingat Saya</label>
					</div>
					<button type="submit" name="login" class="submit">Masuk</button>
				</form>
			</div>
			<div class="register-show">
				<h2>DAFTAR</h2>
				<form action="" method="post">
					<input type="text" placeholder="Username" name="username">
					<input type="password" placeholder="Password" name="password">
					<input type="password" placeholder="Konfirmasi Password" name="confirm_password">
					<input type="text" placeholder="Email" name="email">
					<button type="submit" name="register" class="submit">Daftar</button>
				</form>
			</div>
		</div>
	</div>
	<script src="js/login.js"></script>
</body>

</html>