<?php
session_start();
ob_start();
session_regenerate_id();
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}


   include 'config.php';
    $book_id=htmlspecialchars($_REQUEST['book_id']);
    $cat_id=htmlspecialchars($_REQUEST['cat_id']);
    $book_pic=htmlspecialchars($_REQUEST['book_pic']);
    if($book_pic!="../default.jpg") { unlink("uploads/$book_pic");}
    $query_delete="DELETE FROM Book_info WHERE Book_id='$book_id'";
    $table=mysqli_query($connection,$query_delete);
    $update_query2= "UPDATE category SET No_of_book = No_of_book - 1 WHERE Category_id='$cat_id'";
    $update=mysqli_query($connection,$update_query2);
    if($table && $update) { header("location:book_info.php");}


    


?>