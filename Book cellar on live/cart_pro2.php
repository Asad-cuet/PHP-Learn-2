<?php
session_start();
ob_start();
include 'config.php';
?>

<?php


if(isset($_REQUEST['add_to_cart']))
{

      
                       $book_id=htmlspecialchars($_REQUEST['b_id']);
                      if(!empty($_REQUEST['quantity'])) { $quantity=htmlspecialchars($_REQUEST['quantity']); } else { $quantity=1;  }
                       $read_query2="SELECT * FROM Book_info LEFT JOIN category ON category.Category_id=Book_info.Category WHERE Book_id='$book_id'";
                        $result2=mysqli_query($connection,$read_query2);

                        while($row=mysqli_fetch_row($result2)) 
                        {
                              
                              $pic=htmlspecialchars($row[1]);
                              $title=htmlspecialchars($row[2]);
                              $author=htmlspecialchars($row[3]);
                              $published=htmlspecialchars($row[4]);
                              $price=htmlspecialchars($row[5]);
                              $disc=htmlspecialchars($row[6]);
                              $f_price=htmlspecialchars($row[7]);
                              $cat_name=htmlspecialchars($row[16]);
                              $book_id2=htmlspecialchars($row[0]);
                              $del_charge=htmlspecialchars($row[12]);
                              $rating=htmlspecialchars($row[13]);

                        }     



                  

                //  if(!empty($_REQUEST['cat_id'])) { $cat_id=htmlspecialchars($_REQUEST['cat_id']); }
                 // if(!empty($_REQUEST['book_id'])) { $book_id=htmlspecialchars($_REQUEST['book_id']); }
                 // if(!empty($_REQUEST['data'])) { $key=htmlspecialchars($_REQUEST['data']); }

                  
                  if(isset($_SESSION['cart'])) //if defined
                  {
                        $my_item=array_column($_SESSION['cart'],'b_id');  // storing all book id in array
                        if(!in_array($_REQUEST['b_id'],$my_item)) 
                        //Searching                     
                                          
                                          {   // if not already added

                                          $count=count($_SESSION['cart']);
                                          $_SESSION['cart'][$count]=array('b_id' =>htmlspecialchars($_REQUEST['b_id']),'b_name' =>$title,'price' =>$price,'disc' =>$disc,'f_price' =>$f_price,'quantity' =>$quantity,'author' =>$author,'charge' =>$del_charge);
                                                
                                                $my_item=array_column($_SESSION['cart'],'b_id');
                                                $separ_id=implode(",",$my_item);
                                                echo $count=count($_SESSION['cart']);
                                                                        
                                          }
                                          else 
                                          {
                                                echo $msg="already";
                                           }
                  }
                  else
                  {                           //if no defined

                        $_SESSION['cart'][0]=array('b_id' =>htmlspecialchars($_REQUEST['b_id']),'b_name' =>$title,'price' =>$price,'disc' =>$disc,'f_price' =>$f_price,'quantity' =>$quantity,'author' =>$author,'charge' =>$del_charge);
                        echo $count=count($_SESSION['cart']);
                        //$my_item=array_column($_SESSION['cart'],'b_id');
                        //$separ_id=implode(",",$my_item);
                                                

                  }






                  
}

  if(isset($_REQUEST['remove_cart'])) {
        foreach($_SESSION['cart'] as $key => $value) {
              if($value['b_id']==$_REQUEST['b_id']) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);  // //rearranging keys
                    header("location:my-cart.php");
              }
        }
  }
 
  
 // Quntity Change
 
/* if(isset($_REQUEST['mod_quant'])) 
 {
  foreach($_SESSION['cart'] as $key => $value)
   {
    if($value['b_id']==$_REQUEST['b_id']) 
        {
          $_SESSION['cart'][$key]['quantity']=$_REQUEST['mod_quant'];
          header("location:my-cart.php");
        }
   }


 }    */



 if(isset($_REQUEST['mod_quant_plus'])) 
 {
  foreach($_SESSION['cart'] as $key => $value)
   {
    if($value['b_id']==$_REQUEST['b_id']) 
        {
          $_SESSION['cart'][$key]['quantity']=$_SESSION['cart'][$key]['quantity']+1;
          header("location:my-cart.php");
        }
   }
 }
 if(isset($_REQUEST['mod_quant_min'])) 
 {
  foreach($_SESSION['cart'] as $key => $value)
   {
    if($value['b_id']==$_REQUEST['b_id']) 
        { 
            if($_SESSION['cart'][$key]['quantity']!=1) 
            {
          $_SESSION['cart'][$key]['quantity']=$_SESSION['cart'][$key]['quantity']-1;
            }
          header("location:my-cart.php");
        }
   }
 }

?>

