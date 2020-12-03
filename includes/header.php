<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../custom.css">

<title><?php echo TITLE ?></title> 
</head>
<body>
<!-- START -->
<nav>
<nav class="navbar navbar-expand-sm navbar-dark bg-info pl-5 fixed top">
<a href ="dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">WELCOME TO BUILDERSDECK</a>
</nav>
<!-- END nav-->
<!-- START Container-->
<div class="container-fluid" style="margin-top:30px;">
<div class="row"><!-- START ROW-->

<!-- SIDEBAR-->
<nav class="col-sm-2 bg-light sidebar py-5">
<div class="sidebar-sticky">
<ul class="nav flex-column">
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'Dashboard'){echo 'active';}?>" 
href="#"><i class="fa fa-tachometer" aria-hidden="true"></i>
Dashboard</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'Request'){echo 'active';}?>" href="request.php"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
Requests</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'ProjectsUndertaken'){echo 'active';}?>" href="ProjectsUndertaken.php"><i class="fa fa-list" aria-hidden="true"></i>
Projects Undertaken</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'ProjectsAssigned'){echo 'active';}?>" href="ProjectsAssigned.php"><i class="fa fa-file" aria-hidden="true"></i>
Projects Assigned</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'Workers'){echo 'active';}?>" href="Workers.php"><i class="fa fa-venus-double" aria-hidden="true"></i>
Worker Details</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'AssignActivity'){echo 'active';}?>" href="AssignActivity.php"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
Assign Activity</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'WorkReport'){echo 'active';}?>" href="WorkReport.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>
Work Report</a></li>
<li class="nav-item">
<a class="nav-link <?php if(PAGE == 'ChangePass'){echo 'active';}?>" href="ChangePass.php"><i class="fa fa-unlock" aria-hidden="true"></i>
Change Password</a></li>
<li class="nav-item">
<a class="nav-link" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
Logout</a></li>
</ul>
</div>
</nav><!--ENDS-->