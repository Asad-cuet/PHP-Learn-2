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
<link rel="stylesheet" href="css/slick.css">
<link rel="stylesheet" href="css/slick-theme.css">


<!-- Serach engine related -->
<link rel="icon" type="image/jpg" sizes="16x16" href="Book cellar bd icon.jpg"> <!-- favicon,  Edit it -->
<title>Book Cellar BD | An online library in Bangladesh</title>

<meta name="description" content="Feel free to contact">
<meta name="keywords" content="Contact book cellar bd,book cellar contact,book cellar bd conatct">

<style>
.my-card {
    margin:10px;
}


.all {
    display:flex;
}
.cl-1 { height:100%;width:auto;margin-left:auto;margin-right:auto; }
.slide-container {
       
       margin-left:90px;
       margin-right:90px;
       margin-top:20px;
       
      
       }
.my-price { color:red }   
a { text-decoration:none; }    

@media screen and (max-width:400px)
{
      .slide-container {
            margin:0px!important;
      }
      .slick-prev,.slick-next
                       { 
                           
                           display:none!important;
                       }
             
} 
.res-title { font-size:16px; }  
.res-img { height:180px;overflow:hidden; }  
.res-flow { height:200px;overflow:hidden; }  
.res-button { font-size:12px;padding:5px; }    
.text-on-img {  }    
@media screen and (max-width:600px)
{
  .res-button { font-size:12px;padding:5px; }
}


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
<body class="w3-sans-serif" style="background-color:#3C415C">
<?php include 'header.php'; ?>

<div class="my-dark-gray"><?php include'notice.php'; ?></div>




<script type="text/javascript" src="js/slick.min.js"></script>
<?php
include 'config.php';
include 'slide.php';
$slide_n=0;
$read_query="SELECT * FROM slide";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
	$slide_name=$row[1];
	$slide_item=$row[2];

  $arr_id=explode(",",$slide_item);
  $len=count($arr_id);
  $slide_n++;
?>
<div class="slide-container w3-text-white"><h4 class="w3-margin-left"><?php echo $slide_name; ?></h4>
<div class="responsive<?php echo $slide_n; ?>" style="display:flex">
<?php
  for($i=0;$i<$len;$i++) 
  {
    $read_query2="SELECT * FROM Book_info LEFT JOIN category ON Book_info.Category=category.Category_id WHERE Book_id='$arr_id[$i]'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
    $result2=mysqli_query($connection,$read_query2);
    while($row2=mysqli_fetch_row($result2)) {
  
        slider($row2);
  
  
    }
  }
  ?>

</div>
</div>

<script>
      $('.responsive<?php echo $slide_n; ?>').slick({
  //dots: true,
  infinite: true,
  speed: 500,
  slidesToShow: 6,
  slidesToScroll: 1,
  centerMode: true,
  centerPadding: '30px',
  autoplay: true,
 autoplaySpeed: 1800,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        speed: 200,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

    
</script>
<?php



}
?>




<!-- Slick slider end -->



<?php
include 'footer.php';
?>
</body>
</html>