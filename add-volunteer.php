<?php
/** NightShift-1/dreamers.php reads dreamers from a database
 *  into a data table
 *  Nov 4, 2019
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dreamer Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">

    <h3>New Dreamer Added!</h3>

    <?php

    //Connect to the database
    require ('/home/nightshi/connect.php');

    //Print $_POST array, for testing purposes only
    /*echo "<pre>";
    var_dump($_POST);
    echo "</pre>";*/

    //Form has been submitted
    /*if (!empty($_POST)) {*/
    $isValid = true;



    //Validate first name
    if (!empty($_POST['first_name'])) {
        $first = mysqli_real_escape_string($cnxn, trim($_POST['first_name']));
    } else {
        echo '<p>Please enter first name.</p>';
        $isValid = false;
    }

    //Validating last name
    if (!empty($_POST['last_name'])) {
        $last = mysqli_real_escape_string($cnxn, trim($_POST['last_name']));
    } else {
        echo '<p>Please enter last name.</p>';
        $isValid = false;
    }

    //Validate email
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($cnxn, trim($_POST['email']));
    } else {
        echo '<p>Please enter an email.</p>';
        $isValid = false;
    }

    //Validate address
    if (!empty($_POST['address'])) {
        $address = mysqli_real_escape_string($cnxn, trim($_POST['address']));
    } else {
        echo '<p>Please enter an address.</p>';
        $isValid = false;
    }

    //Validate city
    if (!empty($_POST['city'])) {
        $city = mysqli_real_escape_string($cnxn, trim($_POST['city']));
    } else {
        echo '<p>Please enter a city.</p>';
        $isValid = false;
    }

    //Validate state
    if (!empty($_POST['state'])) {
        $state = mysqli_real_escape_string($cnxn, trim($_POST['state']));
    } else {
        echo '<p>Please enter a state.</p>';
        $isValid = false;
    }

    //Validate zip
    if (!empty($_POST['zip'])) {
        $zip = mysqli_real_escape_string($cnxn, trim($_POST['zip']));
    } else {
        echo '<p>Please enter a zip code.</p>';
        $isValid = false;
    }

    //Validate phone
    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($cnxn, trim($_POST['phone']));
    } else {
        echo '<p>Please enter a phone number.</p>';
        $isValid = false;
    }

    //Validate T-Shirt size
    if (!empty($_POST['size'])) {
        $size = mysqli_real_escape_string($cnxn, trim($_POST['size']));
    } else {
        echo '<p>Please enter a t-shirt size.</p>';
        $isValid = false;
    }

    //Validate if to be added to emailing list
    if (!empty($_POST['email-list'])) {
        $email_list = mysqli_real_escape_string($cnxn, trim($_POST['email-list']));
    }else {
        echo '<p>Please choose a mailing list option.</p>';
        $isValid = false;
    }


    //Validate special skills/qualifications
    if (!empty($_POST['hobbies'])) {
        $hobbies = mysqli_real_escape_string($cnxn, trim($_POST['hobbies']));
    } else {
        echo '<p>Please summarize your special skills and qualifications.</p>';
        $isValid = false;
    }

    //Validate previous experience
    if (!empty($_POST['prevExperience'])) {
        $prevExperience = mysqli_real_escape_string($cnxn, trim($_POST['prevExperience']));
    } else {
        echo '<p>Please enter previous experience.</p>';
        $isValid = false;
    }

    //Validate volunteer roles
    if (!empty($_POST['rolePref'])) {
        $rolePref = mysqli_real_escape_string($cnxn, trim($_POST['rolePref']));
    } else {
        echo '<p>Please enter roles that interest you.</p>';
        $isValid = false;
    }

    //Validate voluteer availability
    /*if (!empty($_POST['volAvailability'])) {
        $volAvailability = mysqli_real_escape_string($cnxn, trim($_POST['volAvailability']));
    } else {
        echo '<p>Please enter your availability options.</p>';
        $isValid = false;
    }*/

    //Validate reference name

    //Validate reference phone

    //Validate reference email

    //Validate reference relation

    //Validate how did you hear about us
    if (!empty($_POST['howdidyouhear'])) {
        $howdidyouhear = mysqli_real_escape_string($cnxn, trim($_POST['howdidyouhear']));
    } else {
        echo '<p>Please select how you heard about us.</p>';
        $isValid = false;
    }

    //Validate background choice
    if (!empty($_POST['backgroundCheck'])) {
        $backgroundCheck = mysqli_real_escape_string($cnxn, trim($_POST['backgroundCheck']));
    } else {
        echo '<p>Please choose a background consent.</p>';
        $isValid = false;
    }

    if ($isValid) {

        //Define the query
        $sql = "INSERT INTO volunteer (first_name, last_name, email, address, city, state, zip, phone, size, email_list, hobbies, prevExperience, rolePref, howdidyouhear, consent)
                 VALUES ('$first', '$last', '$email', '$address', '$city', '$state', '$zip', '$phone', '$size', '$email_list', '$hobbies', '$prevExperience', '$rolePref', '$howdidyouhear', '$backgroundCheck')";


        //Print SQL statement, for testing purposes only
        //copy/paste into phpMyAdmin to test
        echo $sql;

        //Send the query to the database
        $result = mysqli_query($cnxn, $sql);

        //If successful, print summary
        if ($result) {
            echo "<p>Volunteer Name: $first $last</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Address: $address</p>";
            echo "<p>City: $city</p>";
            echo "<p>State: $state</p>";
            echo "<p>Zip: $zip</p>";
            echo "<p>Phone: $phone</p>";
            echo "<p>T-Shirt Size: $size</p>";
            echo "<p>Would you like to be added to our email list: $email_list</p>";
            echo "<p>Interest: $interests</p>";
            echo "<p>Skills/Qualification: $hobbies</p>";
            echo "<p>Previous Experience: $prevExperience</p>";
            echo "<p>Volunteer Roles: $rolePref</p>";
            echo "<p>Volunteer Availability: $volAvailability</p>";
            echo "<p>How did you hear about us: $howdidyouhear</p>";
            echo "<p>Background Consent: $backgroundCheck</p>";

        }
    }

?>

    <a href="volunteer-summary.php">View volunteer summary</a>

    </div>

</body>
</html>