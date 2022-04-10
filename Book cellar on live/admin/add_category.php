<?php
session_start();
ob_start();
session_regenerate_id();
include 'header.php';

?>

<?php

if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}


?>











<?php

                        //Collecting data
include 'config.php';

if(isset($_REQUEST['add'])) {
    if(!empty($_REQUEST['cat_name'])) {
      $cat_name=ucfirst(mysqli_real_escape_string($connection,$_REQUEST['cat_name']));

      $insert_query="INSERT INTO category (Category_name,No_of_book) VALUES ('$cat_name',0)";
      $send=mysqli_query($connection,$insert_query) or die("Failed");
   if(!$send) { mysqli_error();} 
    }
}




?>

<!DOCTYPE html>
<html>

<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="W3.CSS.css">
<script src="W3.JS.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<style>
  .my-h-center { display: block; margin-left:auto;margin-right:auto;width:30%}
</style>
<script>   //jquery goes here
  // 2nd query start




  $(document).ready(function(){

    $("").addClass("");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




<div class="my-h-center w3-white w3-mobile">

<form class=" w3-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left">Category Name(English/বাংলা)</h6>
<div class="w3-container">
<input type="text" name="cat_name" class="w3-block w3-border"></div>
<br>




<div class="w3-container w3-center">
<input type="submit" value="Add Category" name="add" class="w3-button w3-hover-red w3-green">
</div><br>


</form>

</div>




</body>
</html>