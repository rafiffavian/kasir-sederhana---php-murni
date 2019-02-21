<?php include 'header.php' ?>

		<div class="col-sm-4 col-sm-offset-4" style="margin-top: 30px">
	          <h1>LOGIN</h1>
	          <form method="post" action="proses_login.php">
	              <input type="text" name="nama" class="form-control" placeholder="Nama Kasir"><br>
	              <input type="password" name="nip" class="form-control" placeholder="NIP Kasir"><br>
	              <input type="submit" name="proses" value="LOGIN" class="btn btn-primary">    
	          </form><br><br>

	          <?php 
	          if (isset($_GET['v'])) {
	           	echo "LOGIN GAGAL";
	           } 

	           else{
	           		echo "SILAHKAN LOGIN DULU";
	           	}
	           	?><br><br>
	           	<a href="daftar.php"><button style="margin-left: 120px; width: 200px; height: 50px" class="btn btn-danger">DAFTAR</button></a>

	          
        </div>


<?php include 'footer.php' ?>