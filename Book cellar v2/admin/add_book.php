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





<?php


if(isset($_REQUEST['post'])) {

  include 'config.php';
 // inside  collecting
  $title=ucfirst(filter(mysqli_real_escape_string($connection,$_POST['title'])));
  $author=ucfirst(filter(mysqli_real_escape_string($connection,$_POST['author'])));
  $publish=filter(mysqli_real_escape_string($connection,$_POST['publish']));
  $price=filter(mysqli_real_escape_string($connection,$_POST['price']));
  $disc=filter(mysqli_real_escape_string($connection,$_POST['disc']));
  $com_name=ucfirst(filter(input("com_name")));
  $keyword=filter(input("keyword"));
  $keyword_f=$title." ".$author." ".$publish." ".$price." ".$disc." ".$com_name." ".$keyword;
   $d_charge=filter(input("d_charge"));
  $rating=filter(input("rating"));
  $count=100-$disc;
  $f_price=$price*($count/100);
  if(!empty($_POST['c_name'])) {$cat_id=$_POST['c_name'];  }
  if(!empty($_POST['avail'])) {$avail=$_POST['avail'];  } else {$avail="Yes";}
  $date=date("m-d-Y");
  if(!empty($_FILES['image']))
   {
     $img=$_FILES['image'];$img_name=$img['name'];if(empty($img_name))
      {
        $img_name_c="../default.jpg";
        $redflag=0;
      } 
      else 
      {
        $img_tmp_name=$img['tmp_name'];$destin="uploads/";$img_name_c=uniqid().filter($img['name']);
   
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
                $redflag=0;
               move_uploaded_file($img_tmp_name,$destin.$img_name_c);
            } else { $redflag=1; }
      }
    } 
 
  
 if(!empty($title) && !empty($publish) && !empty($cat_id) && !empty($price) && $redflag==0) {

  $insert_query1="INSERT INTO Book_info (Book_picture,Book_title,Book_author,Published,Price,Discount,Delivery_charge,F_price,Category,Available,Ordered,Company_name,Rating,Keyword) VALUES ('$img_name_c','$title','$author','$publish','$price','$disc','$d_charge','$f_price','$cat_id','$avail',0,'$com_name','$rating','$keyword_f');";
  $insert_query2= "UPDATE category SET No_of_book = No_of_book + 1 WHERE Category_id='$cat_id'";
  $insert1=mysqli_query($connection,$insert_query1) or die("Insert Query Failed");
  $insert2=mysqli_query($connection,$insert_query2) or die("Update Query Failed");
  if($insert1 && $insert2) {
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

<form class=" w3-center" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off" enctype="multipart/form-data"><br>






<h6 class="w3-left w3-margin-left w3-text-red">Title***(English/বাংলা)</h6>
<div class="w3-container">
<input required type="text" name="title" class="w3-block w3-border"></div>
<br>







<h6 class="w3-left w3-margin-left w3-text-green">Author(English/বাংলা)<b>optional</b>)</h6>
<div class="w3-container">
<input type="text" name="author" class="w3-block w3-border"></div><br>
<br>



<h6 class="w3-left w3-margin-left w3-text-red">Publish Year***(English)</h6>
<div class="w3-container">
<input required type="text" name="publish" class="w3-block w3-border"></div><br>
<br>






<h6 class="w3-left w3-margin-left w3-text-red">Price***(English)</h6>
<div class="w3-container">
<input required type="text" name="price" class="w3-block w3-border"></div><br>
<br>



<h6 class="w3-left w3-margin-left w3-text-red">Discount(%)***(English)</h6>
<div class="w3-container">
<input required type="text" name="disc" class="w3-block w3-border"></div><br>
<br>

<h6 class="w3-left w3-margin-left w3-text-green">Delivery Charge(<b>optional</b>)</h6>
<div class="w3-container">
<select class="w3-select w3-border w3-block" name="d_charge">
<option value="1" selected>Not Free</option>
<option value="2">Free</option>
</select>
</div>
<br>


<h6 class="w3-left w3-margin-left w3-text-green">Rating(<b>optional</b>)</h6>
<div class="w3-container">
<input type="text" name="rating" class="w3-block w3-border"></div><br>
<br>

<h6 class="w3-left w3-margin-left w3-text-red">Category<span class="w3-text-red">(<b>required</b>)</span></h6>
<div class="w3-container">
<select required class="w3-select w3-border w3-block" name="c_name">
<option value=" " disabled selected>Choose</option>
<?php
include 'config.php';
$read_query="SELECT * FROM category";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {
     $cat_id=$row[0];
     $cat_name=$row[1];

?>
<option required value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
<?php
}
?>


</select></div>
<br>



<h6 class="w3-left w3-margin-left w3-text-green">Company Name(<b>if any</b>)</h6>
<div class="w3-container">
<input type="text" name="com_name" class="w3-block w3-border"></div><br>
<br>



<h6 class="w3-left w3-margin-left w3-text-green"><b>Extra</b> Keyword(<b>optional</b>)</h6>
<div class="w3-container">
<textarea name="keyword" class="w3-block w3-border"></textarea></div><br>
<br>



<h6 class="w3-left w3-margin-left w3-text-green">Available(<b>optional</b>)</h6>
<div class="w3-container">

<select class="w3-select w3-border w3-block" name="avail">

<option value="Yes" selected>Yes</option>
<option value="No">No</option>

</select></div>
<br>


<h6 class="w3-left w3-margin-left w3-text-green">Upload Picture(<b>Optional</b>)</h6>
<div class="w3-container">
<input type="file" name="image" class="w3-block w3-border w3-button"></div>
<br>






<div class="w3-container w3-center">
<input type="submit" value="Add Book" name="post" class="w3-button w3-hover-red w3-green">
</div><br>


</form>

</div>




</body>
</html>