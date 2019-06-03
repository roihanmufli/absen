<?php
require_once("koneksi.php");
include('header.php');



$flag = 0;
$update = 0;
if(isset($_POST['submit']))
{

  $date = date('Y-m-d');
  $nama_matkul= $_POST['nama_matkul'];

  $records = mysqli_query($conn,"select * from attendance_records where date ='$date' and nama_matkul ='$nama_matkul' ");
  $num = mysqli_num_rows($records);

  if($num)
  {
    foreach($_POST['status'] as $id=>$status)
    {
      $nim = $_POST['nim'][$id];
      $name = $_POST['nama'][$id];
      $nama_matkul = $_POST['nama_matkul'][$id];



      $result = mysqli_query($conn,"update attendance_records set nim = '$nim', name = '$name',nama_matkul= '$nama_matkul', status = '$status', date = '$date' where date = '$date' and name = '$name';");
      if($result)
      {
        $update= 1;
      }

    }
  }
  else {

      foreach($_POST['status'] as $id=>$status)
      {
        $nim = $_POST['nim'][$id];
        $name = $_POST['nama'][$id];
        $nama_matkul = $_POST['nama_matkul'][$id];



        $result = mysqli_query($conn,"insert into attendance_records values('$nim','$name','$nama_matkul','$status','$date')");
        if($result)
        {
          $flag = 1;
        }
      }
  }

}
 ?>

<div class="panel panel-default">
  <div class="panel panel-heading">
    <h2>
    <a class="btn btn-success" href="absen_add.php">Add Student</a>
	<a class="btn btn-info center" href="dosen.php">Home</a>
	<a class="btn btn-info center" href="absen_viewall.php">View Attendance</a>
	<a class="btn btn-info center" href="daftarsiswa.php">Student Data</a>
  <a class="btn btn-info center" href="absen_matkul.php">Back</a>
    </h2>
	</div>
    <?php if($flag) { ?>
    <div class="alert alert-success">
      Attendance Data Insert Succesfully
    </div>
    <?php } ?>

    <?php if($update) { ?>
    <div class="alert alert-success">
      Student Attendance Updated Successfully
    </div>
  <?php } ?>


  <h3><div class="well text-center">Date : <?php echo date('Y-m-d'); ?></div></h3>
<div class="panel panel-body">
    <form action="absen_index.php" method="post">
      <table class="table table-striped">
        <th>No</th>
        <th>NIM</th>
        <th>Student Name</th>
        <th>Mata Kuliah</th>
        <th>Attendance Status</th>
        <?php
        if(isset($_GET['pilih']) && $_GET['pilih'] == "Praktikum Rekayasa Perangkat Lunak"){
          $result=mysqli_query($conn,"select * from mahasiswa where nama_matkul ='Praktikum Rekayasa Perangkat Lunak'");
        }
        elseif(isset($_GET['pilih']) && $_GET['pilih'] == "Data Mining dan Data Warehouse"){
          $result=mysqli_query($conn,"select * from mahasiswa where nama_matkul ='Data Mining dan Data Warehouse'");
        }
        elseif(isset($_GET['pilih']) && $_GET['pilih'] == "Pengolahan Citra Digital"){
          $result=mysqli_query($conn,"select * from mahasiswa where nama_matkul ='Pengolahan Citra Digital'");
        }

          $serialnumber = 0;
          $counter=0;
          while($row=mysqli_fetch_array($result)){
            $serialnumber++;
        ?>
          <tr>
          <td><?php echo $serialnumber; ?></td>
          <td><?php echo $row['nim']; ?>
          <input type="hidden" value="<?php echo $row['nim']; ?>" name="nim[]" >
          </td>
          <td><?php echo $row['nama']; ?>
          <input type="hidden" value="<?php echo $row['nama']; ?>" name="nama[]">
          </td>
          <td><?php echo $row['nama_matkul']; ?>
          <input type="hidden" value="<?php echo $row['nama_matkul']; ?>" name="nama_matkul[]">
          </td>

          <td>

            <input type="radio" name="status[<?php echo $counter; ?>]" value="Present" <?php if(isset($_POST['status'][$counter]) && $_POST['status'][$counter] == "Present") {
                echo "checked=checked";
            }
          ?>
              checked required >Present
            <input type="radio" name="status[<?php echo $counter; ?>]" value="Absent"
            <?php if(isset($_POST['status'][$counter]) && $_POST['status'][$counter] == "Absent") {
                echo "checked=checked";
            }
            ?>

            required>Absent
          </td>
        </tr>
      <?php
        $counter++;
        }
      ?>
      </table>
      <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
    </form>
  </div>

</div>
