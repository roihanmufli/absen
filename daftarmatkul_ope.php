<?php
include("header_admin.php");
require_once "koneksi.php";
$query=mysqli_query($conn, "SELECT matkul.kode_matkul, matkul.nama_matkul, login.nama FROM matkul inner join login on matkul.kode_dosen=login.kode") ;
?>

<html>

<head><title>Daftar Mata Kuliah</title>
  <div class="panel panel-heading">
    <h2>
	<a class="btn btn-info center" href="operator.php">Home</a>

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
			      <th>Dosen<th>

        </tr>
		 <?php
            $no = 1;
            while($data = mysqli_fetch_assoc($query)):
        ?>
		<tr><td><?php echo $no; ?></td>
			<td><?php echo $data["kode_matkul"]; ?></td>
			<td><?php echo $data["nama_matkul"]; ?></td>
			<td><?php echo $data["nama"]; ?></td>
		</tr>
		<?php $no++; ?>
		<?php endwhile; ?>
</table>
</div>
</body>


</html>
