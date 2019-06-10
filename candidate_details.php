<?php include('header.php'); ?>
<?php

   $get_election_id=$_GET['election_id'];
   $sql  ="select * from online_election_candidate WHERE election_id='$get_election_id'";
   $result  =  mysqli_query($vote,$sql);
   $row=mysqli_fetch_assoc($result);
   $election_name=$row['election_name'];
   $election_type=$row['election_type'];

?>

    <div style="padding: 40px;"> </div>

    <section id="contact" class="section-bg wow fadeInUp" style="background-color:lightgreen">
        <div class="container">
            <div class="section-header">

                <h3 align="center"><?php echo $election_name; ?></h3>
            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="">

                        <th>Candidate Name</th>
                        <th>Party Name</th>


                        <th>Action</th>
                        </thead>

                        <tbody align="center">
                        <?php
                        $sql  ="select * from online_election_candidate WHERE election_id='$get_election_id'";
                        $result  =  mysqli_query($vote,$sql);
                        //$row=mysqli_fetch_assoc($result);
                        ?>



                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";


                            echo "<td><font color='black'>" . $row['candidate_name'] . "</td>";
                            echo "<td><font color='black'>" . $row['party_name'] . "</td>";



                            echo "<td><a class='btn btn-info btn-fill pull-left' href=\"vote_submit.php?election_id=".$row['election_id']."&candidate_id=".$row['candidate_id']."\">Vote</a></td>";


                            echo "</tr> ";
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