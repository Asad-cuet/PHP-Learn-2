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
                $('#phone').html(msg.Phone);
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

