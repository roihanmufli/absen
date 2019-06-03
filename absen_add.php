<?php

include("koneksi.php");
include('header.php');
$flag=0;
	if(isset($_POST['submit'])){
	$result=mysqli_query($conn, "insert into mahasiswa (nim,nama,nama_matkul) values('$_POST[nim]','$_POST[nama]','$_POST[nama_matkul]')");
	if($result){
	$flag=1;
	}
	}
?>

<div class="panel panel-default">
<?php if($flag){?>
<div class="alert alert-success">
attandence data successfully inserted
</div><?php }?>
	<div class="panel-heading">
	<h2>
	<a class="btn btn-info center" href="dosen.php">Back</a>
	</h2>
	</div>
	<div class="panel-body">
		<form action="absen_add.php" method="post">
		<div class="from=group">
			<label for ="nama">NIM</label><br>
			<input type="text" name="nim" id="nim" placeholder="NIM" class="form-control" required>
		</div>
		<div class="from=group">
			<br><label for ="nama">Nama Lengkap</label><br>
			<input type="text" name="nama" id="name" placeholder="Nama Lengkap" class="form-control" required>
		</div>
		<div class="from=group">
			<br><label for ="kd_matkul">Kelas</label><br>
				<select name="nama_matkul" class="input5">
		<option value="" selected="selected">--Pilih Mata Kuliah
		<?php
		$sql="SELECT * FROM matkul";
		$hasil_query=mysqli_query($conn, $sql);
		while($baris=mysqli_fetch_object($hasil_query))
		{
			echo"<option value='$baris->nama_matkul'> $baris->nama_matkul</option>";
		}
		?>
		</div>

		<br>
		<input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
	</div>
</form>

</div>
 <?php
   include('footer.php');
  ?>
