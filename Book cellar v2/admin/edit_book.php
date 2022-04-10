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
 
$rec_book_id=htmlspecialchars($_REQUEST['book_id']);    
$rec_book_pic=htmlspecialchars($_REQUEST['book_pic']);
$rec_cat_id=htmlspecialchars($_REQUEST['cat_id']);
include 'config.php';
$read_query="SELECT * FROM Book_info WHERE Book_id='$rec_book_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {


      $book_id=htmlspecialchars($row[0]);
      $book_pic=htmlspecialchars($row[1]);
      $book_title=htmlspecialchars($row[2]);
      $book_author=htmlspecialchars($row[3]);
      $book_published=htmlspecialchars($row[4]);
      $book_price=htmlspecialchars($row[5]);
      $disc=htmlspecialchars($row[6]);
      $rec_cat_id=htmlspecialchars($row[8]);
      $book_avail=htmlspecialchars($row[9]);
      $book_ordered=htmlspecialchars($row[10]);
      $com_name=htmlspecialchars($row[11]);
      $d_charge=htmlspecialchars($row[12]);
      $rating=htmlspecialchars($row[13]);
      $keyword=htmlspecialchars($row[14]);

}




   ///Updating Data


if(isset($_REQUEST['update_'])) {

      include 'config.php';
     // inside  collecting
      $title=filter(ucfirst(mysqli_real_escape_string($connection,$_POST['title'])));
      $author=filter(ucfirst(mysqli_real_escape_string($connection,$_POST['author'])));
      $publish=filter(mysqli_real_escape_string($connection,$_POST['publish']));
      $price=filter(mysqli_real_escape_string($connection,$_POST['price']));
      $disc=filter(mysqli_real_escape_string($connection,$_POST['disc']));
      $count=100-$disc;
      $com_name=filter(ucfirst(input("com_name")));
      $keyword=filter(input("keyword"));
      $d_charge=filter(input("d_charge"));
      $rating=filter(input("rating"));
      $f_price=$price*($count/100);
      if(!empty($_POST['c_name'])) {$cat_id=filter($_POST['c_name']);  }
      if(!empty($_POST['avail'])) {$avail=filter($_POST['avail']);  } else {$avail="Yes";}
      $date=date("m-d-Y");
      if(!empty($_FILES['image']))
       {
         $img=$_FILES['image'];$img_name=$img['name'];
         if(empty($img_name))
          {
            $img_name_c=$rec_book_pic;
            $redflag=0;
          } 
          else
           {
             $img_tmp_name=$img['tmp_name'];$destin="uploads/";$img_name_c=uniqid().$img['name'];
                $name = $_FILES['image']['name'];
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                // Select file type
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));          
                // Valid file extensions
                $extensions_arr = array("jpg","jpeg","png","gif");         
                // Check extension
             if( in_array($imageFileType,$extensions_arr) )
             {
             move_uploaded_file($img_tmp_name,$destin.$img_name_c);
             $redflag=0;
             if($rec_book_pic!="../default.jpg") 
             {
                unlink("uploads/$rec_book_pic");
              }
             } else { $redflag=1; }

           }
       } 
     
      
      if(!empty($title) && !empty($publish) && !empty($cat_id) && !empty($price) && $redflag==0) {
    
      $update_query1="UPDATE Book_info SET Book_picture='$img_name_c',Book_title='$title',Book_author='$author',Published='$publish',Price='$price',Discount='$disc',Delivery_charge='$d_charge',F_price='$f_price',Category='$cat_id',Available='$avail',Company_name='$com_name',Rating='$rating',Keyword='$keyword' WHERE Book_id=$rec_book_id";
     if($cat_id!=$rec_cat_id) { 
            $update_query2= "UPDATE category SET No_of_book = No_of_book - 1 WHERE Category_id='$rec_cat_id'";
            $update_query3= "UPDATE category SET No_of_book = No_of_book + 1 WHERE Category_id='$cat_id'";
            $update2=mysqli_query($connection,$update_query2) or die("Update Query Failed");
            $update3=mysqli_query($connection,$update_query3) or die("Update Query Failed");
             } else { $ok=1; }
      $update1=mysqli_query($connection,$update_query1) or die("Insert Query Failed");
      
      if($update1) // && ($update2 || $update3 || $ok)) 
      {
           header("location:book_info.php");
     }
       }
    }


