<?php
	require 'header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4 customer-profile">
			<ul class="list-group">
				<li class="list-group-item"><h2>Profile</h2></li>
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