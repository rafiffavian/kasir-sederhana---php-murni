<?php 
	session_start();
	include "konfigurasi/config.php";
	$Nama = $_POST['nama'];
	$Barang = $_POST['barang'];
	$Jumlah = $_POST['jumlah'];
	$Harga = $_POST['harga'];
	$Diskon = $_POST['diskon'];
	$hargaTotal = $_POST['total'];
	$tekan = $_POST['proses'];
	$id = $_POST['idpembeli'];
	// $id = isset($_POST['idpenjual'])?$_POST['idpenjual']:NULL;


	if($tekan == "OK"){
		$sql = "INSERT INTO `pembeli` (`id_penjual`,`nama_pembeli`,`barang_pembeli`,`jumlah_barang`,`harga_barang`,`diskon_barang`,`harga_total`)
								VALUES ('$SESSION_[id]','$Nama','$Barang','$Jumlah','$Harga','$Diskon','$hargaTotal')";
		$dbh->query($sql);
								
	}
	else if($tekan == "UBAH"){
		$sql = "UPDATE `pembeli`
						SET `nama_pembeli` = '$Nama', `barang_pembeli` = '$Barang', `jumlah_barang` = '$Jumlah', `harga_barang` = '$Harga', `diskon_barang` = '$Diskon', `harga_total` = '$hargaTotal'
								WHERE `pembeli`.`id_pembeli` = $id";
		$dbh->query($sql);
	}
	else{
		$id = $_GET['id'];
		$sql = "DELETE FROM `pembeli`
					WHERE `pembeli`.`id_pembeli` = $id";
		$dbh->query($sql);
	}
	header('location:admin.php');


 ?>