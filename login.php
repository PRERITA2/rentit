<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two|Open+Sans&display=swap" rel="stylesheet">
  <style>
        body{
          background-color: #f4f4f4;
        }
        .log{
          margin-top:70px;
          border:1px solid #111;
          background-color: #111;
          box-shadow: 3px 3px 8px 3px #424242;
        }
        form{
          margin:30px 0 40px 0;
          color:#9E9E9E;
        }
        form label{
          font-family: 'Open Sans', sans-serif;
          font-size: 16px;
        }
        input{
           background: none !important;
           color:white !important;
        }
        .log p{
          color:#9E9E9E;
          font-family: 'Open Sans', sans-serif;
        }
      
        .btn{
          background-color:#3949AB !important;
          border:none !important;
        }
        .log h2{
          color:#3949AB;
          text-align: center;
          font-family: 'Lobster Two', cursive;
          font-size:50px;
        }
        .btn:hover{
          border:3px solid #3949AB !important;
        }

  </style>
</head>
<body>

<div class="container">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4 log">
  <h2>Login</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Submit"></input>
  </form>
  <p>Not a member?<a href="signup.php"> Sign up</a> </p>
</div>
<div></div>
</div class="col-sm-4">
</div>
</body> 
</html>
<?php
if(isset($_POST['submit']))
{
include'connect.php';
$email=$_POST['email'];
$password=$_POST['password'];
$sql = "SELECT * FROM login WHERE email='$email' and password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
  { 
    while($row=mysqli_fetch_assoc($result)){
      session_start();
      $_SESSION['uid']=$row['uid'];
      $_SESSION['email']=$row['email'];
      $_SESSION['usertype']=$row['usertype'];
      if(isset($_GET['cart']) && isset($_GET['id'])){      //url=>cart=yes  ..checking if cart is set in url
          $cart=$_GET['cart'];     //declaring a new php variable and setting it with the value of cart in url.i.e.$cart=yes
          $id=$_GET['id'];
      }
      else{
          $cart="no";
      }
      if($_SESSION['usertype']=="admin"){
        // echo"<script>alert('Login Successfully') </script>";
        echo"<script>window.location='admin/adminpanel.php' </script>";
      }
      elseif($_SESSION['usertype']=="seller"){
         // echo"<script>alert('Login Successfully') </script>";
        echo"<script>window.location='seller/seller.php' </script>";
      }
      elseif($_SESSION['usertype']=="customer"){
         if($cart == "yes"){
            echo"<script>window.location='addtocart.php?id=$id' </script>";
        }
        else{
            echo"<script>window.location='index.php' </script>";
        }
      }
    }
}
else 
{
    echo"<script>alert('Userid or Password Incorrect') </script>";
}
}
?>