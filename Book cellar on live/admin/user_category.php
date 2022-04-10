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

include 'config.php';

?>





<!DOCTYPE html>
<html>
<title>W3.CSS</title>
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
      $("#use-cat").addClass("w3-dark-gray");
      $("#use-cat0").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">





<div class="w3-container">
<div class="w3-bar">
<a href="add_user_category.php" class="w3-bar-item w3-right w3-red w3-hover-green">Add User look Category</a>
</div>
</div>




<div style="overflow-x:auto;">
<table class="w3-table-all" style="overflow-x:scroll">
<tr>

<th>User-side Category ID</th>
<th>Category Name(user look)</th>
<th>Button Name list</th>
<th>Linked Category list</th>
<th>Edit</th>
<?php if(isset($_SESSION['admin'])) {  ?><th>Delete</th><?php }  ?>


</tr>

<?php


$read_query="SELECT * FROM user_category";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
   $cat_id=htmlspecialchars($row[0]);
   $cat_name=htmlspecialchars($row[1]);
   $but_name_list=htmlspecialchars($row[2]);
   $but_list=htmlspecialchars($row[3]);


   ?>

<tr>
<td><?php echo $cat_id; ?></td>
<td><?php echo $cat_name; ?></td>
<td><?php echo $but_name_list; ?></td>
<td><?php echo $but_list; ?></td>
<td><a class="w3-text-red" href="edit_user_category.php?cat_id=<?php echo $cat_id; ?>">Edit</a></td>
<?php if(isset($_SESSION['admin'])) {  ?><td><a class="w3-text-red" href="edit_user_category.php?del_cat_id=<?php echo $cat_id; ?>" onclick="return confirm('Are you sure??')">Remove</a></td><?php }  ?>


</tr>

<?php

}
 ?>
 </table>
</div>










</body>
</html>