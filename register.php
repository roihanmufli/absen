<?php
	include "user.php";
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Bootstrap 101 Template</title>

     <!-- Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>
   <body>
		 <div class="panel panel-default">
		 	<div class="panel-heading">
		 		<h2>
		 		<a class="btn btn-info center" href="operator.php">Back</a>
		 		<a class="btn btn-info center" href="daftarsiswa_ope.php">Daftar Mahasiswa</a>
		 		</h2>
		 	</div>
		 		<h5><div class="well text-center">REGISTRASI DOSEN </div></h5>
		 <div class="panel panel-body">
		 	<form action="register.php" method="post" >
		 		<?php include 'errors.php'?>
		 		<div class="from=group">
		 			<label for="nama">Nama Lengkap</label>
		 			<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required></div>

		 		<div class="from=group"><label for="username">Username</label>
		 			<input type="text" name="uname" placeholder="Username" class="form-control" required></div>

		 		<div class="from=group"><label for="pass" >Password</label>
		 		<input type="password" name="pass" id="password" placeholder="password" class="form-control" required></div>

		 		<div class="from=group"><label for="email">E-mail</label>
		 		<input type="email" name="email" placeholder="E-mail" class="form-control" required></div>

		 		<div class="from=group"><label for="notelp">No.telp</label>
		 		<input type="text" name="telp" placeholder="No.telp" class="form-control" required></div>

		 		<div class="from=group"><label for="level">Status</label>
		 		<select name="level" >
		 		<option name="level" value="" selected="selected">--Status<br>
		 		<option value="admin">operator</option>
		 		<option value="dosen">dosen</option> </div>
		 	</form>		<br><br>
		 	<div class="button">

		 		<input type="submit" name="regist" class="btn btn-primary" value="Register">
		 		<input type="reset" class="btn btn-danger" value="Reset">
		 	</div>


		 </div>
		 </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/bootstrap.min.js"></script>
   </body>
 </html>
