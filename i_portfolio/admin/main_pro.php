<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['verified']))
{
      header("location:logout.php");
}
extract($_POST);
include 'config.php';
include 'function.php';



//Reading table
if(isset($_POST['read']))  
{
      
      $data='<table class="w3-table-all">
      <tr>
            <th>Cover Image</th>
            <th>Small Image</th>
            <th>Title</th>
            <th>Sub-Title</th>
            <th>Description</th>
            <th>Resume</th>
            <th>Edit</th>
      </tr>';
      $read_query="SELECT * FROM main";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
      $result=mysqli_query($connection,$read_query);
      while($row=mysqli_fetch_row($result)) {
            $data.='<tr>
            <td><img src="uploads/'.$row[3].'" style="width:50px;height:auto;"></td>
            <td><img src="uploads/'.$row[6].'" style="width:50px;height:auto;"></td>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
            <td>'.$row[4].'</td>
            <td><a target="_blank" href="uploads/'.$row[5].'" class="w3-button w3-text-white w3-small my-blue">Resume</a></td>
            <td><span onclick="update02('.$row[0].')" class="w3-button w3-green w3-small">Edit</span></td>
      </tr>';
       }
       $data.='</table>';
       echo $data;
}


// Reading for update
if(isset($_POST['update_id']))
{
     $id=$_POST['update_id'];
     $select_query="SELECT * FROM main WHERE Id=$id";  
     $select=mysqli_query($connection,$select_query);
     $response=array();
     while($row=mysqli_fetch_assoc($select)) 
     {
            $response=$row;
      }
      echo json_encode($response);


}


//Updating
if(!empty($_POST['up_title']) && !empty($_POST['up_sub_title']))
{
      $id=htmlspecialchars($_POST['id']);  
      $title=ucfirst(input("up_title"));
      $sub_title=input("up_sub_title");
      $description=input("description");


            $select_query="SELECT * FROM main WHERE Id=$id"; 
            $select=mysqli_query($connection,$select_query);    
            while($row=mysqli_fetch_row($select)) 
            { 
            $old_image=$row[3];
            $old_sm_image=$row[6];
            $old_resume=$row[5]; 
            }


            if(!empty($_FILES['up_image'])) // If new Image
            { 
                  $up_image=input_image("uploads/","up_image");
                  if($up_image!=0) { unlink("uploads/".$old_image); } 
            } else { $up_image=$old_image; }
                

            if(!empty($_FILES['up_sm_image'])) // If new Image
            { 
                  $up_sm_image=input_image("uploads/","up_sm_image");
                  if($up_sm_image!=0) { unlink("uploads/".$old_sm_image); } 
            } else { $up_sm_image=$old_sm_image; }     

            if(!empty($_FILES['up_resume'])) // If new Image
            { 
                  $resume=input_pdf("uploads/","up_resume");
                  if($resume!=0) { unlink("uploads/".$old_resume); }
            } else { $resume=$old_resume; }      

        
            $update_query="UPDATE main SET Title='$title',Sub_title='$sub_title',Description='$description',Image='$up_image',Resume='$resume',Small_image='$up_sm_image' WHERE Id='$id'";
            $update=mysqli_query($connection,$update_query);

            if($up_image==0 || $up_sm_image==0 || $resume==0)
            {
                  echo "Only Image and Pdf file is allowed";
            }
     
          
            

}

?>