<?php

include('connection.php');
$vote  =  vote();

$id = $_GET['id'];


$delete = mysqli_query($vote,"DELETE FROM voter_info WHERE id='$id'");

if ($delete) {
    echo "<script>alert('Voter info has been deleted!')</script>";
    echo "<script>window.open('voter_request.php','_self')</script>";

} else {
    echo "<script>alert('Delete Failed!')</script>";
    echo "<script>window.open('voter_request.php','_self')</script>";

}


?>