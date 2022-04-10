$(document).ready(function(){  //call default
      readRecords(); 
});  

//Inserting
function create()
{
     
      var title=$('#title').val();
      var category=$('#category').val();
      var files=$('#image')[0].files[0];
      var fd=new FormData();
      fd.append('image',files);
      fd.append('title',title);
      fd.append('category',category);
      $.ajax({
       url:"portfolio_pro.php", //Edit
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
             $('#category').val('');
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
            url:"portfolio_pro.php",  //Edit
            type:'POST',
            data:{ read:read },
            success:function(data,status)
            {
                $('#records').html(data);
                model_close();
            }
      });
}


//opening MOdel
function port_insert()
{
      document.getElementById('id01').style.display='block'
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
      $.post("portfolio_pro.php",{ update_id:id },function(data,status){  //Edit
            var port=JSON.parse(data);   //Edit
                $('#up_title').val(port.Title);
                $('#up_category').val(port.Category);
      });
      document.getElementById('id02').style.display='block';
                
        
}

//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var up_title=$('#up_title').val();
      var up_category=$('#up_category').val();
      var up_files=$('#up_image')[0].files[0];
      var up_fd=new FormData();
      up_fd.append('id',id);
      up_fd.append('up_image',up_files);
      up_fd.append('up_title',up_title);
      up_fd.append('up_category',up_category);
      $.ajax({
       url:"portfolio_pro.php",
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
            url:"portfolio_pro.php",
            type:'POST',
            data:{ DeleteId:id },
            success:function(data,status)
            {
                readRecords();
            }
                  });
      }
      
}
