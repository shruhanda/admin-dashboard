<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
if(isset($_REQUEST['aEmail'])){
	$aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
    $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));
    $sql ="SELECT a_email, a_password FROM adminlogin_tb
    WHERE a_email = '".$aEmail."' AND a_password = 
     '".$aPassword."' limit 1";
     $result = $conn->query($sql);
if($result->num_rows == 1){
	$_SESSION['is_adminlogin'] = true;
	$_SESSION['aEmail'] = $aEmail;
	echo "<script> location.href='dashboard.php';</script>";
	exit;
} else{
	$logmsg="<div class='alert alert-danger mt-4'>EMAIL ID DOES NOT EXIST</div>";
}
}
} else {
	echo "<script> location.href='dashboard.php';</script>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
<title> ADMIN Login</title>
</head>
<body>
<!-- START -->
<nav>
<nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed top">
<a href ="index.php" class="navbar-brand">WELCOME TO BUILDERSDECK</a>
</nav>
<!-- END nav-->
<div class="mb-3 mt-4 text-center" style="font-size: 30px;">
<i class="fa fa-line-chart" aria-hidden="true"></i>
<span> ONLINE PROJECT ACTIVITY MANAGEMENT SYSTEM</span>
</div>	
<p class="text-center" style="font-size:20px;"><i class="zmdi zmdi-font"></i>LOGIN</p>
<!-- FORM CREATION-->
<div class="container-fluid">
<div class="row justify-content-center mt-5">
<div class="col-sm-6 col-md-4">
<form action="" class="shadow-lg p-5" method="POST">
<div class="form-group">
<i class="fa fa-user" aria-hidden="true"></i>
<label for="email" class="font-weight-bold pl-2">EMAIL</label><input type="email" class="form-control" placeholder="email" name="aEmail">
</div>
<div class="form-group">
<i class="fa fa-unlock" aria-hidden="true"></i>
<label for="pass" class="font-weight-bold pl-2">PASSWORD </label><input type="password" class="form-control" placeholder="password" name="aPassword">
</div>
<button type="submit" class="btn btn-outline-info mt-3 font-weight-bold btn-block">LOGIN</button>
<?php if(isset($logmsg)) {echo $logmsg;} ?>

</form>
<!-- ENDS-->
<div class="text-center"><a href="../index.php" class="btn btn-primary mt-3 font-weight-bold shadow-sm">BACK TO HOME</a></div>
</div>
</div>
</div>
<!--START FOOTER  -->
<footer class="container-fluid bg-dark mt-5 text-white">
<div class="row py-3">
<div class="col-md-6">
<span>Follow Us:</span>
<a href="#" target="_blank" class="pr-2 fi-color"><i class="fa fa-facebook" aria-hidden="true"></i></a>
<a href="#" target="_blank" class="pr-2 fi-color"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<a href="#" target="_blank" class="pr-2 fi-color"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<a href="#" target="_blank" class="pr-2 fi-color"><i class="fa fa-twitter" aria-hidden="true"></i></a>
</div>
<div class="col-md-6 text-right">
<small>DESIGNED BY SHRUTI & NAMITA &copy; 2020</small>
</div>
</div>
</footer>
<!-- ENDS-->
	
<!-- JAVASCRIPT-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>