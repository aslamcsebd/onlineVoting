<?php include('header.php'); ?>

<?php

$election_id = $_GET['election_id'];
$candidate_id = $_GET['candidate_id'];

if (isset($_POST['add_election'])) {
    $nid = $_POST['nid'];
    $code = $_POST['code'];

    $cid = $_POST['cid'];
    $eid = $_POST['eid'];


    $sql = "SELECT * FROM voter_info where NID_No='$nid' AND secret_code='$code' AND status='1'";
    $result = mysqli_query($vote, $sql);
    $num_rows = mysqli_num_rows($result);


    //vote check
    $sql_vote = "SELECT voter_nid FROM vote_count where voter_nid='$nid' AND election_id='$eid'";
    $result_vote = mysqli_query($vote, $sql_vote);
    $num_rows_vote = mysqli_num_rows($result_vote);

    if ($num_rows <= 0) {
        echo "<script>alert('NID or Secret code invalid!!')</script>";
        // echo "<script>window.open('add_online_election.php','_self')</script>";

    } else if ($num_rows_vote > 0) {
        echo "<script>alert('Sorry! You already Voted!')</script>";
        // echo "<script>window.open('add_online_election.php','_self')</script>";

    } else {
        $sql2 = "Insert Into vote_count (election_id,candidate_id,voter_nid,voter_secret_code)  values ('$eid','$cid','$nid','$code')";
        $result2 = mysqli_query($vote, $sql2);

        if ($result2) {
            echo "<script>alert('Vote Successfully Given!')</script>";
            echo "<script>window.open('vote_now.php','_self')</script>";

        } else {
            echo "<script>alert('Failed!')</script>";
        }


    }


    // $sql = "Insert Into online_election (title,type,details,date) values ('$title','$election_type','$details','$date')";
    //  $result = mysqli_query($vote, $sql);

//    $sql2 = "insert into $election_type values (null, '$title', '$date', '$details')";
//    $result2 = mysqli_query($vote, $sql2);

//    if($result)
//    {
//        echo "<script>alert('Election Successfully Added!')</script>";
//        echo "<script>window.open('add_online_election.php','_self')</script>";
//
//    }
//
//    else
//    {
//        echo "<script>alert('Failed!')</script>";
//    }
}
?>

    <style type="text/css">
        .table td, .table th {
            border-top: none;
        }

        textarea {
            text-align: justify;
            white-space: normal;
        }
    </style>

    <div style="padding: 40px;"></div>
    <section id="contact" class="section-bg wow fadeInUp" style="background-color:lightgreen">
        <div class="container">
            <div class="section-header">

            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                    <table class="table">
                        <form action="" method="POST">

                            <tr>
                                <th class="text-right">Election ID :</th>
                                <td class="text-left">
                                    <input width="250" type="number" name="eid" value="<?php echo $election_id ?>"
                                           readonly>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-right">Candidate ID :</th>
                                <td class="text-left">
                                    <input width="250" type="text" name="cid" value="<?php echo $candidate_id ?>"
                                           readonly>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-right">Your NID :</th>
                                <td class="text-left">
                                    <input width="250" type="text" name="nid" placeholder="NID" required>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-right">Your Secret Code :</th>
                                <td class="text-left">
                                    <input width="250" type="password" name="code" placeholder="Code" required>
                                </td>
                            </tr>


                            <tr>
                                <th></th>
                                <td class="text-left">

                                    <button type="submit" name="add_election" class="btn btn-primary"
                                            onclick="return confirm('Are you sure?')">Submit Vote
                                    </button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>