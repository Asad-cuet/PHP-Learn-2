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
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Message</th>
            <th>Delete</th>
      </tr>';
      $read_query="SELECT * FROM contact ORDER BY Id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
      $result=mysqli_query($connection,$read_query);
      while($row=mysqli_fetch_row($result)) {
            $data.='<tr>
            <td>'.$row[1].'</td>
            <td>'.$row[2].'</td>
            <td>'.$row[4].'</td>
            <td><span onclick="update02('.$row[0].')" class="w3-button my-blue w3-text-white w3-small">View</span></td>
            <td><span onclick="deleteId('.$row[0].')" class="w3-button w3-red w3-small">Delete</span></td>
      </tr>';
       }
       $data.='</table>';
       echo $data;
}


// Reading for update
if(isset($_POST['read_id']))
{
     $id=$_POST['read_id'];
     $select_query="SELECT * FROM contact WHERE Id=$id";  
     $select=mysqli_query($connection,$select_query);
     $response=array();
     while($row=mysqli_fetch_assoc($select)) 
     {
            $response=$row;
      }
      echo json_encode($response);


}





//Deleting
if(isset($_POST['DeleteId']))
{
       $id=htmlspecialchars($_POST['DeleteId']);
       $delete_query="DELETE FROM contact WHERE Id=$id";
       $delete=mysqli_query($connection,$delete_query);
}
?>