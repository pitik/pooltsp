<?php
	include ("koneksi.php");
	$id=$_GET['id'];
	$query = mysql_query("select * from supir where idsupir='$id'") or die(mysql_error());
	$data = mysql_fetch_array($query);	
?>
<h2>Edit Data Supir</h2>
<form method="post" name="supir" action="">
<table>
	<tr>
		<td>Nama Supir</td><td>:</td>
		<td><input type="text" name="nama" value="<?=$data[1]?>"></td>
	</tr>
	<tr>
		<td>Alamat</td><td>:</td>
		<td><textarea name="alamat" cols="30" rows="2"> <?=$data[2]?> </textarea></td>
	</tr>
	<tr>
		<td>No HP</td><td>:</td>
		<td><input type="text" name="nohp" value="<?=$data[3]?>"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="editspr" value="Edit Supir">
		&nbsp;
		<input type="reset" value="Batal" onclick="History.back()"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['editspr'])
{
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$nohp=$_POST['nohp'];
		
	$query = mysql_query("update supir set namasupir='$nama',alamat='$alamat',nohp='$nohp' where idsupir='$id' ") or die(mysql_error());

	if ($query) {
		echo "Sukses Diedit.";
		echo "<meta http-equiv=refresh content=0;url=?hl=datasupir>";
	}
}
?>
