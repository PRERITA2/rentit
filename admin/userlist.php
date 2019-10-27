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
					<a href="disableuser.php" class="list-group-item">
						<h2 class="list-group-item-heading"><i class="fas fa-ban" style="color:#AB47BC "></i></h2>
						<p class="list-group-item-text d">Disable<br>User</p>
					</a>

				</div>
			</div>
			<div class="col-sm-11">
				<h2>User List</h2>

				<input type="text" id="myInput" onkeyup="javascript:search_user()" placeholder="Search for first names.." title="Type in a name">
				<div class="table-responsive">          
				  <table class="table table-hover table1" id="myTable">
				    <thead>
				      <tr class="header">
				        <th>Sl No</th>
				        <th>First Name</th>
				        <th>Last Name</th>
				        <th>Email</th>
				        <th>Mobile</th>
				        <th>Block</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
							include 'connect.php';
							$sql="SELECT * from login,signup where login.email=signup.email and (login.usertype='Seller' or login.usertype='Customer') and login.status=1";
							$result=mysqli_query($conn,$sql);
							$si=1;
							while($row=mysqli_fetch_assoc($result)){
								
								  ?><tr>
								  	<td><?php echo $si;   ?>
								  	<td><?php echo $row['fname']; ?>
								  	<td><?php echo $row['lname']; ?>
								  	<td><?php echo $row['email']; ?>
								  	<td><?php echo $row['mobile']; ?>
								  	
								  	<td><a href="javascript:disable_user(<?php echo $row['uid']; ?>)">
								  		<i class="fas fa-ban" style="color:#AB47BC" data-toggle="tooltip" title="Block"></i></a>
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