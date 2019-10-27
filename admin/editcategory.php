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
      <div class="col-sm-5">
     <?php
	include'connect.php';
	 $id=$_GET['cid'];
	 $sql = "SELECT * FROM category where cid='$id'";
	$result = mysqli_query($conn, $sql);


	$row = mysqli_fetch_assoc($result);
	?>
    <form class="editform" method="post" action="">
            <div class="form-group">
              <label>Category Name</label>
              <input class="form-control" type="text" value="<?php echo $row['name'];  ?>" name="cat" required autocomplete="off">
            </div>
              <input type="submit" class="btn btn-success" name="submit">
              <input type="submit" class="btn btn-danger" name="cancel" value="cancel">
               <?php
   
		if(isset($_POST["submit"])){

		$Cname=$_POST["cat"];
		$sql="SELECT * FROM category where name='$Cname'";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){ ?>

            <div class="col-sm-12">
                <div class="alert alert-danger fade in">
                  <a href="managecategory.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Category name already exists
                </div>
              </div>
         <?php }
         else
         {
		
		$sql="UPDATE category SET name='$Cname' where cid='".$_GET['cid']."'";
		if (mysqli_query($conn, $sql)) { 
          echo" <script>window.location='managecategory.php' </script>"; 
      }
      else
      {
        echo "error  " . mysqli_error($conn);
      }
		mysqli_close($conn);

	}
}
	if(isset($_POST['cancel'])){
		echo"<script>window.location='managecategory.php' </script>";
	}

    ?>

    </form>
  </div>
  <div class="col-sm-3"></div>
  </body>
</html>
