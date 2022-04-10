<?php
session_start();
ob_start();

?>

<?php




if(isset($_REQUEST['cart'])) 
 {
  $page=$_REQUEST['page'];
  if(!empty($_REQUEST['cat_id'])) { $cat_id=htmlspecialchars($_REQUEST['cat_id']); }
   if(!empty($_REQUEST['book_id'])) { $book_id=htmlspecialchars($_REQUEST['book_id']); }
   if(!empty($_REQUEST['data'])) { $key=htmlspecialchars($_REQUEST['data']); }

   
    if(isset($_SESSION['cart'])) //if defined
    {
            $my_item=array_column($_SESSION['cart'],'b_id');  // storing all book id in array
            if(in_array($_REQUEST['b_id'],$my_item)) // if already added
                //Searching                     
                             {
                                    if($page=='category.php') 
                                    {
                                        
                                        header("location:$page?added&cat_id=$cat_id");
                                    } else if($page=='single.php')
                                    {
                                        header("location:$page?added&book_id=$book_id");
                                    } else if($page=='search.php')
                                    {
                                        header("location:$page?data=$key&added");
                                    } else if($page=='trend.php')
                                    {
                                        header("location:$page?added");
                                    } else
                                    {
                                        header("location:$page?added");
                                    }
                             }
                             else
                             {   // if not already added

                                    $count=count($_SESSION['cart']);
                                    $_SESSION['cart'][$count]=array('b_id' =>htmlspecialchars($_REQUEST['b_id']),'b_name' =>htmlspecialchars($_REQUEST['b_name']),'price' =>htmlspecialchars($_REQUEST['price']),'disc' =>htmlspecialchars($_REQUEST['disc']),'f_price' =>htmlspecialchars($_REQUEST['f_price']),'quantity' =>htmlspecialchars($_REQUEST['quant']),'author' =>htmlspecialchars($_REQUEST['au_name']),'charge' =>htmlspecialchars($_REQUEST['del_charge']));
                                    
                                    $my_item=array_column($_SESSION['cart'],'b_id');
                                    $separ_id=implode(",",$my_item);
                                                                    if($page=='category.php') 
                                                                {
                                                                    
                                                                    header("location:$page?cat_id=$cat_id");
                                                                } else if($page=='single.php')
                                                                {
                                                                    header("location:$page?book_id=$book_id");
                                                                } else if($page=='search.php')
                                                                {
                                                                    header("location:$page?data=$key");
                                                                } else if($page=='trend.php')
                                                                {
                                                                    header("location:$page");
                                                                } else
                                                                {
                                                                    header("location:$page");
                                                                }
                             }
    }
    else
    {                           //if no defined

        $_SESSION['cart'][0]=array('b_id' =>htmlspecialchars($_REQUEST['b_id']),'b_name' =>htmlspecialchars($_REQUEST['b_name']),'price' =>htmlspecialchars($_REQUEST['price']),'disc' =>htmlspecialchars($_REQUEST['disc']),'f_price' =>htmlspecialchars($_REQUEST['f_price']),'quantity' =>htmlspecialchars($_REQUEST['quant']),'author' =>htmlspecialchars($_REQUEST['au_name']),'charge' =>htmlspecialchars($_REQUEST['del_charge']));
       
        $my_item=array_column($_SESSION['cart'],'b_id');
        $separ_id=implode(",",$my_item);
                                                 if($page=='category.php') 
                                {
                                    
                                    header("location:$page?cat_id=$cat_id");
                                } else if($page=='single.php')
                                {
                                    header("location:$page?book_id=$book_id");
                                } else if($page=='search.php')
                                {
                                    header("location:$page?data=$key");
                                } else
                                {
                                    header("location:$page");
                                }

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

