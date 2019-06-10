<?php 
	session_start();
	include('connection.php');
	$vote  =  vote();

 	if (isset($_GET['election_low_type'])) {
   	$id=$_GET['id']; 
      $election_low_type=$_GET['election_low_type']; 
      	
	   $sql ="delete from $election_low_type where id='$id'";
		$result	=	mysqli_query($vote,$sql);
		if ($result) {
         $_SESSION['election_low_delete_successfully']=true;
         echo "<script>window.location.href='election_low.php?type=$election_low_type&election=$election_low_type'</script>";
      }
   }
	 	
?>