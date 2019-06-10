<?php

include('connection.php');
$vote  =  vote();

$id = $_GET['id'];


$approve = mysqli_query($vote,"UPDATE online_election SET status=1 WHERE election_id='$id'");

if ($approve) {
    echo "<script>alert('Election Start!')</script>";
    echo "<script>window.open('all_online_election.php','_self')</script>";

} else {
    echo "<script>alert('Failed!')</script>";
    echo "<script>window.open('all_online_election.php','_self')</script>";

}


?>