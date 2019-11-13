<?php
/* This is a VOLUNTEER-summary.php reads dreamers from a database
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
        <title>Volunteer Summary</title>
        <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    </head>
    <body>
    <div class="container">
        <h3>Volunteer Summary</h3>

<?php

require('/home/nightshi/connect.php');
