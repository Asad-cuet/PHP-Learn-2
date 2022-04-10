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
             // Collecting data
             
                          
                    if(isset($_REQUEST['notice']))
        {
                    include 'config.php';
                    $msg=input("notice_input");
                   $msg=mysqli_real_escape_string($connection,$msg);
                    $insert_query="INSERT INTO notice (Notice_msg) VALUES ('$msg')";
                   $send=mysqli_query($connection,$insert_query) or die("Notice insert failed");
            
        }
          
          
             if(isset($_REQUEST['trending'])) {
                    include 'config.php';
                   $book_id=filter(mysqli_real_escape_string($connection,$_REQUEST['id']));
                   $check_query="SELECT Book_id FROM Book_info WHERE Book_id='$book_id'";
                   $check=mysqli_query($connection,$check_query) or die(" Check query failed");
                   $count=mysqli_num_rows($check);
                   if ($count>0)  {                            
             $insert_query="INSERT INTO trending (Book_id) VALUES ('$book_id')";
             $send=mysqli_query($connection,$insert_query);
            }
          }


             // Collecting data
             if(isset($_REQUEST['post'])) {
                    include 'config.php';
                   $book_id=filter(mysqli_real_escape_string($connection,$_REQUEST['id']));
                   $check_query="SELECT Book_id FROM Book_info WHERE Book_id='$book_id'";
                   $check=mysqli_query($connection,$check_query) or die(" Check query failed");
                   $count=mysqli_num_rows($check);
                   if ($count>0)  {                            
             $insert_query="INSERT INTO post (Book_id) VALUES ('$book_id')";
             $send=mysqli_query($connection,$insert_query);
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<style>
  .my-h-center { display: block; margin-left:auto;margin-right:auto;width:30%}
</style>
<script>   //jquery goes here
  // 2nd query start




  $(document).ready(function(){
      $("#post").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>                                                                           <!-- body start  -->
<body class="w3-sans-serif" style="background-color:#F1F1F1">


<div class="my-h-center w3-white w3-mobile">                                    <!-- Notice input  -->

<form class=" w3-center" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off" enctype="multipart/form-data"><br>

<h6 class="w3-left w3-margin-left">Enter Notice</h6>
<div class="w3-container">
<textarea required name="notice_input" class="w3-block w3-border"></textarea></div>
<br>


<div class="w3-container">
<input type="submit" value="Add Notice" name="notice" class="w3-left w3-button w3-hover-blue w3-blue">
</div><br>


</form>

</div><br>

<div class="my-h-center w3-white w3-mobile">                                    <!-- trend input  -->

<form class=" w3-center" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off" enctype="multipart/form-data"><br>

<h6 class="w3-left w3-margin-left">Just Enter Book ID</h6>
<div class="w3-container">
<input required type="text" name="id" class="w3-block w3-border"></div>
<?php
 if(isset($_REQUEST['trending'])) {
  if (!$count>0)  {  echo"No book";}

 }
?>
<br>


<div class="w3-container">
<input type="submit" value="Post in Trending" name="trending" class="w3-left w3-button w3-hover-blue w3-red">
</div><br>


</form>

</div>

<br>
<br>






<!--
  <div class="my-h-center w3-white w3-mobile">                                       home input 

<form class=" w3-center" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left">Just Enter Book ID</h6>
<div class="w3-container">
<input required type="text" name="id" class="w3-block w3-border"></div>
<?php
 if(isset($_REQUEST['post'])) {
  if (!$count>0)  {  echo"No book";}

 }
?>
<br>



                                                               
<div class="w3-container">
<input type="submit" value="Post in Home Page" name="post" class="w3-left w3-button w3-hover-blue w3-green">
</div><br>


</form>

</div>
-->


                                                                          <!-- Notice print  -->
<div class="w3-center"><h2>Notice</h2></div>                                        
<div class="" style="overflow-x:auto;">
<table class="w3-table-all" id="box2">
<tr>
<th>Serial Number</th>
<th>Notice Id</th>
<th>Notice</th>
<th>Delete</th>

</tr>

<?php
include 'config.php';
$read_query_n="SELECT * FROM notice ORDER BY Notice_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result_n=mysqli_query($connection,$read_query_n);
$s_r=1;
while($row_n=mysqli_fetch_row($result_n)) {
        $not_id=htmlspecialchars($row_n[0]);
        $not=htmlspecialchars($row_n[1]);

      
?>
<tr class="item2">
<td><?php echo $s_r; ?></td>
<td><?php echo $not_id; ?></td>
<td><?php echo $not; ?></td>
<td><a href="delete_post.php?not_id=<?php echo $not_id; ?>&notice" class="w3-text-blue">Remove</a></td>
</tr>
<?php
$s_r++;
 }
 ?>
 </table>
</div>



                                                                          <!-- trend print  -->
<div class="w3-center"><h2>Trend Post</h2></div>                                        
<div class="w3-panel w3-center">
<input type="text" class=" w3-large" placeholder="Search by Typing" oninput="w3.filterHTML('#box2','.item2',this.value)">
</div>


<div class="" style="overflow-x:auto;">
<table class="w3-table-all" id="box2">
<tr>
<th>Serial Number</th>
<th>Post Id</th>
<th>Book Id</th>
<th>Title</th>
<th>Author</th>
<th>Published</th>
<th>Price</th>
<th>Category</th>
<th>Delete</th>
</tr>

<?php
include 'config.php';
$read_query2="SELECT * FROM trending LEFT JOIN Book_info ON trending.Book_id=Book_info.Book_id LEFT JOIN category ON Book_info.Category=category.Category_id
             ORDER BY trending.Trend_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result2=mysqli_query($connection,$read_query2);
$s_r=1;
while($row2=mysqli_fetch_row($result2)) {
        $post_id=htmlspecialchars($row2[0]);
        $book_id=htmlspecialchars($row2[1]);
        $title=htmlspecialchars($row2[4]);
        $author=htmlspecialchars($row2[5]);
        $published=htmlspecialchars($row2[6]);
        $price=htmlspecialchars($row2[7]);
        $category_name=htmlspecialchars($row2[12]);
      
?>
<tr class="item2">
<td><?php echo $s_r; ?></td>
<td><?php echo $post_id; ?></td>
<td><?php echo $book_id; ?></td>
<td><?php echo $title; ?></td>
<td><?php echo $author; ?></td>
<td><?php echo $published; ?></td>
<td><?php echo $price; ?></td>
<td><?php echo $category_name; ?></td>
<td><a href="delete_post.php?post_id=<?php echo $post_id; ?>&trend" class="w3-text-blue">Remove</a></td>
</tr>
<?php
$s_r++;
 }
 ?>
 </table>
</div>




<div class="w3-center"><h2>Home Page Post</h2></div>  
<div class="w3-panel w3-center">
<input type="text" class=" w3-large" placeholder="Search by Typing" oninput="w3.filterHTML('#box','.item',this.value)">
</div>




                                                                              <!-- home print  -->







<!--
 
<div class="" style="overflow-x:auto;">
<table class="w3-table-all" id="box">
<tr>
<th>Serial Number</th>
<th>Post Id</th>
<th>Book Id</th>
<th>Title</th>
<th>Author</th>
<th>Published</th>
<th>Price</th>
<th>Category</th>
<th>Delete</th>
</tr>

<?php
include 'config.php';
$read_query="SELECT * FROM post LEFT JOIN Book_info ON post.Book_id=Book_info.Book_id LEFT JOIN category ON Book_info.Category=category.Category_id
             ORDER BY post.Post_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
$s_r=1;
while($row=mysqli_fetch_row($result)) {
        $post_id=htmlspecialchars($row[0]);
        $book_id=htmlspecialchars($row[1]);
        $title=htmlspecialchars($row[4]);
        $author=htmlspecialchars($row[5]);
        $published=htmlspecialchars($row[6]);
        $price=htmlspecialchars($row[7]);
        $category_name=htmlspecialchars($row[12]);
      
?>
<tr class="item">
<td><?php echo $s_r; ?></td>
<td><?php echo $post_id; ?></td>
<td><?php echo $book_id; ?></td>
<td><?php echo $title; ?></td>
<td><?php echo $author; ?></td>
<td><?php echo $published; ?></td>
<td><?php echo $price; ?></td>
<td><?php echo $category_name; ?></td>
<td><a href="delete_post.php?post_id=<?php echo $post_id; ?>&home" class="w3-text-blue">Remove</a></td>
</tr>
<?php
$s_r++;
 }
 ?>
 </table>
</div>


-->


</body>

</html>