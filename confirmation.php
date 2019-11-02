<?php

    $first = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email1 = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $phone = $_POST["phone"];
    $tShirt = $_POST["size"];
    $mailingList = $_POST["email-list"];
    $interests = $_POST["interests"];
    $hobbies = $_POST["hobbies"];
    $prevExperience = $_POST["prevExperience"];
    $rolePref = $_POST["rolePref"];
    $volAvailability = $_POST["volAvailability"];
    $refFirstName1 = $_POST["refFirstName1"];
    $refLastName1 = $_POST["refLastName1"];
    $refPhone1 = $_POST["refPhone1"];
    $refEmail1 = $_POST["refEmail1"];
    $refRelation1 = $_POST["refRelation1"];
    $refFirstName2 = $_POST["refFirstName2"];
    $refLastName2 = $_POST["refLastName2"];
    $refPhone2 = $_POST["refPhone2"];
    $refEmail2 = $_POST["refEmail2"];
    $refRelation2 = $_POST["refRelation2"];
    $refFirstName3 = $_POST["refFirstName3"];
    $refLastName3 = $_POST["refLastName3"];
    $refPhone3 = $_POST["refPhone3"];
    $refEmail3 = $_POST["refEmail3"];
    $refRelation3 = $_POST["refRelation3"];
    $howdidyouhear = $_POST["howdidyouhear"];
    $backgroundYes = $_POST["yes"];
    $backgroundNo = $_POST[ "no"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- favicon -->`
    <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest_title">

    <title>iD.A.Y.Dream</title>
</head>
<body>

    <h2>Thank you for Volunteering. We appreciate you.</h2>

    <?php
    //Sending submitted form by email
    $email = "kmaureen44@gmail.com";

    $email_subject = "New Volunteer form submitted";
    $to = $email;
    $email_body = "Volunteer Form Summary;\r\n";
    $email_body .= "Name: $first $last\r\n Email: $email1\r\n Address: $address\r\n City: $city\r\n State: $state\r\n Zip: $zip\r\n Phone: $phone\r\n T-Shirt Size: $tShirt\r\nWould you like to be added to our mailing list? : $mailingList\r\n Interests: $interests\r\n Special Skills/Qualifications: $hobbies\r\n Previous Volunteer Experience: $prevExperience\r\n Volunteer Roles: $rolePref\r\n Volunteer Availability: $volAvailability\r\n First Reference Name: $refFirstName1 $refLastName1\r\n First Reference Phone: $refPhone1\r\n First Reference Email: $refEmail1\r\n First Reference Relation: $refRelation1\r\n Second Reference Name: $refFirstName2 $refLastName2\r\n Second Reference Phone: $refPhone2\r\n Second Reference Email: $refEmail2\r\n Second Reference Relation: $refRelation2\r\n Third Reference Name: $refFirstName3 $refLastName3\r\n Third Reference Phone: $refPhone3\r\n Third Reference Email: $refEmail3\r\n Third Reference Relation: $refRelation3\r\n How you heard about us: $howdidyouhear\r\n Consent to background check: $backgroundYes\r\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email \r\n";
    $success = mail($to, $email_subject, $email_body, $headers);

    //Print final confirmation
    $msg = $success ? "Your volunteer form has been successfully submitted." : "We're sorry. There was a problem with your volunteer form submission.";
    echo "<p>$msg</p>";

    echo "<p>Name: $first $last</p>";
    echo "<p>Email: $email1</p>";
    echo "<p>Address: $address</p>";
    echo "<p>City: $city</p>";
    echo "<p>State: $state</p>";
    echo "<p>Zip: $zip</p>";
    echo "<p>Phone: $phone</p>";
    echo "<p>T-Shirt size: $tShirt</p>";
    echo "<p>Would you like to be added to our mailing list: $mailingList</p>";
    if (isset($interests)){
        echo $interests; // Displays value of checked checkbox.
    }
    echo "<p>Interests: $interests</p>";
    echo "<p>Special Skills/Qualifications: $hobbies</p>";
    echo "<p>Previous Volunteer Experience: $prevExperience</p>";
    echo "<p>Volunteer Roles: $rolePref</p>";
    echo "<p>Volunteer Availabilities: $volAvailability</p>";
    echo "<p>Reference Name: $refFirstName1 $refLastName1</p>";;
    echo "<p>Reference Phone: $refPhone1</p>";
    echo "<p>Reference Email: $refEmail1</p>";
    echo "<p>Reference Relation: $refRelation1</p>";
    echo "<p>Reference Name: $refFirstName2 $refLastName2</p>";
    echo "<p>Reference Phone: $refPhone2</p>";
    echo "<p>Reference Email: $refEmail2</p>";
    echo "<p>Reference Relation: $refRelation2</p>";
    echo "<p>Reference Name: $refFirstName3 $refLastName3</p>";
    echo "<p>Reference Phone: $refPhone3</p>";
    echo "<p>Reference Email: $refEmail3</P>";
    echo "<p>Reference Relation: $refRelation3</P>";
    echo "<p>How did you hear about us?: $howdidyouhear</P>";
    echo "<p>Consent to a background check: $backgroundYes</P>";

    ?>
</body>
</html>
