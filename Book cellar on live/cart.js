function add_to_cart(id,len)
{
  
      
      var quant = document.getElementsByClassName('quant')[len].value;
      
     var fd=new FormData();
      fd.append('b_id',id);
      fd.append('quantity',quant);
      fd.append('add_to_cart',1);
      //alert(quant);
      $.ajax({
       url:"cart_pro2.php", //Edit
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             $('.item_no').html(data);
             
             if(data == "already") { alert(); }
       }
      });
}
