<?php include('header.php'); ?>
<?php  
   $id= $_GET['id']; 
   $name= $_GET['election']; 
   $sql="select*from $name where id=$id";
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
               <a href="election.php?election=<?php echo $name; ?>" class="btn btn-info" style="padding: 8px 94px; margin: 0 auto; ">Back</a>
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
                     <th width="100" class="text-right">Title : </th>     
                     <td class="text-left"> <?= $row['title']; ?></td>     
                  </tr>
                  <tr>
                     <th width="100" class="text-right">Date : </th> 
                     <td class="text-left"> <?= $row['date']; ?> </td>     
                  </tr>
                  <tr>
                     <th width="100" class="text-right">Details : </th>    
                     <td class="text-left" style=" text-align: justify; text-justify: inter-word;"> <?= $row['details']; ?> </td>     
                  </tr>             
               </table> 
            </div>
         </div>
      </div>
   </section>

   

<?php include('footer.php'); ?>
