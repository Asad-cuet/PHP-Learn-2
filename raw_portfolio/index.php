<?php
include 'admin/config.php';
$main_query="SELECT * FROM main";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$mains=mysqli_query($connection,$main_query);
while($main=mysqli_fetch_row($mains)) 
{
     $title=htmlspecialchars($main[1]);
     $cover=htmlspecialchars($main[3]);
     $desc=htmlspecialchars($main[4]);
     $resume=htmlspecialchars($main[5]);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />





        <link rel="stylesheet" href="asset/W3.CSS-my.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
	


    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Asadul Islam Hamzah</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" style="background: linear-gradient(to bottom, rgba(50, 77, 46, 0.5) 0%, rgba(92, 90, 66, 0.5) 100%), url('admin/uploads/<?php echo $cover; ?>');">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold <?php if(isset($_REQUEST['post'])) { echo "w3-text-red"; } ?>"><?php if(isset($_REQUEST['post'])) { echo "Succesfully Submitted"; } else { echo $title; } ?></h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5"><?php echo $desc; ?></p>
                        <a class="btn btn-primary btn-xl" href="admin/uploads/<?php echo $resume; ?>" target="_blank">Resume</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <div id="about" class="w3-conatiner w3-margin-top">

<?php
$about_query="SELECT * FROM about";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$abouts=mysqli_query($connection,$about_query);
while($about=mysqli_fetch_row($abouts)) 
{
     $about_title=htmlspecialchars($about[1]);
     $about_desc=htmlspecialchars($about[2]);
     $date=htmlspecialchars($about[3]);
     $about_img=htmlspecialchars($about[4]);
?>
              <div style="max-width:300px;width:100%;margin-left:auto;margin-right:auto;">
                      <div class="my-text-on-img-container w3-text-white" style="backfround-color:red;">
                               <img src="admin/uploads/<?php echo $about_img; ?>" alt="Avatar" class="w3-round">
                               <div class="overlay-left" style="background-color:rgba(0, 0, 0, 0.5);">
                                      <div class="my-img-text w3-center"><?php echo $about_title; ?><p><?php echo $date; ?></p></div>   
                               </div>
                      </div>
              
                     <div class="w3-center w3-large">
                           <p><?php echo $about_desc; ?></p>

                     </div>
              
               </div>

<?php
}
?>

        </div>

        <!-- Portfolio-->
        
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">


<?php
$portfolio_query="SELECT * FROM portfolio";  
$ports=mysqli_query($connection,$portfolio_query);
while($port=mysqli_fetch_row($ports)) 
{
     $port_title=htmlspecialchars($port[1]);
     $cat=htmlspecialchars($port[2]);
     $port_img=htmlspecialchars($port[3]);
?>

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="admin/uploads/<?php echo $port_img; ?>" title="<?php echo $port_title; ?>">
                            <img class="img-fluid" src="admin/uploads/<?php echo $port_img; ?>" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50"><?php echo $cat; ?></div>
                                <div class="project-name"><?php echo $port_title; ?></div>
                            </div>
                        </a>
                    </div>
          
<?php
}
?>

                </div>
            </div>
        </div>
        
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Ready to start your next project with me? Send me a messages and I will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Enter your name..." required />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" type="email" placeholder="name@example.com" required />
                                <label for="email">Email address</label>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="phone" type="text" required />
                                <label for="phone">Phone number</label>
                              </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                                <label for="message">Message</label>
                                </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" name="post" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
               
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - Company Name</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>



        <script type="text/javascript" src="slider/js/slick.min.js"></script>
        <script type="text/javascript" src="slider/js/my.js"></script>
    </body>
</html>

<?php

if(isset($_REQUEST['post']))
{
      include 'admin/function.php';
      $name=input("name");
      $email=input("email");
      $phone=input("phone");
      $msg=input("message");
      $time=my_time();
      $insert_query="INSERT INTO contact(Name,Email,Description,Date,Phone) VALUES ('$name','$email','$msg','$time','$phone')";
      $send=mysqli_query($connection,$insert_query);
      
}

?>