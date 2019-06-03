<?php
require_once "koneksi.php";
include("header.php");

$query=mysqli_query($conn, "SELECT kode_matkul, nama_matkul FROM matkul") ;
?>

<html>

<head><title>Daftar Mata Kuliah</title>
  <div class="panel panel-heading">
    <h2>
	<a class="btn btn-info center" href="dosen.php">Home</a>

    </h2>
	</div>
</head>

<body>
<div class="panel panel-body">

      <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>

        </tr>
		 <?php
            $no = 1;
            while($data = mysqli_fetch_assoc($query)):
        ?>
		<tr><td><?php echo $no; ?></td>
			<td><?php echo $data["kode_matkul"]; ?></td>
			<td><?php echo $data["nama_matkul"]; ?></td>
		</tr>
		<?php $no++; ?>
		<?php endwhile; ?>
</table>
</div>
</body>


</html>
