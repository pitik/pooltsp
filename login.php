//komentar
<?php
session_start();
error_reporting(0);
	include "koneksi.php";
	
if (!empty($_SESSION['username'])) {
	header('location:index.php?halaman=menusoal');
}
?>
<h1>Login :</h1><hr>
<form method=post action="index.php?halaman=otentikasi">
<div class="row">
  <div class="col-xs-3">
    <input class=form-control type=text name=username placeholder=username requied>
<br>
    <input class=form-control type=password name=password placeholder=password requied>
  </div>
</div>
<br>
<input class="btn btn-success" type=submit name=login value=Login size="24">
</form>
<?php 
if (!empty($_GET['error'])) {
	if ($_GET['error'] == 1) {
		echo '<h3>Username dan Password belum diisi!</h3>';
	} else if ($_GET['error'] == 2) {
		echo '<h3>Username belum diisi!</h3>';
	} else if ($_GET['error'] == 3) {
		echo '<h3>Password belum diisi!</h3>';
	} else if ($_GET['error'] == 4) {
		echo '<h3>Username dan Password tidak terdaftar!</h3>';
	}
}
?>