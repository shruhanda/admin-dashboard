<?php
define('TITLE', 'WorkReport');
define('PAGE', 'WorkReport');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
?>
<!--workreport-->
<div class="col-sm-9 col-sm-10">
<form action="" class="d-print-none" method="POST">
<div class="form-row">
<div class="form-group col-md-2">
<input type="date" class="form-control" name="activitydate"
 id="activitydate" >
</div>
<div class="form-group">
<input type="submit" class="btn btn-secondary" name="searchsubmit"
 value="Search" >
</div>
</div>
</form>
<?php
if(isset($_REQUEST['searchsubmit'])){
	$activitydate = $_REQUEST['activitydate'];
	$sql = "SELECT * FROM assignactivity_tb WHERE activity_date
	= {$_REQUEST['activitydate']}";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
     echo '<table class="table">
	<thead>
	<tr>
	<th scope"col">Activity ID</th>
	<th scope"col">Activity Name</th>
	<th scope"col">Project name</th>
	<th scope"col">Head</th>
	<th scope"col">Workers</th>
	<th scope"col">City</th>
	<th scope"col">State</th>
	<th scope"col">Zip</th>
	<th scope"col">Activity Head</th>
	<th scope"col">Date</th>
	</tr>
	</thead>
	<tbody>';
		while($row = $result->fetch_assoc()){
		echo '<tr>';
		echo '<td>'.$row["a_id"].'</td>';
		echo '<td>'.$row["activity_name"].'</td>';
		echo '<td>'.$row["p_name"].'</td>';
		echo '<td>'.$row["p_head"].'</td>';
		echo '<td>'.$row["a_workers"].'</td>';
		echo '<td>'.$row["a_city"].'</td>';
		echo '<td>'.$row["a_state"].'</td>';
		echo '<td>'.$row["a_zip"].'</td>';
		echo '<td>'.$row["activity_head"].'</td>';
		echo '<td>'.$row["activity_date"].'</td>';
		echo  '</td>';
		echo '</tr>';
		}
		echo '<tr>';
		echo '<td>';
		echo '<input type="submit" class="btn btn-danger d-print-none"
		value = "Print" onClick="window.print()">';
		echo '</td>';
		echo '</tr>';
		echo '</tbody>
	     </table>';

	}else{
			echo 'No Results Found';

	}

}
?>
</div>
<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->

