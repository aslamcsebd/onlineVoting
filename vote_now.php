<?php include('header.php'); ?>
<?php //
//   $sql  ="select * from election_session order by election_date desc limit 1";
//   $result  =  mysqli_query($vote,$sql);
//   $row=mysqli_fetch_assoc($result);
//   $election_date=$row['election_date'];
//   $election_type=$row['election_type'];
//
//?>

    <div style="padding: 40px;"> </div>

    <section id="contact" class="section-bg wow fadeInUp" style="background-color:lightgreen">
        <div class="container" >
            <div class="section-header" >

                <h3>All Online Election</h3>
            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="">
                        <th>SL</th>
                        <th>Title</th>
                        <th>Election Type</th>

                        <th>Vote Date</th>
                        <th>Action</th>

                        </thead>

                        <tbody align="center">
                        <?php
                        $sql  ="Select * from online_election ORDER BY  election_id DESC";
                        $result  =  mysqli_query($vote,$sql);
                        //$row=mysqli_fetch_assoc($result);
                        ?>



                        <?php
                        $i=1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";

                            echo "<td><font color='black'>" . $i. "</td>";
                            echo "<td><font color='black'>" . $row['title'] . "</td>";
                            echo "<td><font color='black'>" . $row['type'] . "</td>";
                            echo "<td><font color='black'>" . $row['date'] . "</td>";

                          //  echo "<td><a class='btn btn-info btn-fill pull-left' href=\"candidate_details.php?election_id=".$row['election_id']."\">Details</a></td>";

                            if($row['status']==2)
                            {
                                echo "<td><a class='btn btn-outline-primary btn-fill pull-left'>Completed</a></td>";

                            }

                          else  if($row['status']==0)
                            {
                                echo "<td><a class='btn btn-outline-primary btn-fill pull-left'>Not Running</a></td>";

                            }
                            else if($row['status']==1)
                            {
//                         echo "<td><a class='confirmation btn btn-success btn-fill pull-left'  href=\"accept_challenge.php?id=".$row['id']."\" >Accept</a><br>";
//                         echo "<br><a class='confirmation btn btn-danger btn-fill pull-left'  href=\"reject_challenge.php?id=".$row['id']."\" >Reject</a></td>";
                                echo "<td><a class='btn btn-danger btn-fill pull-left' href=\"candidate_details.php?election_id=".$row['election_id']."\">Running</a></td>";

                            }


                            echo "</tr> ";

                            $i++;
                        }

                        echo " </tbody>";
                        echo " </table>";
                        ?>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>
<?php //unset($_SESSION['election_add_successfully']); ?>
<?php //unset($_SESSION['election_edit_successfully']); ?>
<?php //unset($_SESSION['election_delete_successfully']); ?>