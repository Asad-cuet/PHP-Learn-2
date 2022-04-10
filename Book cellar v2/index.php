<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
	
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/color-01.css">

	<!-- SLick links -->
	<link rel="stylesheet" href="css/slick.css">
     <link rel="stylesheet" href="css/slick-theme.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
.my-card {
    margin:10px;
}


.all {
    display:flex;
}
.cl-1 { width:100%; }
.slide-container {
       
       margin-left:90px;
       margin-right:90px;
       margin-top:20px;
       margin-bootom:20px;
       border:1px solid gray;
       }
.my-price { color:red }   
a { text-decoration:none; }    
@media screen and (max-width:400px)
{
      .slide-container {
            margin:15px!important;
      }
}   

</style>


      
</head>
<body class=" detail page ">
      <?php include 'header.php'; ?>


<!-- Slick slider   start -->

<div class="slide-container">
<div class="responsive" style="display:flex">



<?php
include 'config.php';
include 'slide.php';
$read_query="SELECT * FROM post ORDER BY Post_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
	$book_id=$row[1];


	$read_query2="SELECT * FROM book_info LEFT JOIN category ON book_info.Category=category.Category_id WHERE Book_id='$book_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
	$result2=mysqli_query($connection,$read_query2);
	while($row2=mysqli_fetch_row($result2)) {

      slider($row2);


	}
}
?>


</div>
</div>

<!-- Slick slider end -->









 




<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/my.js"></script>

</body>
</html>
