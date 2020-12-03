<?php
define('TITLE', 'ProjectsUndertaken');
define('PAGE', 'ProjectsUndertaken');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
?>
<!-- ProjectsUndertaken-->
<div class="col-sm-9 col-md-10 text-center">
<?php 
$sql = "SELECT * FROM projects_tb";  
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo '<table class="table">
	<thead>
	<tr>
	<th scope"col">Project ID</th>
	<th scope"col">Project Name</th>
	<th scope"col">Head</th>
	<th scope"col">Location</th>
	<th scope"col">Start Date</th>
	<th scope"col">End Date</th>
	<th scope"col">Status</th>
	<th scope"col">Workers</th>
	</tr>
	</thead>
	<tbody>';
	while($row = $result->fetch_assoc()){
		echo '<tr>';
		echo '<td>'.$row["pid"].'</td>';
		echo '<td>'.$row["p_name"].'</td>';
		echo '<td>'.$row["p_head"].'</td>';
		echo '<td>'.$row["p_location"].'</td>';
		echo '<td>'.$row["p_startdate"].'</td>';
		echo '<td>'.$row["p_enddate"].'</td>';
		echo '<td>'.$row["p_status"].'</td>';
		echo '<td>'.$row["p_workers"].'</td>';
		echo  '</td>';
		echo '</tr>';
	}
	echo '</tbody>
	</table>';
}else{
	echo 'No Results Found';
}
?>
</div><!--end-->

<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->


























<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->

