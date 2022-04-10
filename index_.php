<?php require_once('header.php'); ?>

<?php
$about_title = '';
$about_description = '';
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$total_recent_news_home_page = $row['total_recent_news_home_page'];
	$search_title = $row['search_title'];
	$search_photo = $row['search_photo'];
	$testimonial_photo = $row['testimonial_photo'];
	$about_title = $row['about_title'];
	$about_description = $row['about_description'];
}

$slider_photos = [];
$statement = $pdo->prepare("SELECT * FROM tbl_slider_photos");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
    $slider_photos[] = $row;
}

?>


	<div class='row'>
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
               <?php	
               $ic = 0;
    			foreach ($slider_photos as $row) {
    			?>
                <div class="item <?php echo $ic == 0 ? ' active' : ''; ?>" style='max-height: 500px; over-flow:hidden; width: 100%'>
                  <img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['path']; ?>" alt="Los Angeles">
                </div>
            <?php $ic++; } ?>
          </div>
        
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
	<!--Slider-Area End-->
	
	
	
	
	<div class="blood-gallery bg-gray">
		<div class="container">
	        <div class="row">
          <div class="col-md-8" style="/* padding: 0 10px; */">
            <div class="local-brands">
              <div class="title-style-1">
                <h3 style="color:#ee2d24"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $about_title; ?></font></font></h3>
              </div>
              <div class="row w3-center"> 
                
                <!--Local Service Box Start-->
                <div class="col-md-12 col-sm-12" style="padding: 0 10px">
				    <p style="text-align: justify;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $about_description; ?></font></font></p>
                </div>
                <!--Local Service Box End--> 
                
              </div>
            </div>
          </div>
          <div class="col-md-4" style="padding: 10px; background-color: #d8203b; min-height: 300px; border-radius: 5px; color: white;"> 
            <!--Mayor Msg Start-->
            
            
            
            
            <div class="header_content_area w3-text-black">
				
				<div class="row section_padding home_search_area">
					<div class="col-md-12 platelet-left-header">
						<h2 class="w3-text-white">Find Blood Donors From Here</h2>
						<hr>
						<form action="search_donor.php" method="post">
							<div class="form-group">
								<div class="select_grouph_area">
									<select name="blood_group_id" class="form-control custom-select" id="blood_group">
										<option value="all">All Group</option>
										<?php
                						$statement = $pdo->prepare("SELECT * FROM tbl_blood_group");
                						$statement->execute();
                						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
                						foreach ($result as $row) {
                							?>
                						
                							<option value="<?php echo $row['blood_group_id']; ?>"><?php echo $row['blood_group_name']; ?></option>
                							<?php
                						}
                						?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="select_location_area select_grouph_area"> 
									<select name="district" id="district" class="district select2-hidden-accessible" tabindex="-1" aria-hidden="true">
										<option value="all">All District</option>
										<option value="পঞ্চগড়">পঞ্চগড়</option>
										<option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
										<option value="দিনাজপুর ">দিনাজপুর </option>
										<option value="রংপুর">রংপুর </option>
										<option value="ঢাকা">ঢাকা</option>
										<option value="কুড়িগ্রাম">কুড়িগ্রাম</option>
										<option value="লালমনিরহাট">লালমনিরহাট</option>
										<option value="নীলফামারী">নীলফামারী </option>
										<option value="গাইবান্ধা">গাইবান্ধা</option>
										
										
										<option value="চট্টগ্রাম">চট্টগ্রাম</option> 
											<option value="রাজশাহী">রাজশাহী </option>
											<option value="সিলেট"> সিলেট </option>
											<option value="যশোর">যশোর</option>
											<option value="ময়মনসিংহ">ময়মনসিংহ</option>
											<option value="কুমিল্লা">কুমিল্লা </option>
											<option value="বরিশাল">বরিশাল</option>
											<option value="ফরিদপুর">ফরিদপুর </option>
											<option value="বগুড়া">বগুড়া </option>
											<option value="পাবনা">পাবনা </option>
											<option value="রাঙ্গামাটি">রাঙ্গামাটি </option>
											<option value="কুষ্টিয়া">কুষ্টিয়া </option>
											<option value="নোয়াখালী">নোয়াখালী </option>
											<option value="খুলনা">খুলনা</option>
											<option value="টাঙ্গাইল">টাঙ্গাইল </option> 
											<option value="ভোলা">ভোলা </option>
											<option value="বান্দরবান">বান্দরবান </option>
											<option value="চাঁদপুর">চাঁদপুর </option>
											<option value="হবিগঞ্জ">হবিগঞ্জ </option>
											<option value="লক্ষীপুর">লক্ষীপুর</option>
											<option value="বরগুনা">বরগুনা </option>
											<option value="ঝালকাঠি">ঝালকাঠি </option>
											<option value="পিরোজপুর">পিরোজপুর </option>
											<option value="পটুয়াখালী">পটুয়াখালী </option>
											<option value="ঝিনাইদহ">ঝিনাইদহ</option>
											<option value="নড়াইল">নড়াইল </option>
											<option value="মাগুরা">মাগুরা </option> 
											<option value="সাতক্ষিরা">সাতক্ষিরা</option>
											<option value="বাগেরহাট">বাগেরহাট </option>
											<option value="চুয়াডাঙ্গা">চুয়াডাঙ্গা </option>
											<option value="মেহেরপুর">মেহেরপুর </option>
											<option value="সিরাজগঞ্জ">সিরাজগঞ্জ </option>
											<option value="জয়পুরহাট">জয়পুরহাট </option>
											<option value="নাটোর">নাটোর</option>
											<option value="নওগাঁ">নওগাঁ </option>
											<option value="চাঁপাইনবাবগঞ্জ">চাঁপাইনবাবগঞ্জ</option>
											<option value="খাগড়াছড়ি">খাগড়াছড়ি </option>
											<option value="ফেনী">ফেনী </option>
											<option value="ব্রাহ্মণবাড়ীয়া">ব্রাহ্মণবাড়ীয়া </option>
											<option value="সুনামগঞ্জ">সুনামগঞ্জ</option>
											<option value="কক্সবাজার">কক্সবাজার </option>
											<option value="মৌলভীবাজার">মৌলভীবাজার </option>
											<option value="গোপালগঞ্জ">গোপালগঞ্জ </option>
											<option value="শরীয়তপুর">শরীয়তপুর </option>
											<option value="মাদারীপুর">মাদারীপুর </option>
											<option value="রাজবাড়ী">রাজবাড়ী </option>
											<option value="গাজীপুর">গাজীপুর </option>
											<option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
											<option value="জামালপুর">জামালপুর </option>
											<option value="শেরপুর">শেরপুর </option>
											<option value="নেত্রকোনা">নেত্রকোনা</option>
											<option value="মুন্সীগঞ্জ">মুন্সীগঞ্জ </option>
											<option value="নরসিংদী">নরসিংদী </option>
											<option value="নারায়ণগঞ্জ">নারায়ণগঞ্জ</option>
											<option value="মানিকগঞ্জ">মানিকগঞ্জ </option>
										
										
									</select></div>
							</div>
							<div class="form-group">
								<div class="search_button"> 
									<!-- <input name="send" value="খুঁজুন" name="search_button" type="submit"> -->
									<button type="submit" name="search_button" class="w3-button w3-dark-gray"><i class="fa fa-search"></i> <span>খুঁজুন</span></button>
								</div>
							</div>

							

						</form>
					</div>
					
				</div>

				</div>
            
            
            
            <!--
            
            <form action="<?php echo BASE_URL.URL_SEARCH; ?>" method="post">
                <div class="stay-connected">
                  <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Find blood donors from here</font></font></h3>
                  <ul>
                    <li>
                    	<select data-placeholder="Choose Blood Group" class="chosen-select form-control" name="blood_group_id">
    						<?php
    						$statement = $pdo->prepare("SELECT * FROM tbl_blood_group");
    						$statement->execute();
    						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
    						foreach ($result as $row) {
    							?>
    							<option></option>
    							<option value="<?php echo $row['blood_group_id']; ?>"><?php echo $row['blood_group_name']; ?></option>
    							<?php
    						}
    						?>
    					</select>
                    </li>
                    <li>
                    	<input autocomplete="off" type="text" name="city" style='margin-top: 10px' class="form-control" placeholder="Search by City Name">
                    </li>
                    <li>
                    	<input autocomplete="off" type="text" name="thana" style='margin-top: 10px' class="form-control" placeholder="Search by Thana">
                    </li>
                    <li>
                        <input type="submit" class='btn btn-primary col-md-12' style='margin-top: 10px' value="Submit Details">
                    </li>
                  </ul>
                </div>
            </form>
            
            -->
            
            
            
            <!--Mayor Msg End--> 
          </div>
        </div>    
	    </div>
	</div>
	
	
	
	
	
	
	<div class="blood-gallery bg-gray">
		<div class="container">
			<div class="row">
				<div class="headline">
					<h2>Blood Groups</h2>
					<div class="headline-icon" style="background-image: url(<?php echo BASE_URL; ?>img/blood.png)"></div>
				</div>
				<?php
				$statement = $pdo->prepare("SELECT * FROM tbl_blood_group");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
				foreach ($result as $row) {
					?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="blood-item">
							<a href="<?php echo BASE_URL.URL_BLOOD_GROUPWISE_RESULT.$row['blood_group_id']; ?>"><?php echo $row['blood_group_name']; ?></a>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>





	<div class="donner-list-area">
		<div class="container">
			<div class="row">
				<div class="headline">
					<h2>Recent Donors</h2>
					<div class="headline-icon" style="background-image: url(<?php echo BASE_URL; ?>img/blood.png)"></div>
				</div>
				<div class="donner-gallery owl-carousel">


					<?php
					$count = 0;
					$statement = $pdo->prepare("SELECT * 
											FROM tbl_donor t1
											JOIN tbl_blood_group t2
											ON t1.blood_group_id = t2.blood_group_id
											WHERE t1.status=?
											ORDER BY t1.donor_id DESC");
					$statement->execute(array(1));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {

						$agent_id = $row['agent_id'];

						// Check if this seller is active or inactive
						$statement1 = $pdo->prepare("SELECT * FROM tbl_agent WHERE agent_id=?");
						$statement1->execute(array($agent_id));
						$agent_status = $statement1->rowCount();
						if(!$agent_status) {continue;}

						$today = date('Y-m-d');

						$valid = 0;
						$statement1 = $pdo->prepare("SELECT * FROM tbl_payment WHERE agent_id=? AND payment_status=?");
						$statement1->execute(array($agent_id,'Completed'));
						$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result1 as $row1) {
							if(($today>=$row1['payment_date'])&&($today<=$row1['expire_date'])) {
								$valid = 1;
								break;
							}
						}
						if($valid == 1):
							$count++;
							if($count>20) {break;}
						?>
						<div class="donner-item">
							<div class="donner-list">
								
								<div class="donner-info">
									<h2><a href="<?php echo BASE_URL.URL_DONOR.$row['donor_id']; ?>"><?php echo $row['name']; ?></a></h2>
									<h4>Blood Group: <span><?php echo $row['blood_group_name']; ?></span> </h4>
									
									<div class="donner-link">
										<a href="<?php echo BASE_URL.URL_DONOR.$row['donor_id']; ?>">Read more</a>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>



	<!--Testimonial Area Start-->
	<div class="testimonial-area" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$testimonial_photo; ?>)">
		<div class="bg-2" style="background-color: #333;"></div>
		<div class="container">
			<div class="row">
				<div class="headline headline-white">
					<h2>Happy Customers</h2>
					<div class="headline-icon" style="background-image: url('<?php echo BASE_URL; ?>img/blood-white.png')"></div>
				</div>
				<div class="testimonial-gallery owl-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_testimonial");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
					foreach ($result as $row) {
						?>
						<div class="testimonial-item">
							<div class="testimonial-photo" style="background-image: url('<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>')"></div>
							<div class="testimonial-text">
								<h2><?php echo $row['name']; ?></h2>
								<h3><?php echo $row['designation'].'('.$row['company'].')'; ?></h3>
								<div class="testimonial-pra">
									<p>
										<?php echo $row['comment']; ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<!--Testimonial Area End-->

	<!--Latest News Start-->
	<div class="latest-news">
		<div class="container">
			<div class="row">
				<div class="headline">
					<h2><span>Latest</span> News</h2>
					<div class="headline-icon" style="background-image: url(<?php echo BASE_URL; ?>img/blood.png)"></div>
				</div>
				<div class="latest-gallery owl-carousel">
					<?php
					$i=0;
					$statement = $pdo->prepare("SELECT
									   t1.news_title,
			                           t1.news_slug,
			                           t1.news_content,
			                           t1.news_date,
			                           t1.photo,
			                           t1.category_id,

			                           t2.category_id,
			                           t2.category_name,
			                           t2.category_slug
			                           FROM tbl_news t1
			                           JOIN tbl_category t2
			                           ON t1.category_id = t2.category_id 		                           
			                           ORDER BY t1.news_id DESC");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);					
					foreach ($result as $row) {
						$i++;
						if($i>$total_recent_news_home_page) {break;}
						?>
						<div class="latest-item">
							<div class="latest-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>)"></div>
							<div class="latest-text">
								<h2><?php echo $row['news_title']; ?></h2>
								<ul>
									<li>Category: <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></a></li>
									<li>Date: <?php echo $row['news_date']; ?></li>
								</ul>
								<div class="latest-pra">
									<p>
										<?php echo substr($row['news_content'],0,120).' ...'; ?>
									</p>
									<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>">Read more</a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>

<?php require_once('footer.php'); ?>
