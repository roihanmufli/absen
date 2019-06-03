<?php
	require_once 'koneksi.php';

	$kode = $nama = $username = $pass = $email = $notelp = $status = "";
	$kode_err = $nama_err = $username_err = $pass_err = $email_err = $notelp_err = $status_err = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(empty(trim($_POST["kode"]))){
			$kode_err = "please enter a code";
		}else {
			$kode = trim($_POST["kode"]);
		}

		if(empty(trim($_POST["nama"]))){
			$nama_err = "please enter your name";
		}else {
			$nama = trim($_POST["nama"]);
		}

		if(empty(trim($_POST["uname"]))){
			$username_err = "please enter a username";
		}else {
			$sql = "select nama from login where username = ?";

			if($stmt = mysqli_prepare($conn,$sql)){
				mysqli_stmt_bind_param($stmt,"s",$param_username);
				$param_username = trim($_POST["uname"]);

				if(mysqli_stmt_execute($stmt)){
					mysqli_stmt_store_result($stmt);

					if(mysqli_stmt_num_rows($stmt) == 1){
						$username_err = "this username is already taken";
					}else {
						$username = trim($_POST["uname"]);
					}
				}else{
					echo "Oops! Something went wrong. Please try again later.";
				}
			}
			 mysqli_stmt_close($stmt);
		}

		if(empty(trim($_POST["pass"]))){
			$pass_err = "please enter a password";
		}elseif (strlen(trim($_POST["pass"])) < 6) {
			$pass_err = "password must have at least 6 characters";
		}else {
			$pass = trim($_POST["pass"]);
		}

		if(empty(trim($_POST["email"]))){
			$email_err = "please enter a email";
		}else {
			$email = trim($_POST["email"]);
		}

		if(empty(trim($_POST["telp"]))){
			$notelp_err  = "please enter a telp";
		}else {
			$notelp = trim($_POST["telp"]);
		}

		if(empty($_POST["level"])){
			$status_err = "please choose one";
		}else {
			$status = $_POST["level"];
		}

		if(empty($kode_err) && empty($nama_err) && empty($username_err) && empty($pass_err) && empty($email_err) && empty($notelp_err) && empty($status_err)){
			$sql = "insert into login values(?,?,?,?,?,?,?)";

			if($stmt = mysqli_prepare($conn,$sql)){
				mysqli_stmt_bind_param($stmt, "issssis", $param_kode,$param_nama,$param_username,$param_pass,$param_email,$param_notelp,$param_status);

				$param_kode = $kode;
				$param_nama = $nama;
				$param_username = $username;
				$param_pass = password_hash($pass, PASSWORD_DEFAULT);
				$param_email = $email;
				$param_notelp = $notelp;
				$param_status = $status;

				mysqli_stmt_execute($stmt);

			}
			mysqli_stmt_close($stmt);
		}
		mysqli_close($conn);

	}
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Registrasi</title>

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
				<div class="from=group">
		 			<label for="nama">Kode Dosen</label>
		 			<input type="text" name="kode" placeholder="Kode Dosen" class="form-control" required></div>

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
		 		<input type="tel" name="telp" placeholder="No.telp" class="form-control" required></div>

		 		<div class="from=group"><label for="level">Status</label>
		 		<select name="level" >
		 		<option name="level" value="" selected="selected">--Status<br>
		 		<option value="operator">operator</option>
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
