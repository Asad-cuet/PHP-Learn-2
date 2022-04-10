<?php
include 'header.php';
include 'config.php';
$read_query="SELECT * FROM user WHERE Id=1";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) 
{
    $name=$row[1];
    $email=$row[2];
}

?>



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

<?php include 'footer.php'; ?>
