<?php

/** NightShift-1/dreamers.php reads dreamers from a database
 *  into a data table
 *  Nov 4, 2019
 */
//Turn on error reporting -- this is critical!
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dreamer Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container">

        <h3>Thank you for signing up!</h3>
        <h5>Double-check and make sure everything is correct.</h5>
        <br>

        <?php

        //Connect to the database
        require('/home/nightshi/connect.php');

        //Print $_POST array, for testing purposes only
        /*echo "<pre>";
    var_dump($_POST);
    echo "</pre>";*/

        //Form has been submitted
        /*if (!empty($_POST)) {*/
        $isValid = true;

        //Validate dreamerId
        /*if (!empty($_POST['dreamer_id'])) {
        $dreamerId = $_POST['dreamer_id'];
    }*/

        //Validate first name
        if (!empty($_POST['youth_first_name'])) {
            $first = mysqli_real_escape_string($cnxn, trim($_POST['youth_first_name']));
        } else {
            echo '<p>Please enter first name.</p>';
            $isValid = false;
        }

        //Validating last name
        if (!empty($_POST['youth_last_name'])) {
            $last = mysqli_real_escape_string($cnxn, trim($_POST['youth_last_name']));
        } else {
            echo '<p>Please enter last name.</p>';
            $isValid = false;
        }

        //Validating email
        if (!empty($_POST['youth_email'])) {
            $email = mysqli_real_escape_string($cnxn, trim($_POST['youth_email']));
        } else {
            echo '<p>Please enter an email.</p>';
            $isValid = false;
        }

        //Validating phone
        if (!empty($_POST['youth_phone'])) {
            $phone = mysqli_real_escape_string($cnxn, trim($_POST['youth_phone']));
        } else {
            echo '<p>Please enter a phone.</p>';
            $isValid = false;
        }

        //Validating graduation year
        if (!empty($_POST['graduation-year'])) {
            $graduationYear = mysqli_real_escape_string($cnxn, trim($_POST['graduation-year']));
        } else {
            echo '<p>Please enter a graduation year.</p>';
            $isValid = false;
        }

        //Validating college
        if (!empty($_POST['college'])) {
            $college = mysqli_real_escape_string($cnxn, trim($_POST['college']));
        } else {
            echo '<p>Please enter college of interest.</p>';
            $isValid = false;
        }

        //Validating career
        if (!empty($_POST['career'])) {
            $career = mysqli_real_escape_string($cnxn, trim($_POST['career']));
        } else {
            echo '<p>Please enter aspiring career.</p>';
            $isValid = false;
        }

        //Validating snacks
        if (!empty($_POST['snacks'])) {
            $snacks = mysqli_real_escape_string($cnxn, trim($_POST['snacks']));
        } else {
            echo '<p>Please enter a snack you like.</p>';
            $isValid = false;
        }

        //Validating birthday
        if (!empty($_POST['birthday'])) {
            $birthday = mysqli_real_escape_string($cnxn, trim($_POST['birthday']));
        } else {
            echo '<p>Please choose a birthday date.</p>';
            $isValid = false;
        }

        //Validating gender
        if (!empty($_POST['gender'])) {
            $gender = mysqli_real_escape_string($cnxn, trim($_POST['gender']));
        } else {
            echo '<p>Please choose a gender.</p>';
            $isValid = false;
        }

        
        //Validating ethnicity
        if ($_POST['ethnicity'] != "other") {
            $ethnicity = mysqli_real_escape_string($cnxn, trim($_POST['ethnicity']));
        } elseif (!empty($_POST['ethnicity-other']) && $_POST['ethnicity'] == "other") {
            $ethnicity = mysqli_real_escape_string($cnxn, trim($_POST['ethnicity-other']));
        } else {
            echo '<p>Please choose an ethnicity.</p>';
            $isValid = false;
        }

        if ($isValid) {

            //Define the query
            $sql = "INSERT INTO dreamers (youth_first_name, youth_last_name, youth_email, youth_phone, graduation_year, college, career, snacks, birthday, gender, ethnicity, timeFilled)
                VALUES ('$first', '$last', '$email', '$phone', '$graduationYear', '$college', '$career', '$snacks', '$birthday', '$gender', '$ethnicity', NOW())";

            //Print SQL statement, for testing purposes only
            //copy/paste into phpMyAdmin to test
            //echo $sql;

            //Send the query to the database
            $result = mysqli_query($cnxn, $sql);

            //If successful, print summary
            if ($result) {
                echo "<p>Dreamer Name: $first $last</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Phone: $phone</p>";
                echo "<p>Graduation Year: $graduationYear</p>";
                echo "<p>College: $college</p>";
                echo "<p>Career: $career</p>";
                echo "<p>Snacks: $snacks</p>";
                echo "<p>Birthday: $birthday</p>";
                echo "<p>Gender: $gender</p>";
                echo "<p>Ethnicity: $ethnicity</p>";
            }
        }



        //Sending submitted form by email
        $sendto = "kmaureen44@gmail.com";

        $email_subject = "New Volunteer form submitted";

        $email_body = "Dreamer Sign-up Form Summary;\r\n";
        $email_body .= "Name: $first $last\r\n Email: $email\r\n Phone: $phone\r\n ";
        $headers = "From: $sendto\r\n";
        $headers .= "Reply-To: $sendto \r\n";
        $success = mail($sendto, $email_subject, $email_body, $headers);


        //Print final confirmation
        $msg = $success ? "Your sign-up form has been successfully submitted." : "We're sorry. There was a problem with your volunteer form submission.";
        ?>

        <a href="dreamer-summary.php">View dreamer summary</a>

    </div>

</body>

</html>