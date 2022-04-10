<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$banner_registration = $row['banner_registration'];
}
?>

<?php
if (isset($_POST['form1'])) {
    
    
    if($_POST['password1']==$_POST['password2'])
    {

         $connection= mysqli_connect('localhost','azmaiens_blood','Pa_vB8q4T8Ql','azmaiens_blood');#mysqli_connect('HostName','Username','Password','DB_Name');
    	$token = md5(uniqid(rand(), true));
    	
    	$name=$_POST['agent_name'];
    	$dob=$_POST['dob'];
    	$cnic=$_POST['cnic'];
    	$permanent_jela=$_POST['permanent_jela'];
    	$permanent_address=$_POST['permanent_address'];
    	$present_jela=$_POST['present_jela'];
    	$present_address=$_POST['present_address'];
    	$blood_group=$_POST['blood_group'];
    	$agent_username=$_POST['agent_username'];
    	$agent_email=$_POST['agent_email'];
    	$agent_phone=$_POST['agent_phone'];
    	$password=md5($_POST['password1']);
    	$gender=$_POST['gender'];
    	
    	
    	$now = time();
    	$last_donate=$_POST['last_day']."-".$_POST['last_day']."-".$_POST['last_day'];
    
    	
      
           
		// saving into the database
		
		$insert_query="INSERT INTO tbl_agent (agent_name, dob, cnic, permanent_jela, permanent_address, present_jela, present_address, blood_group, username, agent_email,agent_phone,agent_password, agent_token, agent_time, last_donate, gender) 
		VALUES ('$name','$dob','$cnic','$permanent_jela','$permanent_address','$present_jela','$present_address','$blood_group','$agent_username','$agent_email','$agent_phone','$password','$token','$now','$last_donate','$gender')";
        $send=mysqli_query($connection,$insert_query);
        
        if($send) { $registered=1; } 
        
        
        
        

		        
		       
		        
		        
		        
		        //Collecting ID
		        
		      $statement = $pdo->prepare("SELECT * FROM tbl_blood_group WHERE blood_group_name=?");
                $statement->execute(array(strtoupper($_POST['blood_group'])));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                $blood_group_id = null;
                foreach ($result as $row) {
                	$blood_group_id = $row['blood_group_id'];
                } 
                
                
               
                
                
                //Collecting ID
               $statement = $pdo->prepare("SELECT * FROM tbl_agent WHERE agent_email=?");
                $statement->execute(array($_POST['agent_email']));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                $user_id = null;
                foreach ($result as $row) {
                	$user_id = $row['agent_id'];
                } 
   
             // Adding data into the tbl_car table
             $address=$present_address.",".$present_jela;
             
             $connection= mysqli_connect('localhost','azmaiens_blood','Pa_vB8q4T8Ql','azmaiens_blood');#mysqli_connect('HostName','Username','Password','DB_Name');
             $insert_query2="INSERT INTO tbl_donor (name, gender, date_of_birth, blood_group_id, email, phone, address, agent_id, status) 
		                    VALUES ('$name','$gender','$dob','$blood_group_id','$agent_email','$agent_phone','$address','$user_id',0)";
             $send2=mysqli_query($connection,$insert_query2);
             if($send2) { $success=1; } 
   
                
        				
        				
        				
        				
        				
		// Send email for confirmation of the account
        $to = $_POST['agent_email'];
        
        $subject = 'Registration Email Confirmation for ' . BASE_URL;
        $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
        $message = '
Thank you for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br><br>

Please click this link to activate your account:
<a href="'.$verify_link.'">'.$verify_link.'</a>';

		$headers = "From: noreply@" . BASE_URL . "\r\n" .
				   "Reply-To: noreply@" . BASE_URL . "\r\n" .
				   "X-Mailer: PHP/" . phpversion() . "\r\n" . 
				   "MIME-Version: 1.0\r\n" . 
				   "Content-Type: text/html; charset=ISO-8859-1\r\n";
				   
        mail($to, $subject, $message, $headers); // Send the email

    	unset($_POST['agent_name']);

    	unset($_POST['agent_email']);
    	unset($_POST['agent_phone']);
    	unset($_POST['agent_address']);



    	$success_message = 'Your registration is completed. Please check your email address to follow the process to confirm your registration.';
    	
    }
    
    else 
    {
        $incorrect=1;
    }
    
}
    
    

?>

<div class="banner-slider" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$banner_registration; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Donner Registration</h1>
		</div>
	</div>
