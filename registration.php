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
				    
				    <div class="w3-container w3-red w3-center"><h2><b>???????????????????????????????????? ?????????</b><h2></div>
				    
				    <div class="w3-panel">
				        
				    <?php if(isset($incorrect)) { echo '<h3 class="w3-red">Password not matched</h3>'; }  ?>    
				    <?php if(isset($registered)) { echo '<h3 class="w3-green">Registration completed</h3>'; }  ?>    
				        
				        
				        <h6>?????????<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="agent_name" value="" class="form-control w3-block w3-large w3-round">
				        
				        
				        
				        <div class="w3-panel w3-border"> <div class="w3-center">  <span class="w3-text-red">?????????????????? ??????????????????</span></div>
				        
				        <h6>????????????<span class="w3-text-red">*</span></h6>
				        <select required name="permanent_jela" class="form-control custom-select" id="s_district">
											<option value="??????????????????">??????????????????</option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="???????????????">??????????????? </option>
											<option value="????????????">????????????</option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="??????????????????????????????">??????????????????????????????</option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option> 
											<option value="???????????????????????????">???????????????????????????</option> 
											<option value="?????????????????????">????????????????????? </option>
											<option value="???????????????"> ??????????????? </option>
											<option value="????????????">????????????</option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="??????????????????">??????????????????</option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="??????????????????">?????????????????? </option>
											<option value="???????????????">??????????????? </option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????">???????????????</option>
											<option value="????????????????????????">???????????????????????? </option> 
											<option value="????????????">???????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="????????????????????????">????????????????????????</option>
											<option value="??????????????????">?????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="?????????????????????">?????????????????????</option>
											<option value="??????????????????">?????????????????? </option>
											<option value="??????????????????">?????????????????? </option> 
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="?????????????????????????????????">????????????????????????????????? </option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????">???????????????</option>
											<option value="???????????????">??????????????? </option>
											<option value="??????????????????????????????????????????">??????????????????????????????????????????</option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="????????????">???????????? </option>
											<option value="????????????????????????????????????????????????">???????????????????????????????????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="??????????????????">?????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="?????????????????????????????????">?????????????????????????????????</option>
											<option value="???????????????????????????">??????????????????????????? </option> 
											<option value="????????????????????????">????????????????????????</option>
										</select>  
				        
				        
				        
				        
				        <h6>??????????????????<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="permanent_address" value="" class="form-control w3-block w3-large w3-round"><br>
				        
				        </div>
				        
				        
				        
				        
				        <div class="w3-panel w3-border"> <div class="w3-center">  <span class="w3-text-red">????????????????????? ??????????????????</span></div>
				        
				        <h6>????????????<span class="w3-text-red">*</span></h6>
				        <select required name="present_jela" class="form-control custom-select" id="s_district">
											<option value="??????????????????">??????????????????</option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="???????????????">??????????????? </option>
											<option value="????????????">????????????</option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="??????????????????????????????">??????????????????????????????</option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option> 
											<option value="???????????????????????????">???????????????????????????</option> 
											<option value="?????????????????????">????????????????????? </option>
											<option value="???????????????"> ??????????????? </option>
											<option value="????????????">????????????</option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="??????????????????">??????????????????</option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="??????????????????">?????????????????? </option>
											<option value="???????????????">??????????????? </option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????">???????????????</option>
											<option value="????????????????????????">???????????????????????? </option> 
											<option value="????????????">???????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="????????????????????????">????????????????????????</option>
											<option value="??????????????????">?????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="?????????????????????">?????????????????????</option>
											<option value="??????????????????">?????????????????? </option>
											<option value="??????????????????">?????????????????? </option> 
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="?????????????????????????????????">????????????????????????????????? </option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????">???????????????</option>
											<option value="???????????????">??????????????? </option>
											<option value="??????????????????????????????????????????">??????????????????????????????????????????</option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="????????????">???????????? </option>
											<option value="????????????????????????????????????????????????">???????????????????????????????????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="???????????????????????????">??????????????????????????? </option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="????????????????????????">???????????????????????? </option>
											<option value="??????????????????">?????????????????? </option>
											<option value="???????????????????????????">???????????????????????????</option>
											<option value="??????????????????????????????">?????????????????????????????? </option>
											<option value="?????????????????????">????????????????????? </option>
											<option value="?????????????????????????????????">?????????????????????????????????</option>
											<option value="???????????????????????????">??????????????????????????? </option> 
											<option value="????????????????????????">????????????????????????</option>
										</select>  
				        
				        
				        
				        
				        <h6>??????????????????<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="present_address" value="" class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        </div>
				        
				        
				        <h6>??????????????? ?????????????????? (????????? ????????????)</h6>
				        <input type="text" name="agent_email" value="" placeholder="??????????????? " class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        <h6>Username<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="agent_username" value="" class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        
				        <h6>?????????????????? ????????????????????? ( ?????????????????? )<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="agent_phone" value="" placeholder="?????????????????? ?????????????????????" class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        
				        
				        
				        <h6>NID Card Number(English)<span class="w3-text-red">*</span></h6>
				        <input required type="text" name="cnic" value="" placeholder="NID No." class="form-control w3-block w3-large w3-round"><br>
				        
				        
				        
				        
				        <h6>?????????????????? ???????????????<span class="w3-text-red">*</span></h6>
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
						
						
						
						
						<h6>????????????????????? ???????????? ??????????????? ???????????????*<span class="w3-text-red">*</span></h6>
						
						
						
						
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
										<label class="custom-control-label" for="male">???????????????</label>
									</div>
									<div class="custom-control custom-radio w3-col l6">
										  <input type="radio" id="female" value="female" name="gender" class="custom-control-input">
										  <label class="custom-control-label" for="female">????????????</label>
					            	</div>
					            	
									<span class="w3-text-red"><small>???????????? ???????????????????????? ????????? ??????????????? ???????????? ???????????? ????????????</small></span>
						</div><br>
						
						
						
						<div class="input_item">
									<label for="birthday2">???????????? ???????????????<span>*</span>:</label>
									<input required type="date" name="dob" class="form-control" id="birthday2" placeholder="???????????? ???????????????" autocomplete="off">
						</div><br>
						
						
						
						
						<div class="input_item">
									<label for="password">???????????????????????????<span>*</span></label>
									<input required type="password" name="password1" id="pass1" class="form-control" id="password" placeholder="???????????????????????????" required="">
						</div><br>
						
						
						
						<div class="input_item">
									<label for="cnfpassword"> ????????????????????? ???????????????????????????<span>*</span></label>
									<input required type="password" name="password2" id="pass2" class="form-control" id="cnfpassword" placeholder="????????????????????? ???????????????????????????" required="">
						</div>
						<div id="pass_msg" class="w3-text-red w3-container"></div>
						<div id="pass_msg2" class="w3-text-green w3-container"></div><br>
						
						
						
						<div class="submit "> 
									<input type="submit" name="form1" value="????????????????????????????????????" class="w3-button w3-black w3-round">
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
											<a href=""><p>??????????????????????????? ???????????? ???????????? ????????????????????? ????????????</p></a>
										</div>
										<div class="requeryment_area">
											<ul>
												<li>???.??????????????? ???????????????????????? ??????????????????????????? ???????????? ????????????????????? ???????????? ???????????? ?????????  </li><br>
												<li>???.???????????????????????? ??????????????????????????? ?????? ????????? ??????????????? ???????????????????????? ????????? ????????? ??????  ?????????????????????  ????????????  </li><br>
												<li>???. ???????????? ???????????? ????????????????????? ??????????????? ?????????????????? ??????????????? ???????????? ????????????????????? ??????????????? ???????????????????????? ???????????? ????????? ????????? ?????????????????? ????????? ?????? ???????????? ??????????????????????????? ????????? ?????????????????????????????? ????????????????????? ?????????????????? ???????????? ???????????????, ?????????????????? ???????????? ??????????????? ??????????????? ?????????????????? ????????? ???????????????????????? ???????????? ?????? ???????????????</li><br>
												<li>???.??????????????? ????????????????????? ????????? ??????????????? ??????????????? ?????????????????? ???????????? ????????????????????? ????????????  </li><br>
												
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