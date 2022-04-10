<?php
extract($_POST);
include 'config.php';
include 'function.php';

//Inserting
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['cell'])) 
{
$name=ucfirst(input("name"));
$email=input("email");
$cell=input("cell");
$image=input_image("uploads/","image");
if($image!=0) 
{
      $insert_query="INSERT INTO user(Image,Name,Email,Cell) VALUES ('$image','$name','$email','$cell');";
      $send=mysqli_query($connection,$insert_query);
}
else
{
      echo $msg="Only Image file is Allowed";
}

}

//Reading table
if(isset($_POST['read']))  
{
      
      $data='<table class="w3-table-all">
      <tr>
            <th>Profile</th>
            <th>Name</th>
            <th>Email</th>
            <th>Cell</th>
            <th>Edit</th>
            <th>Delete</th>
      </tr>';
      $read_query="SELECT * FROM user";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
      $result=mysqli_query($connection,$read_query);
      while($row=mysqli_fetch_row($result)) {
            $data.='<tr>
            <td><img src="uploads/'.$row[1].'" style="width:50px;height:auto;"></td>
            <td>'.$row[2].'</td>
            <td>'.$row[3].'</td>
            <td>'.$row[4].'</td>
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
     $select_query="SELECT * FROM user WHERE Id=$id";  
     $select=mysqli_query($connection,$select_query);
     $response=array();
     while($row=mysqli_fetch_assoc($select)) 
     {
            $response=$row;
      }
      echo json_encode($response);


}


//Updating
if(!empty($_POST['up_name']) && !empty($_POST['up_email']) && !empty($_POST['up_cell']))
{
$id=htmlspecialchars($_POST['id']);  
$name=ucfirst(input("up_name"));
$email=input("up_email");
$cell=input("up_cell");
if(!empty($_FILES['up_image'])) // If new Image
{ 
      $up_image=input_image("uploads/","up_image");
      if($up_image!=0) //if confirmed that the file is image
      {
            $select_query="SELECT * FROM user WHERE Id=$id"; 
            $select=mysqli_query($connection,$select_query);    
            while($row=mysqli_fetch_row($select)) { $old_image=$row[1]; }
            unlink("uploads/".$old_image);
            $update_query="UPDATE user SET Image='$up_image',Name='$name',Email='$email',Cell='$cell' WHERE Id='$id'";
            $update=mysqli_query($connection,$update_query);
      } 
      else
      {
            echo $msg="Only Image file is Allowed";
      }     
      
} 
else     // If new Image Not
{
      $update_query="UPDATE user SET Name='$name',Email='$email',Cell='$cell' WHERE Id='$id'";
      $update=mysqli_query($connection,$update_query);
}
}


//Deleting
if(isset($_POST['DeleteId']))
{
       $id=htmlspecialchars($_POST['DeleteId']);
       $select_query="SELECT * FROM user WHERE Id=$id"; 
       $select=mysqli_query($connection,$select_query);    
       while($row=mysqli_fetch_row($select)) { $old_image=$row[1]; }
       unlink("uploads/".$old_image);
       $delete_query="DELETE FROM user WHERE id=$id";
       $delete=mysqli_query($connection,$delete_query);
}
?>