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
      $("#book_info").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">

                               <!--Search bar start -->
<div class="w3-bar w3-center w3-mobile">    
<input type="text" class=" 3-bar-item w3-large" placeholder="Search by Typing" oninput="w3.filterHTML('#box','.item',this.value)">
</div> 



<form method="post" class=" my-h-center w3-mobile">
<div class="w3-panel w3-center">
<select class="w3-select w3-border" name="c_name">
<option value=" " disabled selected>Search by Category</option>
<option value="all">All</option>
<?php
include 'config.php';
$read_query="SELECT * FROM category";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
     $cat_id=htmlspecialchars($row[0]);
     $cat_name=htmlspecialchars($row[1]);

?>
<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
<?php
}
?>


</select>
<input type="submit" name="search_" value="Search" class="w3-button w3-green">
</div>
</form>


   <!--Search bar end -->

<div class="w3-container">
<div class="w3-bar">
<a href="add_book.php" class="w3-bar-item w3-right w3-red w3-hover-green">Add Book</a>
</div>
</div>

<div class="" style="overflow-x:auto;">
<table id="box" class="w3-table-all">
<tr>
<th>Serial Number</th>
<th>Book Id</th>
<th>Image</th>
<th>title</th>
<th>Author</th>
<th>Published</th>
<th>Price</th>
<th>Final Price</th>
<th>Category</th>
<th>Available</th>
<th>Ordered</th>
<th>Company</th>
<th>Del. Charge</th>
<th>Rating</th>
<th>Keyword</th>
<?php if(isset($_SESSION['admin'])) {  ?><th>Delete</th><?php }  ?>
<th>Edit</th>
</tr>

<?php
include 'config.php';

if(isset($_REQUEST['search_'])) { //If search by category
 if(!empty($_REQUEST['c_name'])) { $cat_id=htmlspecialchars($_REQUEST['c_name']);
  if($cat_id=='all') { $read_query="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id ORDER BY Book_id DESC";} else {
  $read_query="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id  WHERE Category='$cat_id' ORDER BY Book_id DESC";} //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
  $result=mysqli_query($connection,$read_query);  
  } 
} else { 
 $read_query="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id ORDER BY Book_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
 $result=mysqli_query($connection,$read_query); }
 $s_r=1;
 while($row=mysqli_fetch_row($result)) {
           $book_id=htmlspecialchars($row[0]);
           $book_pic=htmlspecialchars($row[1]);
           $book_title=htmlspecialchars($row[2]);
           $book_author=htmlspecialchars($row[3]);
           $book_published=htmlspecialchars($row[4]);
           $book_price=htmlspecialchars($row[5]);
           $disc=htmlspecialchars($row[6]);
           $f_price=htmlspecialchars($row[7]);
           $cat_id=htmlspecialchars($row[8]);
           $book_avail=htmlspecialchars($row[9]);
           $book_ordered=htmlspecialchars($row[10]);
           $com_name=htmlspecialchars($row[11]);
           $d_charge=htmlspecialchars($row[12]);
           $rating=htmlspecialchars($row[13]);
           $keyword=htmlspecialchars($row[14]);
           $cat_name=htmlspecialchars($row[16]);
           
           
?>
<tr class="item">
<td><?php echo $s_r; ?></td>
<td><?php echo $book_id; ?></td>
<td><img src="uploads/<?php echo $book_pic; ?>" style="width:40px;"></td>
<td><?php echo $book_title; ?></td>
<td><?php echo $book_author; ?></td>
<td><?php echo $book_published; ?></td>
<td><?php echo $book_price;echo "(-".$disc."%)"; ?></td>
<td><?php echo $f_price; ?></td>
<td><?php echo $cat_name; ?></td>
<td><?php echo $book_avail; ?></td>
<td><?php echo $book_ordered; ?></td>
<td><?php echo $com_name; ?></td>
<td><?php if($d_charge==2) { echo "Free"; } else if($d_charge==1) { echo "Not Free"; } ?></td>
<td><?php echo $rating; ?></td>
<td><?php echo $keyword; ?></td>

<?php if(isset($_SESSION['admin'])) { ?><td><a class="w3-text-red" href="delete_book.php?book_id=<?php echo $book_id; ?>&cat_id=<?php echo $cat_id; ?>&book_pic=<?php echo $book_pic; ?>" onclick="return confirm('Are you sure??')">Remove</td><?php } ?>
<td><a href="edit_book.php?book_id=<?php echo $book_id; ?>&book_pic=<?php echo $book_pic; ?>&cat_id=<?php echo $cat_id; ?>">edit</td>
</tr>
<?php
$s_r++;
 }


 ?>
 </table>
</div>



</body>
</html>



