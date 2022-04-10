<?php
session_start();
ob_start();
session_regenerate_id();
include 'config.php';
include 'function.php';
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}

if(isset($_REQUEST['notice'])) 
       {
$not_id=htmlspecialchars($_REQUEST['not_id']);
$delete_query="DELETE FROM notice WHERE Notice_id=$not_id;";
$delete=mysqli_query($connection,$delete_query);
if($delete) { header("location:post.php");}
        }
        

if(isset($_REQUEST['trend'])) 
       {
$post_id=htmlspecialchars($_REQUEST['post_id']);
$delete_query="DELETE FROM trending WHERE Trend_id=$post_id;";
$delete=mysqli_query($connection,$delete_query);
if($delete) { header("location:post.php");}
        }
        
if(isset($_REQUEST['home'])) 
       {        
$post_id=htmlspecialchars($_REQUEST['post_id']);
$delete_query="DELETE FROM post WHERE Post_id=$post_id;";
$delete=mysqli_query($connection,$delete_query);
if($delete) { header("location:post.php");}
       }

?>