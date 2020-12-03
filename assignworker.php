<?php
if(session_id() == ''){
	session_start();	
}
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['view'])){
	$sql = "SELECT * FROM submitrequest_tb WHERE request_id = 
     {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
	
}
if(isset($_REQUEST['close'])){
	$sql = "DELETE FROM submitrequest_tb WHERE request_id =
	{$_REQUEST['id']}";
	if($conn->query($sql) == TRUE){
		echo '<meta http-equiv="refresh" content= 0;URL=?closed"
		>';
	}else{
		$msg="<div class='alert alert-danger mt-4'>Unable To Delete</div>";

	}
}
if(isset($_REQUEST['assign'])){
	if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") ||
	($_REQUEST['requestdesc'] == "") || ($_REQUEST['expectantname'] == "") || ($_REQUEST['expectantpname'] == "")
	|| ($_REQUEST['expectantphead'] == "") || ($_REQUEST['expectantadd1'] == "") || ($_REQUEST['expectantcity'] == "")
	 || ($_REQUEST['expectantstate'] == "") || ($_REQUEST['expectantzip'] == "") 
	 || ($_REQUEST['deliveryworker'] == "")){
		$msg2="<div class='alert alert-danger mt-2 ml-5'>Empty Fields Not Allowed</div>";

	}else{
		$rid = $_REQUEST['request_id'];
		$rinfo = $_REQUEST['request_info'];
		$rdesc = $_REQUEST['requestdesc'];
		$rname  = $_REQUEST['expectantname'];
		$rpname = $_REQUEST['expectantpname'];
		$rphead = $_REQUEST['expectantphead'];
		$radd1 = $_REQUEST['expectantadd1'];
		$rcity = $_REQUEST['expectantcity'];
		$rstate = $_REQUEST['expectantstate'];
		$rzip = $_REQUEST['expectantzip'];
		$rworker = $_REQUEST['deliveryworker'];
		$sql = "INSERT INTO assignworker_tb (request_id, request_info, request_desc,
		expectant_name, expectant_pname, expectant_phead, expectant_add1,
		expectant_city, expectant_state, expectant_zip, assign_del_worker)
		VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$rpname', '$rphead',
		'$radd1', '$rcity', '$rstate', '$rzip', '$rworker')";
		if($conn->query($sql) == TRUE){
			$msg2="<div class='alert alert-success mt-2 ml-5'>Worker Assigned Successfully</div>";
			
		}else{
			$msg2="<div class='alert alert-danger mt-2 ml-5'>Unable To Assign Worker</div>";
			
		}
	}
}

?>
<!--START Form-->
<?php if(isset($msg)) {echo $msg;} ?>
<div class="col-sm-5 mt-3 jumbotron">
<form class="" method="POST">
<h5 class="text-center">Resource Order Request</h5>
<div class="form-group">
<label for="request_id">Request ID</label>
<input type="text" class="form-control" name="request_id" id="request_id" value="<?php if(isset($row['request_id'])) {echo $row['request_id'];}?>" readonly >
</div>
<div class="form-group">
<label for="request_info">Request info</label>
<input type="text" class="form-control" name="request_info" id="request_info" value="<?php if(isset($row['request_info'])) {echo $row['request_info'];}?>" >
</div>
<div class="form-group">
<label for="requestdesc">Request Description</label>
<input type="text" class="form-control" name="requestdesc" id="requestdesc" value="<?php if(isset($row['request_desc'])) {echo $row['request_desc'];}?>" >
</div>
<div class="form-group">
<label for="Name">Name</label>
<input type="text" class="form-control" name="expectantname" id="expectantname" value="<?php if(isset($row['expectant_name'])) 
{echo $row['expectant_name'];}?>" >
</div>
<div class="form-group">
<label>Project Name</label>
<input type="text" class="form-control" name="expectantpname" id="expectantpname" value="
<?php if(isset($row['expectant_pname'])) {echo $row['expectant_pname'];}?>">
</div>
<div class="form-group">
<label>Project Head</label>
<input type="text" class="form-control" name="expectantphead" id="expectantphead" value="<?php if(isset($row['expectant_phead'])) 
{echo $row['expectant_phead'];}?>">
 </div>
 <div class="form-group">
 <label>Address</label>
 <input type="text" class="form-control" id="expectantadd1" name="expectantadd1" value="<?php if(isset($row['expectant_add1'])) {echo $row['expectant_add1'];}?>">
 </div>
 <div class="form-row">
 <div class="form-group col-md-4">
 <label for="inputCity">City</label>
 <input type="text" class="form-control" id="expectantcity" name="expectantcity" value="<?php if(isset($row['expectant_city'])) {echo $row['expectant_city'];}?>">
 </div>
 <div class="form-group col-md-4">
 <label for="inputState">State</label>
 <input type="text" class="form-control" id="expectantstate" name="expectantstate" value="<?php if(isset($row['expectant_state'])) 
 {echo $row['expectant_state'];}?>">
 </div>
 <div class="form-group col-md-2">
 <label for="inputZip">Zip</label>
 <input type="text" class="form-control" id="inputZip" onkeypress="isInputNumber(event)" name="expectantzip"
 value="<?php if(isset($row['expectant_zip'])) {echo $row['expectant_zip'];}?>">
 </div>
  </div>
 <div class="form-group">
 <label for="deliveryworker">Assign Delivery Worker</label>
 <input type="text" class="form-control" id="deliveryworker" name="deliveryworker">
 </div>
 <div class="float-right">
 <button type="submit" class="btn btn-success" name="assign">
 Assign</button>
 <button type="reset" class="btn btn-secondary">Reset</button>
 </div>
 <?php if(isset($msg2)) {echo $msg2;} ?>
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