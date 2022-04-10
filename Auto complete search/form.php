<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8"> <!-- For Bangla Font -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css"> <!-- color Links -->
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<script src="W3.JS.js"></script>  <!-- W3.Js library -->
<link rel="stylesheet" href="W3.CSS-my.css">  <!-- W3.CSS library -->
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
<body>


<div class="w3-panel">
<div class="" style="width:100%;max-width:400px;margin-left:auto;margin-right:auto;">  

<input type="text" name="data" placeholder="Search.." id="data" class="w3-block w3-border w3-border-black w3-round">
<div id="list"></div>

</div>
</div>

<script>
$(document).ready(function() 
{
  $('#data').keyup(function()
  {
    var query= $('#data').val();
    if(query!='')
    {
      $.ajax ({
           url:"autocom.php",
           method:"POST",
           data:{query:query},
           success:function(re_data)
           {
             $('#list').fadeIn();
             $('#list').html(re_data);
           }
        });
    }
    else
    {
        $('#list').fadeOut();
        $('#list').html("");
    }
  });

   $(document).on('click','.click',function()
   {
     $('#data').val($(this).text());
     $('#list').fadeOut();
   });



});

 </script> 







</body>
</html>