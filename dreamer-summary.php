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
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./styles/databaseStyles.css">
</head>
<body>
<div class="container">
    <h3>Dreamer Summary</h3>

    <?php

    require('/home/nightshi/connect.php');

    $sql = "SELECT dreamer_id, youth_first_name, youth_last_name, youth_email, youth_phone, graduation_year,
    college, career, snacks, birthday, gender, ethnicity_id, ethnicity, ethnicity_id, timeFilled, activity 
    FROM dreamers 
    ORDER BY timeFilled DESC ";

    //send the query to the database
    $result = @mysqli_query($cnxn, $sql);
    //var_dump($result);
    ?>

    <table id="dreamers-table" class="striped responsive-table">
        <thead>
        <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Graduation Year</th>
            <th>Status</th>

        </tr>
        </thead>
        <tbody>

        <?php
        //print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $timestamp = $row['timeFilled'];
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
            $activity = "<select name='status'>
                            <option>Active</option>
                            <option>In-active</option>
                         </select>";


            echo "<tr>                    
            <td>$first $last</td>
            <td>$email</td>
            <td>$phone</td>
            <td>$graduationYr</td>
            <td>$activity</td>
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
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

<script>
    // $('#dreamers-table').DataTable({
    //     "order": [[0,"desc"]]
    // });

    $('#dreamers-table').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        // return 'Details for '+data[1]+' '+data[2];
                        return 'Details for '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
</script>

</body>
</html>