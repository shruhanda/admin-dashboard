<?php
define('TITLE', 'InsertProject');
define('PAGE', 'InsertProject');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['prosubmit'])){
	if(($_REQUEST['p_name'] == "") || ($_REQUEST['p_head'] == "") || 
	($_REQUEST['p_workers'] == "") || ($_REQUEST['status'] == "")){
		$msg="<div class='alert alert-warning col-sm-6 ml-5'>Fields are Empty</div>";
	} else{
		$pname = $_REQUEST['p_name'];
		$phead = $_REQUEST['p_head'];
		$pworkers = $_REQUEST['p_workers'];
		$pstatus = $_REQUEST['status'];
		$sql = "INSERT INTO projectsassigned_tb(p_name,
		p_head, p_workers, status) VALUES ('$pname',
		'$phead', '$pworkers', '$pstatus')";
		if($conn->query($sql) == TRUE){
			$msg="<div class='alert alert-success col-sm-6 ml-5'>Project Inserted Successfully</div>";
		}else{
			$msg="<div class='alert alert-danger'>Unable To add Project</div>";

		}
	}

}
?>
<!--INSERT Projects-->
<div class="col-sm-6 mx-3 jumbotron">
<h3 class="text-center">Insert Assigned Projects</h3>
<form action="" method="POST">
<div class="form-group">
<label for="p_name">Project Name</label>
<input type="text" class="form-control" name="p_name" id="p_name">
</div>
<div class="form-group">
<label for="p_head">Head</label>
<input type="text" class="form-control" name="p_head" id="p_head">
</div>
<div class="form-group">
<label for="p_workers">Workers</label>
<input type="text" class="form-control" name="p_workers" id="p_workers">
</div>
<div class="form-group">
<label for="status">Status</label>
<input type="text" class="form-control" name="status" id="status">
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger" id="prosubmit"
name="prosubmit">Submit</button>
<a href="ProjectsAssigned.php" class="btn btn-secondary">
Close</a>
</div>
<?php if(isset($msg)) {echo $msg;} ?>
</form>
</div>
<!--end-->
<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->