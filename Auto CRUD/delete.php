<?php
include 'function.php';
if(isset($_REQUEST['delete'])) 
       {
$id=htmlspecialchars($_REQUEST['id']);
$delete_query="DELETE FROM table_name WHERE id=$id;";
$delete=mysqli_query($connection,$delete_query);
if($delete) 
{
       header("location:name.php");
}
        }

?>        