<?php include('header.php'); ?>

<?php      

   if (isset($_POST['political_parties_add'])) {
                                      
      $date   =$_POST['date'];
      $party_name   =$_POST['party_name'];
      $symbol_name    =$_POST['symbol_name'];

      $symbol='profile_picture/political_party/'. $_FILES['symbol']['name'];
      move_uploaded_file($_FILES['symbol']['tmp_name'],$symbol);

      $president_name    =$_POST['president_name'];

      $president_photo='profile_picture/political_party/'. $_FILES['president_photo']['name'];
      move_uploaded_file($_FILES['president_photo']['tmp_name'],$president_photo);

      $secretary_general    =$_POST['secretary_general'];

      $secretary_photo='profile_picture/political_party/'. $_FILES['secretary_photo']['name'];
      move_uploaded_file($_FILES['secretary_photo']['tmp_name'],$secretary_photo);

      $contact    =$_POST['contact'];
      $email    =$_POST['email'];

      $address    =$_POST['address'];
      $search = array("'");
      $replace  = array("\'");
      $address=str_replace($search, $replace, $address);


      $sql ="insert into political_parties values (null, '$date', '$party_name', '$symbol_name', '$symbol', '$president_name', '$president_photo', '$secretary_general', '$secretary_photo', '$contact', '$email', '$address')";
      $result =  mysqli_query($vote, $sql);      
      if ($result) {
         $_SESSION['political_parties_add']=true;
         echo "<script>window.location.href='political_parties.php?type=Political_Party'</script>";
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
                  <form action="" method="post" class="form-container" enctype="multipart/form-data">
                     <tr>
                        <th width="200" class="text-right">Registration date : </th>     
                        <td class="text-left">
                           <input type="date" name="date" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Party Name : </th>     
                        <td class="text-left">
                           <input type="text" name="party_name" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Symbol Name : </th> 
                        <td class="text-left">
                           <input type="text" name="symbol_name" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Symbol Image : </th> 
                        <td class="text-left">
                          <input type="file" name="symbol" style="background: #ecf0f1; margin: 0; padding: 0; ">  
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">President's Name : </th> 
                        <td class="text-left">
                           <input type="text" name="president_name" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">President's Image : </th> 
                        <td class="text-left">
                          <input type="file" name="president_photo" style="background: #ecf0f1; margin: 0; padding: 0; ">  
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Secretary's Name : </th> 
                        <td class="text-left">
                           <input type="text" name="secretary_general" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Secretary's Image : </th> 
                        <td class="text-left">
                          <input type="file" name="secretary_photo" style="background: #ecf0f1; margin: 0; padding: 0; ">  
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Contact : </th> 
                        <td class="text-left">
                           <input type="text" name="contact" placeholder="">
                        </td>     
                     </tr>
                     <tr>
                        <th width="200" class="text-right">Email : </th> 
                        <td class="text-left">
                           <input type="text" name="email" placeholder="">
                        </td>     
                     </tr>                     
                     <tr>
                        <th width="200" class="text-right">Address : </th>    
                        <td class="text-left">
                           <textarea type="text" class="form-control" name="address" placeholder="" rows="2"></textarea>
                        </td>     
                     </tr> 
                     <tr>
                        <th></th>
                        <td class="text-left">
                           <a href="political_parties.php" class="btn btn-success" tyle="padding: 5px 20px; margin: 0 auto; ">Back</a>
                           <button type="submit" name="political_parties_add" class="btn btn-primary" onclick="return confirm('Are you sure?')">Add Now
                           </button></td>                         
                     </tr>                     
                  </form>            
               </table>
            </div>
         </div>
      </div>
   </section>
<?php include('footer.php'); ?>