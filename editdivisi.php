<?php
	include ("koneksi.php");
	$idub=$_GET['id'];
	$query = mysql_query("select * from divisi where iddivisi='$idub'") or die(mysql_error());
	$data = mysql_fetch_array($query);	
?>
<h2>Edit Data Divisi</h2>
<form method="post" name="divisi" action="">
<table>
	<tr>
		<td>Kode Divisi</td><td>:</td>
		<td><input type="text" name="id" value="<?=$data[0]?>"></td>
	</tr>
	<tr>
		<td>Nama Divisi</td><td>:</td>
		<td><input type="text" name="nama" value="<?=$data[1]?>"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="editdvs" value="Edit Divisi">
		&nbsp;
		<input type="reset" value="Batal" onclick="History.back()"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['editdvs'])
{
	$id=$_POST['id'];
	$nama=$_POST['nama'];
		
	$query = mysql_query("update divisi set iddivisi='$id',namadiv='$nama' where iddivisi='$idub' ") or die(mysql_error());

	if ($query) {
		echo "Sukses Diedit.";
		echo "<meta http-equiv=refresh content=0;url=?hl=datadivisi>";
	}
}
?>
