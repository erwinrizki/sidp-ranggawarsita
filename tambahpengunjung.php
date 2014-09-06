<?php
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	
	include "koneksi.php";
	
	$pet = $_SESSION['user'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$kategori = $_POST['kategori'];
	$jumlah = $_POST['jumlah'];
	$telp = $_POST['telp'];
	$tanggal = date('Y-m-d');
	
	$tampil = "SELECT * FROM data_petugas WHERE username='$pet'";
	$qtampil = mysql_query($tampil);
	$hasil = mysql_fetch_array($qtampil);
	$idpet = $hasil['id'];
	
	$tambah = "INSERT INTO data_pengunjung VALUES(null,'$nama','$alamat','$kategori',$jumlah,'$telp','$tanggal','$idpet');";
	$querytambah = mysql_query($tambah);
	
	if($querytambah) {
		echo "<script>alert('Data Berhasil Ditambahkan');location.replace('inputdatapengunjung.php');</script>";
	} else {
		//echo "<script>alert('Data Gagal Ditambahkan');location.replace('inputdatapengunjung.php');</script>";
		echo mysql_error();
	}
?>