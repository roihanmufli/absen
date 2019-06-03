<?php
include("header.php");
include("koneksi.php");
?>
<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>
			<a class="btn btn-info pull-right" href="absen_viewall.php"> Back</a>
			<a class="btn btn-info center" href="dosen.php">Home</a>
		</h2>

		<div class="panel panel_body">

				<table class="table table-striped">
					<tr>
						<th> No. </th>
						<th> NIM </th>
						<th> Nama </th>
						<th> Status</th>
					</tr>
					<?php $result=mysqli_query($conn, "select * from attendance_records where date = '$_POST[date]' and nama_matkul = '$_POST[nama_matkul]' ");
						$no=0;
						$counter=0;
						while($row=mysqli_fetch_array($result)){
							$no++;
					?>
					<tr>
						<td> <?php echo $no;?> </td>
						<td> <?php echo $row['nim'];?> </td>
						<td> <?php echo $row['name'];?> </td>
						<td><?php echo $row['status'];?></td>
							<!--<input type="radio" name="status[<--?php echo $counter; ?>]" <--?php if($row['status']=="Present")
								echo"checked=checked";
								?>
							value="Present">Present
							<input type="radio" name="status[<--?php echo $counter; ?>]" <--?php if($row['status']=="Absent")
								echo"checked=checked";
						?>
							value="Absent">Absent	-->

					</tr>
					<?php $counter++;
					} ?>

			</table>

		</div>
	</div>

</div>
