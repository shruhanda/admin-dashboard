<?php
define('TITLE', 'ChangePass');
define('PAGE', 'ChangePass');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if($_SESSION['is_adminlogin']){
	$eEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php';</script>";
}
	$aEmail = $_SESSION['aEmail'];

if(isset($_REQUEST['passupdate'])){
	if($_REQUEST['aPassword'] == ""){
		$msg="<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Please Enter new password</div>";

	}else{
		$apass = $_REQUEST['aPassword'];
        $sql = "UPDATE adminlogin_tb SET a_password = '$apass' WHERE a_email = '$aEmail'";
		
if($conn->query($sql) == TRUE){
		$msg="<div class='alert alert-success col-sm-6 ml-5 mt-2'>Password Changed Successfully</div>";

	
}else{
		$msg="<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Password Not Changed</div>";

}
	}
		
}
?>

<!-- FORM CREATION-->
<div class="col-sm-9 col-md-7">
<form class="mx-5" action="" method="POST">
<div class="form-group">
<label for="inputemail">EMAIL</label><input type="email" class="form-control" placeholder="email" id="inputemail" 
value ="<?php echo $aEmail ?>"readonly>
</div>
<div class="form-group">
<label for="inputnewpassword">PASSWORD </label><input type="password" class="form-control" placeholder=" New Password" id="inputnewpassword" name="aPassword">
</div>
<button type="submit" class="btn btn-info mt-4 mr-3" name="passupdate">Update</button>
<button type="reset" class="btn btn-secondary mt-4 mr-3">Reset</button>
 <?php if(isset($msg)) {echo $msg;} ?>

</form>
</div>
<!-- ENDS-->

<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->

