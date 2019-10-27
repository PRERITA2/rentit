
  <?php
  include'connect.php';
    $sql="UPDATE login set status=0 where uid='".$_GET['uid']."'";
    if(mysqli_query($conn,$sql)){
       echo" <script>window.location='userlist.php' </script>"; 

    }
    else{
      echo "Not approved".mysqli_error($conn);
    }
  ?>

  
