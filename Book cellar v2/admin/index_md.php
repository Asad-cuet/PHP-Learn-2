<?php
session_start();
ob_start();
if(isset($_SESSION['username'])) {   // If already Logged In
  header("location:post.php");
}


?>




<?php                                          // PHP Area start

   function input_filter($data)
   {
      $data=trim($data);
      $data=stripslashes($data);
       $data=htmlspecialchars($data);
       return $data;
   }
   function filter($data)
   {
      global $connection;
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      $data=escapeshellcmd($data);
      $data=mysqli_real_escape_string($connection,$data);
      return $data;
  }
if(isset($_REQUEST['log_in'])) {
    include 'config.php';
    $admin_user=filter(filter(filter(input_filter(mysqli_real_escape_string($connection,$_REQUEST['admin_user'])))));
    $admin_user=filter(filter_var($admin_user,FILTER_SANITIZE_STRING));
    $admin_pass=filter(filter(input_filter(mysqli_real_escape_string($connection,$_REQUEST['admin_pass']))));
    $admin_pass=filter(filter_var($admin_pass,FILTER_SANITIZE_STRING));
    $admin_pass=md5(md5($admin_pass));

    $verify_query="SELECT * FROM user WHERE Username='$admin_user' AND Password='$admin_pass'";
    if($stmt=mysqli_prepare($connection,$verify_query))
    {
        mysqli_stmt_bind_param($stmt,"ss",$admin_user,$admin_pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)==1)
        {

            
          $_SESSION['username']=1;
          $read_query="SELECT * FROM user WHERE Username='$admin_user'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
          $result=mysqli_query($connection,$read_query);
          while($row=mysqli_fetch_row($result)) 
          {
            $id=$row[0];
              
          }
          if($id==2) { $_SESSION['admin']=1; }
          header("location:post.php");            
            
        }
        else
        {
            echo"<script>alert('Invalid Username or Password');</script>";
        }
        mysqli_stmt_close($stmt);
    }
    else
    {
        echo"<script>alert('SQL Query cannot be prepared');</script>";
    }   
/*  $verify=mysqli_query($connection,$verify_query) or die("Query Failed");
    if(mysqli_num_rows($verify)>0) {
        while($row=mysqli_fetch_row($verify)) {

          $_SESSION['username']=$row[0];
          header("location:post.php");

        }
    }
  else
  {
      echo"<script>alert('Invalid Username or Password');</script>";
  }   */

    
    
}





                                                     // PHP Area close
?>






<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="W3.CSS.css">
<script src="W3.JS.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<style>
  .my-h-center { display: block; margin-left:auto;margin-right:auto;width:30%}
</style>
<script>   //jquery goes here
  // 2nd query start




  $(document).ready(function(){
    //  $("#book_info").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">
<div class="w3-center w3-panel">
<h1><a href="../index.php">Book Cellar</a></h1>
</div>

<div class="my-h-center w3-white w3-mobile">
<div class="w3-teal w3-padding w3-container">
<h3>Admin</h3>
</div>

<form class=" w3-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left">Username</h6>
<div class="w3-container">
<input type="text" name="admin_user" class="w3-block w3-border"></div>
<br>



<h6 class="w3-left w3-margin-left">Password</h6>
<div class="w3-container">
<input type="password" name="admin_pass" class="w3-block w3-border"></div>
<br>



<div class="w3-container w3-center">
<input type="submit" value="Login" name="log_in" class="w3-button w3-hover-red w3-green">
</div><br>


</form>

</div>



</body>
</html>