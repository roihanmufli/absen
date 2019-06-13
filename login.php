<?php
require_once 'koneksi.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["username"] == "admin"){
	header("location: operator.php");
}
elseif (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: dosen.php");
}

$userkode = $pass  = "";
$userkode_err= $pass_err = "";


if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(empty(trim($_POST['userkode']))){
		$userkode_err = "please enter username/code";
	}
	else {
		$userkode = trim($_POST['userkode']);
	}

	if(empty(trim($_POST['userkode'])) && empty(trim($_POST['pass']))){
		$userkode_err= "please enter username and password";
	}
	elseif(empty(trim($_POST['pass']))){
		$pass_err = "please enter password";
	}
	else {
		$pass = trim($_POST['pass']);
	}



	if(empty($userkode_err) && empty($pass_err)){
		//prepare select statement
		$sql = "select kode,nama,username,pass,status from login where username = ? or kode = ?";
		if($stmt = mysqli_prepare($conn,$sql)){
			mysqli_stmt_bind_param($stmt,"si",$param_username,$param_kode);
			$param_username = $userkode;
			$param_kode = $userkode;

			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);

				if(mysqli_stmt_num_rows($stmt) == 1){
					mysqli_stmt_bind_result($stmt,$kode,$nama,$username,$hashed_pass,$status);
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($pass,$hashed_pass) && $status == "operator"){
							session_start();
							$_SESSION["loggedin"] = true;
							$_SESSION["username"] = $username;
							header("location: operator.php");
							}
						elseif (password_verify($pass,$hashed_pass) && $status == "dosen") {
							session_start();
							$_SESSION["loggedin"] = true;
							$_SESSION["username"] = $username;
							header("location: dosen.php");
						}
							else {
								$pass_err = "the password you entered was not valid";
							}
					}
				}
				else {
					$userkode_err = "No account found with that username.";
				}
			}else {
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		 mysqli_stmt_close($stmt);

	}
	mysqli_close($conn);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Form Login</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="gayabaru.css">
</head>
<body>

<div class="container">
	<div class="login-page">
		<div class="header-daftar">
		<center><img src="img/upn.png" style=" width: 186.5px;height: 129px;" class="user"></center>
		<p><center>SIAKAD UPNVJ</center></p>
		</div>

  <div class="form">
		<?php
			if($userkode_err){
		 ?>
		<div class="alert alert-danger">
			<?php echo $userkode_err; ?>
		</div>
		<?php  } ?>

		<?php
			if($pass_err){
		 ?>
		<div class="alert alert-danger">
			<?php echo $pass_err; ?>
		</div>
		<?php  } ?>







    <form class="login-form" action="login.php" method="post">
      <input type="text" name="userkode"  placeholder="Username" value=""/>
      <input type="password" name="pass" id="password" placeholder="Password" value=""/>
      <button type="submit" name="Masuk">login</button>
    </form>
  </div>

	<center>
			<div class="art-footer-text">
				<p>Copyright ©  2019 RAS. All rights reserved.</p>
	 		</div>
	</center>
		</div>
</div>




</body>
</html>
