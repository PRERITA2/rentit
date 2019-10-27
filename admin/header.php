
<?php
session_start();
if(empty($_SESSION['uid']) || $_SESSION['usertype']!="admin")
{
   echo"<script>window.location='../login.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!--font-awesome-5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!--Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">
  <!-- My Java Script -->
  <script src="myScript.js"></script>
 <!--  my style sheet should be placed after bootstrap stylesheet-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="jumbotron ">
		<div class="container-fluid text-center">
			<h1><i class="fas fa-user-shield"></i> Admin Panel</h1>
		</div>
	</div>

	<nav class="navbar navbar-inverse " data-spy="affix" data-offset-top="100">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          		<span class="icon-bar"></span>
          		<span class="icon-bar"></span>
          		<span class="icon-bar"></span>                        
        		</button>
        		<a class="navbar-brand" href="#">Rent it</a>
      		</div>
    		<div class="collapse navbar-collapse" id="myNavbar">
    			<ul class="nav navbar-nav">
      				<li><a href="adminpanel.php">Dashboard</a></li>
      			</ul>
    			<a href="../logout.php" class="btn btn-danger navbar-btn navbar-right">Logout</a>
  			</div>
  		</div>
	</nav>