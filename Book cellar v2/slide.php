<?php
function slider($row)
{
      $book_id=$row[0];
	$img=$row[1];
	$title=$row[2];
	$author=$row[3];
	$year=$row[4];
	$price=$row[5];
	$disc=$row[6];
	$f_price=$row[7];
	$cat_id=$row[8];
	$d_charge=$row[11];
	$cat_name=$row[15];

$slide='';
$slide.='<div class="my-card w3-border w3-hover-border-red">
<div class="w3-panel">
<div class="w3-center"><img class="cl-1" src="admin/uploads/'.$img.'"></div>
<a href="" class="w3-margin-top">
<h3>'.$title.'</h3>';

if(!empty($author)) { $slide.='<p>'.$author.'</p>';}


$slide.='<p class="my-price">'.$price.'</p>
<p>'.$disc.'</p>
</a>
<input type="hidden" value="'.$book_id.'">
<button class="w3-button w3-dark-gray w3-hover-red w3-button w3-block" onclick="ad2cart()">Add To Cart</button>

</div>
</div>';
echo $slide;

}






?>