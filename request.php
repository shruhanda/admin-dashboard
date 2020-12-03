<?php
define('TITLE', 'Request');
define('PAGE', 'Request');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}

?>
<!-- Request Column-->
<div class="col-sm-4">
<?php
$sql = "SELECT request_id, request_info, request_desc, 
expectant_name FROM submitrequest_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo '<div class="card mt-3 mx-5">';
		echo '<div class="card-header">';
		echo 'Request ID:'.$row['request_id'];
		echo '</div>';
		echo '<div class="card-body">';
		echo '<h5 class="card-title">Request Info: '.$row['request_info'];
		echo '</h5>';
		echo '<p class="card-text">'.$row['request_desc'];
		echo '</p>';
		echo '<p class="card-text">Name: '.$row['expectant_name'];
		echo '</p>';
		echo '<div class="float-right">';
		echo '<form action="" method="POST">';
		echo '<input type="hidden" name="id"
		value='.$row["request_id"].'>';
		echo '<input type="submit" 
		class="btn btn-danger mr-3" value="View" name="view">';
		echo '<input type="submit" 
		class="btn btn-secondary" value="Close" name="close">';
		echo '</form>';
		echo '</div>';
		echo '</div>';
		echo '</div>';

	}
}
?>
</div>
<!--ENDS Request-->

<!--Footer-->
<?php
include('assignworker.php');
include('includes/footer.php');

?>
<!--end-->

