<?php
session_start();
ob_start();
session_regenerate_id();
include 'header.php';

?>

<?php
if(!isset($_SESSION['username'])) {   // If not Logged In
  header("location:logout.php");
}


?>

<?php    // colloecting data from DB
 





   ///Updating Data


if(isset($_REQUEST['update_'])) {

include 'config.php';
$read_query="SELECT * FROM Book_info";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query) or die("Read Query Failed");
while($row=mysqli_fetch_row($result)) {


     echo $book_id=$row[0];
     echo "<br>";
      $book_pic=$row[1];
      $title=$row[2];
      $author=$row[3];
      $publish=$row[4];
      $price=$row[5];
      $disc=$row[6];
      $com_name=$row[11];
      $d_charge=$row[12];
      $rating=$row[13];
      $keyword=$row[14];
      
      if(empty($keyword))
      {
             include 'config.php';
             $keyword_f=$title." ".$author." ".$publish." ".$price." ".$disc." ".$com_name;
             $update_query2= "UPDATE Book_info SET Keyword='$keyword_f' WHERE Book_id='$book_id'";
            $update2=mysqli_query($connection,$update_query2) or die("Update Query Failed");
            if($update2)
            {
              echo" Done<br>";    
            }
      }

}
}

?>








<!DOCTYPE html>
<html>


<body>





<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
    
    <input type="submit" name="update_" value="DO">
    
</form>





</body>
</html>