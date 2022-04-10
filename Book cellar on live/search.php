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
    
    <div class="w3-panel w3-center">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="">
<input required type="text" name="data" placeholder="Search..." class="w3-border-black w3-round">
<input type="submit" value="Search" name="search" placeholder="" class="w3-button w3-round w3-dark-gray w3-small">
</form>
</div>
    


<?php 
if(isset($_REQUEST['added'])) { 

?>
<div class="w3-container w3-blue w3-center w3-text-white">
      <h5>বইটি একবার গ্রহণ করা হয়েছে।বইয়ের সংখ্যা পরিবর্তন করতে চাইলে Cart থেকে পরিবর্তন করুন।</h5>
</div>
<?php

}
?>



        <!-- Book show start -->
        <?php
        if(empty($_REQUEST['data']))
        {
            header("location:category_list.php");
        } else
        {
        include 'config.php';
    $input=$_REQUEST['data'];
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    $key=filter(mysqli_real_escape_string($connection,$input)); // Inputing data



$cats=array();
$b_ids=array();
$sr=0;
$read_query2="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id WHERE Keyword LIKE '%{$key}%';";
$result2=mysqli_query($connection,$read_query2);
$count=mysqli_num_rows($result2);
if($count>0)
     {
while($row=mysqli_fetch_row($result2)) {
    $pic=show($row[1]);
    $title=show($row[2]);
    $author=show($row[3]);
    $published=show($row[4]);
    $price=show($row[5]);
    $disc=show($row[6]);
    $f_price=show($row[7]);
    $del_charge=show($row[12]);
    $cat_id=show($row[15]);
    $cat_name=show($row[16]);
    $book_id2=show($row[0]);
    $sr++;

    
    array_push($cats,$cat_id); // id adding in array
    array_push($b_ids,$book_id2); // id adding in array



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
                                                                      <div class="w3-col  l3 w3-margin-top">
                                             <?php if(!empty($published)) { ?><p><b>Published Year:</b><?php echo $published; ?></p><?php } ?>
                                                                     <p><b>ক্যাটাগরি:</b><?php echo $cat_name; ?></p>
                                                                     </div>
                                                                      <div class="w3-col  l3 w3-margin-top">
                                                                     <p><b>Price:</b><?php echo $price; ?>tk</p>
                                                                     <p><b>Discount:</b><?php echo $disc; ?>%</p>
                                                                     <p><b>Final Price:</b><?php echo $f_price; ?>tk</p>
                                                                     </div>
                                                                     <div class="w3-col  l3 w3-margin-top">
                                                                     <input type="hidden" name="b_id" value="<?php echo $book_id2; ?>">
                                                                     <input type="hidden" name="b_name" value="<?php echo $title; ?>">
                                                                     <input type="hidden" name="au_name" value="<?php echo $author; ?>">
                                                                     <p><b>Quantity:</b><input type="number" name="quant" class="w3-mobile quant" value="1" min="1"></p>
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
else 
{   ?>
    <h3 class="w3-text-red w3-center">Nothing Found.Try other keyword</h3>
<?php } 

?>
  <!-- Book show end-->



<?php
if($count>0)
{
?>
<div class="w3-container"><h3>Related Result</h3></div>
<?php
$a_length=count($cats);
for($i=0;$i<$a_length;$i++)
{
$read_query3="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id WHERE Book_info.Category='$cats[$i]'";
$result3=mysqli_query($connection,$read_query3);
$count2=mysqli_num_rows($result3);
if($count2>0)
     {
while($row2=mysqli_fetch_row($result3)) {
    $pic2=show($row2[1]);
    $title2=show($row2[2]);
    $author2=show($row2[3]);
    $published2=show($row2[4]);
    $price2=show($row2[5]);
    $disc2=show($row2[6]);
    $f_price2=show($row2[7]);
    $del_charge2=show($row2[12]);
    $cat_id2=show($row2[15]);
    $cat_name2=show($row2[16]);
    $book_id3=show($row2[0]);
  
  for($j=0;$j<$a_length;$j++)  // Checking Previous print
{
    if($book_id3==$b_ids[$j])
    {
        $printed=1;
    }
    else 
    {
      $printed=0;
    }

    
}

if($printed==1)
{
    $printed=0;
    continue;
}

$sr++;
      ?>




<div class="w3-panel">     


<div class="w3-row w3-border"  style="background-color:#C1D5D5">
 <div class="w3-col l1 m3 s6 w3-center "><div class="w3-panel "><a href="single.php?book_id=<?php echo $book_id3; ?>"><img src="admin/uploads/<?php echo $pic2; ?>" alt="<?php echo $title2; ?>" title="<?php echo $title2; ?>" style="width:100%;"></a></div></div>
 <div class="w3-col l11"><div class="w3-container">
                                                 <div class="w3-row">
                                                                      <div class="w3-col l3">
                                                                     <h2 style="font-size:20px;"><?php echo $title2; ?></h2>
                                        <?php if(!empty($author2)) { ?><h2 style="font-size:16px;"><b>Author:</b><?php echo $author2; ?></h2><?php } ?>
                                           <?php if($del_charge2==2) { ?><p class="w3-text-red"><b>Delivery charge:Free</b></p><?php } ?>
                                                                     </div>
                                                                      <div class="w3-col  l3 w3-margin-top">
                                             <?php if(!empty($published2)) { ?><p><b>Published Year:</b><?php echo $published2; ?></p><?php } ?>
                                                                     <p><b>ক্যাটাগরি:</b><?php echo $cat_name; ?></p>
                                                                     </div>
                                                                      <div class="w3-col  l3 w3-margin-top">
                                                                     <p><b>Price:</b><?php echo $price2; ?>tk</p>
                                                                     <p><b>Discount:</b><?php echo $disc2; ?>%</p>
                                                                     <p><b>Final Price:</b><?php echo $f_price2; ?>tk</p>
                                                                     </div>
                                                                     <div class="w3-col  l3 w3-margin-top">
                                                                     <input type="hidden" name="b_id" value="<?php echo $book_id3; ?>">
                                                                     <input type="hidden" name="b_name" value="<?php echo $title2; ?>">
                                                                     <input type="hidden" name="au_name" value="<?php echo $author2; ?>">
                                                                     <p><b>Quantity:</b><input type="number" name="quant" class="w3-mobile quant" value="1" min="1"></p>
                                                                     <button onclick="add_to_cart(<?php echo $book_id3; ?>,<?php echo $sr-1; ?>)" style="background-color:#6D87FF;"  class="w3-margin-bottom w3-text-white w3-small w3-button  w3-round" >Add To Cart</button> <br>
                                                                     
                                                                     </div>
                                                 </div>
                       </div>
 </div>
                       
               
</div>


</div>

<?php
}
  if($sr>50)
  {
    break;
  }

}
}
}

} // for serch isset

?>


















<script src="cart.js"></script>

<?php
  
include 'footer.php';
?>
</body>