<?php
session_start();
ob_start();
include 'header.php';
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="W3.CSS.css">
<script src="W3.JS.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<meta charset="utf-8">
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
  background: #0F8E7A; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #153C4D; 
}
@media screen and (max-width:290px) {
  .my-mobile {
     width:100%;
  }
}
</style>
<script>   //jquery goes here
  $(document).ready(function(){
 
// $("#").addClass("w3-dark-gray");
 $("#logo2").hide();

});

</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




        <!-- Book show start -->


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
<th>Edit</th>
</tr>

<?php
include 'config.php';
$cat_id=$_REQUEST['cat_id'];
$read_query2="SELECT * FROM Book_info LEFT JOIN category ON category.Category_id=Book_info.Category WHERE Book_info.Category='$cat_id' ORDER BY Book_id DESC";
$result2=mysqli_query($connection,$read_query2);
$s_r=0;
while($row=mysqli_fetch_row($result2)) {
     
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
           $cat_name=htmlspecialchars($row[12]);
           $s_r++;




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
<!--<td><a href="delete_book.php?book_id=<?php //echo $book_id; ?>&cat_id=<?php //echo $cat_id; ?>&book_pic=<?php// echo $book_pic; ?>" onclick="return confirm('Are you sure??')">Remove</td> -->
<td><a href="edit_book.php?book_id=<?php echo $book_id; ?>&book_pic=<?php echo $book_pic; ?>&cat_id=<?php echo $cat_id; ?>">edit</td>
</tr>
       
<?php
   }


?>

 </table>
</div> 
  <!-- Book show end-->







<?php
//include 'footer.php';
?>
</body>
</html>