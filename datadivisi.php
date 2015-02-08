<?php
	include ("koneksi.php");
?>
<!--  -->
<h1>Data Divisi</h1>

<div class="row">
    <div class="col-lg-12">
     	<div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive"> 
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Kode Divisi</th>
                        <th>Nama Divisi</th>
                        <th>Aksi</th>
                    </tr>                 
                    </thead>
                    <tbody>
                    <?php
					//mengambil data supir dari database lalu dimunculkan ke layar
					$divisi=mysql_query("select * from divisi")or die (mysql_error());
					while ($hasil=mysql_fetch_array($divisi)){
						echo "<tr>
							<td>$hasil[0]</td>
							<td>$hasil[1]</td>";?>
							<td> <a href='index.php?hl=editdivisi&id=<?=$hasil[0]?>'>Edit</a> &nbsp;
							<a href='index.php?hl=deletedivisi&id=<?=$hasil[0]?>'
							onclick="return confirm('Apakah anda yakin akan menghapus data divisi ini?')">Hapus</a>
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

<h2>Tambah Data Divisi</h2>
<form method="post" name="divisi" action="">
<table>
	<tr>
		<td>Kode Divisi</td><td>:</td>
		<td><input type="text" name="id"></td>
	</tr>
	<tr>
		<td>Nama Divisi</td><td>:</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="tambahdvs" value="Tambah Divisi">
		&nbsp;
		<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['tambahdvs'])
{
	$id=$_POST['id'];
	$nama=$_POST['nama'];
		
	$query = mysql_query("insert into divisi values('$id','$nama')") or die(mysql_error());

	if ($query) {
		echo "Sukses Ditambah.";
		echo "<meta http-equiv=refresh content=0>";
	}
}
?>
