
<?php
	session_start();
	include 'connect.php';
	$uid=$_SESSION["uid"];
	$id=$_GET['id'];
	$sql="SELECT * from cart where id=$id";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		echo "<script> alert('Product already in cart')</script>";
		echo "<script>window.location='cart.php'</script>";
	}
	else{


	$sql="INSERT INTO cart(uid,id) values($uid,$id)";
	if(mysqli_query($conn,$sql)){
		echo "<script> alert('Product added to cart')</script>";
		echo "<script>window.location='cart.php'</script>";
	}
	else{
		echo "<script>alert('Product could not be added')</script>";
		echo "<script>window.loaction='index.php'</script>";
	}
  }