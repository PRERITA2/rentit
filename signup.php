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
          margin-top:0px;
          border:1px solid #111;
          background-color: #111;
          box-shadow: 3px 3px 6px 3px #424242;
        }
        form{
          margin:17px 40px 8px 40px;
          color:#9E9E9E;
        }
        form label{
          font-family: 'Open Sans', sans-serif;
          font-size: 14px;
        }
        .log p{
          color:#9E9E9E;
          font-family: 'Open Sans', sans-serif;
          margin-left:30px;
        }
      
        .btn{
          background-color:#3949AB !important;
          border:none !important;
        }
        .log h2{
          color:#3949AB;
          text-align: center;
          font-family: 'Lobster Two', cursive;
          font-size:45px;
        }
        .btn:hover{
          border:3px solid #3949AB !important;
        }
        input{
         color:white!important;
          background: none !important;
         
        }

  </style>
</head>
<body>

<div class="container">
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 log">
  <h2>Sign up</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" name="fname" class="form-control" id="fname"  required>
    </div>
     <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" name="lname" class="form-control" id="lname"  required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" class="form-control" id="email"  required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="pwd" class="form-control" id="pwd"  required>
    </div>
    <div class="form-group">
      <label for="cpwd">Confirm Password:</label>
      <input type="password" name="cpwd" class="form-control" id="cpwd"  required>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="tel" name="mobile" class="form-control" id="mobile" required>
    </div>
    <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="radio" value="seller" required>Seller
      </label>
      <label class="radio-inline">
        <input type="radio" name="radio" value="customer">Customer
      </label>
    </div>
    <input type="submit" name="submit" class="btn btn-primary"></input>
  </form>
  <p>Already a member?<a href="login.php"> Log in</a> </p>
</div>
<div></div>
</div class="col-sm-3">
</div>
</body> 
</html>
<?php
  if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $cpwd=$_POST['cpwd'];
    $mobile=$_POST['mobile'];
    $usertype=$_POST['radio'];
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        echo"<script>alert('Only letters and white space allowed in name')</script>"; 
      }
    else if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        echo"<script>alert('Only letters and white space allowed in name')</script>"; 
      }
    else if($pwd!=$cpwd){
        echo"<script>alert('Passwords do not match')</script>"; 
      }
     else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo"<script>alert('Invalid email format')</script>"; 
    }
    else if(!preg_match('/^[0-9]{10}$/',$mobile)){
        echo"<script>alert('Invalid phone number')</script>"; 
    }
    else{
      include 'connect.php';
      $sql="SELECT * from signup where email='$email'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        echo "<script>alert('User already exists')</script>";
      }
      else{
        $sql1="INSERT INTO signup(fname,lname,email,password,mobile,usertype) values('$fname','$lname','$email','$pwd','$mobile','$usertype')";
        if(mysqli_query($conn,$sql1)){
           $sql2="INSERT into login(email,password,usertype) values('$email','$pwd','$usertype')";
          mysqli_query($conn,$sql2);
          echo "<script>alert('Signed up successfully')</script>";
          echo "<script>window.location='index.php'</script>";
          
        }
        else{
          echo "<script>alert('Could not sign up')</script>";
        }
      }
   }
  
  }
?>