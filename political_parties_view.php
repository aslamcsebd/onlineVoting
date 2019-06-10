<?php include('header.php'); ?>
<?php  
   $id= $_GET['id']; 
   $name= $_GET['party']; 
   $sql="select*from political_parties where id=$id";
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
               <a href="political_parties.php" class="btn btn-info" style="padding: 8px 94px; margin: 0 auto; ">Back</a>
            </div>
            <?php  $search = array("_");
                   $replace  = array(" ");
                   $name2=str_replace($search, $replace, $name);
            ?>
            <h3><?= $name2 ?></h3>
         </div>          
         <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>           
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
               <table class="table" border="2">
                  <tr>
                     <th width="200" class="text-right">Registration date : </th>     
                     <td class="text-left"><?= $row['date']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Party Name : </th>     
                     <td class="text-left"><?= $row['party_name']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Symbol Name : </th> 
                     <td class="text-left"><?= $row['symbol_name']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Symbol Image : </th> 
                     <td class="text-left"><img src="<?= $row['symbol'];?>" class="img-fluid" width="80" alt="Image Not Found, upload please." style="border: 2px solid blue;"> </td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">President's Name : </th> 
                     <td class="text-left"><?= $row['president_name']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">President's Image : </th> 
                     <td class="text-left"><img src="<?= $row['president_photo'];?>" class="img-fluid" width="80" alt="Image Not Found, upload please." style="border: 2px solid blue;"> </td>
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Secretary's Name : </th> 
                     <td class="text-left"><?= $row['secretary_general']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Secretary's Image : </th> 
                     <td class="text-left"><img src="<?= $row['secretary_photo'];?>" class="img-fluid" width="80" alt="Image Not Found, upload please." style="border: 2px solid blue;"> </td>
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Contact : </th> 
                     <td class="text-left"><?= $row['contact']; ?></td>     
                  </tr>
                  <tr>
                     <th width="200" class="text-right">Email : </th> 
                     <td class="text-left"><?= $row['email']; ?></td>     
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
