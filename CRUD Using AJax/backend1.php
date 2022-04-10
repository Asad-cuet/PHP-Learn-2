<?php
extract($_POST);
include 'config.php';


if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['cell']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$cell=$_POST['cell'];

$insert_query="INSERT INTO user(Name,Email,Cell) VALUES ('$name','$email','$cell');";
$send=mysqli_query($connection,$insert_query);
}


if(isset($_POST['read']))
{
      $data='<table class="w3-table-all">
      <tr>
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



if(isset($_POST['update_id']))
{
     $id=$_POST['update_id'];
     $select_query="SELECT * FROM user WHERE Id=$id";  // WHERE ID in ($id_seper)
     $select=mysqli_query($connection,$select_query);
     $response=array();
     while($row=mysqli_fetch_assoc($select)) 
     {
            $response=$row;
      }
      echo json_encode($response);


}


if(!empty($_POST['up_name']) && !empty($_POST['up_email']) && !empty($_POST['up_cell']))
{
$id=$_POST['id'];      
$name=$_POST['up_name'];
$email=$_POST['up_email'];
$cell=$_POST['up_cell'];

$update_query="UPDATE user SET Name='$name',Email='$email',Cell='$cell' WHERE Id='$id'";
$update=mysqli_query($connection,$update_query);
}

if(isset($_POST['DeleteId']))
{
       $id=$_POST['DeleteId'];
       $delete_query="DELETE FROM user WHERE id=$id";
       $delete=mysqli_query($connection,$delete_query);
}
?>