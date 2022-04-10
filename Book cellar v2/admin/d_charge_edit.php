<?php
session_start();
ob_start();
session_regenerate_id();
include 'header.php';
include 'config.php';
//include 'function.php';

?>

<?php
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}


?>


<?php
$order_id=htmlspecialchars($_REQUEST['order_id']);

$read_query="SELECT * FROM delivered WHERE Order_id='$order_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query) or die("1st failed");
while($row=mysqli_fetch_row($result)) {
   $d_charge=htmlspecialchars($row[16]);   
}

if(isset($_REQUEST['post_']))
{
    $d_charge=input("d_charge");
    $update_query="UPDATE delivered SET D_charge='$d_charge' WHERE Order_id='$order_id'";
     $update=mysqli_query($connection,$update_query);
     if($update)
     {
         header("location:deliver.php");
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

    $("").addClass("");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




<div class="my-h-center w3-white w3-mobile">

<form class=" w3-center" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" enctype="multipart/form-data"><br>





<h6 class="w3-left w3-margin-left w3-text-green">Delivery Charge</h6>
<div class="w3-container">
<input type="text" name="d_charge" value="<?php echo $d_charge; ?>" class="w3-block w3-border"></div>
<br>






<div class="w3-container w3-center">
<input type="submit" value="Save" name="post_" class="w3-button w3-hover-red w3-green">
<input type="hidden" value="<?php echo $order_id; ?>" name="order_id">
</div><br>


</form>

</div>




</body>
</html>