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
include 'config.php';
$cat_id=htmlspecialchars($_REQUEST['cat_id']);

$read_query="SELECT * FROM user_category WHERE User_category_id='$cat_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
      $cat_id=htmlspecialchars($row[0]);
      $cat_name=htmlspecialchars($row[1]);
      $but_name_list=htmlspecialchars($row[2]);
      $but_list=htmlspecialchars($row[3]);

}

if(isset($_REQUEST['edit_user_category'])) 
{
   $cat_name=input("cat_name");
   $but_name_list=input("but_name_list");
   $but_list=filter(input("but_list"));
   $update_query="UPDATE user_category SET Name='$cat_name',Button_name_list='$but_name_list',Button_list='$but_list' WHERE User_category_id='$cat_id'";
   $update=mysqli_query($connection,$update_query);
   if($update) 
   {
     header("location:user_category.php");
    }
}




if(isset($_REQUEST['del_cat_id'])) 
{
   $cat_id=htmlspecialchars($_REQUEST['del_cat_id']);
   $delete_query="DELETE FROM user_category WHERE User_category_id=$cat_id;";
   $delete=mysqli_query($connection,$delete_query);
   if($delete) 
   {
     header("location:user_category.php");
    }
}


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

    $("").addClass("");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




<div class="my-h-center w3-white w3-mobile">

<form class=" w3-center" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left w3-text-red">Category Name(User look)</h6>
<div class="w3-container">
<input required type="text" name="cat_name" value="<?php echo $cat_name; ?>" class="w3-block w3-border"></div>
<br>




<h6 class="w3-left w3-margin-left w3-text-red">Button Name List(examp:name,name,name)</h6>
<div class="w3-container">
<input required type="text" name="but_name_list" value="<?php echo $but_name_list; ?>" class="w3-block w3-border"></div>
<br>



<h6 class="w3-left w3-margin-left w3-text-red">Link C. List(examp:1,3,7)</h6>
<div class="w3-container">
<input required type="text" name="but_list" value="<?php echo $but_list; ?>" class="w3-block w3-border"></div>
<br>






<div class="w3-container w3-center">
<input type="submit" value="Save" name="edit_user_category" class="w3-button w3-hover-red w3-green">
<input type="hidden" value="<?php echo $cat_id; ?>" name="cat_id">
</div><br>


</form>

</div>




</body>
</html>