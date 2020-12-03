<?php
define('TITLE', 'EditProject');
define('PAGE', 'EditProject');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
?>
<!-- START EditProject-->
<div class="col-sm-6 mx-3 jumbotron">
<h3 class="text-center">Update Project Details</h3>
<?php
if(isset($_REQUEST['edit'])){
	$sql = "SELECT * FROM projectsassigned_tb WHERE pid =
	{$_REQUEST['id']}";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
}
	if(isset($_REQUEST['proupdate'])){
		if(($_REQUEST['pid'] == "") || ($_REQUEST['p_name'] == "") || ($_REQUEST['p_head'] == "") || 
		($_REQUEST['p_workers'] == "") || ($_REQUEST['status'] == "")){
			$msg="<div class='alert alert-warning col-sm-6 ml-5'>Fields are Empty</div>";

		}else{
			$p_id = $_REQUEST['pid'];
			$pname = $_REQUEST['p_name'];
			$phead = $_REQUEST['p_head'];
			$pworkers = $_REQUEST['p_workers'];
			$pstatus = $_REQUEST['status'];
			$sql = "UPDATE projectsassigned_tb SET pid = 
			'$p_id', p_name = '$pname', p_head = '$phead',
			p_workers = '$pworkers', status = '$pstatus'
			WHERE pid = '$p_id'";
			if($conn->query($sql) == TRUE){
				$msg="<div class='alert alert-success col-sm-6 ml-5'>Updated Successfully</div>";

			}else{
				$msg="<div class='alert alert-danger'>Unable To Update</div>";

			}

		}
	}
?>
<form action="" method="POST">
<div class="form-group">
<label for="pid">Project ID</label>
<input type="text" class="form-control" name="pid" id="pid"
value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>"
readonly>
</div>
<div class="form-group">
<label for="p_name">Project Name</label>
<input type="text" class="form-control" name="p_name" id="p_name"
value="<?php if(isset($row['p_name'])) {echo $row['p_name']; }?>">
</div>
<div class="form-group">
<label for="p_head">Head</label>
<input type="text" class="form-control" name="p_head" id="p_head"
value="<?php if(isset($row['p_head'])) {echo $row['p_head']; }?>">
</div>
<div class="form-group">
<label for="p_workers">Workers</label>
<input type="text" class="form-control" name="p_workers" id="p_workers"
value="<?php if(isset($row['p_workers'])) {echo $row['p_workers']; }?>">
</div>
<div class="form-group">
<label for="status">Status</label>
<input type="text" class="form-control" name="status" id="status"
value="<?php if(isset($row['status'])) {echo $row['status']; }?>">
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger"
id="proupdate" name="proupdate">Update</button>
<a href="ProjectsAssigned.php" class="btn btn-secondary">Close</a>
<?php if(isset($msg)) {echo $msg;} ?>
</div>
</form>
</div><!--ENDS-->


<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->