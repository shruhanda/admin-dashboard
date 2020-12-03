<?php
define('TITLE', 'Editworker');
define('PAGE', 'Editworker');
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
<h3 class="text-center">Update Worker Details</h3>
<?php
if(isset($_REQUEST['edit'])){
	$sql = "SELECT * FROM workers_tb WHERE worker_id =
	{$_REQUEST['id']}";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
}
	if(isset($_REQUEST['workerupdate'])){
		if(($_REQUEST['worker_id'] == "") || ($_REQUEST['worker_name'] == "") || ($_REQUEST['worker_email'] == "") || 
		($_REQUEST['worker_mobile'] == "") || ($_REQUEST['worker_city'] == "")){
			$msg="<div class='alert alert-warning col-sm-6 ml-5'>Fields are Empty</div>";

		}else{
			$wid = $_REQUEST['worker_id'];
			$wname = $_REQUEST['worker_name'];
			$wemail = $_REQUEST['worker_email'];
			$wmobile = $_REQUEST['worker_mobile'];
			$wcity = $_REQUEST['worker_city'];
			$sql = "UPDATE workers_tb SET worker_id = 
			'$wid', worker_name = '$wname', worker_email = '$wemail',
			worker_mobile = '$wmobile', worker_city = '$wcity'
			WHERE worker_id = '$wid'";
			if($conn->query($sql) == TRUE){
				$msg="<div class='alert alert-success col-sm-6 ml-5'>Added Successfully</div>";

			}else{
				$msg="<div class='alert alert-danger'>Unable To Add</div>";

			}

		}
	}
?>
<form action="" method="POST">
<div class="form-group">
<label for="worker_id">Worker ID</label>
<input type="text" class="form-control" name="worker_id" id="worker_id"
value="<?php if(isset($row['worker_id'])) {echo $row['worker_id']; }?>"
readonly>
</div>
<div class="form-group">
<label for="worker_name">Name</label>
<input type="text" class="form-control" name="worker_name" id="worker_name"
value="<?php if(isset($row['worker_name'])) {echo $row['worker_name']; }?>">
</div>
<div class="form-group">
<label for="worker_email">Email</label>
<input type="text" class="form-control" name="worker_email" id="worker_email"
value="<?php if(isset($row['worker_email'])) {echo $row['worker_email']; }?>">
</div>
<div class="form-group">
<label for="worker_mobile">Mobile</label>
<input type="text" class="form-control" name="worker_mobile" id="worker_mobile"
value="<?php if(isset($row['worker_mobile'])) {echo $row['worker_mobile']; }?>">
</div>
<div class="form-group">
<label for="worker_city">City</label>
<input type="text" class="form-control" name="worker_city" id="worker_city"
value="<?php if(isset($row['worker_city'])) {echo $row['worker_city']; }?>">
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger"
id="workerupdate" name="workerupdate">Update</button>
<a href="Workers.php" class="btn btn-secondary">Close</a>
<?php if(isset($msg)) {echo $msg;} ?>
</div>
</form>
</div><!--ENDS-->


<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->