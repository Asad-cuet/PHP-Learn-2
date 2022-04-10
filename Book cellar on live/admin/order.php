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
  .my-h-center { display: block; margin-left:auto;margin-right:auto;width:30%}
  
  /* width */
::-webkit-scrollbar {
  width: 7px;
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
</style>
<script>   //jquery goes here
  // 2nd query start




  $(document).ready(function(){
      $("#order").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">

<div style="overflow-x:auto;">
<table class="w3-table-all">
<tr>

<th>Order ID</th>
<th>Book ID</th>
<th>Quantity</th>
<th>Book Title</th>
<th>Book Author</th>
<th>Total Price </th>
<th>Deliery </th>
<th>Customer Name</th>
<th>Customer Email</th>
<th>Customer Cell</th>
<th>Customer address</th>
<th>Order Date</th>
<th>Edit</th>
<th>Pass to</th>
<th>Remove</th>

</tr>

<?php
include 'config.php';
$s_r=0;
$read_query="SELECT * FROM ordered_info ORDER BY Order_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
   $order_id=htmlspecialchars($row[0]);
   $item=htmlspecialchars($row[1]);
   $book_id=htmlspecialchars($row[2]);
   $book_quantity=htmlspecialchars($row[3]);
   $book_price=htmlspecialchars($row[4]);
   $delivery=htmlspecialchars($row[5]);
   $cust_name=htmlspecialchars($row[6]);
   $cust_email=htmlspecialchars($row[7]);
   $cust_cell=htmlspecialchars($row[8]);
   $cust_adrress=htmlspecialchars($row[9]);
   $order_date=htmlspecialchars($row[10]);
   $s_r++;

   ?>


<td><?php echo $order_id; ?></td>
<td><?php echo $book_id; ?></td>
<td><?php echo $book_quantity; ?></td>


<?php


$book_name=array();
$author_name=array();

   //Coverting string to array
   $arr_ids=explode(",",$book_id);
   $arr_quants=explode(",",$book_quantity);
  //accessing two array together
 for($i=0;$i<count($arr_quants);$i++) 
{
       for($x=0;$x<count($arr_ids);$x++) 
        {
             if($i==$x) 
             { 

              $read_query2="SELECT * FROM Book_info WHERE Book_id=$arr_ids[$i]";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 

              $result2=mysqli_query($connection,$read_query2); 

              while($row2=mysqli_fetch_row($result2)) {
              array_push($book_name,"<b>".$row2[0]."</b>:-".$row2[2]."(".$row2[5]."(-".$row2[6]."%)=".$row2[7]."tk*<b>".$arr_quants[$i]."</b>)");
              array_push($author_name,"<b>".$row2[0]."</b>:-".$row2[3].";"); 

             }
        }
} 

}


     
         

         
         
   
  

?>

<td><?php echo $book=implode("<br>",$book_name); ?></td>
<td><?php echo $author=implode("<br>",$author_name); ?></td>



<td><?php echo $book_price; ?></td>
<td><?php echo $delivery; ?></td>
<td><?php echo $cust_name; ?></td>
<td><?php echo $cust_email; ?></td>
<td><?php echo $cust_cell; ?></td>
<td><?php echo $cust_adrress; ?></td>
<td><?php echo $order_date; ?></td>






<form method="POST" action="order_edit.php">
<td><input type="submit" name="o_remove" class="w3-small w3-text-blue" value="Edit"></td>
<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
</form>




<form method="POST" action="confirm_pro.php">
<td><input type="submit" name="confirm" class="w3-small w3-text-blue" value="Confirm"></td>
<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
</form>







<form method="POST" action="confirm_pro.php">
<td><input type="submit" onclick="return confirm('Are you sure??')" name="o_remove" class="w3-small w3-text-blue" value="Cancel"></td>
<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
</form>


</tr>

<?php

}
 ?>
 </table>
 </div>











</body>
</html>