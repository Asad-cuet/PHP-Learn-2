<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['change2723']))
{
  header("location:reset.php");
}
?>
<?php include 'function.php';


if(isset($_REQUEST['reset_']))
{
  $pass1=input("pass1");
  $pass2=input("pass2");

  
      if($pass1==$pass2)
      {
            $email=$_SESSION['email2723'];
            $pass2=md5(md5($pass2));
            $update_query="UPDATE user SET Password='$pass2' WHERE Email='$email'";
            $update=mysqli_query($connection,$update_query); 
            session_unset();
            session_destroy();
            header("location:index.php?updated");


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
     
     <?php if(isset($red_msg)) { echo "<h3 class='w3-red'>Password not matched</h3>"; } ?>
    
            <div class="w3-panel">
                
            <h6>Enter New Password</h6>
            <input type="password" name="pass1" class="w3-border w3-border-white w3-mobile my-dark w3-round w3-text-white w3-block" placeholder="Password">
            </div> 

            <div class="w3-panel">
            <h6>Confirm New Password</h6>
            <input type="password" name="pass2" class="w3-border w3-border-white w3-mobile my-dark w3-round w3-text-white w3-block" placeholder="Password">
            </div> 


            <div class="w3-panel w3-center w3-margin-bottom">
            <input type="submit" value="Submit" name="reset_" class="w3-button my-dark">
            </div>
            

      </form>
</div>


</div>
</body>
</html>


