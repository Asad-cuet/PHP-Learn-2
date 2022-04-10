<?php
$main='';
$main.='
<div class="w3-panel">
   <h3>Main</h3>
      <div class="w3-red" id="msg"></div>     
      <div id="records" style="overflow-x:auto"></div>
</div>








<!--  Update Modal -->
  <div id="id02" class="w3-modal" style="padding-top:60px">
    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:450px;">
      <header class="w3-container w3-teal"> 
        <span onclick="model_close02()" class="w3-button w3-display-topright my-red w3-large"><b>&times;</b></span>
      </header>
       

      <div class="w3-panel">
           <div class="w3-border w3-border-blue w3-round" style="max-width:400px;width:100%;margin-left:auto;margin-right:auto">
                              <div class="w3-container w3-blue">
                                    <h3> Update</h3>
                              </div>
                              <div class="w3-container">
                                    
                                        
                                  
                                  <h6 class="w3-text-red">Title**</h6>
                                  <input required type="text" id="title" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                  
                                  

                                  <h6 class="w3-text-red">Sub-Title**</h6>
                                  <input required type="text" id="sub_title" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  <h6>Description</h6>
                                  <textarea required id="description" class="w3-block w3-border w3-border-gray w3-round w3-large"></textarea><br>  
                                  
                                    
                                  <h6>Cover Photo (Dimension:1900 x 1267)</h6>
                                  <input required type="file" id="up_image" class="w3-block w3-border w3-border-gray w3-round"><br>  
                                       
                                  
                                  <h6>Resume (Only PDF)</h6>
                                  <input required type="file" id="up_resume" class="w3-block w3-border w3-border-gray w3-round"><br>  
                                       
                                  

                                  <div class="w3-center w3-margin-top">
                                  <button onclick="update_save()" class="w3-button w3-red w3-round">Update</button>
                                  </div>
                                  <input type="hidden" id="hidden_id">
                                  <br>
                                 
                                  
                                  
                
                              </div> 

                
                
                      </div>   

           </div><br>


    </div>
  </div>
';
$main.='<script src="main_js.js"></script>';
echo $main;
?>


























