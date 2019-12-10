<?php
/* This is a dreamer-summary.php reads dreamers from a database
 * into data table
 * Nov 04, 2019
*/

//Turn on error reporting -- this is critical
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//
//Start a session
session_start();
//If user is not logged in, reroute them to the login page
if(!isset($_SESSION['username'])) {
    header('location: dreamerLogin.php');
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <title>Dreamer Summary</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./styles/databaseStyles.css">
</head>
<body>
<div class="container">
    <h3>Dreamer Summary</h3>
    <?php

    require('/home/nightshi/connect.php');

    $sql = "SELECT dreamer_id, youth_first_name, youth_last_name, youth_email, youth_phone, graduation_year,
    college, career, snacks, birthday, gender, ethnicity_id, ethnicity, ethnicity_id, timeFilled, activity, parent_guardian_name, 
    parent_guardian_email, parent_guardian_phone 
    FROM dreamers 
    ORDER BY timeFilled DESC ";

    //send the query to the database
    $result = @mysqli_query($cnxn, $sql);
    //var_dump($result);

    $sqlDreamer = "SELECT dreamer_id FROM dreamers ORDER BY timeFilled";

    $resultDreamer = mysqli_query($cnxn, $sqlDreamer);

    $activityArray = array("pending" => "pending", "active" => "active", "in-active" => "in-active");

    ?>
    <table id="dreamers-table" class="display">
        <thead>
        <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Graduation Year</th>
            <th>Status</th>
            <th>Birthday</th>
            <th>TimeFilled</th>
            <th>Parent/Guardian</th>
            <th>Parent/Guardian email</th>
            <th>Parent/Guardian phone#</th>
            <th>College</th>
            <th>Career</th>
            <th>Snacks</th>
            <th>Gender</th>
            <th>Ethnicity</th>


        </tr>
        </thead>
        <tbody>

        <?php
        //print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $dreamer_id = $row['dreamer_id'];
            $timestamp = date('m-d-Y', strtotime($row['timeFilled']));
            $first = $row['youth_first_name'];
            $last = $row['youth_last_name'];
            $email = $row['youth_email'];
            $phone = $row['youth_phone'];
            $graduationYr = $row['graduation_year'];
            $college = $row['college'];
            $career = $row['career'];
            $snacks = $row['snacks'];
            $birthday = date('m-d-Y', strtotime($row['birthday']));
            $gender = $row['gender'];
            $ethnicity = $row['ethnicity'];
            $PName = $row['parent_guardian_name'];
            $PEmail = $row['parent_guardian_email'];
            $PPhone = $row['parent_guardian_phone'];
            $activity = $row['activity'];
            /*$activity = "<select name='status' id='status'>
                            <option value='active' selected>Active</option>
                            <option value='In-active'>In-active</option>
                         </select>";*/


            $dreamerPhone = substr($phone, 0, 3) .'-'. substr($phone, 3, 3) .'-'. substr($phone, 6);
            $parentPhone = substr($PPhone, 0, 3) .'-'. substr($PPhone, 3, 3) .'-'. substr($PPhone, 6);
            echo "<tr>                    
            <td>$first $last</td>
            <td>$email</td>
            <td>$dreamerPhone</td>
            <td>$graduationYr</td>
            <td>
                <select class='status' data-id='$dreamer_id'>";
                    foreach($activityArray as $activityStat){
                        if($activityStat == $activity) {
                            echo "<option value='$activityStat' selected>$activityStat</option>";
                        }
                        else {
                            echo "<option value='$activityStat'>$activityStat</option>";
                        }
                    }
                    echo "</select>
            </td>
            <td>$birthday</td>
            <td>$timestamp</td>
            <td>$PName</td>
            <td>$PEmail</td>
            <td>$PPhone</td>
            <td>$college</td>
            <td>$career</td>
            <td>$snacks</td>
            <td>$gender</td>
            <td>$ethnicity</td>
          </tr>";
        }
        ?>

        </tbody>
    </table>

    <a href="DreamerApp.html">Add a new dreamer</a>
    <br>
    <a href="dreamerMailing.php">Email Active Dreamers</a>
    <br>
    <a href="logout.php">logout</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="scripts/dreamerSummary.js"></script>


</body>
</html>