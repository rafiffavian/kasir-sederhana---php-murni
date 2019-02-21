<?php 
	include 'konfigurasi/config.php';
	$namaKasir = $_POST['nama'];
	$nipKasir = $_POST['nip'];

	$sql = "SELECT * FROM `penjual` WHERE `nama_penjual` = '$namaKasir' and `nip_penjual` = '$nipKasir'";
	$perintah = $dbh->query($sql);
	$v = $perintah->fetch();

	if($namaKasir == $v['nama_penjual'] && $nipKasir == $v['nip_penjual']){
		session_start();
		$_SESSION['id'] = $v['id_penjual'];
		$_SESSION['nip'] = $v['nip_penjual'];
		$_SESSION['nama'] = $v['nama_penjual'];
		$_SESSION['jabatan'] = $v['jabatan_penjual'];
		header('location:sistemKasir.php');
	}
	
	else{
		header('location:index.php?v=gagal');
	}




 ?>