<?php
session_start();
if(empty($_SESSION['uid']) || $_SESSION['usertype']!="seller")
{
   echo"<script>window.location='../login.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!--font-awesome-5 for icon-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Ramabhadra|Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">
  <!-- My Java Script -->
  <!-- <script src="myScript.js"></script> -->
 <!--  my style sheet should be placed after bootstrap stylesheet-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="jumbotron">
		<div class="container-fluid text-center">
			<h1 class="page-heading"><i class="fas fa-store" style="color:#9C27B0"></i>Seller</h1>
		</div>
	</div>
	<div class="sidebar" data-spy="affix" data-offset-top="30">
		
		 <a class="list-group-item" href="#"></i>Rent it</a>
	     <a class="list-group-item" href="seller.php"><i class="far fa-user" style="color:#e53935"></i> Seller Profile</a>
	     <a class="list-group-item" href="addproduct.php"><i class="fas fa-plus" style="color:#00897B"></i> Add Product</a>
	     <a class="list-group-item" href="myproductlist.php"><i class="fas fa-list-ul" style="color:#1E88E5"></i> My Product list</a>
	     <a class="list-group-item" href="#"><i class="fas fa-money-check" style="color:#D81B60"></i> Transactions</a>	
		 <a href="../logout.php" class="btn btn-danger list-group-item"><strong>Logout</strong></a>
	 
    </div>

