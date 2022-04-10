<?php
session_start();
ob_start();
session_regenerate_id();


?>

<?php
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}

?>

<?php
extract($_POST);
include 'config.php';
include 'function.php';

//Inserting
if(!empty($_POST['create_slide'])) 
{
$name=ucfirst(htmlspecialchars($_POST['name']));
$item=input("item");

$insert_query="INSERT INTO slide(Name,Item) VALUES ('$name','$item')";
$send=mysqli_query($connection,$insert_query);
}

//Reading table
if(isset($_POST['read']))  
{
      
      $data='<table class="w3-table-all">
      <tr>
            <th>Id</th>
            <th>Slide Name</th>
            <th>Slide Item</th>
            <th>Edit</th>
            <th>Delete</th>
      </tr>';
      $read_query="SELECT * FROM slide";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
      $result=mysqli_query($connection,$read_query);
      while($row=mysqli_fetch_row($result)) {
            $data.='<tr>   
            <td>'.$row[0].'</td>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
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
     $select_query="SELECT * FROM slide WHERE Id=$id";  
     $select=mysqli_query($connection,$select_query);
     $response=array();
     while($row=mysqli_fetch_assoc($select)) 
     {
            $response=$row;
      }
      echo json_encode($response);


}


//Updating
if(!empty($_POST['up_item']))
{
$id=htmlspecialchars($_POST['id']);  
$name=ucfirst(htmlspecialchars($_POST['up_name']));
$up_item=input("up_item");
 

      $update_query="UPDATE slide SET Name='$name',Item='$up_item' WHERE Id='$id'";
      $update=mysqli_query($connection,$update_query);

}


//Deleting
if(isset($_POST['DeleteId']))
{
       $id=htmlspecialchars($_POST['DeleteId']);
    
       $delete_query="DELETE FROM slide WHERE Id=$id";
       $delete=mysqli_query($connection,$delete_query);
}
?>