<?php require_once('header.php'); ?>

<section class="content-header">
    <div class="content-header-left">
        <h1>View All Approved Donors</h1>
    </div>
    <div class="content-header-right">
        <a href="donor-pending.php" class="btn btn-primary btn-sm">Pending Donors</a>
    </div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $connection= mysqli_connect('localhost','azmaiens_blood','Pa_vB8q4T8Ql','azmaiens_blood');#mysqli_connect('HostName','Username','Password','DB_Name');
                $i = 0;
                       $read_query="SELECT * FROM tbl_donor LEFT JOIN tbl_blood_group ON tbl_donor.blood_group_id=tbl_blood_group.blood_group_id WHERE tbl_donor.status=1 ORDER BY agent_id DESC";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
                       $result=mysqli_query($connection,$read_query); 
                       if($result)
                       {
         
                foreach ($result as $row) {
                    $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            
                            <td><?php echo $row['name']; ?></td>
                            
                            <td>
                                <?php
                                    $diff = (date('Y') - date('Y',strtotime($row['date_of_birth'])));
                                    echo $diff;
                                ?>
                            </td>
                            <td><?php echo $row['blood_group_name']; ?></td>
                            
                            <td>
                                <a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalDetail<?php echo $i; ?>">Details</a>
                                <a href="#" class="btn btn-danger btn-xs" data-href="donor-delete.php?id=<?php echo $row['donor_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                                </td>


<!-- Modal Start -->
<div class="modal fade" id="myModalDetail<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
              Detail Information
            </h4>
        </div>
        <div class="modal-body">
            <div class="rTable">
                              
                <div class="rTableRow">
                    <div class="rTableHead">Name</div>
                    <div class="rTableCell"><?php echo $row['name']; ?></div>
                </div>
                
                
                <div class="rTableRow">
                    <div class="rTableHead">Gender</div>
                    <div class="rTableCell"><?php echo $row['gender']; ?></div>
                </div>
                <div class="rTableRow">
                    <div class="rTableHead">Date Of Birth</div>
                    <div class="rTableCell"><?php echo $row['date_of_birth']; ?></div>
                </div>
                
                <div class="rTableRow">
                    <div class="rTableHead">Blood Group</div>
                    <div class="rTableCell"><?php echo $row['blood_group_name']; ?></div>
                </div>
                
                <?php
                $agent_id=$row['agent_id'];
                $read_query3="SELECT * FROM tbl_agent WHERE agent_id='$agent_id'";  //SELECT * FROM table_name ORDER BY column_name(s) ASC|DESC 
                $result3=mysqli_query($connection,$read_query3);
                foreach($result3 as $data) { $last_donate=$data['last_donate']; }
                ?>
                <div class="rTableRow">
                    <div class="rTableHead">Last Donation</div>
                    <div class="rTableCell"><?php echo $last_donate; ?></div>
                </div>
                
                
                <div class="rTableRow">
                    <div class="rTableHead">Email</div>
                    <div class="rTableCell"><?php echo $row['email']; ?></div>
                </div>
                <div class="rTableRow">
                    <div class="rTableHead">Phone</div>
                    <div class="rTableCell"><?php echo $row['phone']; ?></div>
                </div>
               
                
                
                
                
                
                
               
                
                
                
                
                
                
            </div>
        </div>
    </div>                                    
</div>                                
</div>
<!-- Modal End -->


                            </td>
                        </tr>
                    <?php
                }
                       }
                ?>
                
                
            </tbody>
            
          </table>
        </div>
      </div>
  
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>