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

$slide='<div class="my-card w3-border w3-hover-border-red">
<div class="w3-panel">
<div class="res-img">
<img class="cl-1" src="admin/uploads/'.$img.'">
</div>';

$slide.='<a href="single.php?book_id='.$book_id.'" class="w3-margin-top">
<div class="res-flow">
<p class="res-title">
'.$title.'
</p>';


if(!empty($author)) 
{
	$slide.='<p>Author:'.$author.'</p>';
}

$slide.='</div>


<button class="w3-dark-gray w3-hover-red w3-button w3-block res-button" onclick="ad2cart()">View</button>
</a>
</div>
</div>';

echo $slide;

}





?>















