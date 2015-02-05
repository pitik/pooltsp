<?php
include('koneksi.php');

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$password = md5($password);
if (empty($username) && empty($password)) {
	header('location:index.php?halaman=login&error=1');
	break;
} else if (empty($username)) {
	header('location:index.php?halaman=login&error=2');
	break;
} else if (empty($password)) {
	header('location:index.php?halaman=login&error=3');
	break;
}

$q = mysql_query("select * from login where username='$username' and password='$password'");

if (mysql_num_rows($q) == 1) {
	$baris=mysql_fetch_array($q);
	$_SESSION['username'] = $baris['username'];
	$_SESSION['level'] = $baris['sebagai'];
	header('location:index.php');
} else {
	header('location:index.php?halaman=login&error=4');
}
?>