<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}
?>


<?php
include 'function.php';

$order_id=htmlspecialchars($_REQUEST['order_id']);
$table=htmlspecialchars($_REQUEST['table']);

include 'config.php';
$read_query="SELECT * FROM $table WHERE order_id='$order_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query) or die("1st failed");
while($row=mysqli_fetch_row($result)) {
   $order_id=htmlspecialchars($row[1]);
   $item=htmlspecialchars($row[2]);
   $book_id=htmlspecialchars($row[3]);
   $book_quantity=htmlspecialchars($row[4]);
   $book_price=htmlspecialchars($row[5]);
   $delivery=htmlspecialchars($row[6]);
   $cust_name=htmlspecialchars($row[7]);
   $cust_email=htmlspecialchars($row[8]);
   $cust_cell=htmlspecialchars($row[9]);
   $cust_adrress=htmlspecialchars($row[10]);
   $order_date=htmlspecialchars($row[11]);
  $d_charge=htmlspecialchars($row[16]);
  if(empty($d_charge)) { $d_charge=0; }
}
   ?>








<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8"> <!-- For Bangla Font -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css"> <!-- color Links -->
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<script src="W3.JS.js"></script>  <!-- W3.Js library -->
<link rel="stylesheet" href="W3.CSS-my.css">  <!-- W3.CSS library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- Icon Library -->
<head>
  <title><?php echo $order_id; ?></title>

  
  <link rel="icon" type="image/jpg" sizes="16x16" href="Book cellar bd icon.jpg"> <!-- favicon,  Edit it -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!-- Jquery Library -->
   <!-- Bootstrap 4  Library -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>

</style>
<script>   //jquery goes here
$(document).ready(function(){
  $("#print_button").click(function(){ //event=click,dbclick,mouseenter,mouseleave,hover,focus[click on],blur[click outside].
    $("#print_button").css("display","none"); //hide(),show(),toggle(),fadeIn(),fadeOut(),fadeToggle(),addClass(""),removeClass(""),css("property","value")
    window.print();
    location.reload();
  });
});
</script>  
</head>
<body>

<div class="w3-container w3-center my-yellow">
  <div class="w3-panel">
    <h3>Book Cellar Library</h3>
</div>
<p><b>Address:</b>Shoronika-Road,Savar,Dhaka</p>
<p><b>Number:</b>01684604855,01716886379</p>
</div>

<div class="w3-panel">
  <div class="w3-right"><p><b>Date & Time:</b> <?php echo date('F j, Y, g:i a', time() + 6*3600); # Bangladesh is in UTC+6 ?></p></div>

</div>
<div class="w3-container w3-large">
  <p><b>Customer Name: </b><?php echo $cust_name; ?></p>
  <p><b>Address: </b><?php echo $cust_adrress; ?></p>
  <p><b>Cell: </b><?php echo $cust_cell; ?></p>
  <p><b>Email: </b><?php echo $cust_email; ?></p>
  <p><b>Order ID: </b><?php echo $order_id; ?></p>
  <p><b>Delivery: </b><?php echo $delivery; ?></p>
  <p><b>Delivery Charge: </b><?php if($delivery=="Not Free" && $d_charge==0) { echo '<b class="w3-text-red">Apply Charge</b>'; } else echo $d_charge." tk"; ?> </p>
  <p><b>Ordered Date : </b><?php echo $order_date; ?></p>
  <p><b>Ordered Item: </b></p>
  <table class="w3-table-all" style="overflow-x:auto">
    <tr>
      <th>Serial Number</th>
      <th>Book Title</th>
      <th>Book Author</th>
      <th>Quantity</th>
      <th>Per Price</th>
      <th>Subtotal Price</th>
    </tr>

    <?php
include 'config.php';
$s_r=0;
$total_tk=0;
$read_query="SELECT * FROM $table WHERE order_id='$order_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query) or die("1st failed");
while($row=mysqli_fetch_row($result)) {
   $order_id=htmlspecialchars($row[1]);
   $item=htmlspecialchars($row[2]);
   $book_id=htmlspecialchars($row[3]);
   $book_quantity=htmlspecialchars($row[4]);
   $total_book_price=htmlspecialchars($row[5]);
   $delivery=htmlspecialchars($row[6]);
   $cust_name=htmlspecialchars($row[7]);
   $cust_email=htmlspecialchars($row[8]);
   $cust_cell=htmlspecialchars($row[9]);
   $cust_adrress=htmlspecialchars($row[10]);
   $order_date=htmlspecialchars($row[11]);
   $item_real_price=htmlspecialchars($row[13]);
   $item_price=htmlspecialchars($row[14]);
   $item_disc=htmlspecialchars($row[15]);
   
}

   //Coverting string to array
   $arr_ids=explode(",",$book_id);
   $arr_real_price=explode(",",$item_real_price);
   $arr_price=explode(",",$item_price);
   $arr_disc=explode(",",$item_disc);

   $arr_quants=explode(",",$book_quantity);
   for($i=0;$i<count($arr_ids);$i++) 
   {
   $read_query2="SELECT * FROM Book_info WHERE Book_id='$arr_ids[$i]'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
   $result2=mysqli_query($connection,$read_query2);
    while($row2=mysqli_fetch_row($result2)) 
    {
    $title=htmlspecialchars($row2[2]);
    $author=htmlspecialchars($row2[3]);
    }
    
   ?>
    
    <tr>
      <td><?php echo $s_r+1; ?></td>
      <td><?php echo $title; ?></td>
      <td><?php echo $author ?></td>
      <td><?php echo $arr_quants[$s_r]; ?></td>
      <td><?php echo $arr_real_price[$i]."-".$arr_disc[$i]."% = ".$arr_price[$i]; ?> tk</td>
      <td><?php echo $arr_price[$i]*$arr_quants[$s_r]; ?> tk</td>
    </tr>

<?php 
$s_r++;
} 
?>
    <tr>
      <td colspan="5" class="w3-border-right">Grand Price+Delivery Charge</td>
      <td><?php echo $total_book_price."+".$d_charge; ?> tk</td>
    </tr>
  </table>
  <div class="w3-center w3-margin"><p>Thanks for Shopping from Book Cellar</p></div>
</div>



<div class="w3-panel w3-center w3-text-white">
  <div id="print_button" class="w3-button my-hover-f my-blue">Print/Download</div>
</div>






</body>
</html>