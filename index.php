<?php
    require 'header.php';
?>
 
    <!--Categories select form and search button and filtering products based on Categories-->
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <form class="form-inline" action="" method="post">
          <div class="form-group">
            <label for="catgory"></label>
            <select class="form-control " id="category" name="category">
              <option selected>Select category</option>
              <option value="All">All Categories</option> 
              <?php
                include 'connect.php';
                $sql="SELECT name from category order by name";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                  echo "<option value=".$row['name'].">".$row['name']."</option>";
                }
              ?>
            </select>
             
            <input type="submit" class="btn btn-primary search" value="search" name="search">
          </div>
          <?php 
            if(isset($_POST['search']))
            {
                $Category=$_POST['category'];
            }
          ?>                         
            
        </form>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
  


<div class="container">    
  <div class="row">
    <?php
      include 'connect.php';
      if(empty($Category) || $Category=='All' ){
        $sql="SELECT * from product where approved=1";
      }
      else
      {
        $sql="SELECT * from product where approved=1 and category='$Category'";
      }
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)==0){
        // echo "No products available in this category";
     ?>
        <div class="container">
          <div class="alert alert-danger fade in">
            <a href="index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              No products available in this category
          </div>
        </div>
    <?php  
    }
      else{
          while($row=mysqli_fetch_assoc($result))
          {
  
          ?>
            <div class="col-sm-3">
    
                <div class="panel panel-danger">
                    <div class="panel-heading"></div>
                    <div class="panel-body"><a href=<?php echo "productdetails.php?id=$row[id]"?> ><img class='img-responsive img-thumbnail stretched-link im' src="img/<?php echo $row['photo']?>"></a></div>

                    <div class="panel-footer">
                     <a class="price stretched-link" href=<?php echo "productdetails.php?id=$row[id]" ?>> 
                      <?php echo "₹".$row['price']; ?></a>
                      <br>
                      
                      <a class="name stretched link" href=<?php echo "productdetails.php?id=$row[id]" ?>> 
                        <?php echo $row['name']; ?></a>
                       <?php 
                       if(isset($_SESSION["uid"])){ ?> 
                          <a class=" btn btn-danger cartbtn" href=<?php echo "addtocart.php?id=$row[id]" ?>>Add to Cart </a>
                    <?php }
                        else{ ?>
                          <a class="btn btn-danger cartbtn" href=<?php echo "login.php?cart=yes&id=$row[id]" ?>>Add to Cart</a>
                    <?php  }
                       ?>
                  </div></div></div>
          <?php 
  
            }}  //end of while and else
          ?>
      </div>
    </div>
<br>
</body>


  
  
  