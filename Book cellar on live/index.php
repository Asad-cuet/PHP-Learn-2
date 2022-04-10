<?php
session_start();
ob_start();
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
<meta name="description" content="A book venture formed by students of DU with the vision to facilitate book lovers in their thirst for books. You can buy all books in higher discount.">
<meta name="keywords" content="About Book cellar Library,Book cellar,online library,Home delivery libarry">

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
</style>




<script>   //jquery goes here


//Header element
 $(document).ready(function(){
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

<?php 
if(isset($_REQUEST['msg'])) { 

?>
<div class="w3-container w3-blue w3-center w3-text-white">
      <h5>আপনার অর্ডারটি আমরা গ্রহণ করেছি।আমরা শিগ্রই আপনাকে কল দিবো,ধন্যবাদ।</h5>
</div>
<?php

}
?>


<?php 
if(isset($_REQUEST['added'])) { 

?>
<div class="w3-container w3-blue w3-center w3-text-white">
      <h5>বইটি একবার গ্রহণ করা হয়েছে।বইয়ের সংখ্যা পরিবর্তন করতে চাইলে Cart থেকে পরিবর্তন করুন।</h5>
</div>
<?php

}
?>

<?php include'notice.php'; ?>

        <!-- Book show start -->
<?php
include 'config.php';
$sr=0;
$read_query="SELECT * FROM post ORDER BY Post_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
      $post_id=htmlspecialchars($row[0]);
      $book_id=htmlspecialchars($row[1]);






$read_query2="SELECT * FROM Book_info LEFT JOIN category ON category.Category_id=Book_info.Category WHERE Book_id='$book_id'";
$result2=mysqli_query($connection,$read_query2);

while($row=mysqli_fetch_row($result2)) {
    $pic=htmlspecialchars($row[1]);
    $title=htmlspecialchars($row[2]);
    $author=htmlspecialchars($row[3]);
    $published=htmlspecialchars($row[4]);
    $price=htmlspecialchars($row[5]);
    $disc=htmlspecialchars($row[6]);
    $f_price=htmlspecialchars($row[7]);
    $cat_name=htmlspecialchars($row[16]);
    $book_id2=htmlspecialchars($row[0]);
    $del_charge=htmlspecialchars($row[12]);
    $rating=htmlspecialchars($row[13]);
    $sr++;




      ?>
<div class="w3-panel">     


<div class="w3-row w3-border"  style="background-color:#C1D5D5">
 <div class="w3-col l1 m3 s6 w3-center "><div class="w3-panel "><a href="single.php?book_id=<?php echo $book_id2; ?>"><img src="admin/uploads/<?php echo $pic; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" style="width:100%;"></a></div></div>
 <div class="w3-col l11"><div class="w3-container">
                                                 <div class="w3-row">
                                                                      <div class="w3-col l3">
                                                                     <h2 style="font-size:20px;"><?php echo $title; ?></h2>
                                  <?php if(!empty($author)) { ?><h2 style="font-size:16px;"><b>Author:</b><?php echo $author; ?></h2><?php } ?>
                                        <?php if($del_charge==2) { ?><p class="w3-text-red"><b>Delivery charge:Free</b></p><?php } ?>
                                                                     </div>
                                                                      <div class="w3-col  l3">
                                      <?php if(!empty($published)) { ?><p><b>Published Year:</b><?php echo $published; ?></p><?php } ?>
                                                                     <p><b>ক্যাটাগরি:</b><?php echo $cat_name; ?></p>
                                       <?php if(!empty($rating)) { ?><p><b>Rating:</b><?php echo $rating; ?></p><?php } ?>
                                                                     </div>
                                                                      <div class="w3-col  l3">
                                                                     <p><b>Price:</b><?php echo $price; ?>tk</p>
                                                                     <p><b>Discount:</b><?php echo $disc; ?>%</p>
                                                                     <p><b>Final Price:</b><?php echo $f_price; ?>tk</p>
                                                                     </div>
                                                                     <div class="w3-col  l3">

                                                                     <p><b>Quantity:</b><input type="number" class="quant" value="1" min="1"></p>
                                                                    
                                                                     
                                                                     <button onclick="add_to_cart(<?php echo $book_id2; ?>,<?php echo $sr-1; ?>)" style="background-color:#6D87FF;"  class="w3-margin-bottom w3-text-white w3-small w3-button  w3-round" >Add To Cart</button> <br>
                                                                     
                                                                     </div>
                                                 </div>
                       </div>
 </div>
                       
                    
</div>


</div>         
<?php
   }

}
?>
  <!-- Book show end-->




<script src="cart.js"></script>  


<?php
include 'footer.php';
?>
</body>
</html>