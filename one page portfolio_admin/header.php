<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['verified']))
{
      header("location:logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="W3.CSS-my.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Portfolio Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="#" onclick="read_dashboard()">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="#" onclick="read_main()">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Main
                            </a>
                            <a class="nav-link" href="#" onclick="read_about()">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                About
                            </a>
                            <a class="nav-link" href="#" onclick="read_port()">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Portfolio
                            </a>
                            <a class="nav-link" href="#" onclick="read_contact()">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Message
                            </a>
                            
                            
                           

                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                

            
        <div id="getting_data"></div>



<script>
$(document).ready(function(){
    read_dashboard();
});
//reading data
function read_about()  
{
      var read="raed";
      $.ajax({
            url:"about.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#getting_data').html(data);
                
            }
      });
}
//reading data
function read_main()  
{
      var read="raed";
      $.ajax({
            url:"main.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#getting_data').html(data);
                
            }
      });
}


function read_port()  
{
      var read="raed";
      $.ajax({
            url:"portfolio.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#getting_data').html(data);
                
            }
      });
}
function read_dashboard()  
{
      var read="raed";
      $.ajax({
            url:"dashboard.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#getting_data').html(data);
                
            }
      });
}
function read_contact()  
{
      var read="raed";
      $.ajax({
            url:"contact.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#getting_data').html(data);
                
            }
      });
}

</script>

<?php include 'footer.php'; ?> 