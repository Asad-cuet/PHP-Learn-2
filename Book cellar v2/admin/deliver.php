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
<link rel="stylesheet" href="W3.CSS-my.css">
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
      $("#deliver").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">

<div style="overflow-x:auto;">
<table class="w3-table-all" style="overflow-x:scroll">
<tr>

<th>Order ID</th>
<th>Book ID</th>
<th>Quantity</th>
<th>Book Title</th>
<th>Book Author</th>
<th>Item Price</th>
<th>Total Price</th>
<th>Delivery</th>
<th>Delivery Charge</th>
<th>Customer Name</th>
<th>Customer Email</th>
<th>Customer Cell</th>
<th>Customer address</th>
<th>Order Date</th>
<th>Delivered Date</th>
<th>Reciept</th>

</tr>

<?php
include 'config.php';
$s_r=0;
$read_query="SELECT * FROM delivered ORDER BY Serial DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
   $order_id=htmlspecialchars($row[1]);
   $item=htmlspecialchars($row[2]);
   $book_id=htmlspecialchars($row[3]);
   $book_quantity=htmlspecialchars($row[4]);
   $item_real_price=htmlspecialchars($row[13]);
   $item_price=htmlspecialchars($row[14]);
   $item_disc=htmlspecialchars($row[15]);
   $price=htmlspecialchars($row[5]);
   $delivery=htmlspecialchars($row[6]);
   $cust_name=htmlspecialchars($row[7]);
   $cust_email=htmlspecialchars($row[8]);
   $cust_cell=htmlspecialchars($row[9]);
   $cust_adrress=htmlspecialchars($row[10]);
   $order_date=htmlspecialchars($row[11]);
   $del_date=htmlspecialchars($row[12]);
   $d_charge=htmlspecialchars($row[16]);
   $s_r++;

   ?>
<tr>

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

       for($x=0;$x<count($arr_ids);$x++) 
        {
            

              $read_query2="SELECT * FROM Book_info WHERE Book_id=$arr_ids[$x]";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 

              $result2=mysqli_query($connection,$read_query2); 

              while($row2=mysqli_fetch_row($result2)) {
              array_push($book_name,"<b>".$row2[0]."</b>:-".$row2[2]);
              array_push($author_name,"<b>".$row2[0]."</b>:-".$row2[3].";"); 

             }
        
 

}

?>

<td><?php echo $book=implode("<br>",$book_name); ?></td>
<td><?php echo $author=implode("<br>",$author_name); ?></td>



<td><?php echo $item_price; ?></td>
<td><?php echo $price; ?></td>
<td><?php echo $delivery; ?></td>
<td><a href="d_charge_edit.php?order_id=<?php echo $order_id; ?>"><?php echo $d_charge; ?>|edit</a></td>
<td><?php echo $cust_name; ?></td>
<td><?php echo $cust_email; ?></td>
<td><?php echo $cust_cell; ?></td>
<td><?php echo $cust_adrress; ?></td>
<td><?php echo $order_date; ?></td>
<td><?php echo $del_date; ?></td>
<td><a class="w3-button my-hover" href="reciept.php?order_id=<?php echo $order_id;  ?>&table=delivered">Make</a></td>
</tr>

<?php

}
 ?>
 </table>
</div>










</body>
</html>