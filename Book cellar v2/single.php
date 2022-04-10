<?php
session_start();
ob_start();

?>


<?php
include 'config.php';
if(isset($_REQUEST['book_id'])) {
$rec_book_id=htmlspecialchars($_REQUEST['book_id']);
}



$read_query2="SELECT * FROM Book_info LEFT JOIN category ON category.Category_id=Book_info.Category WHERE Book_id='$rec_book_id'";
$result2=mysqli_query($connection,$read_query2);

while($row=mysqli_fetch_row($result2)) {

    $title=htmlspecialchars($row[2]);
    $author=htmlspecialchars($row[3]);


}



      ?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="W3.CSS-my.css">
<script src="W3.JS.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <title><?php echo $title." by ".$author; ?> </title>
    <meta name="description" content="<?php echo $title." of ".$author; ?> in Book Cellar">
<meta name="keywords" content="About Book cellar Library,Book cellar,online library,Home delivery libarry,<?php echo $title.",".$author; ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<style>
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
  $(document).ready(function(){
 
 $("#").addClass("w3-dark-gray");

});

</script>  
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/color-01.css">
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">




<?php 
include 'header.php';



$read_query2="SELECT * FROM Book_info LEFT JOIN category ON category.Category_id=Book_info.Category WHERE Book_id='$rec_book_id'";
$result2=mysqli_query($connection,$read_query2);

while($row=mysqli_fetch_row($result2)) {
    $pic=show($row[1]);
    $title=show($row[2]);
    $author=show($row[3]);
    $published=show($row[4]);
    $price=show($row[5]);
    $disc=show($row[6]);
    $f_price=show($row[7]);
    $cat_name=show($row[16]);
    $book_id2=show($row[0]);
    $del_charge=show($row[12]);
    $rating=show($row[13]);





      ?>


	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div style="margin-top:40px">
							  <ul class="slides">

							    <li data-thumb="assets/images/products/digital_18.jpg">
							    	<img src="admin/uploads/<?php echo $pic; ?>" style="width:200px" alt="product thumbnail" />
							    </li>

							  </ul>
							  </div>
							
						</div>
					<div class="detail-info">	
                            <h2 class="product-name"><?php echo $title; ?></h2>
                            <div class="short-desc">
                                <ul>
                                    <li>Author: <?php echo $author; ?></li>
                                    <li>Published Year: <?php echo $published; ?></li>
                                    <li>Free Felivery</li>
                                    <li>Main Price: <?php echo $price; ?></li>
                                    <li style="color:green">Discount: <?php echo $disc; ?></li>
                                </ul>
                            </div>
                            <div class="wrap-price"><span class="product-price"><?php echo $f_price; ?> tk</span></div>
                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>In Stock</b></p>
                            </div>
                            <div class="quantity">
                            	<span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >
									
									<a class="btn btn-reduce" href="#"></a>
									<a class="btn btn-increase" href="#"></a>
								</div>
							</div>
							<div class="wrap-butons">
								<a href="#" class="btn add-to-cart">Add to Cart</a>
							</div>
						</div>
					
					</div>
				</div><!--end main products area-->

			

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Related Products</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item sale-label">sale</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item bestseller-label">Bestseller</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
										<div class="wrap-price"><span class="product-price">$250.00</span></div>
									</div>
								</div>

							</div>
						</div><!--End wrap-products-->
					</div>
				</div>

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->


<?php
   }


?>
  <!-- Book show end-->







<?php
//include 'footer.php';
?>
</body>
</html>