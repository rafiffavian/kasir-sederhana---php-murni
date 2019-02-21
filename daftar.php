<?php include 'header.php' ?>
	<div class="col-sm-4 col-sm-offset-4"><br><br>
		<h1>Daftar</h1><br><br><br>
		<form action="daftar_proses.php" method="post">
			<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required=""><br>
			<input type="text" name="nip" placeholder="NIP" class="form-control" required=""><br>
			<select name="jabatan" class="form-control" required="">
				<option>PILIH</option>
				<option value="kasir 1">Kasir 1</option>
				<option value="kasir 2">Kasir 2</option>
				<option value="kasir 3">Kasir 3</option>
			</select><br>
			<input type="submit" name="proses" value="daftar" class="btn btn-primary">
		</form>
	</div>
	
		



<?php include 'footer.php' ?>