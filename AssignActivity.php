<?php
define('TITLE', 'AssignActivity');
define('PAGE', 'AssignActivity');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['assign'])){
	if(($_REQUEST['a_id'] == "") || ($_REQUEST['activity_name'] == "") ||
	($_REQUEST['p_name'] == "") || ($_REQUEST['p_head'] == "") || ($_REQUEST['a_workers'] == "")
	|| ($_REQUEST['a_city'] == "") || ($_REQUEST['a_state'] == "") || ($_REQUEST['a_zip'] == "")
	 || ($_REQUEST['activity_head'] == "") 	 || ($_REQUEST['activity_date'] == "")){
		$msg2="<div class='alert alert-danger mt-2 ml-5'>Empty Fields Not Allowed</div>";

	}else{
		$ac_id = $_REQUEST['a_id'];
		$ac_name = $_REQUEST['activity_name'];
		$ac_pname = $_REQUEST['p_name'];
		$ac_phead  = $_REQUEST['p_head'];
		$ac_workers = $_REQUEST['a_workers'];
		$ac_city = $_REQUEST['a_city'];
		$ac_state = $_REQUEST['a_state'];
		$ac_zip = $_REQUEST['a_zip'];
		$ac_activityhead = $_REQUEST['activity_head'];
		$ac_date = $_REQUEST['activity_date'];
		$sql = "INSERT INTO assignactivity_tb (a_id, activity_name, p_name,
		p_head, a_workers, a_city,
		a_state, a_zip, activity_head, activity_date)
		VALUES ('$ac_id', '$ac_name', '$ac_pname', '$ac_phead', '$ac_workers', '$ac_city',
		'$ac_state', '$ac_zip', '$ac_activityhead', '$ac_date')";
		if($conn->query($sql) == TRUE){
			$msg="<div class='alert alert-success mt-2 ml-5'>Activity Assigned Successfully</div>";
			
		}else{
			$msg="<div class='alert alert-danger mt-2 ml-5'>Unable To Assign Activity</div>";
			
		}
	}
}
?>
<!--AssignActivity-->
<div class="col-sm-5 mx-5 jumbotron ">
<form class="" method="POST">
<h5 class="text-center">Assign Activity</h5>
<div class="form-group">
<label for="a_id">Activity ID</label>
<input type="text" class="form-control" name="a_id" id="a_id" value="<?php if(isset($row['a_id'])) {echo $row['a_id'];}?>">
</div>
<div class="form-group">
<label for="activity_name">Activity Name</label>
<input type="text" class="form-control" name="activity_name" id="activity_name" value="<?php if(isset($row['activity_name'])) {echo $row['activity_name'];}?>" >
</div>
<div class="form-group">
<label for="p_name">Project Name</label>
<input type="text" class="form-control" name="p_name" id="requestdesc" value="<?php if(isset($row['p_name'])) {echo $row['p_name'];}?>" >
</div>
<div class="form-group">
<label>Project Head</label>
<input type="text" class="form-control" name="p_head" id="p_head" value="<?php if(isset($row['p_head'])) 
{echo $row['p_head'];}?>">
 </div>
 <div class="form-group">
 <label>Workers Assigned</label>
 <input type="text" class="form-control" id="a_workers" name="a_workers" value="<?php if(isset($row['a_workers'])) {echo $row['a_workers'];}?>">
 </div>
 <div class="form-row">
 <div class="form-group col-md-4">
 <label for="inputCity">City</label>
 <input type="text" class="form-control" id="a_city" name="a_city" value="<?php if(isset($row['a_city'])) {echo $row['a_city'];}?>">
 </div>
 <div class="form-group col-md-4">
 <label for="inputState">State</label>
 <input type="text" class="form-control" id="a_state" name="a_state" value="<?php if(isset($row['a_state'])) 
 {echo $row['a_state'];}?>">
 </div>
 <div class="form-group col-md-2">
 <label for="azip">Zip</label>
 <input type="text" class="form-control" id="inputZip" onkeypress="isInputNumber(event)" name="a_zip"
 value="<?php if(isset($row['a_zip'])) {echo $row['a_zip'];}?>">
 </div>
  </div>
 <div class="form-group">
 <label for="activity_head">Assign Activity Head</label>
 <input type="text" class="form-control" id="activity_head" name="activity_head">
 </div>
 <div class="form-group">
 <label for="adate">Activity Date</label>
 <input type="date" class="form-control" id="inputdate" onkeypress="isInputNumber(event)" name="activity_date"
 value="<?php if(isset($row['activity_date'])) {echo $row['activity_date'];}?>">
 </div>
 <div class="float-right">
 <button type="submit" class="btn btn-success" name="assign">
 Assign</button>
 <button type="reset" class="btn btn-secondary">Reset</button>
 </div>
 <?php if(isset($msg)) {echo $msg;} ?>
 </form>
</div><!--ENDS Form-->
<!--JAVA-->
<script>
function isInputNumber(evt){
	var ch = String.formCharCode(evt.which);
	if(!(/[0-9]/.test(ch))){
		evt.preventDefault();
	}
}
</script>

<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->

