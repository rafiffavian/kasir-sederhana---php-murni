<html>
<?php include 'header.php' ?>

<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">  
        .lili{
          background:  #000000;
        } 
        table{
          background: #eceff1;
        }   
    </style>
</head>
<body background="gambar/gambar2.jpg">
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


    <h1 style="text-align: center;">ADMIN</h1>
    <hr>
    <div class="container-fluid">
            <form method="post" action="admin_proses.php">    

                <div class="row">
                              <div class="col-sm-3 col-sm-offset-1" style="margin-left: 190px;">
                                    <div class="col-sm-12 form-group" style="width: 315px">
                                     
                                        <label>Nama Pembeli</label>
                                        <input type="text" name="nama" class="form-control" value="" placeholder="Nama Pembeli">
                                    </div>
                                     <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Barang</label>
                                        <input type="text" name="barang" class="form-control" value="" placeholder="Barang">
                                    </div>
                                     <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Jumlah</label>
                                        <input type="Password" name="jumlah" class="form-control" value="" placeholder="Jumlah">
                                    </div>
                                    <div class="form-group col-sm-12" style="width: 315px">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" value="" placeholder="Harga">
                                    </div>
                                     <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>diskon</label>
                                        <input type="text" name="diskon" class="form-control" value="" placeholder="Diskon">
                                    </div>
                                    <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Harga Total</label>
                                        <input type="text" name="total" class="form-control" value="" placeholder="Harga Total">
                                    </div>
                              </div>
                              <div class="col-sm-4" style="margin: 50px 0 0 150px;">      
                                    <input type="submit" name="proses" value="OK" style="width: 150px;height: 50px;border:none;background: #d32f2f">               
                              </div>
                </div>              
                               
            </form>     
            <hr>
            <h2 align="center" style="color: red">Table Pembeli</h2><br><br>

            <table border="1px" align="center" class="table">

                <tr>
                    <td>No</td>
                    <td>Nama pembeli</td>
                    <td>barang</td>
                    <td>jumlah</td>
                    <td>harga</td>
                    <td>diskon</td>
                    <td>harga total</td>
                    <td>Aksi</td>

                </tr>
                <?php 

                    $sql = "SELECT * FROM `pembeli` WHERE `id_penjual` = '$_SESSION[id]'";
                    $perintah = $dbh->query($sql);
                    $no = 1;

                    foreach ($perintah as $v) {
                      
                      echo "

                              <tr>
                                    <td>$no</td>
                                    <td>$v[nama_pembeli]</td>
                                    <td>$v[barang_pembeli]</td>
                                    <td>$v[jumlah_barang]</td>
                                    <td>$v[harga_barang]</td>
                                    <td>$v[diskon_barang]</td>
                                    <td>$v[harga_total]</td>
                                    <td>
                                        <a href='admin_edit.php?id=$v[id_pembeli]'>Edit</a> ||
                                        <a href='admin_proses.php?id=$v[id_pembeli]'>Delete</a>
                                    </td>
                              </tr>



                            "; 
                            $no++;
                    }

                 ?>
            </table><br><br><br>     
             


<?php include 'footer.php'; ?>