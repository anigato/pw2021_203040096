<?php

require 'function.php';
$id = $_GET['id'];

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (hapus($id) > 0) {
    echo "<script>document.location.href='admin.php'</script>";
} else {
    echo "<script>document.location.href='admin.php'</script>";
}
?>