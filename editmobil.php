<?php
	include ("koneksi.php");
	$id=$_GET['id'];
	$query = mysql_query("select * from mobil where idmobil='$id'") or die(mysql_error());
	$data = mysql_fetch_array($query);	
?>
<h2>Edit Data Mobil</h2>
<form method="post" name="mobil" action="">
<table>
	<tr>
		<td>No Kendaraan</td><td>:</td>
		<td><input type="text" name="no_kend" value="<?=$data[1]?>"></td>
	</tr>
	<tr>
		<td>Transmisi</td><td>:</td>
		<td>
		<?php
		//mengeluarkan data field ang bertipe enum.
		$table_name = "mobil";
		$column_name = "transmisi";

		echo "<select name=\"$column_name\">";
		$result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
		    WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
		or die (mysql_error());

		$row = mysql_fetch_array($result);
		$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

		foreach($enumList as $value)
			if ($value==$data[2]){
		    	echo "<option value=\"$value\" selected>$value</option>";
			}else{
				echo "<option value=\"$value\">$value</option>";
			}

		echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>Merk</td><td>:</td>
		<td><input type="text" name="merk" value="<?=$data[3]?>"></td>
	</tr>
	<tr>
		<td>Tahun</td><td>:</td>
		<td><input type="text" name="tahun" value="<?=$data[4]?>"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="editmbl" value="Edit Mobil">
		&nbsp;
		<input type="reset" value="Batal" onclick="history.back()"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['editmbl'])
{
	$no_kend=$_POST['no_kend'];
	$transmisi=$_POST['transmisi'];
	$merk=$_POST['merk'];
	$tahun=$_POST['tahun'];
		
	$query = mysql_query("update mobil set no_kendaraan='$no_kend',transmisi='$transmisi',merk='$merk',tahun='$tahun' where idmobil='$id' ") or die(mysql_error());

	if ($query) {
		echo "Sukses Diedit.";
		echo "<meta http-equiv=refresh content=0;url=?hl=datamobil>";
	}
}
?>
