<?php
define('TITLE', 'ProjectsAssigned');
define('PAGE', 'ProjectsAssigned');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
?>
<!--start projectassigned-->
<div class="col-sm-9 col-md-10 text-center">
<p class="bg-dark text-white p-2">Projects Assigned</p>
<?php 
$sql = "SELECT * FROM projectsassigned_tb";  
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo '<table class="table">
	<thead>
	<tr>
	<th scope"col">Project ID</th>
	<th scope"col">Project Name</th>
	<th scope"col">Head</th>
	<th scope"col">Workers</th>
	<th scope"col">Status</th>
	<th scope"col">Action</th>
	</tr>
	</thead>
	<tbody>';
	while($row = $result->fetch_assoc()){
		echo '<tr>';
		echo '<td>'.$row["pid"].'</td>';
		echo '<td>'.$row["p_name"].'</td>';
		echo '<td>'.$row["p_head"].'</td>';
		echo '<td>'.$row["p_workers"].'</td>';
		echo '<td>'.$row["status"].'</td>';
		echo '<td>';
		echo '<form action="editproject.php" class="d-inline"
		method="POST">';
		echo '<input type="hidden" name="id"
		value='.$row["pid"].'>
		<button type="btn btn-info mr-3"
		name="edit" value="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
		echo '</form>';
		echo '<form action="" class="d-inline"
		method="POST">';
		echo '<input type="hidden" name="id"
		value='.$row["pid"].'>
		<button type="btn btn-secondary mr-3"
		name="delete" value="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
		echo '</form>';
		echo  '</td>';
		echo '</tr>';
	}
	echo '</tbody>
	</table>';
}else{
	echo 'No Results Found';
}
?>
</div>
<?php
if(isset($_REQUEST['delete'])){
	$sql = "DELETE FROM projectsassigned_tb WHERE pid = {$_REQUEST['id']}";
	if($conn->query($sql) == TRUE){
		echo '<meta http-equiv="refresh" content= "0;URL=?deleted" /
		>';
	} else{
		echo 'Unable To Delete';
	}

}
?>
</div><!-- END ROW-->
<div class="float-right"><a href="insertprojects.php" class="btn btn-info"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>
</a></div>
</div>
<!--END Container-->
<!-- JAVASCRIPT-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>

