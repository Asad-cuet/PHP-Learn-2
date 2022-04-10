<?php
session_start();
ob_start();
include 'product2.php';

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="W3.JS.js"></script>  <!-- W3.Js library -->
<link rel="stylesheet" href="W3.CSS-my.css">  <!-- W3.CSS library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Icon Library -->
<script src="https://www.w3schools.com/appml/2.0.3/appml.js"></script>  <!-- AppMl Link-->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!-- Jquery Library -->

<style>
/* width */
::-webkit-scrollbar {
  width: 10px;
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
</style>
<script>   //jquery goes here
$(document).ready(function(){
    $("#logo2").hide();
    $("#logo").hide();
 // $("#class_open").click(function(){
   // $("#class910").slideDown();
 // });
});
</script>  
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/color-01.css">
</head>
<body>
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
$read_query2="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id WHERE Keyword LIKE '%{$key}%';";
$result2=mysqli_query($connection,$read_query2);
$count=mysqli_num_rows($result2);
if($count>0)
     {
       ?>
<main id="main" class="main-site left-sidebar">

<div class="container">

             <div class="row">

                   <ul class="product-list grid-products equal-container">
       <?php
while($row=mysqli_fetch_row($result2)) {
    $pic=show($row[1]);
    $title=show($row[2]);
    $author=show($row[3]);
    $published=show($row[4]);
    $price=show($row[5]);
    $disc=show($row[6]);
    $f_price=show($row[7]);
    $cat_id=show($row[15]);
    $cat_name=show($row[16]);
    $book_id2=show($row[0]);

    
    array_push($cats,$cat_id); // id adding in array
    array_push($b_ids,$book_id2); // id adding in array



product2($row);

   }

   ?>
</ul>

</div>

</div><!--end container-->

</main>
   <?php
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
      ?>
      <main id="main" class="main-site left-sidebar">
      
      <div class="container">
      
                   <div class="row">
      
                         <ul class="product-list grid-products equal-container">
             <?php
while($row2=mysqli_fetch_row($result3)) {
    $pic2=show($row2[1]);
    $title2=show($row2[2]);
    $author2=show($row2[3]);
    $published2=show($row2[4]);
    $price2=show($row2[5]);
    $disc2=show($row2[6]);
    $f_price2=show($row2[7]);
    $cat_id2=show($row2[15]);
    $cat_name2=show($row2[16]);
    $book_id3=show($row2[0]);
  
  for($j=0;$j<$a_length;$j++)  // Checking Previous print
{
    if($book_id3==$b_ids[$j])
    {
        $printed=1;
    }

    
}

if($printed==1)
{
    $printed=0;
    continue;
}

product2($row2);

}
?>
</ul>

</div>

</div><!--end container-->

</main>
<?php
}
}
}

} // for serch isset

?>




















<?php
  
include 'footer.php';
?>
</body>