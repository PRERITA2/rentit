<?php
	require 'header.php';
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
			<div class="col-sm-9">
				<div class="col-sm-4">
					<div class="list-group l">
  						<a href="adminprofile.php" class="list-group-item ">
    						<h1 class="list-group-item-heading"><i class="fas fa-user-shield" style="color:#EC407A"></i></h1>
   							<p class="list-group-item-text">Admin<br>Profile</p>
  						</a>
					</div>
					<div class="list-group l">
  						<a href="viewapprove.php" class="list-group-item ">
    						<h1 class="list-group-item-heading"><i class="fas fa-thumbs-up" style="color:#ef5350"></i></i></h1>
   							<p class="list-group-item-text">Approve<br>rent</p>
  						</a>
					</div>
				</div>

                <div class="col-sm-4 ">
					<div class="list-group l">
  						<a href="managecategory.php" class="list-group-item ">
    						<h1 class="list-group-item-heading"><i class="fas fa-edit" style="color:#42A5F5"></i></h1>
   							<p class="list-group-item-text">Manage<br>Categories</p>
  						</a>
					</div>
					<div class="list-group l">
  						<a href="userlist.php" class="list-group-item ">
    						<h1 class="list-group-item-heading"><i class="fas fa-ban" style="color:#AB47BC "></i></i></h1>
   							<p class="list-group-item-text">Disable<br>user</p>
  						</a>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="list-group l">
  						<a href="addcategory.php" class="list-group-item ">
    						<h1 class="list-group-item-heading"><i class="fas fa-plus" style="color:#66BB6A"></i></h1>
   							<p class="list-group-item-text">Add<br>category</p>
  						</a>
					</div>
				</div>
			</div>
			
			<div class="col-sm-2">
				<div class="panel panel-danger pan">
					<div class="panel-heading"><h4>Total users<h4></div>
					<div class="panel-body">
						<p><i class="fas fa-users" style="color:#7B1FA2"></i><p>
						<div>
							<?php
								 require 'connect.php';
							 	$sql="SELECT (count(uid)-1) as tusers from login";
							 	
							 	$result=mysqli_query($conn,$sql);
										
								while($row=mysqli_fetch_assoc($result)){
									echo  $row['tusers'];
								}
							?>
					    </div>
					</div>
				</div>
				<div class="panel panel-danger pan">
					<div class="panel-heading "><h4>Total Products<h4></div>
					<div class="panel-body">
						<p><i class="fas fa-shopping-basket" style="color:#00796B"></i><p>
						<div>
							<?php
								 require 'connect.php';
							 	$sql="SELECT count(id) as tproduct from product";
							 	
							 	$result=mysqli_query($conn,$sql);
										
								while($row=mysqli_fetch_assoc($result)){
									echo  $row['tproduct'];
								}
							?>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>