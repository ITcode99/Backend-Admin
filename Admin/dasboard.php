<?php
    //Koneksi Database
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbmerk";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
        //pengujian apakah data akan di edit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //data akan di edit
            $edit = mysqli_query($koneksi, "UPDATE tmhs set 
                                              merk = '$_POST[tmerk]',
                                              tahun = '$_POST[ttahun]',
                                              asal = '$_POST[tasal]'
                                            WHERE id_mhs = '$_GET[id]'
                                           ");
            if($edit) //jika edit sukses    
            {
                echo "<script>
                        alert('Edit Data Suksess!');
                        document.location='index.php';
                     </script>";
            }     
            else
            {
                echo "<script>
                        alert('Edit Data Gagal!!');
                        document.location='index.php';
                     </script>"; 
            }
        }
        else
        {
            //data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (merk, tahun, asal)
                                              VALUES ('$_POST[tmerk]',
                                                      '$_POST[ttahun]',
                                                      '$_POST[tasal]')
                                        ");
            if($simpan) //jika simpan sukses    
            {
                echo "<script>
                        alert('Simpan Data Suksess!');
                        document.location='index.php';
                     </script>";
            }     
            else
            {
                echo "<script>
                        alert('Simpan Data Gagal!!');
                        document.location='index.php';
                     </script>"; 
            }  
        }


                        
    }

    //pengujian jika tombol edit atau hapus di klik
    if(isset($_GET['hal']))
    {
        //pengujian jika edit data
        if($_GET['hal'] == "edit")
        {
            //tampilkan data yang akan di edit
            $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //jika data ditemukan maka data ditampung ke dalam variabel
                $vmerk = $data['merk'];
                $vtahun = $data['tahun'];
                $vasal = $data['asal'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            //persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                        alert('Hapus Data Suksess!!');
                        document.location='index.php';
                     </script>";
            }
        }
    }
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.14.0-web/css/all.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | <b> Apple Car</b> <i class="fab fa-apple"></i></a>
        
        <form class="form-inline my-2 my-lg-0 ml-auto">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="icon ml-4">
          <h5>
            <i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign Out"></i>
          </h5>
        </div>
      </div>
    </nav>

    <div class="row no-gutters mt-5">
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3">
          <li class="nav-item">
            <a class="nav-link active text-white" href="dasboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dasboard</a><hr class="bg-warning">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="merk.php"><i class="fab fa-spotify mr-2"></i>Merk Mobil</a><hr class="bg-warning">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="harga.php"><i class="fas fa-hand-holding-usd mr-2"></i>Harga</a><hr class="bg-warning">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="suplier.php"><i class="fas fa-globe-asia mr-2"></i>Suplier Mobil</a><hr class="bg-warning">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="promo.php"><i class="fas fa-tags mr-2"></i>Promo</a><hr class="bg-warning">
          </li>
        </ul>
      </div>

      <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-tachometer-alt mr-2"></i> Dasboard | <b> Apple Car</b> <i class="fab fa-apple"></i></h3><hr>

        <div class="row text-white">
          <div class="card bg-info ml-5" style="width: 19rem;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fab fa-spotify mr-2"></i>
                </div>
                <h5 class="card-title">Merk Mobil</h5><hr class="bg-warning">
                <div class="display-4">
                  956 Merk
                </div>
                <a href=""><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
              </div>
            </div>
          
          <div class="card bg-success ml-5" style="width: 19rem;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-hand-holding-usd mr-2"></i>
                </div>
                <h5 class="card-title">Harga</h5><hr class="bg-warning">
                <div class="display-4">
                - Rp. 290jt <br> + Rp. 17M
                </div>
                <a href=""><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
              </div>
            </div>

            <div class="card bg-danger ml-5" style="width: 19rem;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-tags mr-2"></i>
                </div>
                <h5 class="card-title">Promo</h5><hr class="bg-warning">
                <div class="display-4">
                  50%
                </div>
                <a href=""><p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p></a>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="card ml-5 text-white text-center" style="width: 19rem;">
              <div class="card-header bg-danger display-4 pt-4 pb-4">
                <i class="fab fa-instagram"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title text-danger">INSTAGRAM</h5>
                <a href="https://www.instagram.com/_adiptr18/" class="btn btn-danger">FOLLOW</a>
              </div>
            </div>

            <div class="card ml-5 text-white text-center" style="width: 19rem;">
              <div class="card-header bg-primary display-4 pt-4 pb-4">
                <i class="fab fa-facebook-f"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title text-primary">FACEBOOK</h5>
                <a href="https://web.facebook.com/adiarput.adiarput" class="btn btn-primary">FOLLOW</a>
              </div>
            </div>

            <div class="card ml-5 text-white text-center" style="width: 19rem;">
              <div class="card-header bg-info display-4 pt-4 pb-4">
                <i class="fab fa-twitter"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title text-info">WHATSAPP</h5>
                <a href="https://bit.ly/30yI0Tv" class="btn btn-info">SAVE</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>