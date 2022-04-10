<?php
$contact='';
$contact.='<div class="w3-panel">
<h3>Message</h3>
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
                                    <h3> Message</h3>
                              </div>
                              <div class="w3-container">
                                    
                                        
                                  <h5>Name:</h5>
                                  <div id="name"></div>
                                  <br>
                                        
                                  <h5>Email:</h5>
                                  <div id="email"></div>
                                  <br>

                                  <h5>Phone:</h5>
                                  <div id="phone"></div>
                                  <br>
                                        
                                  <h5 class="w3-text-red">Message:</h5>
                                  <div id="description"></div>
                                  <br>
                                        
                                  <h5>Date:</h5>
                                  <div id="date"></div>
                                  <br>
                                  

                                  
                                  
                                  
                                 
                                  
                                  
                
                              </div> 

                
                
                      </div>   

           </div><br>


    </div>
  </div>
';
$contact.='<script src="contact_js.js"></script>';
echo $contact;
?>













 









