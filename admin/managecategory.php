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
				        <th>Category</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php
							include 'connect.php';
							$sql="SELECT * from category order by name";
							$result=mysqli_query($conn,$sql);
							$si=1;
							while($row=mysqli_fetch_assoc($result)){
								
								  ?><tr>
								  	<td><?php echo $si;   ?>
								  	<td><?php echo $row['name']; ?>
								  	<td><a href=<?php echo "editcategory.php?cid=$row[cid]";?>>
								  		<i class="far fa-edit" style="color:#5C6BC0" data-toggle="tooltip" title="Edit"></i></a>
								  		<a href="javascript:delete_data(<?php echo $row['cid']; ?>)">
								  			<i class="far fa-trash-alt" style="color:#f44336" data-toggle="tooltip" title="Delete"></i></a>
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


</body>
</html>