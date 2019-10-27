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
    <form class="addform" method="post" action="">
            <div class="form-group">
              <label>Category Name</label>
              <input class="form-control" type="text" name="name" required autocomplete="off">
            </div>
              <input type="submit" class="btn btn-primary" name="submit">
      <?php
        
        if(isset($_POST['submit'])){
          include 'connect.php';
          $cname=$_POST['name'];
          $sql="SELECT * FROM category where name='$cname'";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0){ ?>

            <div class="col-sm-12">
                <div class="alert alert-danger fade in">
                  <a href="managecategory.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Category already exists
                </div>
              </div>
         <?php }
         else
         {
          $sql="INSERT INTO category(name) values('$cname')";
          if(mysqli_query($conn,$sql)){ 
            ?>
              <div class="col-sm-12">
                <div class="alert alert-success fade in">
                  <a href="managecategory.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Category added
                </div>
              </div>
          <?php  }
          else{
          echo "Category could not be added".$sql."<br>".mysqli_error($conn);
        }
      }
    }
    ?>
    </form>
  </div>
  <div class="col-sm-3"></div>
  </body>
</html>
 