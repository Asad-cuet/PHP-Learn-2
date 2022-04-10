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



if(isset($_REQUEST['deliver'])) {
  $order_id1=htmlspecialchars($_REQUEST['order_id']);
include 'config.php';


$read_query="SELECT * FROM order_seen WHERE Order_id='$order_id1'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {

    $order_id=htmlspecialchars($row[1]);
    $item=htmlspecialchars($row[2]);
    $book_id=htmlspecialchars($row[3]);
    $quant=htmlspecialchars($row[4]);
    $f_price=htmlspecialchars($row[5]);
    $delivery=htmlspecialchars($row[6]);
    $c_name=htmlspecialchars($row[7]);
    $c_email=htmlspecialchars($row[8]);
    $c_cell=htmlspecialchars($row[9]);
    $c_address=htmlspecialchars($row[10]);
    $date=htmlspecialchars($row[11]);



}

$arr_ids=explode(",",$book_id);
$book_price=array();
$book_real_price=array();
$book_disc=array();


     for($x=0;$x<count($arr_ids);$x++) 
      {
          

            $read_query2="SELECT * FROM Book_info WHERE Book_id=$arr_ids[$x]";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 

            $result2=mysqli_query($connection,$read_query2); 

            while($row2=mysqli_fetch_row($result2)) {
            array_push($book_price,$row2[7]); 
            array_push($book_real_price,$row2[5]); 
            array_push($book_disc,$row2[6]); 

           }
      
} 


$book_real_price=implode(",",$book_real_price);
$book_price=implode(",",$book_price);
$book_disc=implode(",",$book_disc);
echo $time=my_time();
 $insert_query="INSERT INTO delivered(Order_id,Item,Book_id,Quantity,Item_price,Price,Delivery_charge,Customer_name,Email,Cell,Adrress,Time,Delivered_time,Item_real_price,Item_discount) VALUES ('$order_id','$item','$book_id','$quant','$book_price','$f_price','$delivery','$c_name','$c_email','$c_cell','$c_address','$date','$time','$book_real_price','$book_disc');";
 $send=mysqli_query($connection,$insert_query) or die("Insert failed");

 if($send) {
  $delete_query="DELETE FROM order_seen WHERE Order_id=$order_id;";
$delete=mysqli_query($connection,$delete_query) or die("delete failed");

  if($delete) {
  header("location:confirm.php");
 }
 }

}


if(isset($_REQUEST['o_remove'])) {
  include 'config.php';
  $order_id1=htmlspecialchars($_REQUEST['order_id']);
  $delete_query="DELETE FROM order_seen WHERE Order_id=$order_id1;";
  $delete=mysqli_query($connection,$delete_query) or die("delete failed");
  if($delete) {
    header("location:confirm.php");
   }
}




?>






