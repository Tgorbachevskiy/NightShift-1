<?php
    /* This is a dreamer-summary.php reads dreamers from a database
     * into data table
     * Nov 04, 2019
     */

    //Turn on error reporting -- this is critical
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
    <h3>Dreamer Summary</h3>

<?php

    require('/home/nightshi/connect.php');

    $sql = 'SELECT dreamer_id, youth_first_name, youth_last_name, youth_email, youth_phone, graduation_year,
    college, career, snacks, birthday, gender, ethnicity_id, ethnicity, ethnicity_id
    FROM dreamers 
    ORDER BY youth_last_name, youth_first_name';

    //send the query to the database
    $result = @mysqli_query($cnxn, $sql);
    //var_dump($result);
?>

    <table id="dreamers-table" class="display">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Graduation Year</th>
            <th>College</th>
            <th>Career</th>
            <th>Snacks</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Ethnicity</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //print the results
        while ($row = mysqli_fetch_assoc($result)) {
            //$dDreamerId = $row['dreamer_id'];
            $first = $row['youth_first_name'];
            $last = $row['youth_last_name'];
            $email = $row['youth_email'];
            $phone = $row['youth_phone'];
            $graduationYr = $row['graduation_year'];
            $college = $row['college'];
            $career = $row['career'];
            $snacks = $row['snacks'];
            $birthday = $row['birthday'];
            $gender = $row['gender'];
            $ethnicity = $row['ethnicity'];

            echo "<tr>                                  
            <td>$first $last</td>
            <td>$email</td>
            <td>$phone</td>
            <td>$graduationYr</td>
            <td>$college</td>
            <td>$career</td>
            <td>$snacks</td>
            <td>$birthday</td>
            <td>$gender</td>
            <td>$ethnicity</td>
          </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="DreamerApp.html">Add a new dreamer</a>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#dreamers-table').DataTable();
</script>

</body>
</html>