<?php
include('header_admin.php');
require_once "koneksi.php";
$query=mysqli_query($conn,"select kode,nama,email,notelp from login where status='dosen'");
?>
<html>

<head><title>Daftar Dosen</title>
  <div class="panel panel-heading">
    <h2>
    <a class="btn btn-success" href="register.php">Add Lecturer</a>
	<a class="btn btn-info center" href="operator.php">Home</a>

    </h2>
	</div>
</head>

<body>

<div class="panel panel-body">

      <table class="table table-striped">
			<tr>
            <th>No.</th>
            <th>Kode Dosen</th>
            <th>NAMA</th>
			      <th>E-mail</th>
			      <th>No.telp</th>
      </tr>
		 <?php

            $no = 1;
            while($data = mysqli_fetch_assoc($query)):

        ?>
		<tr><td><?php echo $no; ?></td>
      <td><?php echo $data["kode"]; ?></td>
			<td><?php echo $data["nama"]; ?></td>
			<td><?php echo $data["email"]; ?></td>
			<td><?php echo $data["notelp"]; ?></td></tr>
			<?php $no++; ?>
		<?php endwhile; ?>
</table>

</div>

</body>

 <?php
   include('footer.php');
  ?>
</html>
