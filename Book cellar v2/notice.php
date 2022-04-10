<!DOCTYPE html>
<html>
<meta name="description" content="Book Cellar is the largest online bookshop in Bangladesh.Buy all kinds of book from us at a cheaper rate.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="W3.CSS-my.css">
<script src="W3.JS.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
    
</head>
<body>
    
<?php
include 'config.php';
$read_not="SELECT * FROM notice ORDER BY Notice_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result_not=mysqli_query($connection,$read_not) or die("Read failed");
while($row_n=mysqli_fetch_row($result_not)) {
      $not_id=show($row_n[0]);
      $not=show($row_n[1]);

?>
<div class="w3-container w3-center w3-text-white" style="background-color:rgba(0,0,0,0.7);">
      <h5><?php echo $not; ?></h5>
</div>    
<?php
}
?>
</body>
</html>