<?php include('header.php'); ?>
<?php
   $sql  ="select * from political_parties order by id asc";
   $result  =  mysqli_query($vote,$sql);
?>
   <div style="padding: 40px;"> </div>

   <?php if(isset($_SESSION['political_parties_add'])) { ?>
      <?php 
         if (isset($_GET['type'])) {
            $type =  $_GET['type'];
         }
         echo '<script type="text/javascript">
               alert("['.$type.'] add successfully.");
            </script>';
      ?> 
   <?php } ?>
   <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">
         <div class="section-header">
            <h3><?= "Political Parties"; ?></h3>

            <div align="right">
               <a href="political_parties_view_all.php" class="btn btn-info btn-fill">View All</a>
               <?php if (isset($_SESSION['admin'])) { ?>  
                     <a href="political_parties_add.php" class="btn btn-info btn-fill">Add More</a>
               <?php } ?>
            </div>
         <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>           
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead class="">           
                     <th>Symbol</th> 
                     <th>Name</th> 
                     <th>Symbol Name </th> 
                     <th>President</th>
                     <th>President Name</th>
                     <th>Action</th>
                  </thead>                      
              
                  <tbody align="center">
                     <?php while($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                        <!-- Item -->    

                        <td><img src="<?= $row['symbol'];?>" class="img-fluid" width="30" alt="Not Found" style="border: 1px solid blue;"> </td>      

                        <td width="auto"><label class="first"> <?= $row['party_name'] ?></label></td>

                        <td width="auto"><label class="first"> <?= $row['symbol_name'] ?></label></td>
                        <td><img src="<?= $row['president_photo'];?>" class="img-fluid" width="30" alt="Not Found" style="border: 1px solid blue;"> </td>     
                        <td width="auto"><label class="first"> <?= $row['president_name']; ?></label></td>
                       
                        <!-- Action -->
                        <td class="text-center" width="auto">  
                           <a class="btn btn-success btn-fill pull-center" href="political_parties_view.php?id=<?php echo $row['id']; ?>&party=<?php echo $row['party_name']; ?>">View</a>

                           <!-- <?php if (isset($_SESSION['admin'])) { ?>
                              <a class="btn btn-info btn-fill pull-center" href="">Edit</a>

                              <a class="btn btn-info btn-fill pull-center" onclick="return confirm('Are you sure?')" href="">Delete</a>
                           <?php } ?> -->
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
<?php unset($_SESSION['political_parties_add']); ?>