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

//Inserting
if(!empty($_POST['title']) && !empty($_POST['description'])) 
{
$title=ucfirst(input("title"));
$description=input("description");
if(!empty($_POST['date'])) { $date=input("date"); } else { $date=1; }
if(!empty($_FILES['image'])) { $image=input_image("uploads/","image"); } else { $image="default.jpg"; }


if($image!=0) 
{
      $insert_query="INSERT INTO about(Title,Description,Date,Image) VALUES ('$title','$description','$date','$image');";
      $send=mysqli_query($connection,$insert_query);
}
else if($image==0)
{
      echo $msg="Only Image file is Allowed";
}

}

//Reading table
if(isset($_POST['read']))  
{
      
      $data='<table class="w3-table-all">
      <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
      </tr>';
      $read_query="SELECT * FROM about";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
      $result=mysqli_query($connection,$read_query);
      while($row=mysqli_fetch_row($result)) {
            $data.='<tr>
            <td><img src="uploads/'.$row[4].'" style="width:50px;height:auto;"></td>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
            <td>'.$row[3].'</td>
            <td><span onclick="update02('.$row[0].')" class="w3-button w3-green w3-small">Edit</span></td>
            <td><span onclick="deleteId('.$row[0].')" class="w3-button w3-red w3-small">Delete</span></td>
      </tr>';
       }
       $data.='</table>';
       echo $data;
}


// Reading for update
if(isset($_POST['update_id']))
{
     $id=$_POST['update_id'];
     $select_query="SELECT * FROM about WHERE Id=$id";  
     $select=mysqli_query($connection,$select_query);
     $response=array();
     while($row=mysqli_fetch_assoc($select)) 
     {
            $response=$row;
      }
      echo json_encode($response);


}


//Updating
if(!empty($_POST['up_title']) && !empty($_POST['up_description']))
{
$id=htmlspecialchars($_POST['id']);  
$up_title=ucfirst(input("up_title"));
$up_description=input("up_description");
$up_date=input("up_date"); 
if(!empty($_FILES['up_image'])) // If new Image
{ 
      $up_image=input_image("uploads/","up_image");
      if($up_image!=0) //if confirmed that the file is image
      {
            $select_query="SELECT * FROM about WHERE Id=$id"; 
            $select=mysqli_query($connection,$select_query);    
            while($row=mysqli_fetch_row($select)) { $old_image=$row[4]; }
            if($old_image!="default.jpg") { unlink("uploads/".$old_image); }
            $update_query="UPDATE about SET Title='$up_title',Description='$up_description',Date='$up_date',Image='$up_image' WHERE Id='$id'";
            $update=mysqli_query($connection,$update_query);
      } 
      else
      {
            echo $msg="Only Image file is Allowed";
      }     
      
} 
else     // If new Image Not
{
      $update_query="UPDATE about SET Title='$up_title',Description='$up_description',Date='$up_date' WHERE Id='$id'";
      $update=mysqli_query($connection,$update_query);
}
}


//Deleting
if(isset($_POST['DeleteId']))
{
       $id=htmlspecialchars($_POST['DeleteId']);
       $select_query="SELECT * FROM about WHERE Id=$id"; 
       $select=mysqli_query($connection,$select_query);    
       while($row=mysqli_fetch_row($select)) { $old_image=$row[4]; }
       if($old_image!="default.jpg") { unlink("uploads/".$old_image); }
       $delete_query="DELETE FROM about WHERE Id=$id";
       $delete=mysqli_query($connection,$delete_query);
}
?>