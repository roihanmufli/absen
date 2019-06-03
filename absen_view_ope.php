<?php
require_once("koneksi.php");
include("header_admin.php");



 ?>
 <div class="panel panel-default">
   <div class="panel panel-heading">
     <h2>
     <a class="btn btn-info success" href="operator.php">Home</a>
     </h2>
   </div>

<div class="panel panel-body">

      <table class="table table-striped">
        <th>No</th>
        <th>Dates</th>
        <th>Mata Kuliah</th>
        <th>Show Attendance</th>

        <?php $result=mysqli_query($conn,"select distinct date,nama_matkul from attendance_records");
          $serialnumber = 0;
          while($row=mysqli_fetch_array($result)){
            $serialnumber++;
        ?>
          <tr>
          <td><?php echo $serialnumber; ?></td>
          <td><?php echo $row['date']; ?>
          <td><?php echo $row['nama_matkul']; ?>

          </td>
          <td>
            <form action="absen_show_ope.php" method="POST">
              <input type="hidden" name="date" value="<?php echo $row['date'] ?>">
              <input type="hidden" name="nama_matkul" value="<?php echo $row['nama_matkul'] ?>">
              <input type="submit" value="Show Attendance" class="btn btn-primary">
            </form>
          </td>
        </tr>
      <?php
        }
      ?>
      </table>

    </form>

  </div>
