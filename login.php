<?php include('koneksi.php')?>
<html>
<head>
	<title>form login</title>
	<link href="style/style3.css" rel="stylesheet" type="text/css" media="screen"/>
	<link rel="stylesheet" href="gaya.css">
</head>

<body>

	//test perubahan
	<div class="content">
		<div class="box-daftar">

			<div class="header-daftar">
			<img src="img/upn.png" class="user">
			<center>SIAKAD UPNVJ<br>
			Log In</center><br>
			</div>

				<form action="login.php" method="post" >
				<?php include('errors.php') ?><br>
				<p>Username</p>
				<input type="text" name="username"  placeholder="Username"/><br><br>
				<p>Password</p>
				<input type="password" name="pass" id="password" placeholder="Password"/><br><br>

				<center>

				<button type="submit" name="Masuk" class="btn">
					Masuk
				</button><br><br>

				</center>


				</form>



			<div class="art-footer-text">
		<p>
	Copyright ©  2019 RAS. All rights reserved.</p>
	</div>
		</div>

	</div>
</body>

</html>
