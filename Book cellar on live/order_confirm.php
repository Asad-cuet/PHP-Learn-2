<?php
session_start();
ob_start();
include 'function.php';



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












<div class="w3-panel w3-center w3-text-red">
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

</div><br>

<?php include 'footer.php'; ?>
</body>
</html>