?>








<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="W3.CSS.css">
<script src="W3.JS.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
<style>
  .my-h-center { display: block; margin-left:auto;margin-right:auto;width:30%}
</style>
<script>   //jquery goes here
  // 2nd query start




  $(document).ready(function(){

    $("").addClass("");

  });

// 2nd query end


</script>  
</head>
<body class="w3-sans-serif" style="background-color:#F1F1F1">










<div class="my-h-center w3-white w3-mobile">
<div class="w3-container w3-padding w3-teal">Edit Book Information</div>
<form class=" w3-center" method="post" action="edit_book.php?book_id=<?php echo $rec_book_id; ?>&cat_id=<?php echo $rec_cat_id; ?>&book_pic=<?php echo $rec_book_pic; ?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left">Title</h6>
<div class="w3-container">
<input type="text" value="<?php echo $book_title; ?>" name="title" class="w3-block w3-border"></div>
<br>







<h6 class="w3-left w3-margin-left">Author</h6>
<div class="w3-container">
<input type="text" value="<?php echo $book_author; ?>" name="author" class="w3-block w3-border"></div><br>
<br>



<h6 class="w3-left w3-margin-left">Publish Year</h6>
<div class="w3-container">
<input type="text"  value="<?php echo $book_published; ?>" name="publish" class="w3-block w3-border"></div><br>
<br>






<h6 class="w3-left w3-margin-left">Price</h6>
<div class="w3-container">
<input type="text"  value="<?php echo $book_price; ?>" name="price" class="w3-block w3-border"></div><br>
<br>

<h6 class="w3-left w3-margin-left">Discount(%)</h6>
<div class="w3-container">
<input type="text"  value="<?php echo $disc; ?>" name="disc" class="w3-block w3-border"></div><br>
<br>


<h6 class="w3-left w3-margin-left">Delivery Charge(<b>optional</b>)</h6>
<div class="w3-container">
<select class="w3-select w3-border w3-block" name="d_charge">
<option value="1" <?php if($d_charge==1) { echo "selected"; }?>>Not Free</option>
<option value="2"<?php if($d_charge==2) { echo "selected"; }?>>Free</option>
</select>
</div>
<br>


<h6 class="w3-left w3-margin-left">Rating</h6>
<div class="w3-container">
<input type="text"  value="<?php echo $rating; ?>" name="rating" class="w3-block w3-border"></div><br>
<br>

<h6 class="w3-left w3-margin-left">Category</h6>
<div class="w3-container">
<select class="w3-select w3-border w3-block" name="c_name">
<option value=" " disabled >Choose</option>
<?php
include 'config.php';
$read_query="SELECT * FROM category";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
     $cat_id=htmlspecialchars($row[0]);
     $cat_name=htmlspecialchars($row[1]);

?>
<option value="<?php echo $cat_id; ?>" <?php if($cat_id==$rec_cat_id) { echo "selected"; }?>><?php echo $cat_name; ?></option>
<?php
}
?>


</select></div>
<br>



<h6 class="w3-left w3-margin-left">Company Name(<b>if any</b>)</h6>
<div class="w3-container">
<input type="text" value="<?php echo $com_name; ?>" name="com_name" class="w3-block w3-border"></div><br>
<br>



<h6 class="w3-left w3-margin-left">Keyword(<b>optional</b>)</h6>
<div class="w3-container">
<textarea name="keyword" class="w3-block w3-border"><?php echo $keyword; ?></textarea></div><br>
<br>




<h6 class="w3-left w3-margin-left">Available</h6>
<div class="w3-container">

<select class="w3-select w3-border w3-block" name="avail">
<option value="Yes"<?php if($book_avail=="Yes") echo"selected"; ?>>Yes</option>
<option value="No"<?php if($book_avail=="No") echo"selected"; ?>>No</option>

</select></div>
<br>


<h6 class="w3-left w3-margin-left">Upload Picture</h6>
<div class="w3-container">
<input type="file" name="image" class="w3-block w3-border w3-button"></div>
<br>






<div class="w3-container">
<input type="submit" value="Save" name="update_" class="w3-left w3-button w3-hover-red w3-green">
</div><br>


</form>

</div>








</body>
</html>