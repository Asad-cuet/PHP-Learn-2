
    
<?php
include 'config.php';
include 'function.php';
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
