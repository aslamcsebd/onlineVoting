<?php include('header.php'); ?>
<?php
$sql = "select * from election_session order by election_date";
$result = mysqli_query($vote, $sql);
$row = mysqli_fetch_assoc($result);
$election_date = $row['election_date'];
$election_type = $row['election_type'];

?>

    <div style="padding: 40px;"></div>

    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <?php $search = array("_");
                $replace = array(" ");
                $name2 = str_replace($search, $replace, $election_type);
                ?>
                <h3><?= $name2 ?></h3>
            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="">

                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>NID_No</th>

                        <th>Party Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>

                        <tbody align="center">
                        <?php
                        $sql2 = "select * from candidate_request ORDER BY id DESC ";
                        $result2 = mysqli_query($vote, $sql2);
                       // $row2= mysqli_fetch_assoc($result);

                        $i=1;
                        ?>
                        <?php while ($row = mysqli_fetch_assoc($result2)) {  ?>
                            <tr>


                                <!-- Item -->
                                <td width="auto"><label class="first"> <?= $i ?></label></td>
                                <td><img src="<?= $row['photo']; ?>" class="img-fluid" width="60" alt="Not Found"
                                         style="border: 1px solid blue;"></td>
                                <td width="auto"><label class="first"> <?= $row['name'] ?></label></td>
                                <td width="auto"><label class="first"> <?= $row['NID_No'] ?></label></td>

                                <td width="auto"><label class="first"> <?= $row['party_name'] ?></label></td>
                                <td width="auto"><label class="first">
                                        <?php
                                        if($row['status']==0)
                                        {
                                            echo "Pending";
                                        }

                                        else
                                        {
                                            echo "Approved";
                                        }

                                        $i++;
                                            ?>

                                    </label></td>
                                <!-- Action -->
                                <td class="text-center" width="auto">
                                    <a class="btn btn-success btn-fill pull-center"
                                       href="candidate_view.php?NID_No=<?php echo $row['NID_No']; ?>">View</a>

                                    <a class="btn btn-info btn-fill pull-center"
                                       onclick="return confirm('Are you sure?')"
                                       href="approved_candidate.php?id=<?php echo $row['id']; ?>">Approve</a>

                                    <a class="btn btn-danger btn-fill pull-center"
                                       onclick="return confirm('Are you sure?')"
                                       href="delete_candidate.php?id=<?php echo $row['id']; ?>">Delete</a>

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>
<?php unset($_SESSION['election_add_successfully']); ?>
<?php unset($_SESSION['election_edit_successfully']); ?>
<?php unset($_SESSION['election_delete_successfully']); ?>