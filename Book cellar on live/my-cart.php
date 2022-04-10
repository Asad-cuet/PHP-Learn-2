<?php
session_start();
ob_start();
include 'function.php';
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
<link rel="stylesheet" href="W3.CSS-my.css">
<script src="W3.JS.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!-- Jquery Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- Serach engine related -->
<link rel="icon" type="image/jpg" sizes="16x16" href="Book cellar bd icon.jpg"> <!-- favicon,  Edit it -->
<title>Book Cellar BD | An online library in Bangladesh</title>

<meta name="description" content="Feel free to contact">
<meta name="keywords" content="Contact book cellar bd,book cellar contact,book cellar bd conatct">

<style>
.my-gray {
  background-color:#2C3B42;
}
.my-dark-gray {
  background-color:#1F262C!important;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  display:block!important;
}
.hide { display:none; }
.sidebar { position:fixed!important;top:0!important;height:100%!important; }

.sticky + .content {
  padding-top: 102px;
}


@media screen and (max-width:992px) { /* it will active under 600 px */
.my-title { display:block!important;}
}
      @media screen and (max-width:600px) { /* it will active under 600 px */
.my-logo { -ms-flex: 40%!important; /* IE10 */ flex: 40%!important;}
.my-pic { width: 85px!important;padding-top:12px!important; }
.my-title { display:block!important;-ms-flex: 60%!important; /* IE10 */ flex: 60%!important;padding:0!important;}
.my-navbar { -ms-flex: 100%; /* IE10 */ flex: 100%;}
}



/* width */
::-webkit-scrollbar {
  width: 12px;
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
@media screen and (max-width:290px) {
  .my-mobile {
     width:100%;
  }
}
</style>




<script>   //jquery goes here

//Header element
 $(document).ready(function(){

  
    $("#logo").hide(); 
  

  $(".sidebar_open").click(function(){ 
    $("#sidebar").show(200); 
  });
  $("#sidebar_close").click(function(){ 
    $("#sidebar").hide(200); 
  });
  $("#close_modal").click(function(){ 
    $("#modal").slideUp(200); 
  });
  $(".open_modal").click(function(){ 
    $("#modal").slideDown(200); 
  });
});


</script>
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">
<?php include 'header.php'; ?>
<?php if(!empty($_SESSION['cart']) && isset($_SESSION['cart'])) { ?>


<?php } ?>



<div class="w3-panel">     

<div class="w3-row w3-border" style="background-color:#C1D5D5" >
 <div class="w3-col l12"><div class="w3-container">
<?php
$total_price=0;
$flag=0;
if(isset($_SESSION['cart'])) {
 
  foreach($_SESSION['cart'] as $key => $value) {
 $total_price=$total_price+($value['quantity']*$value['f_price']);
 
 //checking delivery fee
 $id=htmlspecialchars($value['b_id']);
include 'config.php';
 $read_query="SELECT * FROM Book_info WHERE Book_id='$id'";  
$result=mysqli_query($connection,$read_query) or die("Failed");
while($row=mysqli_fetch_row($result)) {
           $del_charge=htmlspecialchars($row[12]);
           if($del_charge==2)
           {
               $flag=1;
           }
}
?>



                                                 <div class="w3-row w3-border-bottom w3-border-white">
                                                                      <div class="w3-col l3">
                                                                     <h2 style="font-size:20px;"><?php echo htmlspecialchars($value['b_name']); ?></h2>
                                    <?php if(!empty($value['author'])) { ?><p><b>Author:</b><?php echo htmlspecialchars($value['author']); ?></p><?php } ?>  
                                         <?php if($value['charge']==2) { ?><p class="w3-text-red"><b>Delivery charge:Free</b></p><?php } ?>                       
                                                                     </div>
                                                                      <div class="w3-col m2 l3">
                                                                     
                                                                     <p><b>Quantity:<?php echo htmlspecialchars($value['quantity']); ?></b></p>
                                                                     <div class="w3-bar">
                                                                     <p class=""><b>Change Quantity:</b></p>     
                                                                     <form action="cart_pro2.php" method="post" class="w3-bar-item">
                                                                     <b><input type="submit" name="mod_quant_plus" value="+1" class="w3-tag w3-border w3-border w3-green w3-hover-black"></b>
                                                                     <input type="hidden" name="b_id" value="<?php echo $value['b_id']; ?>">
                                                                     </form>
                                                                     <form action="cart_pro2.php" method="post" class="w3-bar-item">
                                                                     <b><input type="submit" name="mod_quant_min" value="-1" class="w3-tag w3-border w3-border w3-red w3-hover-black"></b>
                                                                     <input type="hidden" name="b_id" value="<?php echo $value['b_id']; ?>">
                                                                     </form>
                                                                     </div>
                                                                     </p>
                                                                     </div>
                                                                      <div class="w3-col  l3">
                                                                     <p><b>Price per item:</b><?php echo htmlspecialchars($value['price'])."tk ";echo"(Discount:".htmlspecialchars($value['disc'])."%)";echo"=".htmlspecialchars($value['f_price']); ?>tk</p>
                                                                     <form action="cart_pro2.php" method="post" class="to_hide">
                                                                     <input type="hidden" name="b_id" value="<?php echo htmlspecialchars($value['b_id']); ?>">
                                                                     <input type="submit" name="remove_cart" value="Remove" class=" w3-small w3-round w3-small w3-button w3-red" >
                                                                     </form>
                                                                     </div>
                                                                     <div class="w3-col l3">
                                                                     <p><b>Total tk:</b><?php echo (htmlspecialchars($value['quantity'])*htmlspecialchars($value['f_price'])); ?></p>
                                                                     </div>
                                                 </div>



<?php
  }
}
?>
                       </div>
 </div>
                       
                    
</div>


</div> 

<div class="w3-center" style="">


<div class="w3-panel">
  <div class="w3-center to_hide" id="to_hide"><span class="w3-button w3-blue my-hover-f w3-text-white" id="print_button">Print/Download</span> this page for <span class="w3-text-red"><b>future record</b></span></div>
  
    <h5><b>Your total product price:</b> <?php echo $total_price; ?>.00 tk</h5>
    <h5><b>Delivery Charge:</b> <?php if($flag==1) { echo "Free"; } else { ?>কার্যকর।Depends on location. <?php } ?></h5>
<h5><b>Your grand price:</b> <i class="w3-text-red"><?php echo htmlspecialchars($total_price); ?>.00<?php if($flag==0) {echo "+"; } ?></i>tk</h5>


</div>
</div>


<div class="w3-center">
<div class="w3-bar">
  <form method="POST" action="order_confirm.php">
  <input type="submit" name="confirm" value="Order Confirm" class="w3-bar-item w3-button w3-blue w3-hover-teal w3-round">
  <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">
  <input type="hidden" name="del_charge" value="<?php echo htmlspecialchars($flag); ?>">
</form>
</div>
</div>





</body>
</html>

<?php

?>