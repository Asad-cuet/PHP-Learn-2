<?php
session_start();
ob_start();
include 'header.php';


if(empty($_SESSION['cart'])) {
      header("location:index.php");
}

$total_price=htmlspecialchars($_REQUEST['total_price']);
$del_charge=$_REQUEST['del_charge'];
if($del_charge==0) { $del_charge_f="Not Free"; } 
if($del_charge==1) { $del_charge_f="Free"; } 
include 'config.php';






if(isset($_REQUEST['ordered'])) {
      //receiving input
      $charge_f=htmlspecialchars($_REQUEST['charge_f']);
      if(!empty($_REQUEST['name'])) { $name=ucfirst(filter(mysqli_real_escape_string($connection,$_REQUEST['name']))); }
      $email=filter(mysqli_real_escape_string($connection,$_REQUEST['email']));
      $cell=filter(mysqli_real_escape_string($connection,$_REQUEST['cell']));
      $adrress=filter(ucfirst(mysqli_real_escape_string($connection,$_REQUEST['adrress'])));
      
      if(!empty($name) && !empty($cell) && !empty($adrress)) {
            $item_id=array();
            $item_quant=array();
            $item_name=array();
            foreach($_SESSION['cart'] as $key => $value) {

                  array_push($item_id,$value['b_id']);
                  array_push($item_quant,$value['quantity']);
                  array_push($item_name,$value['b_name']);

                  
            }
            echo $item_id[0];
            $ids=implode(",",$item_id);
            $quant=implode(",",$item_quant);
            $book_name=implode(",",$item_name);
            $item=count(array_column($_SESSION['cart'],'b_id'));
            //Email Section
            $to_mail="asadul7733@gmail.com";
            $subject="Book cellar";

             $body="
             Name:$name
             Cell:$cell
             Address:$adrress
             Book ID=$ids
             Book Name=$book_name
             Total price=$total_price tk";

            $header="From:mytest7733@gmail.com";
           // mail($to_mail,$subject,$body,$header); 
                               
           // echo"111111";

            $time=date('F j, Y, g:i a', time() + 6*3600); # Bangladesh is in UTC+6
            $insert_query="INSERT INTO ordered_info(Book_id,Item,Quantity,Price,Delivery_charge,Customer_name,Email,Cell,Adrress,Time) VALUES ('$ids','$item','$quant','$total_price','$charge_f','$name','$email','$cell','$adrress','$time')";
           $send=mysqli_query($connection,$insert_query) or DIE("failed");
           if($send) { 
  
            
                       session_destroy();
                       header("location:index.php?msg");
            
                  }
           
      } else { $fill=1; }
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

  //  $("").addClass("");
        $("#logo").hide();
    $("#logo2").hide();

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">












<div class="w3-panel w3-center w3-text-red" style="margin-top:59px;position:relaive;">
      <h5>ফর্মটি পূরণ করুন</h5>
</div>


<div class="my-h-center w3-white w3-mobile">

<form class=" w3-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left w3-text-red">Your Name**</h6>
<div class="w3-container">
<input type="text" name="name" class="w3-block w3-border w3-round" required></div>
<br>


<h6 class="w3-left w3-margin-left w3-text-green">Email(যদি থাকে)</h6>
<div class="w3-container">
<input type="email" name="email" class="w3-block w3-border w3-round" ></div>
<br>



<h6 class="w3-left w3-margin-left w3-text-red">Mobile Number**</h6>
<div class="w3-container">
<input type="text" name="cell" class="w3-block w3-border w3-round" required></div>
<br>




<h6 class="w3-left w3-margin-left w3-text-red">Address**</h6>
<div class="w3-container">
<input type="text" name="adrress" class="w3-block w3-border w3-round" required></div>
<br>




<div class="w3-container w3-center">
<input type="submit" value="Order Submit" name="ordered" class="w3-blue w3-round w3-button w3-hover-red ">
<input type="hidden" name="total_price" value="<?php echo $total_price;?>">
<input type="hidden" name="charge_f" value="<?php echo $del_charge_f;?>">
</div><br>


</form>

</div>


</body>
</html>