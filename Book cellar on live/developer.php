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
    


<div class="w3-cell-row" style="background-color:">
     <div class="w3-cell">
               <div class="w3-container ">
               <h3>Developer of this Website</h3>
              <div class="w3-margin-right"> <img src="developer.jpg" style="width:100%;max-width:300px"></div>
               <p><b>Name:</b>Asadul Islam(Asad)</p>
               <p><b>Skill:</b>Frontend & Backend Developer using Html,Css,Css-Framework(Bootsrtap,W3.Css),Java-script and W3.Js,J-query and PHP.</p>
               <p><b>Work place:</b>Still Student</p>
               <p><b>Cell:</b>01781856861</p>
               <p><b>Email:</b>asadul7733@gmail.com</p>
               
               </div>
     </div>


</div>



<?php include'footer.php'; ?>
</body>
</html>