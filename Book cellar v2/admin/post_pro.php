<?php
             // Collecting data
             if(isset($_REQUEST['trending'])) {
                    include 'config.php';
                   $book_id=htmlspecialchars(mysqli_real_escape_string($connection,$_REQUEST['id']));
                   $check_query="SELECT Book_id FROM Book_info WHERE Book_id='$book_id'";
                   $check=mysqli_query($connection,$check_query) or die(" Check query failed");
                   $count=mysqli_num_rows($check);
                   if ($count>0)  {                            
             $insert_query="INSERT INTO trending (Book_id) VALUES ('$book_id')";
             $send=mysqli_query($connection,$insert_query);
             header("location:post.php");
            }
          }


             // Collecting data
             if(isset($_REQUEST['post'])) {
                    include 'config.php';
                   $book_id=htmlspecialchars(mysqli_real_escape_string($connection,$_REQUEST['id']));
                   $check_query="SELECT Book_id FROM Book_info WHERE Book_id='$book_id'";
                   $check=mysqli_query($connection,$check_query) or die(" Check query failed");
                   $count=mysqli_num_rows($check);
                   if ($count>0)  {                            
             $insert_query="INSERT INTO post (Book_id) VALUES ('$book_id')";
             $send=mysqli_query($connection,$insert_query);
             if($send) { header("location:post.php"); }
            }
          }

?>