<?php
$portfolio='';
$portfolio.='<div class="w3-panel">
<h3>Portfolio</h3>
          <div class="w3-bar w3-margin-bottom">
                <div class="w3-bar-item w3-right w3-button w3-blue" onclick="port_insert()">Insert</div>
           </div>
           <div class="w3-red" id="msg"></div>     
      <div id="records" style="overflow-x:auto"></div>
      </div>




   <!--  CReate Modal -->
<div id="id01" class="w3-modal" style="padding-top:60px">
    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:450px;">
      <header class="w3-container w3-teal"> 
        <span onclick="model_close()" class="w3-button w3-display-topright my-red w3-large"><b>&times;</b></span>
      </header>
       

      <div class="w3-panel">
           <div class="w3-border w3-border-blue w3-round" style="max-width:400px;width:100%;margin-left:auto;margin-right:auto">
                              <div class="w3-container w3-blue">
                                    <h3> Create</h3>
                              </div>
                              <div class="w3-container">
                                        
                              
                                  <h6 class="w3-text-red">Title**</h6>
                                  <input type="text" id="title" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                  
                                  
                                  

                                  <h6 class="w3-text-red">Category**</h6>
                                  <input type="text" id="category" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  
                                    
                                  <h6>Picture (Dimension:650 x 350)</h6>
                                  <input required type="file" id="image"  class="w3-block w3-border w3-border-gray w3-round"><br>  
                                  
                                    
                               
                                  

                                  <div class="w3-center w3-margin-top">
                                  <button onclick="create()" class="w3-button w3-red w3-round">Create</button>
                                  </div>
                                  <br>
                                 
                                   
                                   
                              </div> 

                
                
                      </div>   

           </div><br>


    </div>
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
                                  <input type="text" id="up_title" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                  
                                  
                                  

                                  <h6 class="w3-text-red">Category**</h6>
                                  <input type="text" id="up_category" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  
                                    
                                  <h6>Picture (Dimension:650 x 350)</h6>
                                  <input required type="file" id="up_image"  class="w3-block w3-border w3-border-gray w3-round"><br>  
                                   
                                  

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
$portfolio.='<script src="portfolio_js.js"></script>';
echo $portfolio;
?>



























