<?php include('header.php'); ?>
<?php  
   $NID_No= $_GET['NID_No'];
   $sql="select*from voter_info where NID_No='$NID_No'";
   $result=mysqli_query($vote,$sql);   
   $row=mysqli_fetch_assoc($result);
?>
<style type="text/css">
   .table td, .table th {
   border-top: none;
   }
</style>

   <div style="padding: 40px;"> </div>

   <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">
         <div class="section-header">
            <div style="float: left; position:relative; z-index:5; left: 15px;">
               <a href="candidate_request.php" class="btn btn-info" style="padding: 8px 94px; margin: 0 auto; ">Back</a>
            </div>
            <!-- <?php  $search = array("_");
                   $replace  = array(" ");
                   $name2=str_replace($search, $replace, $name);
            ?>
            <h3><?= $name2 ?></h3> -->
         </div>          
         <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>           
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
               <table class="table" border="2">

                  <tr>
                     <th width="200" class="text-right">Profile Picture : </th> 
                     <td class="text-left"><img src="<?= $row['photo'];?>" class="img-fluid" width="80" alt="Image Not Found." style="border: 2px solid blue;"> </td>
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Name : </th>     
                     <td class="text-left"><?= $row['name']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Birthday : </th>     
                     <td class="text-left"><?= $row['dob']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">NID_No : </th>     
                     <td class="text-left"><?= $row['NID_No']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Father Name : </th> 
                     <td class="text-left"><?= $row['father']; ?></td>     
                  </tr>                 
                  <tr>
                     <th width="200" class="text-right">Mother Name : </th> 
                     <td class="text-left"><?= $row['mother']; ?></td>     
                  </tr>                
                  <tr>
                     <th width="200" class="text-right">Email : </th> 
                     <td class="text-left"><?= $row['email']; ?></td>     
                  </tr>                 
                  <tr>
                     <th width="200" class="text-right">Contact : </th> 
                     <td class="text-left"><?= $row['contact']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Gender : </th> 
                     <td class="text-left"><?= $row['gender']; ?></td>     
                  </tr>  
                  <tr>
                     <th width="200" class="text-right">Blood Group : </th> 
                     <td class="text-left"><?= $row['blood_Group']; ?></td>     
                  </tr>                    
                  <tr>
                     <th width="200" class="text-right">Address : </th>    
                     <td class="text-left"><?= $row['address']; ?></td>     
                  </tr>     
               </table> 
            </div>
         </div>
      </div>
   </section> 
<?php include('footer.php'); ?>