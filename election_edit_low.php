<?php include('header.php'); ?>
<?php  
   $id= $_GET['id']; 
   $name= $_GET['election']; 
   $sql="select*from $name where id=$id";
   $result=mysqli_query($vote,$sql);   
   $row=mysqli_fetch_assoc($result);

   if (isset($_POST['edit_election_low'])) {
      $title   =$_POST['title'];
      $date    =$_POST['date'];
      $details =$_POST['details'];

    $sql ="update $name set title='$title', date='$date', details='$details' where id='$row[id]' ";
      $result =  mysqli_query($vote,$sql);
      if ($result) {
         $_SESSION['election_low_edit_successfully']=true;
         echo "<script>window.location.href='election_low.php?type=$name&election=$name'</script>";
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
           <!-- <div style="float: left; position:relative; z-index:5; left: 15px;">
               <a href="election.php?election=<?php echo $name; ?>" class="btn btn-info" style="padding: 8px 94px; margin: 0 auto; ">Back</a>
            </div> -->

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
               <table class="table">
                  <form action="" method="POST">
                     <tr>
                        <th width="100" class="text-right">Title : </th>     
                        <td class="text-left">
                           <input type="text" class="form-control" name="title" placeholder="" value="<?= $row['title']; ?>" >
                        </td>     
                     </tr>
                     <tr>
                        <th width="100" class="text-right">Date : </th> 
                        <td class="text-left">
                           <input type="date" class="form-control" name="date" placeholder="" value="<?= $row['date']; ?>">
                        </td>     
                     </tr>
                     <tr>
                        <th width="100" class="text-right">Details : </th>    
                        <td class="text-left">
                           <textarea type="text" class="form-control" name="details" placeholder="" rows="8"><?= $row['details']; ?></textarea>
                        </td>     
                     </tr> 
                     <tr>
                        <th></th>
                        <td class="text-left">
                           <a href="election.php?election=<?php echo $name; ?>" class="btn btn-success" tyle="padding: 5px 20px; margin: 0 auto; ">Back</a>
                           <button type="submit" name="edit_election_low" class="btn btn-primary" onclick="return confirm('Are you sure?')">Edit Now
                           </button>
                        </td>                         
                     </tr>                     
                  </form>            
               </table>
            </div>
         </div>
      </div>
   </section>
<?php include('footer.php'); ?>