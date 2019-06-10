<?php include('header.php'); ?>
<?php        
   $name= $_GET['election']; 
   $sql  ="select * from voter_info";
   $result  =  mysqli_query($vote,$sql);
?>

   <div style="padding: 40px;"> </div>

   <?php if(isset($_SESSION['election_add_successfully'])) { ?>
      <?php 
         if (isset($_GET['type'])) {
            $type =  $_GET['type'];
         }
         echo '<script type="text/javascript">
               alert("['.$type.'] add successfully.");
            </script>';
      ?> 
   <?php } ?>
   <?php if(isset($_SESSION['election_edit_successfully'])) { ?>
      <?php 
         if (isset($_GET['type'])) {
            $type =  $_GET['type'];
         }
         echo '<script type="text/javascript">
               alert("['.$type.'] edit successfully.");
            </script>';
      ?> 
   <?php } ?>
   
   <?php if(isset($_SESSION['election_delete_successfully'])) { ?>
      <?php 
         if (isset($_GET['type'])) {
            $type =  $_GET['type'];
         }
         echo '<script type="text/javascript">
               alert("['.$type.'] delete successfully.");
            </script>';
      ?> 
   <?php } ?>

   <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">
         <div class="section-header">           
             <h3>All Voter List</h3>
            <?php if (isset($_SESSION['admin'])) { ?>            
              <!--  <div align="right">
                  <a href="election_add.php" class="btn btn-info btn-fill ">Add More</a>
               </div> -->
            
            <?php } ?>
         </div>
         <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>           
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead class="">                             
                     <th>NID No</th>
                     <th>Name</th>
                     <th>Status</th>
                     <th>Action</th>
                  </thead>                      
              
                  <tbody align="center">
                     <?php while($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                        <?php date_default_timezone_set("Asia/Dhaka");                           
                           $dob = date('M d, Y', strtotime($row['dob'])); ?>

                        <!-- Item -->                               
                        <td width="auto"><label class="first"> <?= $row['NID_No'] ?></label></td>
                        <td width="auto"><label class="first"> <?= $row['name'] ?></label></td>
                         <td width="auto"><label class="first">
                                 <?php
                                 if($row['status']==0)
                                 {
                                     echo "Pending";
                                 }

                                 else
                                 {
                                     echo "Approved";
                                 }
                                 ?>

                             </label></td>
                       
                        <!-- Action -->
                        <td class="text-center" width="auto">  
                           <a class="btn btn-success btn-fill pull-center" href="voter_view.php?NID_No=<?php echo $row['NID_No']; ?>">View</a>
                           
                           <a class="btn btn-info btn-fill pull-center" onclick="return confirm('Are you sure?')" href="approved_voter.php?id=<?php echo $row['id']; ?>">Approve</a>

                           <a class="btn btn-danger btn-fill pull-center" onclick="return confirm('Are you sure?')" href="delete_voter.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>   
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>            
            </div>
         </div>
      </div>
   </section>
<?php include('footer.php'); ?>
<?php unset($_SESSION['election_add_successfully']); ?>
<?php unset($_SESSION['election_edit_successfully']); ?>
<?php unset($_SESSION['election_delete_successfully']); ?>