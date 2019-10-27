<?php 
require 'header.php';
?>

<div class="container">
	<div class="row">      <!-- 1st id is the newly defined php variable.2nd id is the id=1 sent in url --> 
		<?php 
			include 'connect.php';
			$id=$_GET['id'];         //gets id of product from url which was sent through link from index page
			$sql="SELECT * from product,login,signup where product.id=$id and product.uid=login.uid and login.email=signup.email"; //here id is the column in product table..and $id is the php variable defined above
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 0){
				echo "Product currently not available";
			}
			else{
				 while($row=mysqli_fetch_assoc($result)){   ?>

					<div class="col-sm-6">
						<img src="img/<?php echo $row['photo'] ?>" class="rounded mx-auto d-block img-thumbnail img-responsive displayimg">
						<br>
						
					</div>
					<div class="col-sm-6 details">
						<h2 class="details-heading">Product Details</h2>
						<ul class="list-group">
							<li class="list-group-item">
								<span>Name: </span> <?php echo $row['name'] ?>
							</li>
							<li class="list-group-item">
								<span>Category: </span> <?php echo $row['category'] ?>
							</li>
							<li class="list-group-item">
								<span>Duration: </span> <?php echo $row['fromdate'] ?> <span> To </span> <?php echo $row['todate'] ?>
							</li>
							<li class="list-group-item">
								<span>Price: </span> <?php echo "₹".$row['price'] ?>
							</li>
							<li class="list-group-item">
							<?php	
								if(isset($_SESSION["uid"])){ ?> 
                          			<a class="btn btn-danger cart" href=<?php echo "addtocart.php?id=$row[id]" ?>>Add to Cart </a>
                          			<a class="btn btn-primary buy" href=<?php echo "address.php?id=$row[id]" ?>>Buy Now </a>
                    		<?php }
                        		else{ ?>
                          			<a class="btn btn-danger cart" href=<?php echo "login.php?cart=yes&id=$row[id]" ?>>Add to Cart</a>
                          			<a class="btn btn-primary buy" href=<?php echo "login.php?buy=yes&id=$row[id]" ?>>Buy Now </a>
                    		<?php  }
                       		?>
							
							</li>
						</ul>
						<h3 class="details-heading2">Seller Details</h3>
						<ul class="list-group">
							<li class="list-group-item">
								<span>Seller Name: </span> <?php echo $row['fname']; echo " "; echo $row['lname']  ?>
							</li>
							<li class="list-group-item">
								<span>Mobile: </span> <?php echo $row['mobile'] ?>
							</li>
						</ul>
					</div>
		<?php   
				}
			}
		?>
		
	</div>
</div>
</body>
</html>
