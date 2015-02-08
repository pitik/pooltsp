<?php
	include ("koneksi.php");
	$tgl=date('Y-m-d');
	echo $tgl;
?>

<h2>Harga BBM Terbaru</h2>
<form method="post" name="bbm" action="">
<table>
	<tr>
		<td>Harga</td><td>:</td>
		<td><input type="text" name="harga"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="setharga" value="Set">
		&nbsp;
		<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>

<?php
if ($_POST['setharga'])
{
	$tgl=date('Y-m-d');
	$harga=$_POST['harga'];
		
	$query = mysql_query("insert into harga_bbm values('','$tgl','$harga')") or die(mysql_error());

	if ($query) {
		echo "Sukses Ditambah.";
		echo "<meta http-equiv=refresh content=0>";
	}
}
?>

<!--  -->
<h1>Daftar Harga BBM</h1>

<div class="row">
    <div class="col-lg-12">
     	<div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive"> 
            <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Tangal</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>                 
                    </thead>
                    <tbody>
                    <?php
					//mengambil data supir dari database lalu dimunculkan ke layar
					$divisi=mysql_query("select * from harga_bbm order by tanggal desc")or die (mysql_error());
					while ($hasil=mysql_fetch_array($divisi)){
						$tanggal=date('d-m-Y', strtotime($hasil[1]));
						echo "<tr>
							<td>$tanggal</td>
							<td>Rp ".number_format($hasil[2],0,',','.')."</td>";?>
							<td> <a href='index.php?hl=deleteharga&id=<?=$hasil[0]?>'
							onclick="return confirm('Apakah anda yakin akan menghapus data harga bbm ini?')">Hapus</a>
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
