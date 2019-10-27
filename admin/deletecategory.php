<?php 
  include'connect.php';
  $sql = "DELETE from category where cid='".$_GET['cid']."'";

    if (mysqli_query($conn, $sql)) {   
       // <!--  echo "Category deleted successfully"; -->
        echo" <script>window.location='managecategory.php' </script>"; 
        
      }
      else
      {
        echo "error " . mysqli_error($conn);
      }

?>