<?php
include("koneksi.php");
include('header.php');



 ?>
 <div class="panel panel-default">
   <div class="panel panel-heading">
     <h2>
     <a class="btn btn-success" href="absen_add.php">Add Student</a>
     <a class="btn btn-info pull-right" href="absen_index.php">Back</a>
	 <a class="btn btn-info center" href="dosen.php">Home</a>
     </h2>
   </div>

<div class="panel panel-body">

      <table class="table table-striped">
        <th>No</th>
        <th>Dates</th>
        <th>Show Attendance</th>

        <?php $result=mysqli_query($conn,"select distinct date from attendance_records");
          $serialnumber = 0;
          while($row=mysqli_fetch_array($result)){
            $serialnumber++;
        ?>
          <tr>
          <td><?php echo $serialnumber; ?></td>
          <td><?php echo $row['date']; ?>
          </td>
          <td>
            <form action="absen_show.php" method="POST">
              <input type="hidden" name="date" value="<?php echo $row['date'] ?>">
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
