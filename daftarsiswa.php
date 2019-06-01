<?php
include("header.php");
include("koneksi.php");
$query=mysqli_query($conn, "SELECT nim,name,matkul FROM d_mahasiswa inner join kelas on d_mahasiswa.kd_matkul = kelas.kd_matkul");
?>

<html>

<head><title>Daftar Mahasiswa</title>
  <div class="panel panel-heading">
    <h2>
    <a class="btn btn-success" href="absen_add.php">Add Student</a>
	<a class="btn btn-info center" href="dosen.php">Home</a>

    </h2>
	</div>
</head>

<body>

<div class="panel panel-body">

      <table class="table table-striped">
			
            <th>No.</th>
            <th>NIM</th>
            <th>NAMA</th>
			<!--<th>Mata Kuliah</th>-->
        
		 <?php
            $no = 1;
            while($data = mysqli_fetch_assoc($query)):
        ?>
		<tr><td><?php echo $no; ?></td>
			<td><?php echo $data["nim"]; ?></td>
			<td><?php echo $data["name"]; ?></td>
			<!--<td><?php echo $data["matkul"]; ?></td>-->
			<td></td>
		</tr>
		<?php $no++; ?>
		<?php endwhile; ?>
</table>

</div>
<br><br>			
</body>
</html>
 <?php
   include('footer.php');
  ?>