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



if(isset($_REQUEST['confirm'])) {
  $order_id1=htmlspecialchars($_REQUEST['order_id']);
       

 $order_id1=htmlspecialchars($_REQUEST['order_id']);


include 'config.php';


$read_query="SELECT * FROM ordered_info WHERE Order_id='$order_id1'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {

    $order_id=htmlspecialchars($row[0]);
    $item=htmlspecialchars($row[1]);
    $book_id=htmlspecialchars($row[2]);
    $quant=htmlspecialchars($row[3]);
    $price=htmlspecialchars($row[4]);
    $delivery=htmlspecialchars($row[5]);
    $c_name=htmlspecialchars($row[6]);
    $c_email=htmlspecialchars($row[7]);
    $c_cell=htmlspecialchars($row[8]);
    $c_address=htmlspecialchars($row[9]);
    $date=htmlspecialchars($row[10]);
    


     }

     $arr_id=explode(",",$book_id);
     $arr_quant=explode(",",$quant);
     $c_arr_id=count($arr_id); // it's always equal to quantity
     $c_arr_quant=count($arr_quant);
     for($i=0;$i<$c_arr_id;$i++) 
     {
            for($x=0;$x<$c_arr_quant;$x++) 
             {
                  if($i==$x) 
                  {
                  $update_query2= "UPDATE Book_info SET Ordered = Ordered + '$arr_quant[$x]' WHERE Book_id='$arr_id[$i]'";     
                  $update2=mysqli_query($connection,$update_query2) or DIE("update failed");

                  }
             }
     }


 $insert_query="INSERT INTO order_seen(Order_id,Item,Book_id,Quantity,Price,Delivery_charge,Customer_name,Email,Cell,Adrress,Time) VALUES ('$order_id','$item','$book_id','$quant','$price','$delivery','$c_name','$c_email','$c_cell','$c_address','$date');";
 $send=mysqli_query($connection,$insert_query) or die("Insert failed");

 if($send) {
  $delete_query="DELETE FROM ordered_info WHERE Order_id=$order_id;";
$delete=mysqli_query($connection,$delete_query) or die("delete failed");

  if($delete) {
  header("location:order.php");
 }
 }

}


if(isset($_REQUEST['o_remove'])) {
  include 'config.php';
  $order_id1=$_REQUEST['order_id'];
  $read_query="SELECT * FROM ordered_info WHERE Order_id='$order_id1'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
$result=mysqli_query($connection,$read_query);
while($row=mysqli_fetch_row($result)) {

    $order_id=htmlspecialchars($row[0]);
    $item=htmlspecialchars($row[1]);
    $book_id=htmlspecialchars($row[2]);
    $quant=htmlspecialchars($row[3]);
    $price=htmlspecialchars($row[4]);
    $c_name=htmlspecialchars($row[5]);
    $c_email=htmlspecialchars($row[6]);
    $c_cell=htmlspecialchars($row[7]);
    $c_address=htmlspecialchars($row[8]);
    $date=htmlspecialchars($row[9]);
    


     }
  $insert_query="INSERT INTO bin(Order_id,Item,Book_id,Quantity,Price,Customer_name,Email,Cell,Address,Time) VALUES ('$order_id','$item','$book_id','$quant','$price','$c_name','$c_email','$c_cell','$c_address','$date');";
  $send=mysqli_query($connection,$insert_query) or die("Insert failed");
 
  if($send) {
   $delete_query="DELETE FROM ordered_info WHERE Order_id=$order_id;";
 $delete=mysqli_query($connection,$delete_query) or die("delete failed");
 
   if($delete) {
   header("location:order.php");
  }
  }
}




?>






