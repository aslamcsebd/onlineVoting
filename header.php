<?php session_start();
include('connection.php');
$vote = vote();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Online Voting</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- <meta http-equiv="refresh" content="5"/> -->

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- note: calender left right icon not show if it is on online   -->

    <!-- Datatable -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: BizPage
      Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body>
<header id="header">
    <div class="container-fluid">
        <div id="logo" class="pull-left">
            <img src="img/logo.png" height="55px">
        </div>
        <h4 style="margin-left: 160px;"><span>Election Commission & online voting service</span></h4>


        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="index.php">Home</a></li>

<!--                --><?php
//                if (isset($_SESSION['admin'])) { ?>
<!--                    <li><a href="">Add Election</a>-->
<!--                        <ul>-->
<!--                            <li><a href="election_set.php">Add Election</a></li>-->
<!--                            <li><a href="voter_request.php">Voter Request</a></li>-->
<!--                            <li><a href="candidate_request.php">Candidate Request</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                --><?php //} ?>

                <li class="menu-has-children"><a href="#">Elections</a>
                    <ul>
                        <?php
                        $sql = "select * from elections";
                        $result = mysqli_query($vote, $sql);
                        $search = array("_");
                        $replace = array(" ");

                        while ($type = mysqli_fetch_assoc($result)) { ?>
                            <?php $name = $type['name'];
                            $name2 = str_replace($search, $replace, $name); ?>
                            <li><a href="election.php?election=<?php echo $type['name']; ?>"><?= $name2; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>


                <li class="menu-has-children"><a href="#">Registration</a>
                    <ul>
                        <li><a href="voter_registration.php">Voter Registration</a></li>
                        <li><a href="candidate_registration.php">Candidate Registration</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="#">Political Parties</a>
                    <ul>
                        <li><a href="political_parties.php">Registered Parties</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="#">Elections Laws</a>
                    <ul>
                        <?php
                        $sql = "select * from elections_low";
                        $result = mysqli_query($vote, $sql);
                        $search = array("_", "low");
                        $replace = array(" ", "");

                        while ($type = mysqli_fetch_assoc($result)) { ?>
                            <?php $name = $type['name'];
                            $name2 = str_replace($search, $replace, $name); ?>
                            <li><a href="election_low.php?election=<?php echo $type['name']; ?>"><?= $name2; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>


<!--                <li class="menu-has-children"><a href="#">Voting</a>-->
<!--                    <ul>-->
<!--                        <li><a href="vote_now.php">Online Voting</a></li>-->
<!--                        <li><a href="#">Booth Boting</a></li>-->
<!--                    </ul>-->
<!--                </li>-->


                <li><a href="vote_now.php">Online Vote</a></li>


                <li class="menu-has-children"><a href="#">Result</a>
                    <ul>
                        <li><a href="election_winner.php">Election Winner</a></li>
                        <li><a href="election_result.php">Elction Result</a></li>
                    </ul>
                </li>

                <?php
                if (isset($_SESSION['admin'])) { ?>
                    <li><a href="#">Admin Menu</a>
                        <ul>
                            <li><a href="voter_request.php">Voter Request</a></li>
                            <li><a href="candidate_request.php">Candidate Request</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php
                if (isset($_SESSION['subadmin'])) { ?>
                    <li><a href="#">Sub Admin Menu</a>
                        <ul>
                            <li><a href="add_online_election.php">Add Online Election</a></li>
                            <li><a href="add_candidate_election.php">Add Candidate to Election</a></li>
                            <li><a href="all_online_election.php">All Online Election</a></li>
                            <li><a href="add_election_winner.php">Add Winner</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php
                if (isset($_SESSION['admin']) || isset($_SESSION['subadmin'])) { ?>
                    <li></li>
                <?php }else{ ?>
                    <li><a href="admin.php">Login</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>