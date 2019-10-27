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
			<div class="col-sm-3"></div>
			<div class="col-sm-4 admin-profile">
				
				<ul class="list-group">
					<li class="list-group-item"><h2>Admin Profile</h2></li>
					<?php
						include 'connect.php';
						$email=$_SESSION['email'];
						$sql="SELECT * from signup where email='$email' ";
						$result=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($result)) { ?>
							<li class="list-group-item"><span>Name:  </span><?php echo $row['fname']; echo " ";echo $row['lname'] ?></li>
							<li class="list-group-item"><span>Email: </span><?php echo $row['email'] ?></li>
							<li class="list-group-item"><span>Mobile: </span><?php echo $row['mobile'] ?></li>
					<?php
						} ?>
				</ul>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	
</body>
</html>