<?php
	include ("koneksi.php");
?>
<!--  -->
<h1>Data Supir</h1>

<div class="row">
    <div class="col-lg-12">
     	<div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive"> 
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Nama Supir</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>                 
                    </thead>
                    <tbody>
                    <?php
					//mengambil data supir dari database lalu dimunculkan ke layar
					$supir=mysql_query("select * from supir")or die (mysql_error());
					while ($hasil=mysql_fetch_array($supir)){
						echo "<tr>
							<td>$hasil[1]</td>
							<td>$hasil[2]</td>
							<td>$hasil[3]</td>
							<td>$hasil[4]</td>";?>
							<td> <a href='index.php?hl=editsupir&id=<?=$hasil[0]?>'>Edit</a> &nbsp;
							<a href='index.php?hl=deletesupir&id=<?=$hasil[0]?>'
							onclick="return confirm('Apakah anda yakin akan menghapus data supir ini?')">Hapus</a>
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

<h2>Tambah Data Supir</h2>
<form method="post" name="supir" action="">
<table>
	<tr>
		<td>Nama Supir</td><td>:</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Alamat</td><td>:</td>
		<td><textarea name="alamat" cols="30" rows="2"></textarea></td>
	</tr>
	<tr>
		<td>No HP</td><td>:</td>
		<td><input type="text" name="nohp"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="tambahspr" value="Tambah Supir">
		&nbsp;
		<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['tambahspr'])
{
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$nohp=$_POST['nohp'];
	$status="Not Ready";
		
	$query = mysql_query("insert into supir values('','$nama','$alamat','$nohp','$status')") or die(mysql_error());

	if ($query) {
		echo "Sukses Ditambah.";
		echo "<meta http-equiv=refresh content=0>";
	}
}
?>
