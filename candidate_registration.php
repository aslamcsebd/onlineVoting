<?php include('header.php'); ?>
<?php
date_default_timezone_set("Asia/Dhaka");

if (isset($_POST['birthday'])) {

    $dob = date("Y-m-d", strtotime($_POST['dob']));
    $_SESSION['birthday'] = $dob;
    $age = floor((time() - strtotime($dob)) / 31556926);

    if ($age >= 25) {
        $_SESSION['voter_registration'] = true;
    } else {
        echo '<script type="text/javascript">
		         	alert("Sorry! You are ' . $age . ' years old.\n25 years old can create candidate registration");
		      	</script>';
    }
}

if (isset($_POST['confirm_voter'])) {

    $NID_No = $_POST['NID_No'];
    $secret_code = $_POST['secret_code'];

    $_SESSION['id'] = $NID_No;
    $_SESSION['code'] = $secret_code;

    $sql = "select * from voter_info where NID_No='$NID_No' AND secret_code='$secret_code' ";
    $result = mysqli_query($vote, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['candidate_registration'] = true;
        $_SESSION['birthday2'] = $row['dob'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['photo'] = $row['photo'];

    } else {
        echo '<script type="text/javascript">
		         	alert("Sorry! You don\'t have voter ID. Please complete voter registration form");
		      	</script>';
        echo "<script>window.location.href='voter_registration.php'</script>";

    }
}

if (isset($_POST['send_request'])) {

    $election_date = $_POST['election_date'];
    $NID_No = $_SESSION['id'];
    $name = $_SESSION['name'];
    $photo = $_SESSION['photo'];
    $election_type = $_POST['election_type'];
    $party_name = $_POST['party_name'];
    $status=0;

    $sql = "insert into candidate_request values (null, '$election_date', '$NID_No','$name','$photo', '$election_type', '$party_name','$status')";
    $result = mysqli_query($vote, $sql);
    if ($result) {
        $sql2 = "select * from candidate_request where NID_No='$NID_No' AND party_name='$party_name'";
        $result2 = mysqli_query($vote, $sql2);
        $rowcount = mysqli_num_rows($result2);

        if ($rowcount) {
            // $_SESSION['candidate_registration_successfully']=true;

            echo '<script type="text/javascript">
		         	alert("[' . $NID_No . '] election registration successfully.");
		      	</script>';
            echo "<script>window.location.href='candidate_registration.php'</script>";
        }
    }
}
?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        /*position: fixed;*/
        /*  bottom: 23px;
          right: 28px;
          width: 280px;*/
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        /*position: fixed;
         bottom: 0;
         right: 15px;
         border: 3px solid #f1f1f1;
         z-index: 9;*/
    }

    .form-popup .option {
        padding: 5px 8px;
    }

    .option, input {
        background: gray;
    }

    .option label {
        margin: 0px 5px;
        padding: 0px 5px;
        background: pink;
    }

    /* Add styles to the form container */
    .form-container {
        width: auto;
        padding: 10px;
        background-color: white;
    }


    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 5px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
        opacity: 1;
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


                <?php if (!isset($_SESSION['candidate_registration'])) { ?>
                    <?php
                    if (!isset($_SESSION['voter_registration'])) { ?>
                        <form action="" method="POST">
                            <h2>Enter your Birthday</h2>
                            <p><input class="col-md-2" style="background: none;" type="text" id="datepicker" name="dob"
                                      placeholder="mm/dd/yyyy" required></p>
                            <button type="submit" name="birthday" style="padding: 0px 20px; margin-top: 10px;"
                                    class="btn btn-info col-md-2">Ok
                            </button>
                        </form>
                    <?php }
                    if (isset($_SESSION['voter_registration'])) { ?>

                        <form action="" method="POST" align="center">
                            <h2>Enter your information</h2>
                            <div>
                                <label class="col-md-2" style="text-align: left;">NID No:</label>
                                <input class="col-md-3" style="background: #ecf0f1" type="text" name="NID_No"
                                       class="form-control">
                            </div>
                            <div>
                                <label class="col-md-2" style="text-align: left;">Secret Code: </label>
                                <input class="col-md-3" type="text" style="background: #ecf0f1" name="secret_code"
                                       class="form-control">
                            </div>
                            <div>
                                <label class="md-offset-2 col-md-3" style="text-align: left;"></label>
                                <button type="submit" name="confirm_voter" style="padding: 2px 0px; margin-top: 8px;"
                                        class="btn btn-info col-md-offset-4 col-md-2">Ok
                                </button>
                            </div>
                        </form>
                    <?php } ?>
                <?php } ?>

                <?php if (isset($_SESSION['candidate_registration'])) { ?>
                    <button class="open-button" name="form" onclick="openForm()">Registration Form</button>
                <?php } ?>

                <?php if (isset($_SESSION['candidate_registration'])) {
                    $sql = "select * from voter_info where NID_No='$_SESSION[id]' AND secret_code='$_SESSION[code]'";
                    $result = mysqli_query($vote, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>

                    <div class="form-popup" id="myForm">
                        <form action="" method="post" class="form-container" enctype="multipart/form-data">
                            <div class="col ">
                                <div>
                                    <img src="<?= $row['photo']; ?>" class="img-fluid" width="160"
                                         alt="Image Not Found, upload please."
                                         style="border: 2px solid blue; border-radius:50%;">
                                </div>

                                <h4><?php echo $row['name']; ?></h4>
                                <h5><?= floor((time() - strtotime($_SESSION['birthday2'])) / 31556926) . ' years old'; ?></h5>
                            </div>

                            <style type="text/css">
                                select option {
                                    background: #1abc9c;
                                }
                            </style>

                            <div class="form-row justify-content-md-center">
                                <div class="form-group  col-md-5  form-control">
                                    <div class="form-row">
                                        <label class="col-md">Election Date :</label>
                                        <label class="col-md">
                                            <select name='election_date'  required>
                                                <option value="">Select Election Date</option>
                                                <?php
                                                $get_date = "select * from online_election ";
                                                $my_result = mysqli_query($vote, $get_date);
                                                //$data = mysqli_fetch_assoc($my_result);
                                                //$date = date('d-M-Y', strtotime($row2['election_date']));

                                                while ($row4 = mysqli_fetch_assoc($my_result)) { ?>

                                                <option value="<?= $row4['date'] ?>"><?= $row4['date'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 orm-control">
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">Election Type :</label>
                                        <label class="col-md">
                                            <select name='election_type' required required>
                                                <option value="">Select type</option>
                                                <?php
                                                $sql = "select * from elections";
                                                $result = mysqli_query($vote, $sql);
                                                $search = array("_");
                                                $replace = array(" ");

                                                while ($row4 = mysqli_fetch_assoc($result)) { ?>
                                                    <?php $name = $row4['name'];
                                                    $name2 = str_replace($search, $replace, $name); ?>
                                                    <option value="<?= $row4['name'] ?>"><?= $name2 ?></option>
                                                <?php } ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group offset-md-1 col-md-5 form-control">    <!-- offset-md-2 -->
                                    <div class="form-row">
                                        <label class="col-md-2" style="text-align: left;">Party</label>
                                        <label class="col-md-8" style="text-align: right;">
                                            <select name='party_name' required required>
                                                <option value="">Select Party Name</option>
                                                <?php
                                                $sql = "select * from political_parties";
                                                $result = mysqli_query($vote, $sql);
                                                $search = array("_");
                                                $replace = array(" ");

                                                while ($row4 = mysqli_fetch_assoc($result)) { ?>
                                                    <?php $name = $row4['party_name'];
                                                    $name2 = str_replace($search, $replace, $name); ?>
                                                    <option value="<?= $row4['party_name'] ?>"><?= $name2 ?></option>
                                                <?php } ?>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">NID No :</label>
                                        <label class="col-md"><?= $row['NID_No']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group offset-md-1 col-md-5 form-control">    <!-- offset-md-2 -->
                                    <div class="form-row">
                                        <label class="col-md">Birthday :</label>
                                        <label class="col-md"><?= $row['dob']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">Father Name :</label>
                                        <label class="col-md"><?= $row['father']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group offset-md-1 col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">Mother Name :</label>
                                        <label class="col-md"><?= $row['mother']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">Email :</label>
                                        <label class="col-md"><?= $row['email']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group offset-md-1 col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">Contact :</label>
                                        <label class="col-md"><?= $row['contact']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md">Gender :</label>
                                        <label class="col-md"><?= $row['gender']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group offset-md-1 col-md-5 form-control">
                                    <div class="form-row">
                                        <label class="col-md-4">Blood Group :</label>
                                        <label class="col-md-8"><?= $row['blood_Group']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-11 orm-control" style="padding: auto;">
                                    <div class="form-row"
                                         style="color: #495057; background-clip: padding-box; border: 1px solid #ced4da;">
                                        <label class="col-md-2">Address :</label>
                                        <label class="col-md-10" rows="10"
                                               style="text-align: justify;"><?= $row['address']; ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row justify-content-md-center">
                                <div class="form-group col-md-5">
                                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                </div>
                                <div class="form-group offset-md-1 col-md-5">
                                    <button type="submit" name="send_request" class="btn">Send Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }

                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                    </script>

                <?php } ?>


            </div>
        </div>
    </div>
</section>
<?php unset($_SESSION['birthday2']); ?>
<?php unset($_SESSION['voter_registration']); ?>
<?php unset($_SESSION['candidate_registration']); ?>
<?php include('footer.php'); ?>
<script src="js/https_code.jquery.com_ui_1.12.1_jquery-ui.js"></script>



    
  