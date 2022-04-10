<?php    
include 'config.php';
function product($result)
{

     $product='';
     $product.='<main id="main" class="main-site left-sidebar">

     <div class="container">

                  <div class="row">

                        <ul class="product-list grid-products equal-container">';
      while($row=mysqli_fetch_row($result)) {

           
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
      
      $product.='<li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
      <div class="product product-style-3 equal-elem ">
            <div class="product-thumnail">
                  <a href="single.php?book_id='.$book_id2.'" title="'.$title.'">
                        <figure><img src="admin/uploads/'.$pic.'" alt="'.$title.'" style="height:150px;"></figure>
                  </a>
            </div>
            <div class="product-info">
                  <a href="single.php?book_id='.$book_id2.'" class="product-name">
      <span>'.$title.'</span>';
      if(!empty($author)) { $product.='<span>Author:'.$author.'</span> '; }
      if(!empty($published)) { $product.='<span>Year:'.$published.'</span> '; }
      if($del_charge==2) { $product.='<span>Free Delivery</span> '; }
      
      $product.='</a>
      <div class="wrap-price">
      <span class="product-price">'.$price.' tk</span><br>
      <span>Discount:'.$disc.'</span>
      </div>
      <a href="#" class="btn add-to-cart" onclick="add2cart()">Add To Cart</a>
      <input type="hidden" value="'.$book_id2.'">
      </div>
      </div> 
      </li>';

   

   

      }
      $product.='</ul>

      </div>
      
      </div><!--end container-->
      
      </main>';
      echo $product;
      
}                                    
                                        

?>                                          