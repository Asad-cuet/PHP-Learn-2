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
/* width */
::-webkit-scrollbar {
  width: 13px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #5D85A4; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #153C4D; 
}
.my-fixed { position:fixed; right:20px;top:20px;}
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #5D85A4; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #153C4D; 
}
  .my-h-center { display: block; margin-left:auto;margin-right:auto;width:30%}
</style>
<script>   //jquery goes here
  // 2nd query start




  $(document).ready(function(){


      $("#cat").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




<div class="w3-container">
<div class="w3-bar">
<a href="add_category.php" class="w3-bar-item w3-right w3-red w3-hover-green">Add Category</a>
</div>
</div>



<div class="" style="overflow-x:auto;">
<table class="w3-table-all">
<tr>
<th>Serial Number</th>
<th>Category Id</th>
<th>Category Name</th>
<th>No. of Book</th>
<th>View Book</th>
<th>Edit</th>
</tr>

<?php
include 'config.php';
 $read_query="SELECT * FROM category";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
 $result=mysqli_query($connection,$read_query);
 $s_r=1;
 while($row=mysqli_fetch_row($result)) {
       $cat_id=htmlspecialchars($row[0]);
       $cat_name=htmlspecialchars($row[1]);
       $no_book=htmlspecialchars($row[2]);
       

?>
<tr class="w3-hover-dark-gray">
<td><?php echo $s_r; ?></td>
<td><?php echo $cat_id; ?></td>
<td><?php echo $cat_name; ?></td>
<td><?php echo $no_book; ?></td>
<td><a href="category_sin.php?cat_id=<?php echo $cat_id; ?>" class="w3-text-red">View</a></td>
<td><a href="edit_category.php?cat_id=<?php echo $cat_id; ?>" class="w3-text-red">Edit</a></td>
</tr>
<?php
$s_r++;
 }
 ?>
 </table>
</div>



</body>
</html>