$(document).ready(function(){  //call default
      readRecords(); 
});  

 



//reading data
function readRecords()  
{
      var read="raed";
      $.ajax({
            url:"main_pro.php",
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
      $.post("main_pro.php",{ update_id:id },function(data,status){
            var main=JSON.parse(data);
                $('#title').val(main.Title);
                $('#sub_title').val(main.Sub_title);
                $('#description').html(main.Description);
              
      });
      document.getElementById('id02').style.display='block';
                
        
}

//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var title=$('#title').val();
      var sub_title=$('#sub_title').val();
      var description=$('#description').val();
      var up_files=$('#up_image')[0].files[0];
      var up_resume=$('#up_resume')[0].files[0];
      var up_fd=new FormData();
      up_fd.append('id',id);
      up_fd.append('up_title',title);
      up_fd.append('up_sub_title',sub_title);
      up_fd.append('description',description);
      up_fd.append('up_image',up_files);
      up_fd.append('up_resume',up_resume);
      
      $.ajax({
       url:"main_pro.php",
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

