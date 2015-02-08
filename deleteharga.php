<?php 
include("koneksi.php");
$id = $_GET['id'];

$query = mysql_query("delete from harga_bbm where idharga='$id'") or die(mysql_error());

if ($query) {
	echo "<meta http-equiv=refresh content=0;url=index.php?hl=hargabbm>";
}
?>