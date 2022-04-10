<?php
session_start();
ob_start();
session_regenerate_id();
if(isset($_REQUEST['post'])) {

      include 'config.php';
     // inside  collecting
      $title=ucfirst(mysqli_real_escape_string($connection,$_POST['title']));
      $author=ucfirst(mysqli_real_escape_string($connection,$_POST['author']));
      $publish=mysqli_real_escape_string($connection,$_POST['publish']);
      $price=mysqli_real_escape_string($connection,$_POST['price']);
      if(!empty($_POST['c_name'])) {$cat_id=$_POST['c_name'];  }
      if(!empty($_POST['avail'])) {$avail=$_POST['avail'];  } else {$avail="Yes";}
      $date=date("m-d-Y");
      if(!empty($_FILES['image'])) {$img=$_FILES['image'];$img_name=$img['name'];if(empty($img_name)) {$img_name_c="../default.png";} else {$img_tmp_name=$img['tmp_name'];$destin="uploads/";$img_name_c=uniqid().$img['name'];move_uploaded_file($img_tmp_name,$destin.$img_name_c);}} 
     
      
      if(!empty($title) && !empty($author) && !empty($publish) && !empty($cat_id) && !empty($price)) {
    
      $insert_query1="INSERT INTO book_info (Book_picture,Book_title,Book_author,Published,Price,Category,Available) VALUES ('$img_name_c','$title','$author','$publish','$price','$cat_id','$avail');";
      $insert_query2= "UPDATE category SET No_of_book = No_of_book + 1 WHERE Category_id='$cat_id'";
      $insert1=mysqli_query($connection,$insert_query1) or die("Insert Query Failed");
      $insert2=mysqli_query($connection,$insert_query2) or die("Update Query Failed");
      if($insert1 && $insert2) {
            header("location:book_info.php");
      }
       }
    }


?>