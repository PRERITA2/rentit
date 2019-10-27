<?php 
  include'connect.php';
  $sql = "DELETE from cart where cartid='".$_GET['cartid']."'";

    if (mysqli_query($conn, $sql)) {   
       // <!--  echo "Category deleted successfully"; -->
        echo" <script>window.location='cart.php' </script>"; 
        
      }
      else
      {
        echo "error " . mysqli_error($conn);
      }

?>