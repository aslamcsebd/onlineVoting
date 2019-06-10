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

    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header">

                <h3>Online Election Winner List</h3>
            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="">
                        <th>SL</th>
                        <th>Electon Name</th>
                        <th>Winner Name</th>

                        <th>Party Name</th>

                        </thead>

                        <tbody align="center">
                        <?php
                        $sql  ="Select * from election_winner";
                        $result  =  mysqli_query($vote,$sql);
                        //$row=mysqli_fetch_assoc($result);
                        ?>



                        <?php
                        $i=1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";

                            echo "<td><font color='black'>" . $i. "</td>";
                            echo "<td><font color='black'>" . $row['election_name'] . "</td>";
                            echo "<td><font color='black'>" . $row['candidate_name'] . "</td>";
                            echo "<td><font color='black'>" . $row['party_name'] . "</td>";

                           // echo "<td><a class='btn btn-info btn-fill pull-left' href=\"candidate_vote_details.php?election_id=".$row['election_id']."\">Details</a></td>";


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