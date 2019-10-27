<?php
	require 'header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form class="form-horizontal" method="post" action="">
			 <div class="form-group">
			 	<label class="control-label col-sm-2" for="name">Name:</label>
			  	<div class="col-sm-10">
			 		<input type="text" name="name" class="form-control" id="name" required>
			 	</div>
			 </div>
			 <div class="form-group">
			 	<label class="control-label col-sm-2" for="mobile">Mobile:</label>
			 	<div class="col-sm-10">
			 		<input type="tel" name="mobile" class="form-control" id="mobile" required>
			 	</div>
			 </div>
			<div class="form-group">
			 	<label class="control-label col-sm-2" for="pincode">Pin Code:</label>
			 	 <div class="col-sm-10">
			 		<input type="text" name="pincode" class="form-control" id="pincode" placeholder="6 digit pincode" pattern="[0-9]{6}" required>
			 	</div>
			 </div>
			<div class="form-group">
			 	<label class="control-label col-sm-2" for="locality">Locality:</label>
			 	<div class="col-sm-10">
			 		<input type="text" name="locality" class="form-control" id="locality">
			 	</div> 
			 </div>
			 <div class="form-group">
			 	<label class="control-label col-sm-2" for="address">Address:</label>
			 	<div class="col-sm-10">
			 		<textarea name="address" class="form-control" rows="5" cols="40" id="address" placeholder="area and street" required></textarea>
			 	</div>
			 </div>
			 <div class="form-group">
			 	<label class="control-label col-sm-2" for="city">City:</label>
			 	<div class="col-sm-10">
			 		<input type="text" class="form-control" name="city" placeholder="city/district" id="city" required>
			 	</div>
			 </div>
			 <div class="form-group">
			 	<label class="control-label col-sm-2" for="state">State:</label>
			 	 <div class="col-sm-10">
			 		<input type="text" class="form-control" name="street" id="street" required>
			 	</div>
			 </div>
			 <div class="col-sm-5"></div>
			 <div class="col-sm-7"><input class="btn btn-primary addressbtn" type="submit" name="submit" value="Submit"></div>
		</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
</body>
</html>

<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$pincode=$_POST['pincode'];
		$locality=$_POST['locality'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$uid=$_SESSION['uid'];
		
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        echo"<script>alert('Only letters and white space allowed in name')</script>"; 
      	}
        else if(!preg_match('/^[0-9]{10}$/',$mobile)){
        echo"<script>alert('Invalid phone number')</script>"; 
    	 }
	    //  else if(!preg_match('/^[0-9]{6}$/',$pincode)){                          //pattern already mentionrd in input
	    //     echo"<script>alert('Invalid pin code')</script>"; 
	    // }
    	else{

    		include 'connect.php';
    		$sql="INSERT into address(name,mobile,pincode,locality,address,city,state,uid) values('$name','$mobile','$pincode','$locality','$address','$city','$state',$uid)";
    		if(mysqli_query($conn,$sql)){
    			if(isset($_GET['cart'])){
    				$sql="SELECT * from address where uid='$uid'";
    				$result=mysqli_query($conn,$sql);
    				while($row=mysqli_fetch_assoc($result)){
    					echo"<scipt>window.location='orders.php?cart=yes&aid=$row[aid]'</script>";
    				}
					
				}
				else if(isset($_GET['id'])) {
					$id=$_GET['id'];
					echo "<scipt>window.location='orders.php?id=$id'</script>";
				}
    		}
    		else{
    			echo "<script>alert('Error in adding address')</script>";
    		}
    	}
    
	}
?>