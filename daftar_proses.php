<?php 

	include "konfigurasi/config.php";
	$namaPenjual = $_POST['nama'];
	$nipPenjual = $_POST['nip'];
	$jabatan = $_POST['jabatan'];
	$pencet = $_POST['proses'];


	if($pencet == "daftar"){

		$sql = "INSERT INTO `penjual`
					(`nip_penjual`,`nama_penjual`,`jabatan_penjual`)
				VALUES('$nipPenjual','$namaPenjual','$jabatan');";
		$dbh->query($sql);		
	}
	header('location:index.php');