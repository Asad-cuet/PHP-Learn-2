<?php
include 'admin/config.php';
include 'admin/function.php';
$read_query="SELECT * FROM main WHERE Id=1";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) 
{
    $title=$row[1];
    $sub_title=$row[2];
    $image=$row[3];
    $sm_image=$row[6];
    $desc=$row[4];
    $resume=$row[5];
}
if(isset($_REQUEST['submit_']))
{
      
      $name=input("name");
      $email=input("email");
      $subject=input("subject");
      $msg=input("message");
      $time=my_time();
      $insert_query="INSERT INTO contact (Name,Email,Description,Date,Subject) VALUES ('$name','$email','$msg','$time','$subject')";
      $send=mysqli_query($connection,$insert_query);

      /*
      $to_mail="asadul7733@gmail.com";
      $subject_=$subject;
      $body="Email from:".$email;
      $body.=$msg;
      $header="From:mytest7733@gmail.com";
      mail($to_mail,$subject,$body,$header);
      */

      if($send)
      {
      echo "<script>location.replace('http://localhost/PHP%20%20learn%202/i_portfolio/index.php');</script>";
      }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Asadul Islam</title>
  <meta content="Hello,I am a professional web developer.This is my portfolio.I hope you like it" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>
<style>

.my-res-form {
  margin-left:auto;
  margin-right:auto;
}
</style>
<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="admin/uploads/<?php echo $sm_image; ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Asadul Islam</a></h1>
        <div class="social-links mt-3 text-center">
          
          <a href="https://www.facebook.com/profile.php?id=100007045878596" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/asadul7733/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="https://www.linkedin.com/in/asadul-islam-2940b21b2" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
       <!--   <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li> -->
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="background: url('admin/uploads/<?php echo $image; ?>') top center;">
    <div class="hero-container" data-aos="fade-in">
      <h1>Asadul Islam</h1>
      <p>I'm <span class="typed" data-typed-items="Fullstack Developer, Freelancer, Photographer, Little Graphics Designer"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="admin/uploads/<?php echo $sm_image; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3> Web Developer.</h3>
            <p class="fst-italic">
             
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>15 December 1999</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><a href="https://bookcellarbd.com/developer.php" target="_blank">Click here to watch my experience</a></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>01781856861</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Dhaka, Bangladesh</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>21+</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>B.S.C running in Engineering </span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>asadul7733@gmail.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p>
            <?php echo $desc; ?>
             </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
         </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">

            <div class="progress">
              <span class="skill">HTML <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">CSS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">JavaScript <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="progress">
              <span class="skill">Jquery <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Ajax<i class="val">70%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">PHP <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
          
        </div>

     

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

<?php
$read_query2="SELECT * FROM portfolio";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result2=mysqli_query($connection,$read_query2);
while($row2=mysqli_fetch_row($result2)) 
{
    $port_title=$row2[1];
    $port_image=$row2[3];

  
  
?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="admin/uploads/<?php echo $port_image; ?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="admin/uploads/<?php echo $port_image; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $port_title; ?>"><i class="bx bx-plus"></i></a>
                <a href="admin/uploads/<?php echo $port_image; ?>" title="<?php echo $port_title; ?>"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

<?php
}      
?>          
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
            <div class="icon"></div>
            <h4 class="title"><a href="">Frontend Design</a></h4>
            <p class="description">I can design front look of website</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"></div>
            <h4 class="title"><a href="">Customize Backend Site</a></h4>
            <p class="description">I am backend developer using Ajax and PHP</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"></div>
            <h4 class="title"><a href="">Backend Development</a></h4>
            <p class="description">I can convert your website into dynamic website</p>
          </div>
         
        </div>

      </div>
    </section><!-- End Services Section -->

  

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
    
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Savar, Dhaka, Bangladesh</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>asadul7733@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+880-01781856861</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9837.328652512773!2d90.25452494165324!3d23.84178787015233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1633494541640!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="my-res-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" type="text"  name="message" rows="10" required></textarea>
              </div><br>
              
              <div class="text-center"><input type="submit" name="submit_" value="Submit" class="btn btn-primary"></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>


