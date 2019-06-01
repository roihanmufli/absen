<?php

include("koneksi.php");
include("header_admin.php");
$flag=0;
	if(isset($_POST['submit'])){
	$result=mysqli_query($conn, "insert into d_mahasiswa (nim,name,kd_matkul) values('$_POST[nim]','$_POST[name]','$_POST[kd_matkul]')");
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
	<a class="btn btn-info center" href="operator.php">Back</a>
	<a class="btn btn-info center" href="daftarsiswa_ope.php">Daftar Mahasiswa</a>
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
			<input type="text" name="name" id="name" placeholder="Nama Lengkap" class="form-control" required>
		</div>
		<div class="from=group">
			<br><label for ="kd_matkul">Kelas</label><br>
				<select name="kd_matkul" class="input5">
		<option value="" selected="selected">--Pilih Mata Kuliah
		<?php
		$sql="SELECT * FROM kelas";
		$hasil_query=mysqli_query($conn, $sql);
		while($baris=mysqli_fetch_object($hasil_query))
		{
			echo"<option value=$baris->kd_matkul>$baris->kd_matkul</option>";
		}
		?>
		</div>
		
		<br><br> 
	</div></form>
<input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
</div>
 <?php
   include('footer.php');
  ?>