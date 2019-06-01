<?php
include('header.php');
include('koneksi.php');
$query=mysqli_query($conn, "SELECT*FROM kelas") ;

 ?>

   <div class="panel panel-heading">
    <h2>
	<a class="btn btn-info center" href="dosen.php">Home</a>

    </h2>
	</div>
	  <h3><div class="well text-center">Date : <?php echo date('Y-m-d'); ?></div></h3>
 <div class="container">
   <h2 style="text-align: center;">Daftar Mata Kuliah</h2>
   <div class="list-group">
   		 <?php
            $no = 1;
            while($data = mysqli_fetch_assoc($query)):
        ?>
     <a href="absen_index.php" class="list-group-item text-center"><?php echo $data["matkul"]; ?></a>

	 		<?php endwhile; ?>
   </div>
 </div>

 <?php
   include('footer.php');
  ?>
