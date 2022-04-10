<?php
include '../config.php';
$read_query="SELECT * FROM user WHERE Id=1";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) 
{
    $name=$row[1];
    $email=$row[2];
}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8"> <!-- For Bangla Font -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css"> <!-- color Links -->
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<script src="../../asset/W3.JS.js"></script>  <!-- W3.Js library -->
<link rel="stylesheet" href="../../asset/W3.CSS-my.css">  <!-- W3.CSS library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- Icon Library -->
<head>
  <title>Page Title</title>
  <meta name="description" content="">   <!-- Complete it-->
  <meta name="keywords" content="">    <!-- Complete it-->
   
  <!-- Search engine related-->
  <meta name="robots" content="index, follow">
  <meta name="language" content="English">
  <meta name="revisit-after" content="1 days">

  <link rel="icon" type="image/jpg" sizes="16x16" href="Book cellar bd icon.jpg"> <!-- favicon,  Edit it -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  <!-- Jquery Library -->
   <!-- Bootstrap 4  Library -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
</style>
<script>   //jquery goes here
$(document).ready(function(){
  $("selector").event(function(){ //event=click,dbclick,mouseenter,mouseleave,hover,focus[click on],blur[click outside].
    $("selector").action(interval); //hide(),show(),toggle(),fadeIn(),fadeOut(),fadeToggle(),addClass(""),removeClass(""),css("property","value")
  });
});
</script>  
</head>
<body class="w3-sans-serif">


<div class="w3-panel">
<div class="w3-border w3-border-blue w3-round" style="max-width:400px;width:100%;margin-left:auto;margin-right:auto">
                              <div class="w3-container w3-blue">
                                    <h3> Update</h3>
                              </div>
                              <?php if(isset($_REQUEST['red_msg']))
                              {

                              ?>
                              <div class="w3-container w3-red">
                                    <h3> Password Not Matched!!!</h3>
                              </div>
                              <?php
                              }
                              
                               ?>
                              <?php if(isset($_REQUEST['green_msg']))
                              {

                              ?>
                              <div class="w3-container w3-green">
                                    <h3>Updated!!!</h3>
                              </div>
                              <?php
                              }
                              
                               ?>
                              <div class="w3-container">
                                    
                                  <form action="update.php" method="POST" enctype="multipart/form-data"><br>
                                        
                
                                  <h6>Name</h6>
                                  <input required type="text" value="<?php echo $name; ?>" name="name" class="w3-block w3-border w3-border-gray w3-round"><br>  
            
                                  <h6>Email</h6>
                                  <input required type="email" value="<?php echo $email; ?>" name="email" class="w3-block w3-border w3-border-gray w3-round"><br>  
            
                                  <h6>Password</h6>
                                  <input required type="text" name="pass1" class="w3-block w3-border w3-border-gray w3-round"><br>  
                                  
                                  <h6>Confirm Password</h6>
                                  <input required type="text" name="pass2" class="w3-block w3-border w3-border-gray w3-round"><br>  
                                  
                       
                                  <div class="w3-center w3-margin-top">
                                  <input type="submit" value="Update" class="w3-button w3-red w3-round">
                                  </div>
                                  <br>
                                  
                                  </form>
                
                              </div> 

                
                
                      </div>   

</div>






</body>
</html>