<?php
	function vote() {
		$vote =mysqli_connect('localhost','root','','online_voting');
		return $vote;
	}
?>
