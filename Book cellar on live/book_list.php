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

<meta name="description" content="Book list of Book Cellar BD">
<meta name="keywords" content="Book collection of book cellar bd">

<style>
  @media screen and (max-width:290px) {
  .my-mobile {
     width:100%;
  }
}
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


<?php 
if(isset($_REQUEST['added'])) { 

?>
<div class="w3-container w3-blue w3-center w3-text-white">
      <h5>বইটি একবার গ্রহণ করা হয়েছে।বইয়ের সংখ্যা পরিবর্তন করতে চাইলে Cart থেকে পরিবর্তন করুন।</h5>
</div>
<?php

}
?>





                               <!--Search bar start -->
<div class="w3-panel"><div class="w3-bar w3-center w3-mobile">    
<input type="text" class=" 3-bar-item w3-large" placeholder="Search by Typing" oninput="w3.filterHTML('#box','.item',this.value)">
</div> </div>



<form method="post" class=" my-h-center w3-mobile">
<div class="w3-panel w3-center">
<select class="w3-select w3-border" name="c_name">
<option value=" " disabled selected>Search by Category</option>
<option value="all">All</option>
<?php
include 'config.php';
$read_query="SELECT * FROM category";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
     $cat_id=$row[0];
     $cat_name=$row[1];

?>
<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
<?php
}
?>


</select>
<input type="submit" name="search_" value="Search" class= "w3-round w3-button w3-cyan w3-text-white">
</div>
</form>


   <!--Search bar end -->






<?php
include 'config.php';
$sr=0;
if(isset($_REQUEST['search_'])) { //If search by category
 if(!empty($_REQUEST['c_name'])) { $cat_id=$_REQUEST['c_name'];
  if($cat_id=='all') { $read_query="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id ORDER BY Book_id DESC";  } else {
  $read_query="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id  WHERE Category='$cat_id' ORDER BY Book_id DESC"; } //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
  $result=mysqli_query($connection,$read_query);  
  } 
} else { 
 $read_query="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id ORDER BY Book_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
 $result=mysqli_query($connection,$read_query); }
 $s_r=1;

 while($row=mysqli_fetch_row($result)) {
           $book_id=show($row[0]);
           $book_pic=show($row[1]);
           $book_title=show($row[2]);
           $book_author=show($row[3]);
           $book_published=show($row[4]);
           $book_price=show($row[5]);
           $disc=show($row[6]);
           $f_price=show($row[7]);
           $cat_id=show($row[8]);
           $book_avail=show($row[9]);
           $book_ordered=show($row[10]);
           $del_charge=show($row[12]);
           $rating=show($row[13]);
           
           $cat_name=show($row[16]);
           $s_r++;
           $sr++;
           //E7E7FE
?>




<div class="w3-panel" id="box">     <!--  Row start -->


<div class="w3-row w3-border item" style="background-color:#C1D5D5">
 <div class="w3-col l1 m3 s6 "><div class="w3-panel"><a href="single.php?book_id=<?php echo $book_id; ?>"><img src="admin/uploads/<?php echo $book_pic; ?>" alt="<?php echo $book_title; ?>" title="<?php echo $book_title; ?>" style="width:100%;"></a></div></div>
 <div class="w3-col l11"><div class="w3-container">
                                                 <div class="w3-row">
                                                                      <div class="w3-col l3">
                                                                     <h2 style="font-size:20px;"><?php echo $book_title; ?></h2>
                                  <?php if(!empty($book_author)) { ?><h2 style="font-size:16px;"><b>Author:</b><?php echo $book_author; ?></h2><?php } ?>
                                        <?php if($del_charge==2) { ?><p class="w3-text-red"><b>Delivery charge:Free</b></p><?php } ?>
                                                                     </div>
                                                                      <div class="w3-col  l3">
                                  <?php if(!empty($book_published)) { ?><p><b>Published Year:</b><?php echo $book_published; ?></p><?php } ?>
                                                                     <p><b>ক্যাটাগরি:</b><?php echo $cat_name; ?></p>
                                       <?php if(!empty($rating)) { ?><p><b>Rating:</b><?php echo $rating; ?></p><?php } ?>
                                                                     </div>
                                                                      <div class="w3-col  l3">
                                                                     <p><b>Price:</b><?php echo $book_price; ?>tk</p>
                                                                     <p><b>Discount:</b><?php echo $disc; ?>%</p>
                                                                     <p><b>Final Price:</b><?php echo $f_price; ?>tk</p>
                                                                     </div>
                                                                     <div class="w3-col  l3">
                                                                     
                                                                     <p><b>Quantity:</b><input type="number" class="quant" value="1" min="1"></p>
                                                                    
                                                                     
                                                                     <button onclick="add_to_cart(<?php echo $book_id; ?>,<?php echo $sr-1; ?>)" style="background-color:#6D87FF;"  class="w3-margin-bottom w3-text-white w3-small w3-button  w3-round" >Add To Cart</button> <br> </div>
                                                 </div>
                       </div>
 </div>
                       
                     
</div>


</div>     <!--  Row end -->
<?php
 }


 if($s_r==1) {




?>




<div class="w3-container w3-blue w3-center w3-text-white">
  <h5>দুঃখিত,এই ক্যাটাগরির কোনো বই এখনো ওয়েবসাইটে যুক্ত করা হয়নি</h5>
</div>



<?php
 }
?>
<script src="cart.js"></script>
<?php
include 'footer.php';
?>
</body>
</html>