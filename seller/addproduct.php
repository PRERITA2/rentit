<?php
	require 'header.php';
?>

<!-- do not change name of class since it is used in stylesheet -->
	<div class="content">
		
		<div class="container">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h2>Add Product</h2>
					<!-- name of product -->
					<form method="post" action="" enctype="multipart/form-data">
						 <div class="form-group">
						    <label for="pname">Product Name:</label>
						    <input type="text" class="form-control" id="pname" name="name" required>
						  </div>
						<!-- select category from category list -->
						<div class="form-group">
						  <label for="cat">Category</label>
						  <select class="form-control" id="cat" name="category" required>  <!-- cat will be selected value -->
						  <?php
						  	require 'connect.php';
						  	$sql="SELECT * from category order by name"; 
						  	$result=mysqli_query($conn,$sql);
						  	while($row=mysqli_fetch_assoc($result)){
						    ?>
						  <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option> <!-- <option value="1">1</option> -->
						    <?php } 
						    ?>
						  </select><br>
						  <!-- duration -->
						  <div class="form-group">
						  	 <label for="fromdate">From Date</label>
						  	 <input type="date" name="fromdate" id="fromdate" class="form-control" required>
						  </div>
						  <div class="form-group">
						  	<label type="todate">To Date</label>
						  	<input type="date" name="todate" id="todate" class="form-control">
						  </div>
						  <!-- adding photo -->
						  <div class="form-group">
						  	<label for="photo">Photo</label>
						  	<input type="file" name="photo" class="form-control" required>
						  </div>
						  <div class="form-group">
						  	<label for="price">Price</label>
						  	<input type="number" name="price" class="form-control" required>
						  </div>
						<input type="submit" name="submit" class="btn btn-primary">
					</form>
					</div>
				
				<div class="col-sm-3"></div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		include 'connect.php';
		$name=$_POST['name'];
		$category=$_POST['category'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$price=$_POST['price'];
		 // taking the file and storing it in img folder
		 $file = rand(1000,100000)."-".$_FILES['photo']['name'];
  		 $file_loc = $_FILES['photo']['tmp_name']; //temporary file save
  							
         $file_size = $_FILES['photo']['size'];
         $file_type = $_FILES['photo']['type'];
       	 $folder="../img/";
         // new file size in KB
         $new_size = $file_size/1024;  
         // new file size in KB
         // make file name in lower case
         $new_file_name = strtolower($file);
                            // make file name in lower case
         $final_file=str_replace(' ','-',$new_file_name);//end photo end*/
         move_uploaded_file($file_loc,$folder.$final_file);
         
         $uid=$_SESSION['uid'];
         $sql="INSERT INTO product(name,category,fromdate,todate,photo,price,uid) VALUES('$name','$category','$fromdate','$todate','$final_file',$price,$uid);";
         if(mysqli_query($conn,$sql)){
         	echo"<script>alert('Product added Successfully') </script>";
         }  
         else{
         	echo"<script>alert('Product could not be added') </script>";
         } 
	}
?>