<?php

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email1 = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $tShirt = $_POST['size'];
    $mailingList = $_POST['email-list'];
    $interests = $_POST['interests'];
    $hobbies = $_POST['hobbies'];
    $prevExperience = $_POST['prevExperience'];
    $rolePref = $_POST['rolePref'];
    $volAvailability = $_POST['volAvailability'];
    $refFirstName1 = $_POST['refFirstName1'];
    $refLastName1 = $_POST['refLastName1'];
    $refPhone1 = $_POST['refPhone1'];
    $refEmail1 = $_POST['refEmail1'];
    $refRelation1 = $_POST['refRelation1'];
    $refFirstName2 = $_POST['refFirstName2'];
    $refLastName2 = $_POST['refLastName2'];
    $refPhone2 = $_POST['refPhone2'];
    $refEmail2 = $_POST['refEmail2'];
    $refRelation2 = $_POST['refRelation2'];
    $refFirstName3 = $_POST['refFirstName3'];
    $refLastName3 = $_POST['refLastName3'];
    $refPhone3 = $_POST['refPhone3'];
    $refEmail3 = $_POST['refEmail3'];
    $refRelation3 = $_POST['refRelation3'];
    $howdidyouhear = $_POST['howdidyouhear'];
    $backgroundCheck = $_POST['yes'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iD.A.Y.dream</title>
</head>
<body>

    <h2>Thank you for Volunteering. We appreciate you.</h2>

    <?php
    //Sending submitted form by email
    $email = "kmaureen44@gmail.com";

    $email_subject = "New Volunteer form submitted";
    $to = $email;
    $email_body = "Volunteer Form Summary;\r\n";
    $email_body .= "Name: $first $last\r\n Email: $email1\r\n Address: $address\r\n City: $city\r\n State: $state\r\n Zip: $zip\r\n Phone: $phone\r\n T-Shirt Size: $size\r\n
    Would you like to be added to our mailing list? : $mailingList\r\n
    Interests: $interests\r\n Interests: $interests\r\n Previous Volunteer Experience: $prevExperience\r\n
    Volunteer Roles: $rolePref\r\n Volunteer Availability: $volAvailability\r\n
    First Reference Name: $refFirstName1 $refLastName1\r\n First Reference Phone: $refPhone1\r\n First Reference Email: $refEmail1\r\n First Reference Relation: $refRelation1\r\n
    Second Reference Name: $refFirstName2 $refLastName2\r\n Second Reference Phone: $refPhone2\r\n Second Reference Email: $refEmail2\r\n Second Reference Relation: $refRelation2\r\n
    Third Reference Name: $refFirstName3 $refLastName3\r\n Third Reference Phone: $refPhone3\r\n Third Reference Email: $refEmail3\r\n Third Reference Relation: $refRelation3\r\n
    How you heard about us: $howdidyouhear\r\n Consent to background check: $backgroundYes\r\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email \r\n";
    $success = mail($to, $email_subject, $email_body, $headers);


    //Print final confirmation
    $msg = $success ? "Your volunteer form has been successfully submitted." : "We're sorry. There was a problem with your volunteer form submission.";
    echo "<p>$msg</p>";
    ?>
</body>
</html>
