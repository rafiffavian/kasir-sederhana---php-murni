<html>

<?php 
   session_start();
  include 'konfigurasi/config.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM `pembeli` WHERE id_pembeli = $id";
  $perintah = $dbh->query($sql);
  $field = $perintah->fetch();

 ?>
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
  <div class="container lili">
      <ul class="nav nav-tabs">
              <li role="presentation" class="active"><a href="admin.php">ADMIN</a></li>
              <!-- <li role="presentation"><a href="sepatu.php">SEPATU</a></li>
              <li role="presentation"><a href="#">Messages</a></li> -->
      </ul>
   </div>   

    <h1 style="text-align: center;">ADMIN</h1>
    <hr>
    <div class="container-fluid">
            <form method="post" action="admin_proses.php">    

                <div class="row">
                              <div class="col-sm-3 col-sm-offset-1" style="margin-left: 190px;">
                                    <div class="col-sm-12 form-group" style="width: 315px">
                                        <!-- <label>id</label> -->
                                        <input type="hidden" name="idpembeli" value="<?php echo$field['id_pembeli'] ?>">
                                    </div>    
                                     <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Nama Pembeli</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo$field['nama_pembeli'] ?>" placeholder="Nama User">
                                    </div>
                                     <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>barang</label>
                                        <input type="text" name="barang" class="form-control" value="<?php echo$field['barang_pembeli'] ?>" placeholder="Nama User">
                                    </div>
                                    <div class="form-group col-sm-12" style="width: 315px">
                                        <label>Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control" value="<?php echo$field['jumlah_barang'] ?>" placeholder="Merk Sepatu">
                                    </div>
                                     <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" value="<?php echo$field['harga_barang'] ?>" placeholder="Nama User">
                                    </div>
                                    <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Diskon</label>
                                        <input type="text" name="diskon" class="form-control" value="<?php echo$field['diskon_barang'] ?>" placeholder="Nama User">
                                    </div>
                                    <div class="col-sm-12 form-group" style="width: 315px">
                                        <label>Harga Total</label>
                                        <input type="text" name="total" class="form-control" value="<?php echo$field['harga_total'] ?>" placeholder="Nama User">
                                    </div>
                              </div>
                              <div class="col-sm-4" style="margin: 50px 0 0 150px;">      
                                    <input type="submit" name="proses" value="UBAH" style="width: 150px;height: 50px;border:none;background: #d32f2f">               
                              </div>
                </div>              
                               
            </form>     
            <hr>
            <h2 align="center" style="color: red">Table Merk</h2><br><br>

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
                                    </td>
                              </tr>



                            "; 
                            $no++;
                    }

                 ?>
            </table><br><br><br>     
             
             


<script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script> <!-- ..(titik dua itu buat keluar dari file) -->
  </body>
</html>  