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
          <div class="w3-bar">
                <div class="w3-bar-item w3-right w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">Insert</div>
           </div>
           <div class="w3-red" id="msg"></div>     
      <div id="records"></div>
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
                                        
                              
                                  <h6>Name</h6>
                                  <input required type="text" id="name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                  
                                  

                                  <h6>Email</h6>
                                  <input required type="email" id="email" name="email" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  <h6>Cell</h6>
                                  <input required type="text" id="cell" name="cell" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  <h6>Profile Picture</h6>
                                  <input required type="file" id="image" name="image" class="w3-block w3-border w3-border-gray w3-round"><br>  
                                  
                                    
                               
                                  

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
                                    
                                        
                                  
                                  <h6>Name</h6>
                                  <input required type="text" id="up_name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                  
                                  

                                  <h6>Email</h6>
                                  <input required type="email" id="up_email" name="email" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  <h6>Cell</h6>
                                  <input required type="text" id="up_cell" name="cell" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                                  
                                    
                                  <h6>Profile Picture</h6>
                                  <input required type="file" id="up_image" name="up_image" class="w3-block w3-border w3-border-gray w3-round"><br>  
                                  <div id="pre_image">
                                        <img src="" style="width:70px;height:auto;">
                                  </div>     
                                  

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
      var email=$('#email').val();
      var cell=$('#cell').val();
      var files=$('#image')[0].files[0];
      var fd=new FormData();
      fd.append('image',files);
      fd.append('name',name);
      fd.append('email',email);
      fd.append('cell',cell);
      $.ajax({
       url:"backend.php", //Edit
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             readRecords();
             $('#msg').html(data);
             $('#name').val('');
             $('#email').val('');
             $('#cell').val('');
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
            url:"backend.php",  //Edit
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
      $.post("backend.php",{ update_id:id },function(data,status){  //Edit
            var user=JSON.parse(data);   //Edit
                $('#up_name').val(user.Name);
                $('#up_email').val(user.Email);
                $('#up_cell').val(user.Cell);
      });
      document.getElementById('id02').style.display='block';
                
        
}

//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var up_name=$('#up_name').val();
      var up_email=$('#up_email').val();
      var up_cell=$('#up_cell').val();
      var up_files=$('#up_image')[0].files[0];
      var up_fd=new FormData();
      up_fd.append('id',id);
      up_fd.append('up_image',up_files);
      up_fd.append('up_name',up_name);
      up_fd.append('up_email',up_email);
      up_fd.append('up_cell',up_cell);
      $.ajax({
       url:"backend.php",
       type:'POST',
       dataType:'script',
       data:up_fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {
             readRecords();
             model_close02();
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
            url:"backend.php",
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