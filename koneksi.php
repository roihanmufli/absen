<?php
// mengaktifkan session pada php
session_start();
$servername = "localhost";
$userdb = "root";
$passdb = "kekuatan";
$dbname = "db_log";

$conn = mysqli_connect($servername,$userdb,$passdb,$dbname);

if(isset($_POST['regist'])){
	$nama=mysql_real_escape_string($_POST['nama']);
	$username=mysql_real_escape_string($_POST['username']);
	$pass=mysql_real_escape_string($_POST['pass']);
	$email=mysql_real_escape_string($_POST['email']);
	$notelp=mysql_real_escape_string($_POST['notelp']);
	$level=mysql_real_escape_string($_POST['level']);


		if(empty($username)){
		array_push($errors,"Username is required");
		}
		if(empty($nama)){
		array_push($errors,"Nama Lengkap is required");
		}
		if(empty($email)){
		array_push($errors,"E-mail is required");
		}
		if(empty($pass)){
		array_push($errors,"Password is required");
		}
		if(empty($notelp)){
		array_push($errors,"No.telp is required");
		}
		if(empty($level)){
		array_push($errors,"Status is required");
		}

	if(count($errors)==0){
		$sql= "INSERT INTO login (nama, username, pass, email, notelp, level)
		VALUES ('$nama','$username',md5('$pass'),'$email','$notelp','$level')";
		mysqli_query($conn,$sql);
		$_SESSION['username']= $username;
		$_SESSION['success']="you are now logged in";
		header('Location:daftardosen_ope.php');


	}
}

if(isset($_POST['Masuk'])){
$username=mysql_real_escape_string($conn,$_POST['username']);
$pass=mysql_real_escape_string($conn,$_POST['pass']);

	if(empty($username)){
		/*array_push($errors,"Username is requaired");*/?><script type="text/javascript">alert("Username / password tidak boleh kosong");</script><?php
	}
	if(empty($pass)){
		/*array_push($errors,"Password is requaired");*/?><script type="text/javascript">alert("Username / password tidak boleh kosong");</script><?php
	}

if(count($errors)==0){
		$query= "SELECT * FROM login WHERE username='$username' AND pass='$pass'";
		$result=mysqli_query($conn,$query);
		if($result === FALSE) {
		echo "dtfygu";
		die(mysql_error());
		}
		$data = mysqli_fetch_array($result);
			if(mysqli_num_rows($result)==1){
				if($data['level']=="admin"){
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "admin";
				header("Location: operator.php");

				}
				else if($data['level']=="dosen"){
				$_SESSION['username'] = $username;
				$_SESSION['level'] = "dosen";
				header("Location: dosen.php");

				}
			}
			else{
				array_push($errors,"Wrong Username/Password ");
			}

}
}
?>
