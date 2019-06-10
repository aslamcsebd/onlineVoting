<?php include('header.php'); ?>
<?php
$name = $_GET['election'];
$sql = "select * from $name order by id desc";
$result = mysqli_query($vote, $sql);
?>

    <div style="padding: 40px;"></div>

<?php if (isset($_SESSION['election_add_successfully'])) { ?>
    <?php
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }
    echo '<script type="text/javascript">
               alert("[' . $type . '] add successfully.");
            </script>';
    ?>
<?php } ?>
<?php if (isset($_SESSION['election_edit_successfully'])) { ?>
    <?php
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }
    echo '<script type="text/javascript">
               alert("[' . $type . '] edit successfully.");
            </script>';
    ?>
<?php } ?>

<?php if (isset($_SESSION['election_delete_successfully'])) { ?>
    <?php
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
    }
    echo '<script type="text/javascript">
               alert("[' . $type . '] delete successfully.");
            </script>';
    ?>
<?php } ?>

    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <?php $search = array("_");
                $replace = array(" ");
                $name2 = str_replace($search, $replace, $name);
                ?>
                <h3><?= $name2 ?></h3>
                <?php if (isset($_SESSION['admin'])) { ?>
                    <div align="right">
                        <a href="election_add.php" class="btn btn-info btn-fill ">Add More</a>
                    </div>
                <?php } ?>
            </div>
            <div class="row contact-info">
                <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                    <?php include('leftSide.php'); ?>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead class="">
                        <th>Sl.</th>
                        <th>Title</th>
                        <th>Published</th>
                        <th>Action</th>
                        </thead>

                        <tbody align="center">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <?php date_default_timezone_set("Asia/Dhaka");
                                $date = date('M d, Y', strtotime($row['date'])); ?>

                                <!-- Item -->
                                <td width="auto"><label class="first"> <?= $row['id'] ?></label></td>
                                <td width="auto"><label class="first"> <?= $row['title'] ?></label></td>
                                <td width="auto"><label class="first"> <?= $date; ?></label></td>

                                <!-- Action -->
                                <td class="text-center" width="auto">
                                    <a class="btn btn-success"
                                       href="election_view.php?id=<?php echo $row['id']; ?>&election=<?php echo $name; ?>">View</a><br>

                                    <?php if (isset($_SESSION['admin'])) { ?>
                                        <br><a class="btn btn-info btn-fill"
                                           href="election_edit.php?id=<?php echo $row['id']; ?>&election=<?php echo $name; ?>">Edit</a><br>

                                       <br> <a class="btn btn-danger btn-fill pull-center"
                                           onclick="return confirm('Are you sure?')"
                                           href="election_delete.php?id=<?php echo $row['id']; ?>&election_type=<?php echo $name; ?>">Delete</a>
                                    <?php } ?>
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