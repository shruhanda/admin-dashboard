<?php
define('TITLE', 'Insertworker');
define('PAGE', 'Insertworker');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['workerupdate'])){
	if(($_REQUEST['worker_name'] == "") || ($_REQUEST['worker_email'] == "") || 
	($_REQUEST['worker_mobile'] == "") || ($_REQUEST['worker_city'] == "")){
		$msg="<div class='alert alert-warning col-sm-6 ml-5'>Fields are Empty</div>";
	} else{
		$wname = $_REQUEST['worker_name'];
		$wemail = $_REQUEST['worker_email'];
		$wmobile = $_REQUEST['worker_mobile'];
		$wcity = $_REQUEST['worker_city'];
		$sql = "INSERT INTO  workers_tb (worker_name,
		worker_email, worker_mobile, worker_city) VALUES ('$wname',
		'$wemail', '$wmobile', '$wcity')";
		if($conn->query($sql) == TRUE){
			$msg="<div class='alert alert-success col-sm-6 ml-5'>Worker Details Inserted Successfully</div>";
		}else{
			$msg="<div class='alert alert-danger'>Unable To add Worker</div>";

		}
	}

}
?>
<!--INSERT worker-->
<div class="col-sm-6 mx-3 jumbotron">
<h3 class="text-center">Add New Worker</h3>
<form action="" method="POST">
<div class="form-group">
<label for="worker_name">Worker Name</label>
<input type="text" class="form-control" name="worker_name" id="worker_name">
</div>
<div class="form-group">
<label for="worker_email">Email</label>
<input type="text" class="form-control" name="worker_email" id="worker_email">
</div>
<div class="form-group">
<label for="worker_mobile">Mobile</label>
<input type="text" class="form-control" name="worker_mobile" id="worker_mobile">
</div>
<div class="form-group">
<label for="worker_city">City</label>
<input type="text" class="form-control" name="worker_city" id="worker_city">
</div>
<div class="text-center">
<button type="submit" class="btn btn-danger" id="workerupdate"
name="workerupdate">Submit</button>
<a href="Workers.php" class="btn btn-secondary">
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