<?php include('header.php'); ?>

<?php
if (isset($_POST['add_election'])) {
    $election_id = $_POST['election_id'];
    $candidate_id = $_POST['candidate_id'];


    $sql  ="select * from candidate_request WHERE id='$candidate_id'";
   $result  =  mysqli_query($vote,$sql);
   $row=mysqli_fetch_assoc($result);
   $candidate_name=$row['name'];
   $party_name=$row['party_name'];

    $sql2  ="select * from online_election WHERE election_id='$election_id'";
    $result2  =  mysqli_query($vote,$sql2);
    $row=mysqli_fetch_assoc($result2);
    $election_name=$row['title'];

   // echo $election_name;

//    $date = $_POST['date'];
//    $details = $_POST['details'];

    $sql = "Insert Into online_election_candidate (election_id,election_name,candidate_id,candidate_name,party_name) values ('$election_id','$election_name','$candidate_id','$candidate_name','$party_name')";
    $result = mysqli_query($vote, $sql);

//    $sql2 = "insert into $election_type values (null, '$title', '$date', '$details')";
//    $result2 = mysqli_query($vote, $sql2);

    if ($result) {
        echo "<script>alert('Candidate Successfully Added!')</script>";
        echo "<script>window.open('add_candidate_election.php','_self')</script>";

    } else {
        echo "<script>alert('Failed!')</script>";
    }
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
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header">

            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">

                    <h2>Add Candidate To Election</h2>
                    <table class="table">
                        <form action="" method="POST">
                            <tr>
                                <th width="150" class="text-right">Election Name :</th>
                                <td class="text-left">

                                    <select name='election_id'
                                            style="  background-color: #1abc9c; font-size: 17px; padding: 5px 0px;">
                                        <option value="">Select Election Name</option>
                                        <?php
                                        $sql = "select * from online_election";
                                        $result = mysqli_query($vote, $sql);
                                        //$search = array("_");
                                        //$replace = array(" ");
                                        while ($election = mysqli_fetch_assoc($result)) { ?>
                                            <?php $name = $election['title'];
                                           // $elections = str_replace($search, $replace, $name); ?>
                                            <option value="<?= $election['election_id'] ?>"><?= $name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th width="150" class="text-right">Candidate Name :</th>
                                <td class="text-left">

                                    <select name='candidate_id'
                                            style="  background-color: #1abc9c; font-size: 17px; padding: 5px 0px;">
                                        <option value="">Select Candidate Name</option>
                                        <?php
                                        $sql = "select * from candidate_request WHERE status=1";
                                        $result = mysqli_query($vote, $sql);
                                        //$search = array("_");
                                        //$replace = array(" ");
                                        while ($election = mysqli_fetch_assoc($result)) { ?>
                                            <?php $name = $election['name'];
                                            // $elections = str_replace($search, $replace, $name); ?>
                                            <option value="<?= $election['id'] ?>"><?= $name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>



                            <tr>
                                <th></th>
                                <td class="text-left">
                                    <a href="election.php?election=<?php echo $name; ?>" class="btn btn-success"
                                       tyle="padding: 5px 20px; margin: 0 auto; ">Back</a>
                                    <button type="submit" name="add_election" class="btn btn-primary"
                                            onclick="return confirm('Are you sure?')">Add Now
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