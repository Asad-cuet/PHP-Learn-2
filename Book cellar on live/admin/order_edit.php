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



                                // Collecting

 include 'config.php';                               
$order_id=htmlspecialchars($_REQUEST['order_id']);
$read_query="SELECT * FROM ordered_info WHERE Order_id='$order_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {

           $book_id=htmlspecialchars($row[2]);
           $book_quant=htmlspecialchars($row[3]);
           $price=htmlspecialchars($row[4]);
           $address=htmlspecialchars($row[9]);
}





// updating  

if(isset($_REQUEST['update'])) {
      $delivery="Not Free";
      $e_id=htmlspecialchars($_REQUEST['e_id']);
      $arr_id=explode(",","$e_id");
      $cnt=htmlspecialchars(count($arr_id));
      $update_price=0;
      
      
      $e_quant=htmlspecialchars($_REQUEST['e_quant']);
      $arr_quant=explode(",","$e_quant");
      $address=input("address");
      
      for($i=0;$i<$cnt;$i++)
      {
      $read_query="SELECT * FROM Book_info WHERE Book_id='$arr_id[$i]'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
      $result=mysqli_query($connection,$read_query);
      while($row=mysqli_fetch_row($result)) {
      if($row[12]==2) { $delivery="Free"; }
      $update_price+=($row[7]*$arr_quant[$i]);
}
}
      $update_query="UPDATE ordered_info SET Book_id='$e_id',Quantity='$e_quant',Price='$update_price',Delivery_charge='$delivery',Adrress='$address' WHERE Order_id='$order_id'";
      $update=mysqli_query($connection,$update_query);
      if($update) {
            header("location:order.php");
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
      $("").addClass("w3-dark-gray");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




<div class="my-h-center w3-white w3-mobile">

<form class=" w3-center" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left">Book ID</h6>
<div class="w3-container">
<input type="text" name="e_id" class="w3-block w3-border" value="<?php echo $book_id; ?>"></div>
<br>



<h6 class="w3-left w3-margin-left">Book Quantity</h6>
<div class="w3-container">
<input type="text" name="e_quant" class="w3-block w3-border" value="<?php echo $book_quant; ?>"></div>
<br>




<h6 class="w3-left w3-margin-left">Address</h6>
<div class="w3-container">
<input type="text" name="address" class="w3-block w3-border" value="<?php echo $address; ?>"></div>
<br>



<div class="w3-container w3-center">
<input type="submit" value="Save" name="update" class="w3-round w3-button w3-hover-red w3-blue">
<input type="hidden" name="order_id"  value="<?php echo $order_id; ?>"></div>
</div><br>


</form>

</div>




</body>
</html>