<?php

include 'function.php';

if(isset($_REQUEST['update']))
{
      $id=htmlspecialchars($_REQUEST['id']);   
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
            delete_file("destin/","file-old-name");
      }
      if(!empty($_REQUEST['pdf']))
      {
            $pdf_name=input_pdf("destin/","pdf");   //Edit
            delete_file("destin/","file-old-name");
      }
      if(isset($file_name)) 
      {
            $update_query="UPDATE user_info3 SET Column='$name',Column='$name',Column='$name' WHERE ID=$id";
            $update=mysqli_query($connection,$update_query);
            if($update)
            {
                  header("location:file_name.php"); //Edit
            }
      }
}


?>