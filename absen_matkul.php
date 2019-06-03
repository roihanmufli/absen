<?php
include('header.php');
require_once('koneksi.php');
$query=mysqli_query($conn, "SELECT * FROM matkul") ;

 ?>

   <div class="panel panel-heading">
    <h2>
	<a class="btn btn-info center" href="dosen.php">Home</a>

    </h2>
	</div>
	  <h3><div class="well text-center">Date : <?php echo date('Y-m-d'); ?></div></h3>
 <div class="container">
   <form class="" action="absen_index.php" method="get">
     <h2 style="text-align: center;">Daftar Mata Kuliah</h2>
     <div class="list-group">
          <?php
              $no = 1;
              while($data = mysqli_fetch_assoc($query)):
          ?>
          <input type="submit" style="width:100%;" class="list-group-item text-center" name="pilih" value="<?php echo $data["nama_matkul"]; ?>">


       <?php endwhile; ?>
     </div>
   </form>

 </div>

 <?php
   include('footer.php');
  ?>
