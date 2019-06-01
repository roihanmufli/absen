<?php
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Halaman Dosen</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="kopi2.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php 
  
  ?>

  <div class="jumbotron">
    <div class="col-md-2">
      <img src="img/upn.png" class="upn">
    </div>
    <div class="col-md-8">
      <h1>Dosen</h1>
    </div>
    <div class="col-md-2">
      <a href="login.php" class="btn btn-info" role="button">Logout</a>
    </div>
  </div>


  <div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="absen_matkul.php">
          <img src="img/checklist.png" alt="cek" height="200" width="200">
              <div class="caption">
                <h1 style="text-align:center;">Absensi Mahasiswa<h1>
              </div>
        </a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="thumbnail">
        <a href="daftarsiswa.php">
          <img src="img/student.png" alt="siswa" height="200" width="200">
              <div class="caption">
                <h1 style="text-align:center;">Daftar Mahasiswa<h1>
              </div>
        </a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="thumbnail">
        <a href="daftarmatkul.php">
          <img src="img/icon.png" alt="jadwal" height="200" width="200">
              <div class="caption">
                <h1 style="text-align:center;">Daftar Mata Kuliah<h1>
              </div>
        </a>
      </div>
    </div>
  </div>
  </div>

  <div class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container">
      <p>Copyright ©  2019 RAS. All rights reserved.</p>
    </div>

  </div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
}
?>
