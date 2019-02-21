<?php 
	include 'header.php';
 ?>
 	<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if (isset($_SESSION['id'])) {?>
              
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo"WELCOME ". $_SESSION['nama']; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>
            <?php }?>

       
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8">
             <h1>Sistem Kasir</h1>
          
            <table class="table table-striped">
              <tr>
                <td>NIP</td>
                <td><?php echo $_SESSION['nip'] ?></td>
              </tr>
              <tr>
                 <td>Nama Pegawai</td>
                 <td><?php echo $_SESSION['nama'] ?></td>
              </tr>
              <tr>
                 <td>Jabatan</td>
                 <td><?php echo $_SESSION['jabatan'] ?></td>
              </tr>
              </table>
        </div> 
      </div>
      <div class="row">
        <div class="col-sm-3">
          <h2>Hitung!!</h2>
          <form method="post" action="sistemKasir.php">
          	<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <input type="text" name="name" placeholder="Nama pelanggan" class="form-control" required=""><br>
            <select name="barang" class="form-control">
              <option value="baju">baju</option>
              <option value="jaket">Jaket Kulit</option>
              <option value="celana">Celana Jeans</option>
            </select><br>
            <input type="number" name="qty" placeholder="Banyak Barang" class="form-control" required><br>
            <input type="reset" name="proses" value="ulangi" class="btn btn-danger">
            <input type="submit" name="proses" value="hitung" class="btn btn-primary">
          </form>
        </div>
        <div class="col-sm-4 col-sm-offset-1">
          <h2>Table Detail</h2>
          <?php 
          if(isset($_POST['name'])){
          $nama= $_POST['name'];
          $brg= $_POST['barang'];
          $qty= $_POST['qty'];
          $idPenjual = $_POST['id'];

          //proses

          switch ($brg) {
            case 'baju': $harga = 50000;break;
            case 'celana': $harga = 20000;break;
            case 'jaket': $harga = 90000;break;
            
            default:
              $harga=0;
              break;
          }

          $total= $harga * $qty;

          if($total >= 200000 && $total < 400000) $potongan = 0.1;
          else if($total >= 400000 && $total <600000) $potongan = 0.2;
          else if($total >= 600000) $potongan = 0.25;
          else {
            $potongan = 0;
          }

          $diskon = $potongan * 100 . "%";
          if($diskon == 0){
            $diskon = "tidak dapat diskon";
            $total_diskon = 0;
          }
          else{
            $total_diskon = $potongan * $total;
          }


        $total_final = $total - $total_diskon;

        	$sql = "INSERT INTO `pembeli`
        						(`id_penjual`,`nama_pembeli`,`barang_pembeli`,`jumlah_barang`,`harga_barang`,`diskon_barang`,`harga_total`)
        				  VALUES('$idPenjual','$nama','$brg','$qty','$total','$diskon','$total_final')";
        	$dbh->query($sql);

        ?>
        <table class="table table-striped table-bordered">
          <tr>
            <td>Nama Pelanggan</td>
            <td><?php echo $nama ?></td>
          </tr>
          <tr>
            <td>Barang</td>
            <td><?php echo $brg ?></td>
          </tr>
          <tr>
            <td>Jumlah Barang</td>
            <td><?php echo $qty ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td><?php echo"Rp." . number_format($total) ?></td>
          </tr>
          <tr>
            <td>Diskon</td>
            <td><?php echo $diskon ?></td>
          </tr>
          <tr>
            <td>total Diskon</td>
            <td><?php echo"Rp." . number_format($total_diskon) ?></td>
          </tr>
          <tr>
            <td>total setelah di diskon</td>
            <td><?php echo"Rp." .  number_format($total_final)  ?></td>
          </tr>
        </table>
        <a href="sistemKasir.php" class="btn btn-danger">KEMBALI</a>
        <?php }

        else{
          echo "isi datanya dulu...";
         
        }?>

        </div>
      </div>
    </div>
 <?php 
 	include 'footer.php';
  ?>