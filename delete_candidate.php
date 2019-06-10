<?php

include('connection.php');
$vote  =  vote();

$id = $_GET['id'];


$delete = mysqli_query($vote,"DELETE FROM candidate_request WHERE id='$id'");

if ($delete) {
    echo "<script>alert('Candidate has been deleted!')</script>";
    echo "<script>window.open('candidate_request.php','_self')</script>";

} else {
    echo "<script>alert('Delete Failed!')</script>";
    echo "<script>window.open('candidate_request.php','_self')</script>";

}


?>