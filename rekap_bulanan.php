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

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SIDP Ranggawarsita</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="paneladmin.php">Home</a></li>
			  <li class="active"><a href="logout.php">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
	  <?php
			$bln1 = $_POST['bulan'];
			$thn1 = $_POST['tahun'];
			
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

      <!-- Example row of columns -->
      <div class="hero-unit">
		<h3>Daftar Pengunjung <?php echo $namabln." ".$thn1; ?></h3><br/><br/>
		<a href="cetak.php?tahun=<?php echo $thn1 ?>&bulan=<?php echo $bln1 ?>" ><img src="images/cetak.png" width="80" height="80" />Cetak</a>
		<br/><br/>
		<table class="table table-striped">
			<tr>
				<td><b>No</b></td>
				<td><b>Nama Pengunjung</b></td>
				<td><b>Alamat</b></td>
				<td><b>Kategori</b></td>
				<td><b>Jumlah</b></td>
				<td><b>Telepon</b></td>
				<td><b>Tanggal Kunjungan</b></td>
				<td><b>Dicatat Oleh</b></td>
			</tr>
		<?php
			include "koneksi.php";
			
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];
			$gabung = $tahun."-".$bulan;
			$tampil = "SELECT * FROM data_pengunjung AS v INNER JOIN data_petugas AS p
						ON v.id = p.id WHERE v.tanggalkunjung LIKE '$gabung%'";
			$querytampil = mysql_query($tampil);
			$i = 1;
			while($hasil = mysql_fetch_array($querytampil)) {
				$nama = $hasil['nama_pengunjung'];
				$alamat = $hasil['alamat'];
				$kategori = $hasil['kategori'];
				$jumlah = $hasil['jumlah'];
				$telp = $hasil['telp'];
				$tgl = $hasil['tanggalkunjung'];
				$catat = $hasil['nama'];
		?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $nama; ?></td>
					<td><?php echo $alamat; ?></td>
					<td><?php echo $kategori; ?></td>
					<td><?php echo $jumlah; ?></td>
					<td><?php echo $telp; ?></td>
					<td><?php echo $tgl; ?></td>
					<td><?php echo $catat; ?></td>
				</tr>
		<?php
				$i++;
			}
		?>
		</table>
		<br/><br/>
		<table class="table table-striped">
			<tr>
				<td><b>Kategori</b></td>
				<td><b>Jumlah</b></td>
			</tr>
			<?php
				include "koneksi.php";
				
				$bln = $_POST['bulan'];
				$thn = $_POST['tahun'];
				$gbg = $thn."-".$bln;
				/*
				$get = "SELECT kategori, count(*) as kunjung
				        FROM data_pengunjung
						WHERE tanggalkunjung LIKE '$gbg%'
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
	  </div>

      <hr>

      <footer>
        <p>Copyright &copy; ERA 2014</p>
      </footer>

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
