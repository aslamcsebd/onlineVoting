<?php 
	session_start();
	session_destroy();
	  echo '<script type="text/javascript">
               alert("add successfully.");
            </script>';
	header("Location: index.php");
?>
