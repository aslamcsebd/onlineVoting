<?php 
	session_start();
	include('connection.php');
	$vote  =  vote();

 	if (isset($_GET['election_type'])) {
   	$id=$_GET['id']; 
      $election_type=$_GET['election_type']; 
      	
	   $sql ="delete from $election_type where id='$id'";
		$result	=	mysqli_query($vote,$sql);
		if ($result) {
         $_SESSION['election_delete_successfully']=true;
         echo "<script>window.location.href='election.php?type=$election_type&election=$election_type'</script>";
      }
   }
	 	
?>