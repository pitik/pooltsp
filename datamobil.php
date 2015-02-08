<?php
	include ("koneksi.php");
?>
<!--  -->
<h1>Data Mobil</h1>

<div class="row">
    <div class="col-lg-12">
     	<div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>No Kendaraan</th>
                        <th>Transmisi</th>
                        <th>Merk</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>                 
                    </thead>
                    <tbody>
                    <?php
					//mengambil data mobil dari database lalu dimunculkan ke layar
					$mobil=mysql_query("select * from mobil")or die (mysql_error());
					while ($hasil=mysql_fetch_array($mobil))
					{
					echo "<tr>
						<td>$hasil[1]</td>
						<td>$hasil[2]</td>
						<td>$hasil[3]</td>
						<td>$hasil[4]</td>
						<td>$hasil[5]</td>";?>
						<td> <a href='index.php?hl=editmobil&id=<?=$hasil[0]?>'>Edit</a> &nbsp;
						<a href='index.php?hl=deletemobil&id=<?=$hasil[0]?>'
						onclick="return confirm('Apakah anda yakin akan menghapus data mobil ini?')">Hapus</a>
					<?php	
					echo "</tr>";
					}
					?>
                    </tbody>
                </table>
            </div>         
        </div>
        </div>
    </div>
</div>

<h2>Tambah Data Mobil</h2>
<form method="post" name="mobil" action="">
<table>
	<tr>
		<td>No Kendaraan</td><td>:</td>
		<td><input type="text" name="no_kend"></td>
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
		    echo "<option value=\"$value\">$value</option>";

		echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>Merk</td><td>:</td>
		<td><input type="text" name="merk"></td>
	</tr>
	<tr>
		<td>Tahun</td><td>:</td>
		<td><input type="text" name="tahun"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="tambahmbl" value="Tambah Mobil">
		&nbsp;
		<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['tambahmbl'])
{
	$no_kend=$_POST['no_kend'];
	$transmisi=$_POST['transmisi'];
	$merk=$_POST['merk'];
	$tahun=$_POST['tahun'];
	$status="Ready";
		
	$query = mysql_query("insert into mobil values('','$no_kend','$transmisi','$merk','$tahun','$status')") or die(mysql_error());

	if ($query) {
		echo "Sukses Ditambah.";
		echo "<meta http-equiv=refresh content=0>";
	}
}
?>
