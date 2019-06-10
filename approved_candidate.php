<?php

include('connection.php');
$vote  =  vote();

$id = $_GET['id'];


$approve = mysqli_query($vote,"UPDATE candidate_request SET status=1 WHERE id='$id'");

if ($approve) {
    echo "<script>alert('Candidate Approved!')</script>";
    echo "<script>window.open('candidate_request.php','_self')</script>";

} else {
    echo "<script>alert('Approve Failed!')</script>";
    echo "<script>window.open('candidate_request.php','_self')</script>";

}


?>