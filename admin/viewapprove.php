<?php require 'header.php';
?>
	<div class="container-fluid ">
		<div class="row">
			<div class="col-sm-1 ">
				<div class="list-group sidebar" >
					<a href="adminprofile.php" class="list-group-item">
						<h2 class="list-group-item-heading"><i class="fas fa-user-shield" style="color:#EC407A"></i></h2>
						<p class="list-group-item-text d">Profile</p>
					</a>
					<a href="managecategory.php" class="list-group-item">
						<h2 class="list-group-item-heading"><i class="fas fa-edit" style="color:#42A5F5"></i></h2>
						<p class="list-group-item-text d">Manage<br>Category</p>
					</a>

					<a href="addcategory.php" class="list-group-item">
						<h2 class="list-group-item-heading"><i class="fas fa-plus" style="color:#66BB6A"></i></h2>
						<p class="list-group-item-text d">Add<br>Category</p>
					</a>
					<a href="viewapprove.php" class="list-group-item">
						<h2 class="list-group-item-heading"><i class="fas fa-thumbs-up" style="color:#ef5350"></i></h2>
						<p class="list-group-item-text d">Approve<br>Rent</p>
					</a>
					<a href="userlist.php" class="list-group-item">
						<h2 class="list-group-item-heading"><i class="fas fa-ban" style="color:#AB47BC "></i></h2>
						<p class="list-group-item-text d">Disable<br>User</p>
					</a>

				</div>
			</div>
			<div class="col-sm-11">
				<div class="table-responsive">          
				  <table class="table table-hover table1">
				    <thead>
				      <tr>
				        <th>Sl No</th>
				        <th>Product</th>
				        <th>Category</th>
				        <th>From</th>
				        <th>To</th>
				        <th>Photo</th>
				        <th>Price</th>
				        <th>Approve</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
							include 'connect.php';
							$sql="SELECT * from product where approved=0";
							$result=mysqli_query($conn,$sql);
							$si=1;
							while($row=mysqli_fetch_assoc($result)){
								
								  ?><tr>
								  	<td><?php echo $si;   ?>
								  	<td><?php echo $row['name']; ?>
								  	<td><?php echo $row['category']; ?>
								  	<td><?php echo $row['fromdate']; ?>
								  	<td><?php echo $row['todate']; ?>
								  	
								  	<td><img src="../img/<?php echo $row['photo'];?>" class="img-responsive" height="150" width="150">
								  	<td><?php echo $row['price']; ?>

								  	<td><a href="javascript:approve_product(<?php echo $row['id']; ?>)">
								  		<i class="far fa-thumbs-up" style="color:#5C6BC0" data-toggle="tooltip" title="Approve"></i></a>
								  		<a href="#">
								  			<i class="far fa-thumbs-down" style="color:#f44336" data-toggle="tooltip" title="Disapprove"></i></a>
								  	</td>
								  	</tr>
								  <?php
								$si++;
								
					       } 
				      ?>
				    </tbody>
				  </table>
				</div>
			</div>
		</div>
	</div>
</script>

</body>
</html>