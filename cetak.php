<?php
	include "ceksesi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIDP Ranggawarsita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body onLoad="window.print()">

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
	  <?php
		$tahun = $_GET['tahun'];
		$bln1 = $_GET['bulan'];
	  ?>

      <!-- Example row of columns -->
      <div class="hero-unit">
		<?php
			if($bln1 == 0) {
		?>
				<h3>Daftar Pengunjung Tahun <?php echo $tahun; ?></h3><br/><br/>
				<!-- <a href="" onclick="window.print()" ><img src="images/print.png" width="60" height="60" /></a> -->
				
				<table class="table table-striped">
					<tr>
						<td><b>Kategori</b></td>
						<td><b>Jumlah</b></td>
					</tr>
					<?php
						include "koneksi.php";
						
						/*
						$get = "SELECT kategori, count(*) as kunjung
								FROM data_pengunjung
								WHERE tanggalkunjung LIKE '$thn%'
								GROUP BY kategori";
						*/
						$get = "SELECT kategori, sum(jumlah) as kunjung
								FROM data_pengunjung
								WHERE tanggalkunjung LIKE '$tahun%'
								GROUP BY kategori";
						$qget = mysql_query($get);
						while($baris = mysql_fetch_array($qget)) {
							$kat = $baris['kategori'];
							$jum = $baris['kunjung'];
					?>
							<tr>
								<td><?php echo $kat; ?></td>
								<td><?php echo $jum; ?></td>
							</tr>
					<?php
						}
					?>
				</table>
		<?php
			} else {
				if($bln1=="01") {
					$namabln = "Januari";
				} else if($bln1=="02") {
					$namabln = "Februari";
				} else if($bln1=="03") {
					$namabln = "Maret";
				} else if($bln1=="04") {
					$namabln = "April";
				} else if($bln1=="05") {
					$namabln = "Mei";
				} else if($bln1=="06") {
					$namabln = "Juni";
				} else if($bln1=="07") {
					$namabln = "Juli";
				} else if($bln1=="08") {
					$namabln = "Agustus";
				} else if($bln1=="09") {
					$namabln = "September";
				} else if($bln1=="10") {
					$namabln = "Oktober";
				} else if($bln1=="11") {
					$namabln = "November";
				} else {
					$namabln = "Desember";
				}
		?>
				<h3>Daftar Pengunjung <?php echo $namabln." ".$tahun; ?></h3><br/><br/>
				<!-- <a href="" onclick="window.print()" ><img src="images/print.png" width="60" height="60" /></a> -->
				
				<table class="table table-striped">
					<tr>
						<td><b>Kategori</b></td>
						<td><b>Jumlah</b></td>
					</tr>
					<?php
						include "koneksi.php";
						
						$gbg = $tahun."-".$bln1;
						/*
						$get = "SELECT kategori, count(*) as kunjung
								FROM data_pengunjung
								WHERE tanggalkunjung LIKE '$thn%'
								GROUP BY kategori";
						*/
						$get = "SELECT kategori, sum(jumlah) as kunjung
								FROM data_pengunjung
								WHERE tanggalkunjung LIKE '$gbg%'
								GROUP BY kategori";
						$qget = mysql_query($get);
						while($baris = mysql_fetch_array($qget)) {
							$kat = $baris['kategori'];
							$jum = $baris['kunjung'];
					?>
							<tr>
								<td><?php echo $kat; ?></td>
								<td><?php echo $jum; ?></td>
							</tr>
					<?php
						}
					?>
				</table>
		<?php	
			}
		?>
	  </div>

      <hr>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
