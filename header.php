<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rent it</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Domine|Raleway&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Niconne&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Bitter|Prompt&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Ramabhadra|Satisfy&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="myScript.js"></script>
</head>
<body>
	<div class="jumbotron">
    <div class="container text-center">
      <h1>Rent it</h1>
      
    </div>
  </div>
                                       <!-- this with affix can be used to make navbar sticky -->
  <nav class="navbar navbar-inverse" > <!--class=data-spy="affix" data-offset-top="100" -->
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.php">Rent it</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Stores</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

        <?php 
          if(isset($_SESSION['uid'])){  ?>   
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="account">My Account <span class="caret"></span></span></a>
                <ul class="dropdown-menu">
                  <li><a href="customerprofile.php">Profile  <i class="fas fa-user" style="color:#d32f2f"></i></a></li>
                  <li><a href="cart.php">Cart  <i class="fas fa-shopping-cart" style="color:#7B1FA2"></i></a></li>
                  <li><a href="#">My Orders  <i class="fas fa-money-check" style="color:#C2185B"></i></a></li>
               </ul>
           </li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt" style="color: #f06595"></i>Log out</a></li>
        <?php 
            }
            else{  ?>
              <li><a href="signup.php"><span class="glyphicon glyphicon-user" style="color:#0288D1"></span> Sign Up</a></li>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in" style="color:#4527A0"></span> Login</a></li>
        <?php  }
           ?>
        </ul>
      </div></div>
    </div>
   </nav>