<?php
include 'function.php';

if(isset($_REQUEST['submit_name']))
{
      if(!empty($_REQUEST['name']))
      {
            $name=input("name");
      }
      if(!empty($_REQUEST['checkbox_data']))
      {
            $checkbox_data=checkbox("checkbox_data");
      }
      if(!empty($_REQUEST['image']))
      {
            $image_name=input_image("destin/","image");   //Edit
      }
      if(!empty($_REQUEST['pdf']))
      {
            $pdf_name=input_pdf("destin/","pdf");   //Edit
      }
      if(isset($file_name)) 
      {
            $insert_query="INSERT INTO table_name(Name1,Name2,Name3) VALUES ('$name','$checkbox_data','$file_name');";   //Edit
            $send=mysqli_query($connection,$insert_query);
            if($send)
            {
                  header("location:file_name.php"); //Edit
            }
      }
}


?>