<?php
///* This is a VOLUNTEER-summary.php reads dreamers from a database
//     * into data table
//     * Nov 04, 2019
//     */
//
//Turn on error reporting -- this is critical
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();
//If user is not logged in, reroute them to the login page
if(!isset($_SESSION['username'])) {
    header('location: volunteerLogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./styles/databaseStyles.css">
</head>
<body>
<div class="container">
    <h3>Volunteer Summary</h3>
    <?php

    require('/home/nightshi/connect.php');

    $sql = 'SELECT v.volunteer_id, v.first_name, v.last_name, v.email, v.address, v.city, v.state, v.zip, v.phone, v.tshirt_size, v.email_list, v.hobbies, v.interest,
            v.prevExperience, v.rolePref, v.howdidyouhear, v.backgroundCheck, v.volAvailability, v.timeFilled, v.activity             
            FROM  volunteer v     
            ORDER BY timeFilled DESC';

    //send the query to the database
    $result = mysqli_query($cnxn, $sql);

    //Initialize sql query for references
    $sqlReferenceQuery = "SELECT reference_id, refFirstName, refLastName, refEmail, refPhone, refRelation, volunteer_id
                    FROM reference
                    WHERE volunteer_id = ?
                    ORDER BY reference_id";
    //prepare query for reference table
    $refSQLstmt = mysqli_prepare($cnxn, $sqlReferenceQuery);


    $sqlVolunteer = "SELECT volunteer_id FROM volunteer ORDER BY timeFilled";

    $resultVolunteer = mysqli_query($cnxn, $sqlVolunteer);


    $actArray = array("pending" => "pending", "active" => "active", "in-active" => "in-active",
        "failed background" => "failed background");


    ?>
    <table id="volunteer-table" class="display">
        <thead>
        <tr>
            <th>Volunteer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Status</th>
            <th>Phone</th>
            <th>Size</th>
            <th>Email_list</th>
            <th>Interests</th>
            <th>Special skills and qualifications</th>
            <th>Previous volunteer work</th>
            <th>Detailed volunteer roles</th>
            <th>Volunteer availability</th>
            <th>How did you hear about us</th>
            <th>Background Check</th>
            <th>TimeFilled</th>
            <th>References</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $volunteer_id = $row['volunteer_id'];
            $first = $row['first_name'];
            $last = $row['last_name'];
            $email = $row['email'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $activity = $row['activity'];
            $phone = $row['phone'];
            $tshirt_size = $row['tshirt_size'];
            $email_list = $row['email_list'];
            $interest = $row['interest'];
            $hobbies = $row['hobbies'];
            $prevExperience = $row['prevExperience'];
            $rolePref = $row['rolePref'];
            $volAvailability = $row['volAvailability'];
            $howdidyouhear = $row['howdidyouhear'];
            $backgroundCheck = $row['backgroundCheck'];
            $timestamp = date('m-d-Y', strtotime($row['timeFilled']));


            mysqli_stmt_bind_param($refSQLstmt, 's', $volunteer_id);
            //Send the query to the database
            mysqli_stmt_execute($refSQLstmt);

            $formattedPhone = substr($phone, 0, 3) .'-'. substr($phone, 3, 3) .'-'. substr($phone, 6);

            //Table Row start
            echo "<tr>

            <td>$volunteer_id</td>
            <td>$first $last</td>
            <td>$email</td>
            <td>$address</td>
            <td>$city</td>
            <td>$state</td>  
            <td>$zip</td>
            <td>
                <select class='status' data-id='$volunteer_id'>";
                    foreach($actArray as $actStat){
                        if($actStat == $activity){
                            echo "<option value='$actStat' selected>$actStat</option>";
                        }
                        else {
                            echo "<option value='$actStat'>$actStat</option>";
                        }
                    }
                    echo "</select>
            </td>
            
            <td>$formattedPhone</td>
            <td>$tshirt_size</td>
            <td>$email_list</td>  
            <td>$interest</td>  
            <td>$hobbies</td>       
            <td>$prevExperience</td>
            <td>$rolePref</td>            
            <td>$volAvailability</td>                      
            <td>$howdidyouhear</td>
            <td>$backgroundCheck</td>
            <td>$timestamp</td>  
            
            <td>";
            //Capture output from execution
            mysqli_stmt_bind_result($refSQLstmt,$reference_id, $refFirstName, $refLastName, $refEmail, $refPhone, $refRelation, $reference_volunteer_id);

            while (mysqli_stmt_fetch($refSQLstmt)) {
                echo nl2br("<strong>Reference Information</strong> \n Name: $refFirstName $refLastName \n Email: $refEmail \n Phone: $refPhone \n Relation: $refRelation \n\n");
            }
        echo "</td>         
       
        </tr>";
        }

        ?>

        </tbody>
    </table>
    <a href="VolunteerForm.html">Add a new volunteer</a>
    <br>
    <a href="volunteerMailing.php">Email Active Volunteers</a>
    <br>
    <a href="logout.php">logout</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="scripts/volunteerSummary.js"></script>
</body>
</html>

