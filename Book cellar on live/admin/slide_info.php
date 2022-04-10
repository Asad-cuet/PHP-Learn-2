<?php
session_start();
ob_start();
session_regenerate_id();
include 'header.php';

?>

<?php
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="W3.CSS-my.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <title>Document</title>
</head>
<body>
      <div class="w3-panel">
          <div class="w3-bar w3-margin-bottom">
                <div class="w3-bar-item w3-right w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">Create New Slide</div>
           </div>
           <div class="w3-red" id="msg"></div>     
      <div id="records" style="overflow-x:scroll"></div>
      </div>




   <!--  CReate Modal -->
<div id="id01" class="w3-modal" style="padding-top:10px">
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
                                        
                               
                                  <h6 class="w3-text-green">Slide Name(English/বাংলা)</h6>
                                  <input type="text" id="name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large" autocomplete="off"><br>  
                                  
                                  
                                  

                                  <h6 class="w3-text-red">Slide Item-Id (23,54,67)-(English)[Min:6]</h6>
                                  <textarea required type="text" id="item" name="item" class="w3-block w3-border w3-border-gray w3-round w3-large" autocomplete="off"></textarea><br>  
                                  
                                    
                               
                                    
                                 
                                    
                               
                                  

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
  <div id="id02" class="w3-modal" style="padding-top:10px">
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
                                    
                                        
                                  
                                  <h6 class="w3-text-green">Slide Name(English/বাংলা)</h6>
                                  <input type="text" id="up_name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large" autocomplete="off"><br>  
                                  
                                  
       
                                  <h6 class="w3-text-red">Slide Item-Id (23,54,67)-(English)[Min:6]</h6>
                                  <textarea required type="text" id="up_item" name="cell" class="w3-block w3-border w3-border-gray w3-round w3-large" autocomplete="off"></textarea><br>  
                                  
                                    
                         
                                  

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
     
      var name=$('#name').val();
      var item=$('#item').val();
 
      var fd=new FormData();
      fd.append('name',name);
      fd.append('item',item);
      fd.append('create_slide',1);
      $.ajax({
       url:"slide_pro.php", //Edit
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             readRecords();
             model_close()
             $('#name').val('');
             $('#item').val('');
              // if(data == 1) { $('#img_msg').html("Image Uploaded Successfully"); }
       }
      });
       
}  



//reading data
function readRecords()  
{
      var read="raed";
      $.ajax({
            url:"slide_pro.php",  //Edit
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
      $.post("slide_pro.php",{ update_id:id },function(data,status){  //Edit
            var user=JSON.parse(data);   //Edit
                $('#up_name').val(user.Name);
                $('#up_item').val(user.Item);     
      });
      document.getElementById('id02').style.display='block';
                
        
}

//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var up_name=$('#up_name').val();
      var up_item=$('#up_item').val();

      var up_fd=new FormData();
      up_fd.append('id',id);
      up_fd.append('up_name',up_name);
      up_fd.append('up_item',up_item);

      $.ajax({
       url:"slide_pro.php",
       type:'POST',
       dataType:'script',
       data:up_fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {
             readRecords();
             model_close02();
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
            url:"slide_pro.php",
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


</body>
</html>