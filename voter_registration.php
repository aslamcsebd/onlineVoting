<?php include('header.php'); ?>
<?php
date_default_timezone_set("Asia/Dhaka");

if (isset($_POST['birthday'])) {

    $dob = date("Y-m-d", strtotime($_POST['dob']));
    $_SESSION['birthday'] = $dob;
    $age = floor((time() - strtotime($dob)) / 31556926);

    if ($age >= 18) {
        $_SESSION['voter_registration'] = true;

    } else {
        echo '<script type="text/javascript">
		         	alert("Sorry! You are ' . $age . ' years old.\n18 years old can create registration");
		      	</script>';
    }
}

if (isset($_POST['save_info'])) {

    $search = array("_", "-", "/");
    $replace = array("", "", "");


    $dob = $_SESSION['birthday'];
    $today = date("Y-m");

    $NID_No = str_replace($search, $replace, $dob . $today . rand(11, 99));

    $secret_code = rand(1000, 9999); //rand_8_char

    $name = $_POST['name'];
    $email = $_POST['email'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $blood_Group = $_POST['blood_Group'];
    $address = $_POST['address'];

    $image = 'profile_picture/voter/' . $_FILES['image']['name'];
    $upload = 'profile_picture/voter/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);

    $status = 0;
    $sql = "insert into voter_info values (null,'$dob', '$NID_No', '$secret_code', '$name', '$email', '$father', '$mother', '$contact', '$gender', '$blood_Group', '$address','$image','$status')";
    $result = mysqli_query($vote, $sql);
    if ($result) {
        $sql2 = "select * from voter_info where NID_No='$NID_No' AND secret_code='$secret_code'";
        $result2 = mysqli_query($vote, $sql2);
        $rowcount = mysqli_num_rows($result2);

        if ($rowcount) {

            // $_SESSION['election_low_add_successfully']=true;

            echo '<script type="text/javascript">
		         	alert("Your NID No: [' . $NID_No . ']\nSecret code: [' . $secret_code . ']");
		      	</script>';

            // Email sending...

            // link https://www.tutorialspoint.com/php/php_sending_emails.htm
            $to = "admin@gmail.com";
            $subject = "This is subject";

            $message = "<b>This is HTML message.</b>";
            $message .= "<h1>This is headline.</h1>";

            $header = "From:admin@gmail.com \r\n";
            $header .= "Cc:admin2@gmail.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail($to, $subject, $message, $header);

            if ($retval == true) {
                echo '<script type="text/javascript">
		         				alert("Message sent successfully...");
		      				</script>';

                // echo "Message sent successfully...";
            } else {

                echo '<script type="text/javascript">
		         				alert("Message could not be sent...");
		      				</script>';

                // echo "Message could not be sent...";
            }
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
            <!-- <h3><?= $name2 ?></h3> -->
        </div>
        <div class="row contact-info">
            <div class="col-md-3 col-sm-2 col-xs-12 col-sm-offset-2">
                <?php include('leftSide.php'); ?>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 col-sm-offset-2">
                <h2>Voter Registration</h2>
                <?php
                if (!isset($_SESSION['voter_registration'])) { ?>
                    <form action="" method="POST">
                        <h2>Enter your Birthday</h2>
                        <p><input class="col-md-3" style="background: none;" type="date" name="dob"
                                  placeholder="mm/dd/yyyy" required></p>
                        <button type="submit" name="birthday" style="padding: 0px 20px; margin-top: 10px;"
                                class="btn btn-info col-md-3">Ok
                        </button>
                    </form>

                <?php }
                if (isset($_SESSION['voter_registration'])) { ?>
                    <button class="open-button" onclick="openForm()">Registration Form</button>
                <?php } ?>
                <div class="form-popup" id="myForm">
                    <form action="" method="post" class="form-container" enctype="multipart/form-data">
                        <label>Your Birthday :
                            &nbsp;</label><?= date('d-M-Y- [l] ', strtotime($_SESSION['birthday'])) . $age . ' years old'; ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="email" class="form-control" placeholder="Email ID">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="father" class="form-control" placeholder="Father Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="mother" class="form-control" placeholder="Mother Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="contact" class="form-control" placeholder="Your Contact">
                            </div>
                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-form-label">Gender</label>
                                <label class="col-md-9 option" style="padding: none;">
                                    <label>
                                        <input type="radio" name="gender" value="Male" autocomplete="off" required> Male
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" value="Female" autocomplete="off" required>
                                        Female
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" value="Other" autocomplete="off" required>Other
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group row col-md-12">
                                <label class="col-md-2 col-form-label">Blood Group</label>
                                <label class="col-md-10 option">
                                    <label>
                                        <input type="radio" name="blood_Group" value="O+" autocomplete="off" required>
                                        O+
                                    </label>

                                    <label>
                                        <input type="radio" name="blood_Group" value="O-" autocomplete="off" required>
                                        O-
                                    </label>

                                    <label>
                                        <input type="radio" name="blood_Group" value="A+" autocomplete="off" required>
                                        A+
                                    </label>

                                    <label>
                                        <input type="radio" name="blood_Group" value="A-" autocomplete="off" required>
                                        A-
                                    </label>

                                    <label>
                                        <input type="radio" name="blood_Group" value="B+" autocomplete="off" required>
                                        B+
                                    </label>

                                    <label>
                                        <input type="radio" name="blood_Group" value="B-" autocomplete="off" required>
                                        B-
                                    </label>

                                    <label>
                                        <input type="radio" name="blood_Group" value="AB+" autocomplete="off" required>
                                        AB+
                                    </label>
                                    <label>
                                        <input type="radio" name="blood_Group" value="AB-" autocomplete="off" required>
                                        AB-
                                    </label>
                                    <label>
                                        <input type="radio" name="blood_Group" value="N/A" autocomplete="off" required>
                                        N/A
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group row col-md-12">
                                <label class="col-md-2">Profile Picture</label>
                                <label class="col-md-4">
                                    <input type="file" name="image"
                                           style="background: #ecf0f1; margin: 0; padding: 0; ">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" rows="4" data-rule="required"
                                      placeholder="address"></textarea>
                            <div class="validation"></div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" name="save_info" class="btn">Save</button>
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


            </div>
        </div>
    </div>
</section>
<?php unset($_SESSION['voter_registration']); ?>
<?php unset($_SESSION['election_delete_successfully']); ?>
<?php include('footer.php'); ?>

<script src="js/https_code.jquery.com_ui_1.12.1_jquery-ui.js"></script>



    
  