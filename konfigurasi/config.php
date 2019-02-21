<?php  
try{
	$dbh = new PDO('mysql:host=localhost;dbname=kasir',"root", "");

	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// echo "berhasil";


}
catch (PDOException $e) {

	echo "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
	die();
}

?>