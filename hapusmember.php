<?php
	include "koneksi.php";
	
	$id = $_GET['id'];
	$hapus = "DELETE FROM data_petugas WHERE id='$id';";
	$queryhapus = mysql_query($hapus);
	if($queryhapus) {
		echo "<script>alert('Data Berhasil Dihapus');location.replace('daftarmember.php');</script>";
	} else {
		echo "<script>alert('Data Gagal Dihapus');location.replace('daftarmember.php');</script>";
	}
?>