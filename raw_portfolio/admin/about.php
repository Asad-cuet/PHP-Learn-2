<?php
include 'header.php';
?>









<div class="w3-panel">
<h3>About</h3>
          <div class="w3-bar w3-margin-bottom">
                <div class="w3-bar-item w3-right w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">Insert</div>
           </div>
           <div class="w3-red" id="msg"></div>     
           <div id="records"  style="overflow-x:auto"></div>
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
                                  
                                  
                                  <h6 class="w3-text-red">Description**</h6>
                                  <textarea  type="text" id="description" class="w3-block w3-border w3-border-gray w3-round w3-large"></textarea><br>  
                                  
                                  

                                  <h6>Date</h6>
                                  <input type="text" id="date" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  
                                    
                                  <h6>Picture</h6>
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
                                  
                                  
                                  <h6 class="w3-text-red">Description**</h6>
                                  <textarea  type="text" id="up_description" class="w3-block w3-border w3-border-gray w3-round w3-large"></textarea><br>  
                                  
                                  

                                  <h6>Date</h6>
                                  <input type="text" id="up_date" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  
                                    
                                  <h6>Picture</h6>
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






<script>
$(document).ready(function(){  //call default
      readRecords(); 
});  

//Inserting
function create()
{
     
      var title=$('#title').val();
      var description=$('#description').val();
      var date=$('#date').val();
      var files=$('#image')[0].files[0];
      var fd=new FormData();
      fd.append('image',files);
      fd.append('title',title);
      fd.append('description',description);
      fd.append('date',date);
      $.ajax({
       url:"about_pro.php", //Edit
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             readRecords();
             $('#msg').html(data);
             $('#title').val('');
             $('#description').val('');
             $('#date').val('');
             $('#image').val('');
              // if(data == 1) { $('#img_msg').html("Image Uploaded Successfully"); }
       }
      });
       
}  



//reading data
function readRecords()  
{
      var read="raed";
      $.ajax({
            url:"about_pro.php",  //Edit
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
      $('#hidden_id').val(id); //Giving to input
      $.post("about_pro.php",{ update_id:id },function(data,status){  //Edit
            var about=JSON.parse(data);   //Edit
                $('#up_title').val(about.Title);
                $('#up_description').html(about.Description);
                $('#up_date').val(about.Date);
      });
      document.getElementById('id02').style.display='block';
                
        
}

//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var up_title=$('#up_title').val();
      var up_description=$('#up_description').val();
      var up_date=$('#up_date').val();
      var up_files=$('#up_image')[0].files[0];
      var up_fd=new FormData();
      up_fd.append('id',id);
      up_fd.append('up_image',up_files);
      up_fd.append('up_title',up_title);
      up_fd.append('up_description',up_description);
      up_fd.append('up_date',up_date);
      $.ajax({
       url:"about_pro.php",
       type:'POST',
       dataType:'script',
       data:up_fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {
             readRecords();
             model_close02();
             $('#up_image').val('');
             $('#msg').html(data);
       }
      });
}


//Deleting
function deleteId(id)
{
      var conf=confirm("Are You Sure??");
      if(conf==true)
      {
            $.ajax({
            url:"about_pro.php",
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
