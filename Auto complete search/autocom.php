<?php
$connection=mysqli_connect("localhost","root","","bookcell_bookcellar");
if(isset($_POST['query']))
{
      $output='';
      $query="SELECT * FROM book_info WHERE Book_title LIKE '%".$_POST['query']."%'";
      $result=mysqli_query($connection,$query);
      $output='<ul class="w3-ul">';
      if(mysqli_num_rows($result)>0) 
      {
            while($row=mysqli_fetch_array($result))
            {
                  $output.='<li class="click">'.$row["Book_title"].'</li>';
            }
      }      
      else
      {
            $output.='<li>Nothing Matched!</li>';
      }
      $output.='</ul>';
      echo $output; 
      
} 