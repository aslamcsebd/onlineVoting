<?php include('header.php'); ?>

<?php

$election_id = $_GET['election_id'];
$candidate_id = $_GET['candidate_id'];

$sql = "SELECT * FROM vote_count WHERE candidate_id='$candidate_id' AND election_id='$election_id'";
$vote_count = mysqli_query($vote, $sql);
$total_vote=mysqli_num_rows($vote_count);


if (isset($_POST['add_election'])) {
    $nid = $_POST['nid'];
    $code = $_POST['code'];

    $cid = $_POST['cid'];
    $eid = $_POST['eid'];



    $sql = "SELECT * FROM voter_info where NID_No='$nid' AND secret_code='$code'";
    $result = mysqli_query($vote, $sql);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows<=0)
    {
        echo "<script>alert('NID or Secret code invalid!!')</script>";
       // echo "<script>window.open('add_online_election.php','_self')</script>";

    }

    else
    {
          $sql2 = "Insert Into vote_count (election_id,candidate_id,voter_nid,voter_secret_code)  values ('$eid','$cid','$nid','$code')";
          $result2 = mysqli_query($vote, $sql2);

        if($result2)
        {
            echo "<script>alert('Vote Successfully Given!')</script>";
            echo "<script>window.open('vote_now.php','_self')</script>";

        }

        else
        {
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

        #my_box {
            display:inline-block;
            width: 260px;
            height: 200px;
            margin: 2px;
            font-size: 35px;
            color: #ffffff;
        }




        textarea {
            text-align: justify;
            white-space: normal;
        }
    </style>

    <div style="padding: 40px;"></div>
    <section id="contact" class="section-bg wow fadeInUp">
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
                                <div>
                                    <button id="my_box" type="button" class="btn btn-primary btn-fill pull-left"><h3 style="color: #ffffff">Total Vote</h3><h1><?php echo $total_vote;?></h1>
                                    </button>


                                </div>
                            </tr>


                            <tr>
                                <div>
                                    <td class="text-left">
                                        <a href="election_result.php" class="btn btn-primary btn-fill pull-left"
                                           tyle="padding: 5px 20px; margin: 0 auto; ">Back</a>

                                    </td>

                                </div>
                            </tr>





                        </form>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>