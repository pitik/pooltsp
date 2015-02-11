<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]> <!--><html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
	<meta charset="UTF-8" />
	<title> Pool Kendaraan Operasional PT. TASPEN </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="Sistem Informasi Pool Kendaraan Operasional PT. TASPEN Jakarta" name="description" />
	<meta content="alfan | irfan" name="author" />
	
	<!-- STYLE -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/theme.css" />
	<link rel="stylesheet" href="assets/css/MoneAdmin.css" />
	<link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
	<!-- END STYLE -->
	<!-- PAGE LEVEL STYLES -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <!-- END PAGE LEVEL  STYLES -->
</head>
<!-- END HEAD -->

<!-- BODY -->
<body>
<ul>
	<li><a href="index.php?hl=datamobil"> Data Mobil </a></li>
	<li><a href="index.php?hl=datasupir"> Data Supir </a></li>
	<li><a href="index.php?hl=datadivisi"> Data Divisi </a></li>
	<li><a href="index.php?hl=hargabbm"> Harga BBM </a></li>
</ul>
	<div id="content">
		<?php
	    if ($_GET['hl']==""){
//	        if ($_SESSION['level']=='admin'){
//	            $halaman="admin";
//	        }else if ($_SESSION['level']=='user'){
//	            $halaman="menusoal";
//	        }else{
	        $halaman="datamobil";
//	        }
	        include "$halaman.php";
	    }else{
	        $halaman=$_GET['hl'];
	        include "$halaman.php";
	    }
	    ?> 
	</div>
</body>
<!-- END BODY -->

<!-- SCRIPT -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<!-- END SCRIPT -->
<!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
<!-- END PAGE LEVEL SCRIPTS -->
</html>