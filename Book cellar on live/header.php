
<!-- Navbar start-->
<div class="my-row w3-text-white" style="background-color:#0A1931;">
      <div class="my-logo w3-center">
            <img src="Book cellar bd icon.jpg" class="my-pic" style="width:80px;padding-top:15px;">
      </div>
      <div class="my-title">
            <div class="" style="padding-top:5px;">
            <h5 class="w3-text-lime"><a href="https://bookcellarbd.com/">Book Cellar BD</a></h5>
            <p>An Online Library</p>
            
      </div>
      </div>
<?php

$count=0;
if(isset($_SESSION['cart'])) {
  $count=count($_SESSION['cart']);
}

?>
      <div class="my-navbar">
                  <div class="w3-bar w3-padding">
                        <div class="w3-bar-item w3-button w3-right w3-hide-large w3-margin-left my-blue w3-round w3-border w3-border-white sidebar_open"><i class="fa fa-list w3-large"></i></div>
                        <a href="my-cart.php" class="w3-bar-item w3-button w3-right w3-border w3-border-white w3-round"><i class="fa fa-cart-plus w3-large"></i><span class="item_no"> (<?php echo $count; ?>)</span></a>
                        <div class="w3-bar-item w3-button w3-right w3-border w3-border-white w3-round w3-hide-large w3-hide-medium open_modal" style="margin-right:3px;"><i class="fa fa-search-plus"></i></div>
                        <a href="category_list.php" class="w3-bar-item w3-button w3-right my-blue w3-round w3-margin-left w3-margin-right w3-hide-small">Category List</a>
                        <div class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium w3-border-right w3-dropdown-hover">
                              
                               <div class="w3-text-red" style="margin-bottom:8px;"><i class="fa fa-search-plus"></i> অনুসন্ধান <i class="fa fa-caret-down"></i></div>
                               <div class="w3-dropdown-content w3-bar-block w3-text-white w3-stretch" style="background-color:#125D98">
                                     <div class="w3-animate-right">
                                     <a class="w3-bar-item w3-button open_modal" href="#">Search Your Book</a>
                                     <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
                                     <a href="about_us.php" class="w3-bar-item w3-button">About Us</a>
                                     <a href="developer.php" class="w3-bar-item w3-button">About Developer</a>
                                    </div>
                               </div>
                        </div>
                        <a href="book_list.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium my-hide-large"><i class="fa fa-book"></i> Book List</a>
                        <a href="trend.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium my-hide-large"><i class="fa fa-book"></i> Trending Book</a>
                        <a href="free.php" class="w3-bar-item w3-button w3-right w3-hide-small w3-hide-medium"><i class="fa fa-book"></i> Free Delivery Book</a>
                        <a href="index.php" class="w3-bar-item w3-button my-blue w3-right w3-round-large w3-hide-small"><i class="fa fa-home"></i> হোম</a>
                  </div>
      </div>
</div>

<!-- Navbar End-->



<!-- Sidebar Start-->

<div id="sidebar" class="w3-bar-block sidebar w3-top w3-text-white w3-animate-left my-dark-gray my-text-white2" style="width:200px;display:none;">
      <div class="w3-row w3-large">
            <a href="https://bookcellarbd.com/" class="w3-col w3-center w3-text-lime" style="width:75%"><h5>Book Cellar BD</h5></a>
            <div id="sidebar_close" class="w3-col w3-button w3-right my-red" style="width:25%"><b>X</b></div>
      </div>
      <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> হোম</a>
      <a href="free.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i> Free Delivery Book</a>
      <a href="trend.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i> Trending Book</a>
      <a href="book_list.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i> Book List</a>
      <a href="category_list.php" class="w3-bar-item w3-button w3-right w3-border w3-border-red">Category List</a>
      <div class="w3-bar-item w3-button w3-right w3-border w3-border-red open_modal">Search Your Book</div>
      <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
      <a href="about_us.php" class="w3-bar-item w3-button">About Us</a>
      <a href="developer.php" class="w3-bar-item w3-button">About Developer</a>
</div>
<!-- Sidebar End-->



<!-- Sticky Navbar start-->
<div class="my-sticky-header hide w3-text-white" id="myHeader" style="background-color:#0A1931;">         
                        <div class="w3-bar w3-padding">
                              <div class="w3-bar-item w3-button w3-right w3-margin-left my-blue w3-round w3-border w3-border-white sidebar_open"><i class="fa fa-list w3-large"></i></div>
                              <a href="my-cart.php" class="w3-bar-item w3-button w3-right w3-border w3-border-white w3-round w3-margin-left"><i class="fa fa-cart-plus w3-large"></i><span class="item_no"> (<?php echo $count; ?>)</span></a>
                        </div>
         
</div>

<!-- Sticky Navbar End-->



<div class="w3-modal" id="modal">
    <div class="w3-modal-content w3-text-white">
      <div class="w3-container" style="background-color:#334756;">
        <h3>Search Box</h3>
        <span id="close_modal" class="w3-display-topright w3-button w3-red">X</span>
        <div class="w3-margin w3-center">
        <form method="POST" action="search.php" autocomplete="off">
           
           <input required type="text" id="data" name="data" placeholder="Search..." class="search w3-right w3-bar-item w3-border-black w3-round w3-block">
           <input type="submit" value="Search" name="search_" class="w3-bar-item w3-button w3-round" style="background-color:#2A5A72;">      
           </form>

        </div> 
      </div>

      <div>  
       <div id="list" class="w3-white w3-text-black" style="position:fixed"></div>
       </div>

    </div>
</div>











<div id="logo" class="w3-bar w3-hide-small w3-padding" style="background-color:#AABAC9;">
<div class="w3-bar-item">
    <div class="w3-display-container  w3-center w3-teal w3-card-4" style="width:100%;max-width:300px">
    <img id="my-slide" src="Book Cellar BD.jpg" alt="Book cellar bd" title="Book cellar cover picture" style="width:100%;max-width:600px" class="w3-animate-top w3-border w3-border-black">
    <img id="my-slide" src="Book cellar bd icon.jpg" alt="Book cellar bd" title="Book cellar logo" style="width:100%;max-width:600px" class="w3-animate-left w3-border w3-border-black">
     </div>
</div>
<div class="w3-bar-item w3-right my-mobile w3-text-darkgray w3-text-white">
    <div class="w3-button open_modal my-ani-color w3-black"><i class="fa fa-search-plus"></i>Search Book</div> 
</div>
</div>


<script>
myShow=w3.slideshow("#my-slide",3000);  //for slide show


window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
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


