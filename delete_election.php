<?php

include('connection.php');
$vote  =  vote();

$id = $_GET['id'];


$delete = mysqli_query($vote,"DELETE FROM online_election WHERE election_id='$id'");

if ($delete) {
    echo "<script>alert('Election has been deleted!')</script>";
    echo "<script>window.open('all_online_election.php','_self')</script>";

} else {
    echo "<script>alert('Delete Failed!')</script>";
    echo "<script>window.open('all_online_election.php','_self')</script>";

}


?>