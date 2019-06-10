<?php

include('connection.php');
$vote  =  vote();

$id = $_GET['id'];


$approve = mysqli_query($vote,"UPDATE voter_info SET status=1 WHERE id='$id'");

if ($approve) {
    echo "<script>alert('Voter Approved!')</script>";
    echo "<script>window.open('voter_request.php','_self')</script>";

} else {
    echo "<script>alert('Approve Failed!')</script>";
    echo "<script>window.open('voter_request.php','_self')</script>";

}


?>