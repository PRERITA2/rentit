<?php
	require 'connect.php';
?>

<?php
	require 'header.php';
?>

	<div class="container">
		<div class="row">
			
			<div class="col-sm-8">
				
				
					<?php
						include 'connect.php';
						if(isset($_SESSION['uid'])){
							$uid=$_SESSION['uid'];
						$sql="SELECT * from product,cart where cart.id=product.id and cart.uid='$uid'";
						$result=mysqli_query($conn,$sql);
						if(mysqli_num_rows($result)==0){ ?>
				 			<div class="container">
                  				<div class="alert alert-danger fade in">
                  					<a href="cart.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   					No Products in cart 
                				</div>
              				</div>
					<?php	
						}
						else{ ?>
							<ul class="list-group cartlist">
								<li class="list-group-item"><h2 class="h">Cart</h2></li>
						<?php	while($row=mysqli_fetch_assoc($result))
							{
						?>		
								<li class="list-group-item">
								<div class="media m1">
    								<div class="media-left media-middle">
      									<img src="img/<?php echo $row['photo'] ?>" class="media-object" height="auto" width="300">
    								</div>
   			 						<div class="media-body">
      									<ul class="list-group ">
      										<li class="list-group-item"><h4 class="media-heading"><?php echo $row['name']?>
      										<span class="del"><a href="javascript:remove_from_cart(<?php echo $row['cartid']; ?>)"><i class="far fa-trash-alt" style="color:#f44336" data-toggle="tooltip" data-placement="remove" title="Delete"></i></a>
      										</span></h4>
      										</li>
      										<li class="list-group-item"><span>Category:</span> <?php echo $row['category']?></li>
      										<li class="list-group-item"><span>Duration:</span> <?php echo $row['fromdate']?> <span> To </span> <?php echo $row['todate']?> </li>
      										<li class="list-group-item"><span>Price:</span> <?php echo "₹".$row['price']?></li>
      										
      									</ul>
    								</div>
  								</div>
  								<hr>
  								</li>
  	
  					<?php } ?>
  							<li class="list-group-item orderbtn">
  					<a class="btn btn-danger ob" href="index.php">Continue shopping</a>
  					<a class="btn btn-primary ob" href="address.php?cartid=$row['cartid']">Place order</a>
  				</li>
			</ul>
				<?php	}
					
						} 
						
			else{
				echo "<script>window.location='login.php'</script>";
		}	
		?>
		</div>
	 <div class="col-sm-4 priceside">
	 	<ul class="list-group">
	 		<?php 	
	 			require 'connect.php';
	 			if(isset($_SESSION['uid'])){
		 			$uid=$_SESSION['uid'];
		 			$sql="SELECT count(cart.cartid) as nitems,sum(product.price) as tprice from cart,product where cart.uid=$uid and cart.id=product.id";
		 			$result=mysqli_query($conn,$sql);
		 			if(mysqli_num_rows($result)>0 ){
		 				while($row=mysqli_fetch_assoc($result)){ 
		 					if($row['nitems']!=0){
		 					?>
		 					<li class="list-group-item"><h4><?php echo "Total items in cart:   ".$row['nitems'] ?></h4></li>
		 					<li class="list-group-item"><h4><?php echo "Total price:   ₹".$row['tprice']?></h4></li>
		 				<?php	
		 					}
		 				}	
		 		  	}
	 			}
	 			else{
	 				echo "<script>window.location='login.php'</script>";
	 			}
	 			?>
	 	</ul>
	 </div>
	</div>
</div>
</body>
</html>
