<?php
define('TITLE', 'Dashboard');
define('PAGE', 'Dashboard');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
	$aEmail = $_SESSION['aEmail'];
} else{
	echo "<script> location.href='login.php'</script>";
}
$sql = "SELECT max(request_id) FROM submitrequest_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$submitrequest = $row[0]; 

?>

<!-- Dashboard-->
<div class= "col-sm-9 col-md-10">
<div class="row text-center mx-5">
<div class="col-sm-4">
<div class="card text-white bg-info mb-3" style="max-width:18rem;">
<div class="card-header"> Requests Received</div>
<div class="card-body">
<h4 clas="card-title"><?php echo $submitrequest; ?></h4>
<a class="btn text-white" href="#">View</a>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-success mb-3" style="max-width:18rem;">
<div class="card-header">Ongoing Projects</div>
<div class="card-body">
<h4 clas="card-title">5</h4>
<a class="btn text-white" href="#">View</a>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-danger mb-3" style="max-width:18rem;">
<div class="card-header">No. of Workers</div>
<div class="card-body">
<h4 clas="card-title">500</h4>
<a class="btn text-white" href="#">View</a>
</div>
</div>
</div>
</div>
<div class="mx-5 mt-5 text-center">
<p class="bg-dark text-white p-2">List of Expectants</p>
<?php
$sql= "SELECT * FROM expectantlogin_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
	echo '<table class="table">
	<thead>
	<tr>
	<th scope="col">Expectant ID</th>
	<th scope="col">Name</th>
	<th scope="col">Email</th>
	</tr>
	</thead>
	<tbody>';
	while($row = $result->fetch_assoc()){
	echo '<tr>';
	echo '<td>'.$row["e_login_id"].'</td>';
	echo '<td>'.$row["e_name"].'</td>';
	echo '<td>'.$row["e_email"].'</td>';
	echo '</tr>';
	}
	
	echo '</tbody>
	</table>';
}else{
	echo 'No Results Found';
}
?>
</div>

</div><!--end-->

<!--Footer-->
<?php

include('includes/footer.php');

?>
<!--end-->
















