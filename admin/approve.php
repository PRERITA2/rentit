
	<?php
	include'connect.php';
		$sql="UPDATE product set approved=1 where id='".$_GET['id']."'";
		if(mysqli_query($conn,$sql)){
			 echo" <script>window.location='viewapprove.php' </script>"; 

		}
		else{
			echo "Not approved".mysqli_error($conn);
		}
	?>

	
