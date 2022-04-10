<?php require_once('header.php'); ?>
<?php
$blood_group_id=htmlspecialchars($_REQUEST['blood_group_id']);
$district=htmlspecialchars($_REQUEST['district']);


$connection= mysqli_connect('localhost','azmaiens_blood','Pa_vB8q4T8Ql','azmaiens_blood');#mysqli_connect('HostName','Username','Password','DB_Name');
   
            if($blood_group_id!="all") 
            {
            //Collecting blood group using id  
            $read_query="SELECT * FROM tbl_blood_group WHERE blood_group_id='$blood_group_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
            $result=mysqli_query($connection,$read_query); 
            while($row1=mysqli_fetch_row($result)) { $blood_group_name0=$row1[1]; }  
            }
            else { $blood_group_name0="সকল"; }
   
//Reading data    	
if($blood_group_id!="all" && $district!="all")
{
$select_query="SELECT * FROM tbl_agent LEFT JOIN tbl_donor ON tbl_agent.agent_id=tbl_donor.agent_id
               WHERE present_jela='$district' AND tbl_donor.blood_group_id='$blood_group_id' AND tbl_donor.status='1'";  
$select=mysqli_query($connection,$select_query);

}
else if($blood_group_id=="all" && $district!="all")
{
$select_query="SELECT * FROM tbl_agent LEFT JOIN tbl_donor ON tbl_agent.agent_id=tbl_donor.agent_id
               WHERE present_jela='$district' AND tbl_donor.status='1'";  
$select=mysqli_query($connection,$select_query);
}
else if($blood_group_id!="all" && $district=="all")
{
$select_query="SELECT * FROM tbl_agent LEFT JOIN tbl_donor ON tbl_agent.agent_id=tbl_donor.agent_id
               WHERE tbl_donor.blood_group_id='$blood_group_id' AND tbl_donor.status='1'";  
$select=mysqli_query($connection,$select_query);

}
else if($blood_group_id=="all" && $district=="all")
{
$select_query="SELECT * FROM tbl_agent LEFT JOIN tbl_donor ON tbl_agent.agent_id=tbl_donor.agent_id
               WHERE tbl_donor.status='1'"; 
$select=mysqli_query($connection,$select_query);

}





$empty=1;
if($select)
{
    
?>


<div class="container">
<div class="row">
			
			<div class="col-md-12">
				<?php

				echo '<h3>All Results for &rarr; '.$blood_group_name0.' ব্লাড গ্রুপ</h3>';
				?>
			</div>
			
</div>			
</div>



<div class="w3-center w3-panel w3-text-red"><span style="font-size:35px" class="w3-red w3-round w3-xxround">  <?php echo $blood_group_name0; ?> ব্লাড গ্রুপ  </span></div> 
<div style="width:100%;max-width:1200px;margin-left:auto;margin-right:auto;" class="w3-panel">
<table class="w3-table-all">
    <tr class="w3-red">
        <th class="w3-border">SL No.</th>
        <th class="w3-border">Name</th>
        <th class="w3-border">রক্তের গ্রুপ</th>
        <th class="w3-border">বর্তমান ঠিকানা</th>
        <th class="w3-border">যোগাযোগ</th>
       
        <th class="w3-border">সর্বশেষ রক্তদান</th>
        
    </tr>
    
        <?php
        $i=0;
        foreach ($select as $row) 
        {
        $empty=0;   
            //Collecting blood group using id  
            $blood_id=$row['blood_group_id'];
            $read_query="SELECT * FROM tbl_blood_group WHERE blood_group_id='$blood_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
            $result=mysqli_query($connection,$read_query); 
            while($row1=mysqli_fetch_row($result)) { $blood_group_name=$row1[1]; }   
        $i++;
         ?>
         <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['agent_name']; ?></td>
        <td><?php echo $blood_group_name; ?></td>
        <td><?php echo $row['address']; ?></td>        
        <td><?php if($row['gender']=="male") { echo $row['phone']; } else echo"Hidden" ?></td>        
         
        <td><?php echo $row['last_donate']; ?></td>        
        </tr>
        <?php
        }
        ?>
    
    
    
<?php
if($empty==1)
{
?>


<h1>Nothing found</h1>


<?php
}
?>  
    
    
    
</table>
</div>
<?php
}

?>




























<?php require_once('footer.php'); ?>