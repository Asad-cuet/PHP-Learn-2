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
if(!isset($_SESSION['admin'])) {
    header("location:logout.php");
}


?>











<?php

                        //Collecting data
include 'config.php';
$rec_cat_id=htmlspecialchars($_REQUEST['cat_id']);
$read_query="SELECT * FROM category WHERE Category_id='$rec_cat_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
  $cat_name_old=$row[1];
}

//Updating
if(isset($_REQUEST['Update_'])) {
      
    if(!empty($_REQUEST['cat_name_new'])) {
      $cat_name_new=ucfirst(mysqli_real_escape_string($connection,$_REQUEST['cat_name_new']));
      
      $update_query="UPDATE category SET Category_name='$cat_name_new' WHERE Category_id='$rec_cat_id'";
      $update=mysqli_query($connection,$update_query) or die("Failed");
   if(!$update) { mysqli_error();} else { header("location:category.php"); }
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
      <h3>Edit Category Name</h3>

<form class=" w3-center" method="post" action="edit_category.php?cat_id=<?php echo $rec_cat_id; ?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left">Category Name(English/বাংলা)</h6>
<div class="w3-container">
<input type="text" value="<?php echo $cat_name_old; ?>" name="cat_name_new" class="w3-block w3-border"></div>
<br>




<div class="w3-container w3-center">
<input type="submit" value="Update" name="Update_" class="w3-button w3-hover-red w3-green">

</div><br>


</form>

</div>




</body>
</html>