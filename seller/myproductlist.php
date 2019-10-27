<?php
require 'header.php';
?>
<!-- content has been used for styling in css file...very important to include here. it modifies the content when phone screen is reached-->
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-7">
				<h2 class="h">My Product List</h2>
		<?php
		include 'connect.php';
		$uid=$_SESSION['uid'];
		$sql="SELECT * from product where uid='$uid'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0){ ?>
				 <div class="container">
                <div class="alert alert-danger fade in">
                  <a href="myproductlist.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   No Products 
                </div>
              </div>
		<?php	
			}
		else{
			while($row=mysqli_fetch_assoc($result))
			{
				?>
		<div class="media m1">
    		<div class="media-left media-middle">
      			<img src="../img/<?php echo $row['photo'] ?>" class="media-object" height="auto" width="300">
    		</div>
   			 <div class="media-body">
      			<h4 class="media-heading"><?php echo $row['name']?></h4>
      			<ul class="list-group ">
      				<li class="list-group-item"><span>Category:</span> <?php echo $row['category']?></li>
      				<li class="list-group-item"><span>Duration:</span> <?php echo $row['fromdate']?> <span> To </span> <?php echo $row['todate']?> </li>
      				<li class="list-group-item"><span>Price:</span> <?php echo "₹".$row['price']?></li>
      				
      					<?php if($row['approved']==1){ ?>
      						<li class="list-group-item-success"><span>Approved:</span>
      					<?php echo "Yes";
      					}
      					else{ ?>
      						<li class="list-group-item-danger"><span>Approved:</span>
      					<?php	echo "No";
      					}?>
      			   </li>
      			</ul>
    		</div>
  		</div>
  		<hr>
  	<?php }
		}
		?>
		</div>
	 <div class="col-sm-2"></div>
	</div>
	</div>
</div>