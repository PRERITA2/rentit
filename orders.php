<?php
	require 'heeader.php';
?>

<?php 
$uid=$_SESSION['uid'];
 if(isset($_GET['cart']) && isset($_GET['aid'])){
 	$aid=$_GET['aid'];
 	$sql="SELECT * from product,cart in cart.uid='$uid' and product.id=cart.id";
 	$result=mysqli_query($conn,$sql);
 	while($row=mysqli_fetch_assoc($result)){
 		$sql2="INSERT INTO orders(uid,id,aid) values($uid,$row['id'],$aid)";
 	}
 }
 ?>