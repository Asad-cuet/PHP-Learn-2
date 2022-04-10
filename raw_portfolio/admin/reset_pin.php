<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['matched2723']) && !isset($_SESSION['email2723']))
{
  header("location:reset.php");
}
?>
<?php include 'function.php';


$sent_pin=verify_email($_SESSION['email2723']);
$_SESSION['pin2723']=$sent_pin;


if(isset($_REQUEST['reset_']))
{
  $pin=input("pin");

  
      if($pin==$_SESSION['pin2723'])
      {
            $_SESSION['change2723']=1;
            header("location:change_pass.php");      

      }
      else
      {
            $red_msg=1;
      }

}

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8"> <!-- For Bangla Font -->
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="W3.JS.js"></script>  <!-- W3.Js library -->
<link rel="stylesheet" href="W3.CSS-my.css">  <!-- W3.CSS library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Icon Library -->
<script src="https://www.w3schools.com/appml/2.0.3/appml.js"></script>  <!-- AppMl Link-->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!-- Jquery Library -->
   <!-- Bootstrap 4  Library -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body, html {
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    * {
      box-sizing: border-box;
    }
    
    .bg-img {
      /* The image used */
      background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("bg-image.jpg");
    
      min-height: 100%;
    
      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    .my-dark {
      background-color:rgba(0, 0, 0, 0.5);
    }
    
    </style>
<script>   //jquery goes here
$(document).ready(function(){
  $("selector").event(function(){ //event=click,dbclick,mouseenter,mouseleave,hover,focus[click on],blur[click outside].
    $("selector").action(interval); //hide(),show(),toggle(),fadeIn(),fadeOut(),fadeToggle(),addClass(""),removeClass(""),css("property","value")
  });
});
</script>  
</head>
<body class="w3-sans-serif bg-img">
<div class="my-h-v-center-container-body w3-text-white">

<div class="w3-container my-dark">
      
     <div class="w3-center w3-margin"><h3>Password Reset</h3></div>

     <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
     
     <?php if(isset($red_msg)) { echo "<h3 class='w3-red'>Pin not matched</h3>"; } ?>
    
            <div class="w3-panel">
            <p>A pin sent to your email.Check spam email also.</p>      
            <h6>Enter pin</h6>
            <input type="text" name="pin" class="w3-border w3-border-white w3-mobile my-dark w3-round w3-text-white w3-block" placeholder="Pin">
            </div> 


            <div class="w3-panel w3-center w3-margin-bottom">
            <input type="submit" value="Submit" name="reset_" class="w3-button my-dark">
            </div>
         

      </form>
</div>


</div>
</body>
</html>


