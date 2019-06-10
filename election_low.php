<?php include('header.php'); ?>
<?php        
   $name= $_GET['election']; 
   $sql  ="select * from $name";
   $result  =  mysqli_query($vote,$sql);
?>

   <div style="padding: 40px;"> </div>

   <?php if(isset($_SESSION['election_low_add_successfully'])) { ?>
      <?php 
         if (isset($_GET['type'])) {
            $type =  $_GET['type'];
         }
         echo '<script type="text/javascript">
               alert("['.$type.'] add successfully.");
            </script>';
      ?> 
   <?php } ?>
   <?php if(isset($_SESSION['election_low_edit_successfully'])) { ?>
      <?php 
         if (isset($_GET['type'])) {
            $type =  $_GET['type'];
         }
         echo '<script type="text/javascript">
               alert("['.$type.'] edit successfully.");
            </script>';
      ?> 
   <?php } ?>
   
   <?php if(isset($_SESSION['election_low_delete_successfully'])) { ?>
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
            <?php  $search = array("_");
                   $replace  = array(" ");
                   $name2=str_replace($search, $replace, $name);
            ?>
            <h3><?= $name2 ?></h3>
            <?php if (isset($_SESSION['admin'])) { ?>            
               <div align="right">
               <a href="election_add_low.php" class="btn btn-info btn-fill ">Add More Low</a>

               </div>
            <?php } ?>
         </div>
         <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>           
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead class="">                             
                     <!-- <th>Sl.</th> -->
                     <th>Title</th>
                     <th>Published at</th>
                     <th>Action</th>
                  </thead>                      
              
                  <tbody align="center">
                     <?php while($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                        <?php date_default_timezone_set("Asia/Dhaka");                           
                           $date = date('M d, Y', strtotime($row['date'])); ?>

                        <!-- Item -->                               
                        <!-- <td width="auto"><label class="first"> <?= $row['id'] ?></label></td> -->
                        <td width="auto"><label class="first"> <?= $row['title'] ?></label></td>
                        <td width="auto"><label class="first"> <?= $date; ?></label></td>
                       
                        <!-- Action -->
                        <td class="text-center" width="auto">  
                           <a class="btn btn-success btn-fill pull-center" href="election_view_low.php?id=<?php echo $row['id']; ?>&election=<?php echo $name; ?>">View</a>

                           <?php if (isset($_SESSION['admin'])) { ?>
                              <a class="btn btn-info btn-fill pull-center" href="election_edit_low.php?id=<?php echo $row['id']; ?>&election=<?php echo $name; ?>">Edit</a>

                              <a class="btn btn-info btn-fill pull-center" onclick="return confirm('Are you sure?')" href="election_delete_low.php?id=<?php echo $row['id']; ?>&election_low_type=<?php echo $name; ?>">Delete</a>
                           <?php } ?>
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
<?php unset($_SESSION['election_low_add_successfully']); ?>
<?php unset($_SESSION['election_low_edit_successfully']); ?>
<?php unset($_SESSION['election_low_delete_successfully']); ?>