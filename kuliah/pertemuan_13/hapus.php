<?php 
require 'functions.php';
session_start();
if(!isset($_SESSION ["login"])) {
	header("Location: login.php");
	exit;
	}

$id = $_GET ["id"];
if(empty($id)){
	header("Location: admin.php");
}

if( hapus($id) > 0) {

	echo "
		<script>
		document.location.href = 'admin.php';
		</script>
	";

 } else {
 	echo "
 		<script>
		document.location.href = 'admin.php';
		</script>	
 	";
 }
