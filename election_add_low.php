<?php include('header.php'); ?>

<?php
   if (isset($_POST['add_election_low'])) {
      echo $election_low_type   =$_POST['election_low_type'];
      echo $title   =$_POST['title'];
      echo $date    =$_POST['date'];
      echo $details =$_POST['details'];

      $sql ="insert into $election_low_type values (null, '$title', '$date', '$details')";
      $result =  mysqli_query($vote, $sql);      
      if ($result) {
         $_SESSION['election_low_add_successfully']=true;
         echo "<script>window.location.href='election_low.php?type=$election_low_type&election=$election_low_type'</script>";
      }
   }  
?>

<style type="text/css">
   .table td, .table th {
   border-top: none;
   }
   textarea{
      text-align: justify;
      white-space: normal;
   }
</style>

<div style="padding: 40px;"></div>
   <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">
         <div class="section-header">
                
         </div>
         <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>           
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
               <table class="table">
                  <form action="" method="POST">
                     <tr>
                        <th width="150" class="text-right">Election low type : </th>     
                        <td class="text-left">

                           <select name='election_low_type' style="  background-color: #1abc9c; font-size: 17px; padding: 5px 0px; text-align: center;">
                              <option value="">Select Election low type</option>
                              <?php 
                                 $sql  ="select * from elections_low";
                                 $result  =  mysqli_query($vote,$sql);
                                 $search = array("_","low");
                                 $replace  = array(" ",""); 
                                 while($election = mysqli_fetch_assoc($result)) { ?>
                                    <?php $name=$election['name'];
                                    $elections=str_replace($search, $replace, $name); ?>
                                   <option style="text-align: center;" value="<?= $election['name'] ?>"><?= $elections; ?></option>
                                  <?php } ?>
                           </select>  
                        </td>     
                     </tr>
                     <tr>
                        <th width="150" class="text-right">Title : </th>     
                        <td class="text-left">
                           <input type="text" name="title" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="150" class="text-right">Date : </th> 
                        <td class="text-left">
                           <input type="date" name="date" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="150" class="text-right">Details : </th>    
                        <td class="text-left">
                           <textarea type="text" class="form-control" name="details" placeholder="" rows="8"></textarea>
                        </td>     
                     </tr> 
                     <tr>
                        <th></th>
                        <td class="text-left">
                           <a href="election.php?election=<?php echo $name; ?>" class="btn btn-success" tyle="padding: 5px 20px; margin: 0 auto; ">Back</a>
                           <button type="submit" name="add_election_low" class="btn btn-primary" onclick="return confirm('Are you sure?')">Add Now
                           </button></td>                         
                     </tr>                     
                  </form>            
               </table>
            </div>
         </div>
      </div>
   </section>
<?php include('footer.php'); ?>