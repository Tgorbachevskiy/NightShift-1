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
    <title>Volunteer Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">

    <h3>New Volunteer Added!</h3>

    <?php
    //Connect to the database
    require ('/home/nightshi/connect.php');
    //Print $_POST array, for testing purposes only
    echo "<pre>";
    //var_dump($_POST);
    echo "</pre>";
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
        $tshirt_size = mysqli_real_escape_string($cnxn, trim($_POST['size']));
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

    //Validate interests

    $interest ="";
        if (!empty($_POST['events'])){
            $interest.="events ";
        } if (!empty($_POST['fundraising'])){
            $interest.="fundraising ";
        } if (!empty($_POST['newsletter'])){
                $interest.="newsletter ";
        } if (!empty($_POST['volunteer-coordination'])) {
           $interest.="volunteer-coordination ";
        } if (!empty($_POST['mentoring'])) {
            $interest.="Mentoring ";
        } if (!empty($_POST['other-interests']) && !empty($_POST['other1'])) {
            $interest.=" ".$_POST['other1'];
        }

        if (empty($_POST['events']) &&
            empty($_POST['fundraising']) &&
            empty($_POST['newsletter']) &&
            empty($_POST['volunteer-coordination']) &&
            empty($_POST['mentoring']) &&
            empty($_POST['other-interests']) &&
            empty($_POST['other1']))
        {
            echo '<p>Please choose interests.</p>';
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
    if (empty($_POST['prevExperience']) && empty($_POST['noExperience'])) {
        echo '<p>Please enter previous experience.</p>';
        $isValid = false;
    } else {
        if (empty($_POST['noExperience'])) {
            if (!empty($_POST['prevExperience'])) {
                $prevExperience = mysqli_real_escape_string($cnxn, trim($_POST['prevExperience']));
            }
        } elseif (!empty($_POST['noExperience'])) {
            $prevExperience = "noExperience";
        }
    }

    //Validate volunteer roles
    $rolePref ="";
    if (empty($_POST['noPref']) && empty($_POST['rolePref'])) {
        echo '<p>Please enter Role Preferences.</p>';
        $isValid = false;
    } else {
        if (empty($_POST['noPref'])) {
            if(!empty($_POST['rolePref'])) {
                $rolePref = mysqli_real_escape_string($cnxn, trim($_POST['rolePref']));
            }
        } elseif (!empty($_POST['noPref'])) {
            $rolePref = "noPreference";
        }
    }

//    Validate voluteer availability
    if (!empty($_POST['weekends']) && empty($_POST['summerCamp'])) {
        $volAvailability = mysqli_real_escape_string($cnxn, trim($_POST['Ahours']));
    } elseif (!empty($_POST['weekends']) && !empty($_POST['summerCamp'])) {
        $volAvailability = mysqli_real_escape_string($cnxn, trim($_POST['Ahours']));
        $volAvailability .= ", ";
        $volAvailability .= mysqli_real_escape_string($cnxn, trim("Summer Camp"));
    } else {
        $volAvailability = mysqli_real_escape_string($cnxn, trim("Summer Camp"));
    }

    //Validate reference name
    if(!empty($_POST['refFirstName1']) && !empty($_POST['refLastName1'])) {
        $refFirstName1 = mysqli_real_escape_string($cnxn, trim($_POST['refFirstName1']));
        $refLastName1 = mysqli_real_escape_string($cnxn, trim($_POST['refLastName1']));
    } else {
        echo "<p>Please enter a reference name</p>";
        $isValid = false;
    }

    if(!empty($_POST['refFirstName2']) && !empty($_POST['refLastName2'])) {
        $refFirstName2 = mysqli_real_escape_string($cnxn, trim($_POST['refFirstName2']));
        $refLastName2 = mysqli_real_escape_string($cnxn, trim($_POST['refLastName2']));
    } else {
        echo "<p>Please enter a reference name</p>";
        $isValid = false;
    }

    if(!empty($_POST['refFirstName3']) && !empty($_POST['refLastName3'])) {
        $refFirstName3 = mysqli_real_escape_string($cnxn, trim($_POST['refFirstName3']));
        $refLastName3 = mysqli_real_escape_string($cnxn, trim($_POST['refLastName3']));
    } else {
        echo "<p>Please enter a reference name</p>";
        $isValid = false;
    }
    //Validate reference phone
    if(!empty($_POST['refPhone1'])) {
        $refPhone1 = mysqli_real_escape_string($cnxn, trim($_POST['refPhone1']));
    } else {
        echo "<p>Please enter a reference phone number</p>";
        $isValid = false;
    }

    if(!empty($_POST['refPhone2'])) {
        $refPhone2 = mysqli_real_escape_string($cnxn, trim($_POST['refPhone2']));
    } else {
        echo "<p>Please enter a reference phone number</p>";
        $isValid = false;
    }

    if(!empty($_POST['refPhone3'])) {
        $refPhone3 = mysqli_real_escape_string($cnxn, trim($_POST['refPhone3']));
    } else {
        echo "<p>Please enter a reference phone number</p>";
        $isValid = false;
    }
    //Validate reference email
    if(!empty($_POST['refEmail1']) /*&& !filter_var($_POST['refEmail1'], FILTER_VALIDATE_EMAIL)*/) {
        $refEmail1 = mysqli_real_escape_string($cnxn, trim($_POST['refEmail1']));
    } else {
        echo "<p>Please enter a reference email.</p>";
        $isValid = false;
    }

    if(!empty($_POST['refEmail2']) /*&& !filter_var($_POST['refEmail1'], FILTER_VALIDATE_EMAIL)*/) {
        $refEmail2 = mysqli_real_escape_string($cnxn, trim($_POST['refEmail2']));
    } else {
        echo "<p>Please enter a reference email.</p>";
        $isValid = false;
    }

    if(!empty($_POST['refEmail3']) /*&& !filter_var($_POST['refEmail1'], FILTER_VALIDATE_EMAIL)*/) {
        $refEmail3 = mysqli_real_escape_string($cnxn, trim($_POST['refEmail3']));
    } else {
        echo "<p>Please enter a reference email.</p>";
        $isValid = false;
    }

    //Validate reference relation
    if(!empty($_POST['refRelation1'])) {
        $refRelation1 = mysqli_real_escape_string($cnxn, trim($_POST['refRelation1']));
    } else {
        echo "<p>Please enter a relation.</p>";
        $isValid = false;
    }

    if(!empty($_POST['refRelation2'])) {
        $refRelation2 = mysqli_real_escape_string($cnxn, trim($_POST['refRelation2']));
    } else {
        echo "<p>Please enter a relation.</p>";
        $isValid = false;
    }

    if(!empty($_POST['refRelation3'])) {
        $refRelation3 = mysqli_real_escape_string($cnxn, trim($_POST['refRelation3']));
    } else {
        echo "<p>Please enter a relation.</p>";
        $isValid = false;
    }
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

    $timestamp ="";
    if ($isValid) {
        $timestamp = date('Y-m-d');
        //Define the query for volunteers
        $sql = "INSERT INTO volunteer (volunteer_id, first_name, last_name, email, address, city, state, zip, phone, tshirt_size, email_list, interest,
             hobbies, prevExperience, rolePref, volAvailability, howdidyouhear, backgroundCheck, timeFilled) 
                 VALUES ('','$first', '$last', '$email', '$address', '$city', '$state', '$zip', '$phone', '$tshirt_size', '$email_list', '$interest',
                 '$hobbies', '$prevExperience', '$rolePref', '$volAvailability', '$howdidyouhear', '$backgroundCheck', '$timestamp')";

        //Send the query to the database
        $result = mysqli_query($cnxn, $sql);
        $refVolunteerId = mysqli_insert_id($cnxn);

        //Define the query for volunteer references
        $sqlReferences = "INSERT INTO reference (refFirstName, refLastName, refEmail, refPhone, refRelation, volunteer_id)
                            VALUES ('$refFirstName1', '$refLastName1', '$refEmail1', '$refPhone1', '$refRelation1', '$refVolunteerId'),
                            ('$refFirstName2', '$refLastName2', '$refEmail2', '$refPhone2', '$refRelation2', '$refVolunteerId'),
                            ('$refFirstName3', '$refLastName3', '$refEmail3', '$refPhone3', '$refRelation3', '$refVolunteerId')";

        //send query to the database
        $resultReferences = mysqli_query($cnxn, $sqlReferences);

        //If successful, print summary
        if ($result && $resultReferences) {

            echo "<p><strong>Volunteer Name:</strong> $first $last</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Address:</strong> $address</p>";
            echo "<p><strong>City:</strong> $city</p>";
            echo "<p><strong>State:</strong> $state</p>";
            echo "<p><strong>Zip:</strong> $zip</p>";
            echo "<p><strong>Phone: </strong>$phone</p>";
            echo "<p><strong>T-Shirt Size:</strong> $tshirt_size</p>";
            echo "<p><strong>Would you like to be added to our email list:</strong> $email_list</p>";
            echo "<p><strong>Interests: </strong>$interest</p>";
            echo "<p><strong>Skills/Qualification: </strong>$hobbies</p>";
            echo "<p><strong>Previous Experience:</strong> $prevExperience</p>";
            echo "<p><strong>Preferred Roles: </strong>$rolePref</p>";
            echo "<p><strong>Volunteer Availability:</strong> $volAvailability</p>";
            echo "<p><strong>References: <br></strong>$refFirstName1 $refLastName1 $refEmail1 $refPhone1 $refRelation1<br>
                                $refFirstName2 $refLastName2 $refEmail2 $refPhone2 $refRelation2<br>
                                $refFirstName3 $refLastName3 $refEmail3 $refPhone3 $refRelation3</p>";
            echo "<p><strong>How did you hear about us:</strong> $howdidyouhear</p>";
            echo "<p><strong>Background Consent:</strong> $backgroundCheck</p>";
            echo "<p><strong>Time Submitted:</strong> $timestamp</p>";

        }
    }

    //Sending submitted form by email
    $sendto = "kmaureen44@gmail.com";

    $email_subject = "New Volunteer form submitted";

    $email_body = "Volunteer Sign-up Form Summary;\r\n";
    $email_body .= "Name: $first $last\r\n Email: $email\r\n Address: $address\r\n City: $city\r\n State: $state\r\n Zip: $zip\r\n Phone: $phone\r\n 
    T-Shirt Size: $tshirt_size\r\n Would you like to be added to our email list: $email_list\r\n Interests: $interest\r\n Skills/Qualification: $hobbies\r\n
    Previous Experience: $prevExperience\r\n Preferred Roles: $rolePref\r\n Volunteer Availability: $volAvailability\r\n How did you hear about us: $howdidyouhear\r\n 
    Background Consent: $backgroundCheck\r\n Time Filled: $timestamp\r\n Status: pending\r\n Reference Information: $refFirstName1 $refLastName1 $refEmail1 $refPhone1 $refRelation1\r\n
    $refFirstName2 $refLastName2 $refEmail2 $refPhone2 $refRelation2\r\n$refFirstName3 $refLastName3 $refEmail3 $refPhone3 $refRelation3\r\n";

    $headers = "From: $sendto\r\n";
    $headers .= "Reply-To: $sendto \r\n";
    $success = mail($sendto, $email_subject, $email_body, $headers);


    //Print final confirmation
    $msg = $success ? "Your sign-up form has been successfully submitted." : "We're sorry. There was a problem with your volunteer form submission.";
    ?>

    <a href="volunteer-summary.php">View volunteer summary</a>

</div>

</body>
</html>