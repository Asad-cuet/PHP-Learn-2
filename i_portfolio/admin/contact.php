<?php
include 'header.php';
?>









<div class="w3-panel">
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

                                  <h5>Subject:</h5>
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






<script>
$(document).ready(function(){  //call default
      readRecords(); 
});  

 



//reading data
function readRecords()  
{
      var read="raed";
      $.ajax({
            url:"contact_pro.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#records').html(data);
                model_close();
            }
      });
}


//Closing MOdel
function model_close()
{
      document.getElementById('id01').style.display='none';
}
//Closing MOdel
function model_close02()
{
      document.getElementById('id02').style.display='none';
}


//Reading for update
function update02(id) 
{
      
      $.post("contact_pro.php",{ read_id:id },function(data,status){  //Edit
            var msg=JSON.parse(data);   //Edit
                $('#name').html(msg.Name);
                $('#email').html(msg.Email);
                $('#description').html(msg.Description);
                $('#date').html(msg.Date);
                $('#phone').html(msg.Subject);
      });
      document.getElementById('id02').style.display='block';
                
        
}




//Deleting
function deleteId(id)
{
      var conf=confirm("Are You Sure??");
      if(conf==true)
      {
            $.ajax({
            url:"contact_pro.php",
            type:'POST',
            data:{ DeleteId:id },
            success:function(data,status)
            {
                readRecords();
            }
                  });
      }
      
}



</script>      










<?php
include 'footer.php';
?>