</div>


		
			
				
				<?php
				if($error_message != '') {
					echo "<script>alert('".$error_message."')</script>";
				}
				if($success_message != '') {
					echo "<script>alert('".$success_message."')</script>";
				}
				?>
				
				
				<div class="w3-panel">
				<form class="w3-card-4" method="POST" style="width:100%;max-width:650px;margin-left:auto;margin-right:auto;">
				    
				    <div class="w3-container w3-red w3-center"><h2><b>রেজিস্ট্রেশন ফরম</b><h2></div>
				    
				    <div class="w3-panel">
				        
				    <?php if(isset($incorrect)) { echo '<h3 class="w3-red">Password not matched</h3>'; }  ?>    
				    <?php if(isset($registered)) { echo '<h3 class="w3-green">Registration completed</h3>'; }  ?>    
				        
				        
				        <h6>নাম<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="agent_name" value="" class="form-control w3-block w3-large w3-round">
				        
				        
				        
				        <div class="w3-panel w3-border"> <div class="w3-center">  <span class="w3-text-red">স্থায়ী ঠিকানা</span></div>
				        
				        <h6>জেলা<span class="w3-text-red">*</span></h6>
				        <select required name="permanent_jela" class="form-control custom-select" id="s_district">
											<option value="পঞ্চগড়">পঞ্চগড়</option>
											<option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
											<option value="দিনাজপুর">দিনাজপুর </option>
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
											<option value="অন্যান্য">অন্যান্য</option>
										</select>  
				        
				        
				        
				        
				        <h6>ঠিকানা<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="permanent_address" value="" class="form-control w3-block w3-large w3-round"><br>
				        
				        </div>
				        
				        
				        
				        
				        <div class="w3-panel w3-border"> <div class="w3-center">  <span class="w3-text-red">বর্তমান ঠিকানা</span></div>
				        
				        <h6>জেলা<span class="w3-text-red">*</span></h6>
				        <select required name="present_jela" class="form-control custom-select" id="s_district">
											<option value="পঞ্চগড়">পঞ্চগড়</option>
											<option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
											<option value="দিনাজপুর">দিনাজপুর </option>
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
											<option value="অন্যান্য">অন্যান্য</option>
										</select>  
				        
				        
				        
				        
				        <h6>ঠিকানা<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="present_address" value="" class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        </div>
				        
				        
				        <h6>ইমেইল ঠিকানা (যদি থাকে)</h6>
				        <input type="text" name="agent_email" value="" placeholder="ইমেইল " class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        <h6>Username<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="agent_username" value="" class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        
				        <h6>মোবাইল নাম্বার ( ইংরেজি )<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="agent_phone" value="" placeholder="মোবাইল নাম্বার" class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        
				        
				        
				        <h6>NID Card Number(English)<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="cnic" value="" placeholder="NID No." class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        
				        
				        <h6>রক্তের গ্রুপ<span class="w3-text-red">*</span></h6>
				        <select required name="blood_group" class="form-control custom-select" id="district">
									<option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'a+' ? 'selected': ''; } ?> value='a+'>A+ (A Positive)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'a-' ? 'selected': ''; } ?> value='a-'>A- (A Negative)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'b+' ? 'selected': ''; } ?> value='b+'>B+ (B Positive)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'b-' ? 'selected': ''; } ?> value='b-'>B- (B Negative)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'ab+' ? 'selected': ''; } ?> value='ab+'>AB+ (AB Positive)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'ab-' ? 'selected': ''; } ?> value='ab-'>AB- (AB Negative)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'o+' ? 'selected': ''; } ?> value='o+'>O+ (O Positive)</option>
								    <option <?php if(isset($_POST['blood_group'])){echo $_POST['blood_group'] == 'o-' ? 'selected': ''; } ?> value='o-'>O- (O Negative)</option>
						</select><br>
						
						
						
						
						<h6>সর্বশেষ রক্ত দানের তারিখ*<span class="w3-text-red">*</span></h6>
						
						
						
						
						<div class="w3-row">
											
											<div class="w3-col l4 m12 s12">
												<select required name="last_day" class="form-control custom-select" id=""> 
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
											</div>
											<div class="w3-col l4 m12 s12">
												<select required name="last_month" class="form-control custom-select" id=""> 
													<option value="January">January</option>
													<option value="February">February</option>
													<option value="March">March</option>
													<option value="April">April</option>
													<option value="May">May</option>
													<option value="June">June</option>
													<option value="July">July</option>
													<option value="August">August</option>
													<option value="September">September</option>
													<option value="October">October</option>
													<option value="November">November</option>
													<option value="December">December</option>
												</select>
											</div>
											
											<div class="w3-col l4 m12 s12">
												<select required name="last_year" class="form-control custom-select" id=""> 
													
													<option value="2017">2017</option>
													
													<option value="2018">2018</option>
													
													<option value="2019">2019</option>
													
													<option value="2020">2020</option>
													
													<option selected="" value="2021">2021</option>
																									</select>
											</div>
						</div><br>
						
						
						
						
						<div class="input_item w3-row">
									<div class="custom-control custom-radio w3-col l6">
										<input type="radio" id="male" name="gender" class="custom-control-input" value="male" checked="">
										<label class="custom-control-label" for="male">পুরুষ</label>
									</div>
									<div class="custom-control custom-radio w3-col l6">
										  <input type="radio" id="female" value="female" name="gender" class="custom-control-input">
										  <label class="custom-control-label" for="female">নারী</label>
					            	</div>
					            	
									<span class="w3-text-red"><small>নারী ডোনারদের ফোন নম্বর গোপন রাখা হবে।</small></span>
						</div><br>
						
						
						
						<div class="input_item">
									<label for="birthday2">জন্ম তারিখ<span>*</span>:</label>
									<input required type="date" name="dob" class="form-control" id="birthday2" placeholder="জন্ম তারিখ" autocomplete="off">
						</div><br>
						
						
						
						
						<div class="input_item">
									<label for="password">পাসওয়ার্ড<span>*</span></label>
									<input required type="password" name="password1" id="pass1" class="form-control" id="password" placeholder="পাসওয়ার্ড" required="">
						</div><br>
						
						
						
						<div class="input_item">
									<label for="cnfpassword"> কনফার্ম পাসওয়ার্ড<span>*</span></label>
									<input required type="password" name="password2" id="pass2" class="form-control" id="cnfpassword" placeholder="কনফার্ম পাসওয়ার্ড" required="">
						</div>
						<div id="pass_msg" class="w3-text-red w3-container"></div>
						<div id="pass_msg2" class="w3-text-green w3-container"></div><br>
						
						
						
						<div class="submit "> 
									<input type="submit" name="form1" value="রেজিস্ট্রেশন" class="w3-button w3-black w3-round">
						</div><br>
						
						
						<script>
						$(document).ready(function(){
						    $('#pass2').keyup(function()
  {
						    var pass1=$('#pass1').val();
						    var pass2=$('#pass2').val();
						    if(pass1!=pass2) { $('#pass_msg').html("<h4>Password not matched yet</h4>");$('#pass_msg2').html(''); } 
						    if(pass1==pass2) { $('#pass_msg').html('');$('#pass_msg2').html('<h4>Password Matched</h4>'); } 
  });
					
						});
						    
						</script>
						
						
						
						
						
						
						
						
						
						<div class="bottom_text_area">
										<div class="text_area w3-text-red"> 
											<a href=""><p>পাসওয়ার্ড ভুলে গেলে যোগাযোগ করুন</p></a>
										</div>
										<div class="requeryment_area">
											<ul>
												<li>১.রোগীর ব্যাপারে বিস্তারিত জেনে নিশ্চিত হয়ে রক্ত দিন  </li><br>
												<li>২.প্রতিবার রক্তদানের পর করে তারিখ পরিবর্তন করে দিন বা  যোগাযোগ  করুন  </li><br>
												<li>৩. রোগি দেখে রক্তদান করুন। অবশ্যই রোগির নিকট উপস্থিত রোগির আত্মীয়ের সাথে কথা বলে জানিয়ে দিন যে আপনি স্বেচ্ছায় এবং বিনামূল্যে রক্তদান করছেন। যাতে দালাল, আত্মীয় সেজে কিংবা তৃতীয় পক্ষের কেউ দুর্নীতি করতে না পারে।</li><br>
												<li>৪.আপনার সংগঠনের নাম দেখতে চাইলে আমাদের সাথে যোগাযোগ করুন  </li><br>
												
											</ul>
										</div>	
									
						</div><br>
						
				        
				    </div>
				    
				    
				    
				    
				</form>
				</div>
				
							
							
							
							
								
							

			<div class="login-here">
				<h3><i class="fa fa-user-circle-o"></i> Already a Member? <a href="<?php echo BASE_URL.URL_LOGIN; ?>">Login Here</a></h3>
			</div>			
				
	
	
<?php require_once('footer.php'); ?>